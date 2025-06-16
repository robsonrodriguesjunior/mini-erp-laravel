<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $perPage = min($request->get('per_page', 10), 50);
        return Country::paginate($perPage);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'code'       => 'required|string|size:2|unique:countries,code',
            'phone_code' => 'required|string|max:5',
        ]);

        $country = Country::create($validated);

        return response()->json($country, 201);
    }

    public function show(string $id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    public function update(Request $request, string $id)
    {
        $country = Country::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'code'       => 'required|string|size:2|unique:countries,code,' . $id,
            'phone_code' => 'required|string|max:5',
        ]);

        $country->update($validated);

        return response()->json($country);
    }

    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return response()->json(null, 204);
    }

    public function restore(string $id)
    {
        $country = Country::withTrashed()->findOrFail($id);
        $country->restore();

        return response()->json($country);
    }
}
