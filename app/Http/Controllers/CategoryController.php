<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products','children')->whereNull('parent_id')->get();
        return response()->json($categories);
    }


  public function indexAll()
    {
        $categories = Category::paginate(20);
        return response()->json($categories);
    }

    public function show(Category $category)
    {
        $category->load('products','parent');
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
        'slug' => $request->input('name'),
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

    public function destroy(Category $category)
    {


        $category->children()->update(['parent_id' => null]);
        $category->delete();
        return response()->json(null, 204);
    }
}
