<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
      // API - Index: Display a list of active sliders
      public function index()
      {
        //   $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $sliders = Slider::orderBy('order')->paginate(20);
          return response()->json($sliders, 200);
      }

      // API - Show: Display the specified slider
      public function show($id)
      {
          $slider = Slider::findOrFail($id);
          $slider->image = asset($slider->image);
          return response()->json($slider, 200);
      }

      // API - Store: Store a newly created slider in the database
      public function store(Request $request)
      {


          $sliderData = $request->except('_token', 'image');
          $sliderData['is_active'] = $request->has('is_active');

          $image = $request->image;
    $featured = '';
    $imageCount =  count(explode(';', $image));
    if ($imageCount > 1) {
        $featured =   fileupload($image, "uploaded/slider_images/");
        $sliderData['image'] = $featured;
    }


          $slider = Slider::create($sliderData);

          return response()->json(['message' => 'Slider created successfully.', 'slider' => $slider], 201);
      }

      // API - Update: Update the specified slider in the database
      public function update(Request $request, $id)
      {
          $slider = Slider::findOrFail($id);

        //   $validator = Validator::make($request->all(), [
        //       'title' => 'required',
        //   ]);

        //   if ($validator->fails()) {
        //       return response()->json(['error' => $validator->errors()], 422);
        //   }

          $sliderData = $request->except('_token', '_method', 'image');
          $sliderData['is_active'] = $request->has('is_active');



        $image = $request->image;
    $featured = '';
    $imageCount =  count(explode(';', $image));
    if ($imageCount > 1) {
        $featured =   fileupload($image, "uploaded/slider_images/");
        $sliderData['image'] = $featured;
    }




          $slider->update($sliderData);

          return response()->json(['message' => 'Slider updated successfully.', 'slider' => $slider], 200);
      }

      // API - Destroy: Remove the specified slider from the database
      public function destroy($id)
      {
          $slider = Slider::findOrFail($id);

          // Delete the image from storage if it exists
          if ($slider->image && Storage::disk('public')->exists($slider->image)) {
              Storage::disk('public')->delete($slider->image);
          }

          $slider->delete();

          return response()->json(['message' => 'Slider deleted successfully.'], 200);
      }
}
