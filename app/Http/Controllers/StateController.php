<?php
namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $perPage = min($request->get('per_page', 10), 50);
        return State::with('country')->paginate($perPage);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_id' => 'required|uuid|exists:countries,id',
            'name'       => 'required|string|max:255',
            'code'       => 'required|string|size:2',
            'ibge_code'  => 'nullable|string|size:2',
        ]);

        $state = State::create($validated);

        return response()->json($state->load('country'), 201);
    }

    public function show(string $id)
    {
        $state = State::with('country')->findOrFail($id);
        return response()->json($state);
    }

    public function update(Request $request, string $id)
    {
        $state = State::findOrFail($id);

        $validated = $request->validate([
            'country_id' => 'required|uuid|exists:countries,id',
            'name'       => 'required|string|max:255',
            'code'       => 'required|string|size:2',
            'ibge_code'  => 'nullable|string|size:2',
        ]);

        $state->update($validated);

        return response()->json($state->load('country'));
    }

    public function destroy(string $id)
    {
        $state = State::findOrFail($id);
        $state->delete();

        return response()->json(null, 204);
    }

    public function restore(string $id)
    {
        $state = State::withTrashed()->findOrFail($id);
        $state->restore();

        return response()->json($state->load('country'));
    }
}
