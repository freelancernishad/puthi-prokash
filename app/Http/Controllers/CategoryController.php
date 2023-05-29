<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryImage;
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
        if($type=='withoutpaginate'){
            $categories = Category::all();
        }else{
            $categories = Category::with('parent')->paginate(20);

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

    public function show(Category $category)
    {
        $category->load('products','parent','categoryImages');
        return response()->json($category);

    }

    public function store(Request $request)
    {
      // Validate the request data
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'slug' => 'required',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    // Create the category
    $category = Category::create([
        'cat_id' => '1234',
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'parent_id' => $request->input('parent_id'),
        'index_number' => 1,

    ]);

    return response()->json($category, 201);
    }

    public function update(Request $request, Category $category)
    {

        // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'slug' => 'required',
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
