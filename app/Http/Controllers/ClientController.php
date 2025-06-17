<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $perPage = min($request->get('per_page', 10), 50);
        return Client::with(['city', 'state', 'country', 'tenancy'])
            ->paginate($perPage)
            ->through(function ($client) {
                $client->full_address = $client->full_address;
                return $client;
            });
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:clients,email',
            'phone'      => 'required|string|max:20',
            'document'   => 'required|string|unique:clients,document',
            'address'    => 'required|string',
            'city_id'    => 'required|exists:cities,id',
            'state_id'   => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'postcode'   => 'required|string|max:20',
            'tenancy_id' => 'required|exists:tenancies,id',
        ]);

        $client = Client::create($validated);
        $client->load(['city', 'state', 'country', 'tenancy']);
        $client->full_address = $client->full_address;

        return response()->json($client, 201);
    }

    public function show(string $id)
    {
        $client = Client::with(['city', 'state', 'country', 'tenancy'])
            ->findOrFail($id);
        $client->full_address = $client->full_address;
        return response()->json($client);
    }

    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:clients,email,' . $id,
            'phone'      => 'required|string|max:20',
            'document'   => 'required|string|unique:clients,document,' . $id,
            'address'    => 'required|string',
            'city_id'    => 'required|exists:cities,id',
            'state_id'   => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
            'postcode'   => 'required|string|max:20',
            'tenancy_id' => 'required|exists:tenancies,id',
        ]);

        $client->update($validated);
        $client->load(['city', 'state', 'country', 'tenancy']);
        $client->full_address = $client->full_address;

        return response()->json($client);
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(null, 204);
    }

    public function restore(string $id)
    {
        $client = Client::withTrashed()
            ->with(['city', 'state', 'country', 'tenancy'])
            ->findOrFail($id);
        $client->restore();
        $client->full_address = $client->full_address;

        return response()->json($client);
    }
}
