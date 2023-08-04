<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(20);
        return response()->json($pages);
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required',
            'slug' => 'required|unique:pages',
            'content' => 'required',
            'status' => 'in:draft,published',
        ]);

        $page = Page::create($request->all());

        return response()->json(['message' => 'Page created successfully', 'page' => $page], 201);
    }

    public function showBySlug($slug)
    {
        $page = Page::where(['slug'=>$slug])->first();
        return response()->json($page);
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);
        return response()->json($page);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'page_name' => 'required',
            'slug' => 'required|unique:pages,slug,' . $id,
            'content' => 'required',
            'status' => 'in:draft,published',
        ]);

        $page = Page::findOrFail($id);
        $page->update($request->all());

        return response()->json(['message' => 'Page updated successfully', 'page' => $page], 200);
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json(['message' => 'Page deleted successfully'], 200);
    }
}
