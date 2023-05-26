<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'slug' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'images' => 'required|array',
        'images.*' => 'required|image',
        'categories' => 'required|array',
        'categories.*' => 'exists:categories,id',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $category_id = $request->categories[0];
    // Create the product
     $product = Product::create([
        'product_id' => '123',
        'category_id' => $category_id,
        'name' => $request->name,
        'slug' => $request->slug,
        'short_description' => $request->short_description,
        'description' => $request->description,
        'price' => $request->price,
        'visit' => 0,
        'share' => 0,
        'buy' => 0,
        'image' => 'image',
    ]);


    // Attach categories to the product
    $categories = $request->input('categories');
    $product->categories()->attach($categories);



        // Upload and associate images with the product
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $imagePath = $image->store('product_images', 'public');

                // Create a new product image and associate it with the product
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image_path = $imagePath;
                $productImage->save();
            }
        }




    // Attach categories to the product
    // foreach ($request->input('categories') as $categoryId) {
    //     CategoryProduct::create([
    //         'category_id' => $categoryId,
    //         'product_id' => $product->id,
    //     ]);
    // }


    return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {



            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'images' => 'required|array',
                'images.*' => 'required|image',
                'categories' => 'required|array',
                'categories.*' => 'exists:categories,id',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }



            // Update product details
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();

            // Update product categories
            $categories = $request->input('categories');
            $product->categories()->sync($categories);

            // Update product images
            if ($request->hasFile('images')) {
                $images = $request->file('images');

                // Delete existing images associated with the product
                $product->images()->delete();

                foreach ($images as $image) {
                    $imagePath = $image->store('product_images', 'public');

                    // Create a new product image and associate it with the product
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image_path = $imagePath;
                    $productImage->save();
                }
            }

            return response()->json(['message' => 'Product updated successfully']);
    }

    public function destroy(Product $product)
    {

    // Delete the associated product images
    $product->images()->delete();

    // Detach the associated categories
    $product->categories()->detach();

    // Delete the product
    $product->delete();

    return response()->json(['message' => 'Product deleted successfully'],204);
    }
}
