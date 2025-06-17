<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $perPage = min($request->get('per_page', 10), 50);
        return Product::with('tenancy')->paginate($perPage);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'sku'         => 'required|string|unique:products,sku',
            'description' => 'nullable|string',
            'tenancy_id'  => 'required|exists:tenancies,id',
        ]);

        $product = Product::create($validated);
        $product->load('tenancy');

        return response()->json($product, 201);
    }

    public function show(string $id)
    {
        $product = Product::with('tenancy')->findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'sku'         => 'required|string|unique:products,sku,' . $id,
            'description' => 'nullable|string',
            'tenancy_id'  => 'required|exists:tenancies,id',
        ]);

        $product->update($validated);
        $product->load('tenancy');

        return response()->json($product);
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }

    public function restore(string $id)
    {
        $product = Product::withTrashed()->with('tenancy')->findOrFail($id);
        $product->restore();

        return response()->json($product);
    }
}
