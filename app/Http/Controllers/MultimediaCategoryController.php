<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\MultimediaCategory;

class MultimediaCategoryController extends Controller
{
    public function index()
    {
        $categories = MultimediaCategory::paginate(20);

        return response()->json($categories, 200);
    }

    public function indexAll()
    {
        $categories = MultimediaCategory::all();

        return response()->json($categories, 200);
    }

    public function show($id)
    {
        $category = MultimediaCategory::findOrFail($id);

        return response()->json($category, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:multimedia_categories|max:255',
            // Add validation rules for other fields if needed
        ]);

        $category = MultimediaCategory::create($request->all());

        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', Rule::unique('multimedia_categories')->ignore($id), 'max:255'],
            // Add validation rules for other fields if needed
        ]);

        $category = MultimediaCategory::findOrFail($id);
        $category->update($request->all());

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = MultimediaCategory::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }

}
