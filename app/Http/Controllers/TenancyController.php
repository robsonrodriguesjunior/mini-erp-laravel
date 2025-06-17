<?php
namespace App\Http\Controllers;

use App\Models\Tenancy;
use Illuminate\Http\Request;

class TenancyController extends Controller
{
    public function index(Request $request)
    {
        $perPage = min($request->get('per_page', 10), 50);
        return Tenancy::with(['city', 'state', 'country'])
            ->paginate($perPage)
            ->through(function ($tenancy) {
                $tenancy->full_address = $tenancy->full_address;
                return $tenancy;
            });
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:tenancies,email',
            'phone'      => 'required|string|max:20',
            'document'   => 'required|string|unique:tenancies,document',
            'address'    => 'required|string',
            'city_id'    => 'required|exists:cities,id',
            'state_id'   => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'postcode'   => 'required|string|max:10',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
            'status'     => 'required|string|in:active,inactive,pending',
        ]);

        $tenancy = Tenancy::create($validated);
        $tenancy->load(['city', 'state', 'country']);
        $tenancy->full_address = $tenancy->full_address;

        return response()->json($tenancy, 201);
    }

    public function show(string $id)
    {
        $tenancy = Tenancy::with(['city', 'state', 'country'])
            ->findOrFail($id);
        $tenancy->full_address = $tenancy->full_address;
        return response()->json($tenancy);
    }

    public function update(Request $request, string $id)
    {
        $tenancy = Tenancy::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:tenancies,email,' . $id,
            'phone'      => 'required|string|max:20',
            'document'   => 'required|string|unique:tenancies,document,' . $id,
            'address'    => 'required|string',
            'city_id'    => 'required|exists:cities,id',
            'state_id'   => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'postcode'   => 'required|string|max:10',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
            'status'     => 'required|string|in:active,inactive,pending',
        ]);

        $tenancy->update($validated);
        $tenancy->load(['city', 'state', 'country']);
        $tenancy->full_address = $tenancy->full_address;

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
        $tenancy = Tenancy::withTrashed()
            ->with(['city', 'state', 'country'])
            ->findOrFail($id);
        $tenancy->restore();
        $tenancy->full_address = $tenancy->full_address;

        return response()->json($tenancy);
    }
}
