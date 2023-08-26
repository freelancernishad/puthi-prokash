<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\FlippingBook;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories', 'images')->paginate(20);
        return response()->json($products);
    }




    public function filter(Request $request)
    {

        $query = Product::query();

        $category = [];

        // Filter by category
        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $category = Category::where('id', $categoryId)->first();
            $category->load(['parent','children']);


            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });

        }

        // Filter by author
        if ($request->has('author')) {
            $authorId = $request->input('author');
            $query->where('author_id', $authorId);
            $category = User::where('id', $authorId)->first();
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $minPrice = $request->input('min_price');
            $query->where('price', '>=', $minPrice);
        }
        if ($request->has('max_price')) {
            $maxPrice = $request->input('max_price');
            $query->where('price', '<=', $maxPrice);
        }

        // Sort products
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            switch ($sort) {
                case 'az':
                    $query->orderBy('name', 'asc');
                    break;
                case 'za':
                    $query->orderBy('name', 'desc');
                    break;
                case 'latest':
                    $query->latest();
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
                case 'price_low_high':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high_low':
                    $query->orderBy('price', 'desc');
                    break;
                case 'bangla_asc':
                    $query->orderByRaw('CAST(name AS CHAR) COLLATE utf8mb4_bin');
                    break;
                case 'bangla_desc':
                    $query->orderByRaw('CAST(name AS CHAR) COLLATE utf8mb4_bin DESC');
                    break;
                default:
                    // Handle invalid sort value, if needed
                    break;
            }
        }

        // Search by name or slug
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('slug', 'like', '%' . $searchTerm . '%');
            });
        }



        // Retrieve the filtered and sorted products
        $products = $query->paginate(18);


        foreach ($products as  $product) {
            $product->load([
                'flippingBooks' => function ($query) {
                    $query->take(4); // Limit the number of flippingBooks to 4 per product
                }
            ]);
        }


        // Return the filtered products as a response
        return response()->json(['products'=>$products,'category'=>$category]);
    }




    public function show(Product $product)
    {
        $product->load([
            'categories',
            'category',
            'images',
            'author',
            'flippingBooks' => function ($query) {
            $query->take(4);
            }
        ]);

        $product->image = asset($product->image);
        return response()->json($product);
    }

    public function store(Request $request)
    {


     // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'price' => 'required|numeric',
        'prossod' => 'required',
        'total_page' => 'required|numeric',
        'release_date' => 'required',
        'cover_type' => 'required',
        'ISBN' => 'required',
        'slug' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'categories' => 'required|array',
        'categories.*' => 'exists:categories,id',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $category_id = $request->categories[0];
    // Create the product

    $image = $request->image;
    $featured = '';
    $imageCount =  count(explode(';', $image));
    if ($imageCount > 1) {
        $featured =   fileupload($image, "uploaded/products/featured/");
    }


     $product = Product::create([
        'product_id' => '123',
        'category_id' => $category_id,
        'name' => $request->name,
        'slug' => $request->slug,
        'discount_status' => $request->discount_status,
        'discount_type' => $request->discount_type,
        'discount' => $request->discount,
        'prossod' => $request->prossod,
        'total_page' => $request->total_page,
        'release_date' => $request->release_date,
        'cover_type' => $request->cover_type,
        'ISBN' => $request->ISBN,
        'short_description' => $request->short_description,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'weight' => $request->weight,
        'visit' => 0,
        'share' => 0,
        'buy' => 0,
        'image' => $featured,
        'author_id' => $request->author_id,
    ]);


    // Attach categories to the product
    $categories = $request->input('categories');
    $product->categories()->attach($categories);










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
                'prossod' => 'required',
                'total_page' => 'required|numeric',
                'release_date' => 'required',
                'cover_type' => 'required',
                'ISBN' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'categories' => 'required|array',
                'categories.*' => 'exists:categories,id',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }



            // Update product details
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->discount_type = $request->discount_type;
            $product->discount = $request->discount;
            $product->prossod = $request->prossod;
            $product->total_page = $request->total_page;
            $product->release_date = $request->release_date;
            $product->cover_type = $request->cover_type;
            $product->ISBN = $request->ISBN;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->weight = $request->weight;
            $product->author_id = $request->author_id;


            $image = $request->image;
            $featured = '';
            $imageCount =  count(explode(';', $image));
            if ($imageCount > 1) {
                $featured =   fileupload($image, "uploaded/products/featured/");
                $product->image = $featured;
            }

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




    public function uploadFlipingImages(Request $request, Product $product)
    {
         $flipingBooksCount =  count($request->all());
        if ($product->flippingBooks()->exists()) {
            $product->flippingBooks()->delete();
        }

        if ($flipingBooksCount>0) {
             $flipingBooks =  $request->all();
             $flippingBooks = [];
            foreach ($flipingBooks as $flipingBook) {
                $booksDatas = [
                    // 'product_id'=>$flipingBook['product_id'],
                    'product_id'=>$product->id,
                    'name'=>$flipingBook['name'],
                    'slug'=>str_replace(' ', '-', $flipingBook['name']),
                ];
                $imageCount =  count(explode(';', $flipingBook['image']));
                if ($imageCount > 1) {
                    $filePath =   fileupload($flipingBook['image'], "uploaded/products/fliping/");
                    $booksDatas['image'] = $filePath;
                }

                $flippingBook = FlippingBook::create($booksDatas);
                $flippingBook->load('product');

                $flippingBooks[] = $flippingBook;
            }

            return $flippingBooks;
        }

        return response()->json($product->load('images'), 201);
    }

    public function getFlipingImages(Request $request, Product $product)
    {

        $bookscount = count($product->load('flippingBooks')->flippingBooks);


       $books =  [];
       if($bookscount>0){
        $flipBooks =  $product->load('flippingBooks')->flippingBooks;
        foreach ($flipBooks as $flipBook) {
            array_push($books,[
                            'name'=>$flipBook->name,
                            'image'=>base64($flipBook->image)
                        ]
        );
       }

       }else{
        array_push($books,
        [
            'name'=>'',
            'image'=>'',
        ]
    );
       }


        return response()->json(['books'=>$books,'product'=>$product], 200);
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


    public function getRelatedProducts($productId)
{
    // Find the product by its ID
    $product = Product::findOrFail($productId);

    // Get the categories associated with the product
    $categories = $product->categories;

    // Get all products that belong to the same categories as the given product
    $relatedProducts = Product::whereHas('categories', function ($query) use ($categories) {
        $query->whereIn('category_id', $categories->pluck('id'));
    })
    ->where('id', '!=', $productId) // Exclude the original product itself
    ->take(6) // You can limit the number of related products as needed
    ->get();

    return response()->json($relatedProducts, 200);
}


function stockAdd(Request $request,$id){

    $stock = $request->stock;
    $product = Product::find($id);
    $product->update(['stock'=>$stock]);
    return response()->json(['message' => 'Product Stock Updated successfully'],200);
}






}
