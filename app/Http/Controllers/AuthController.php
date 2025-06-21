<?php
namespace App\Http\Controllers;

use App\Models\Tenancy;
use App\Models\TenantUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully!',
            'user'    => $user,
            'token'   => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json([
                'message' => 'Login successful!',
                'user'    => $user,
                'token'   => $token,
            ]);
        }

        return response()->json([
            'message' => 'Unauthorized.',
        ], 401);
    }

    public function tenantLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
            'tenant'   => ['required', 'string'],
        ]);

        $tenancy = Tenancy::where('tenant', $credentials['tenant'])->first();

        if (! $tenancy) {
            return response()->json([
                'message' => 'Tenant not found.',
            ], 404);
        }

        $tenantUser = TenantUser::where('username', $credentials['username'])
            ->where('tenancy_id', $tenancy->id)
            ->first();

        if ($tenantUser && Hash::check($credentials['password'], $tenantUser->password)) {
            $token = $tenantUser->createToken('tenant-api-token')->plainTextToken;
            return response()->json([
                'message' => 'Tenant login successful!',
                'user'    => $tenantUser,
                'token'   => $token,
            ]);
        }

        return response()->json([
            'message' => 'Unauthorized.',
        ], 401);
    }

    public function profile(Request $request)
    {
        return response()->json(data: [
            'user' => $request->user(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully!',
        ]);
    }

    public function logoutOtherDevices(Request $request)
    {
        $request->user()->tokens()->where('id', '!=', $request->user()->currentAccessToken()->id)->delete();

        return response()->json([
            'message' => 'Logged out other devices successfully!',
        ]);
    }
}
