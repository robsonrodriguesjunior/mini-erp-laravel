<?php
namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $perPage = min($request->get('per_page', 10), 50);
        return City::with(['state.country'])->paginate($perPage);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'state_id'  => 'required|uuid|exists:states,id',
            'name'      => 'required|string|max:255',
            'ibge_code' => 'nullable|string|size:7',
        ]);

        $city = City::create($validated);

        return response()->json($city->load(['state.country']), 201);
    }

    public function show(string $id)
    {
        $city = City::with(['state.country'])->findOrFail($id);
        return response()->json($city);
    }

    public function update(Request $request, string $id)
    {
        $city = City::findOrFail($id);

        $validated = $request->validate([
            'state_id'  => 'required|uuid|exists:states,id',
            'name'      => 'required|string|max:255',
            'ibge_code' => 'nullable|string|size:7',
        ]);

        $city->update($validated);

        return response()->json($city->load(['state.country']));
    }

    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(null, 204);
    }

    public function restore(string $id)
    {
        $city = City::withTrashed()->findOrFail($id);
        $city->restore();

        return response()->json($city->load(['state.country']));
    }
}
