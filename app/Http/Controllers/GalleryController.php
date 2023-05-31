<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('images')->paginate(20);

        return response()->json($galleries);
    }

    public function store(Request $request)
    {

             // Validate the request data
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'description' => 'nullable',

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






    public function uploadImages(Request $request, Gallery $gallery)
    {
         $imagesCount =  count($request->all());
        if ($gallery->images()->exists()) {
            $gallery->images()->delete();
        }
        if ($imagesCount>0) {
            $images =  $request->all();
            foreach ($images as $image) {
                $imageCount =  count(explode(';', $image));
                if ($imageCount > 1) {
                    $categoryImage = new GalleryImage();
                    $filePath =   fileupload($image, "uploaded/gallery/image/");
                    $categoryImage->image_path = $filePath;
                    $gallery->images()->save($categoryImage);
                }
            }
        }

        return response()->json($gallery->load('images'), 201);
    }


    public function getImages(Request $request, Gallery $gallery)
    {

        $imagescount = count($gallery->load('images')->images);


       $img = [];
       if($imagescount>0){
        $images =  $gallery->load('images')->images;
        foreach ($images as $image) {
            array_push($img,base64($image->image_path));
       }

       }else{
        array_push($img,'');
       }


        return response()->json(['img'=>$img,'gallery'=>$gallery], 200);
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
