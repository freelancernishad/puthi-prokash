<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index(Product $product)
    {
        $images = $product->images;
        return response()->json($images);
    }

    public function store(Request $request, Product $product)
    {
        $image = new ProductImage();
        $image->image_path = $request->image_path;

        $product->images()->save($image);

        return response()->json($image, 201);
    }

    public function destroy(Product $product, ProductImage $image)
    {
        $image->delete();
        return response()->json(null, 204);
    }
}
