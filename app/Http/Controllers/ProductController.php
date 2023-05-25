<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories', 'images')->get();
        return response()->json($products);
    }

    public function show(Product $product)
    {
        $product->load('categories', 'images');
        return response()->json($product);
    }

    public function store(Request $request)
    {
     // Validate the request data
     $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'images.*' => 'required|image',
        'categories' => 'required|array',
        'categories.*' => 'exists:categories,id',
    ]);

    // Create the product
    $product = Product::create([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'price' => $validatedData['price'],
    ]);

    // Store the product images
    $images = [];
    foreach ($validatedData['images'] as $image) {
        $imagePath = $image->store('product_images', 'public');
        $images[] = ['image_path' => $imagePath];
    }
    $product->images()->createMany($images);

    // Attach categories to the product
    foreach ($validatedData['categories'] as $categoryId) {
        CategoryProduct::create([
            'category_id' => $categoryId,
            'product_id' => $product->id,
        ]);
    }

    return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
