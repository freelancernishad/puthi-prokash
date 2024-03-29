<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryImage;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products','childrens')->whereNull('parent_id')->get();
        return response()->json($categories);
    }


    public function indexAll(Request $request)
    {
        $type = $request->type;

        if ($type == 'withoutpaginate') {
            $categories = Category::with('productCount')->get();
        } else {
            $categories = Category::with(['parent', 'productCount'])->paginate(20);
        }

        return response()->json($categories);
    }
    public function SearchItem(Request $request)
    {



        $searchTerm = $request->searchItem;
        $categories = Category::with('parent')
            ->where('name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$searchTerm}%")
            ->paginate(20);


        return response()->json($categories);
    }



    public function searchBySlug(Request $request,$slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        if ($category->children->count() > 0) {
            $category->load([
                'parent',
                'children' => function ($query1) {
                    $query1->with([
                        // 'products' => function ($query2) {
                        //     $query2->take(6);
                        // },
                        // 'products.flippingBooks' => function ($query2) {
                        //     $query2->take(4);
                        // }
                    ])->get();
                },


                // 'children.products' => function ($query2) {
                //     $query2->latest()->limit(6);
                // },
                // 'children.products.flippingBooks' => function ($query2) {
                //     $query2->take(4);
                // },



                'products' => function ($query2) {
                    $query2->take(6);
                }
        ]);


        foreach ($category->children as $child) {
            $child->load([
                'products' => function ($query) {
                    $query->latest()->take(6);
                },

            ]);

            foreach ($child->products as $products) {
                $products->load([
                    'flippingBooks' => function ($query) {
                        $query->latest()->take(4);
                    },
                ]);

            }




        }






            return response()->json($category, 200);
        } else {
            $products = $category->products()->latest()->take(6)->get();
            $category->products = $products;
            return response()->json($category, 200);

        }
    }


    public function show(Category $category)
    {
        $category->load('products','parent','categoryImages');

        $category->icon = asset($category->icon);


        return response()->json($category);

    }


    public function showCategoryChild(Request $request,$slug)
    {
        $limit = $request->limit;
        $category = Category::where('slug',$slug)->first();
        if($limit){

            $category->load([
                'children' => function ($query) use ($limit) {
                    $query->take($limit);
                },
            ]);
        }else{


            $category->load('children');
        }
        return response()->json($category);

    }

    public function getAllCategoriesWithLatestProduct()
    {
        $products = latestProductByCat();
        return response()->json($products, 200);
    }


    public function store(Request $request)
    {
      // Validate the request data
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'slug' => 'required|unique:categories',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }


    $image = $request->icon;
    $featured = '';
    $imageCount =  count(explode(';', $image));
    if ($imageCount > 1) {
        $featured =   fileupload($image, "uploaded/products/featured/");
    }




    // Create the category
    $category = Category::create([
        'cat_id' => '1234',
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'parent_id' => $request->input('parent_id'),
        'icon' => $featured,
        'index_number' => 1,

    ]);

    return response()->json($category, 201);
    }

    public function update(Request $request, Category $category)
    {

        // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'slug' => [
            'required',
            Rule::unique('categories')->ignore($category->id),
        ],
        'parent_id' => [
            'nullable',
            Rule::exists('categories', 'id'),
        ],
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }


    // Update the category attributes
    $category->name =  $request->input('name');
    $category->slug =  $request->input('slug');
    $category->parent_id =  $request->input('parent_id');

    $image = $request->icon;
    $featured = '';
    $imageCount =  count(explode(';', $image));
    if ($imageCount > 1) {
        $featured =   fileupload($image, "uploaded/products/featured/");
        $category->icon = $featured;
    }
    // Save the changes
    $category->save();

    // Reload the category with relationships
    $category->load('parent', 'products');

    return response()->json($category);
    }


    public function uploadImages(Request $request, Category $category)
    {
         $imagesCount =  count($request->all());
        if ($category->categoryImages()->exists()) {
            $category->categoryImages()->delete();
        }
        if ($imagesCount>0) {
            $images =  $request->all();
            foreach ($images as $image) {
                $imageCount =  count(explode(';', $image));
                if ($imageCount > 1) {
                    $categoryImage = new CategoryImage();
                    $filePath =   fileupload($image, "uploaded/category/image/");
                    $categoryImage->image_path = $filePath;
                    $category->categoryImages()->save($categoryImage);
                }
            }
        }

        return response()->json($category->load('categoryImages'), 201);
    }

    public function getImages(Request $request, Category $category)
    {

        $imagescount = count($category->load('categoryImages')->categoryImages);


       $img = [];
       if($imagescount>0){
        $images =  $category->load('categoryImages')->categoryImages;
        foreach ($images as $image) {
            array_push($img,base64($image->image_path));
       }

       }else{
        array_push($img,'');
       }


        return response()->json(['img'=>$img,'category'=>$category], 200);
    }


    public function destroy(Category $category)
    {


        $category->children()->update(['parent_id' => null]);
        $category->delete();
        return response()->json(null, 204);
    }
}
