<?php
namespace App\Http\Controllers;

use App\Models\Tenancy;
use Illuminate\Http\Request;

class TenancyController extends Controller
{
    public function index(Request $request)
    {
        $perPage = min($request->get('per_page', 10), 50);
        return Tenancy::with('mainUser')->paginate($perPage);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'main_user_id' => 'required|exists:users,id',
            'name'         => 'required|string|max:255',
            'tenant'       => 'required|string|max:255|unique:tenancies,tenant',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after:start_date',
            'status'       => 'required|string|in:active,inactive,pending',
        ]);

        $tenancy = Tenancy::create($validated);
        $tenancy->load('mainUser');

        return response()->json($tenancy, 201);
    }

    public function show(string $id)
    {
        $tenancy = Tenancy::with('mainUser')->findOrFail($id);
        return response()->json($tenancy);
    }

    public function update(Request $request, string $id)
    {
        $tenancy = Tenancy::findOrFail($id);

        $validated = $request->validate([
            'main_user_id' => 'required|exists:users,id',
            'name'         => 'required|string|max:255',
            'tenant'       => 'required|string|max:255|unique:tenancies,tenant,' . $id,
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after:start_date',
            'status'       => 'required|string|in:active,inactive,pending',
        ]);

        $tenancy->update($validated);
        $tenancy->load('mainUser');

        return response()->json($tenancy);
    }

    public function destroy(string $id)
    {
        $tenancy = Tenancy::findOrFail($id);
        $tenancy->delete();

        return response()->json(null, 204);
    }

    public function restore(string $id)
    {
        $tenancy = Tenancy::withTrashed()->with('mainUser')->findOrFail($id);
        $tenancy->restore();

        return response()->json($tenancy);
    }
}
