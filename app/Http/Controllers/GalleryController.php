<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('images')->get();

        return response()->json($galleries);
    }

    public function store(Request $request)
    {

             // Validate the request data
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'description' => 'nullable',
        'images' => 'required|array',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }


        $gallery = Gallery::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        // Upload and attach the images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gallery_images', 'public');
                $gallery->images()->create([
                    'image_path' => $path,
                ]);
            }
        }
        $gallery->load('images');
        return response()->json($gallery, 201);
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('images');

        return response()->json($gallery);
    }

    public function update(Request $request, Gallery $gallery)
    {
              // Validate the request data
              $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'nullable',
                'images' => 'required|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $gallery->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);


                // Update gallery images
    if ($request->hasFile('images')) {
        $gallery->images()->delete();
        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery_images', 'public');

            $gallery->images()->create([
                'image_path' => $path,
            ]);
        }
    }
    $gallery->load('images');

        return response()->json($gallery);
    }

    public function destroy(Gallery $gallery)
    {
   // Delete gallery images
   $gallery->images()->delete();

   // Delete the gallery
   $gallery->delete();

   return response()->json(null, 204);
    }
}
