<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use App\Models\MultimediaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultimediaController extends Controller
{
    public function index()
    {
        $multimedia = Multimedia::with('category')->paginate(20);
        return response()->json($multimedia);
    }



    public function showFront(Request $request)
    {
        $id = $request->id;
        if($id){
            $galleryItems = Multimedia::with('category')->where('multimedia_categories_id',$id)->orderBy('id','desc')->paginate(20);
        }else{
            $galleryItems = Multimedia::with('category')->orderBy('id','desc')->paginate(20);
        }

        $gallery = MultimediaCategory::all();

        return response()->json(['items'=>$galleryItems,'category'=>$gallery]);
    }


    public function store(Request $request)
    {
        // return $request->all();

        $data = [
            'multimedia_categories_id'=>$request->multimedia_categories_id,
            'title'=>$request->title,
            'media_type'=>$request->media_type,
        ];
        if ($request->hasFile('media_url')) {
            $file = $request->file('media_url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $Y = date('Y');
            $m = date('m');
            $d = date('d');
            $path = "uploaded/multimedia/"."$Y/$m/$d";
            $file->move(public_path($path), $fileName);
            $data['media_url'] =   "$path/$fileName";
        }else{
            $data['media_url'] =   $request->media_url;
        }
        $multimedia = Multimedia::create($data);
        return response()->json(['message' => 'Multimedia created successfully', 'multimedia' => $multimedia], 201);
    }

    public function show($id)
    {
        $multimedia = Multimedia::findOrFail($id);
        return response()->json($multimedia);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'media_type' => 'required|in:video,youtube',
            // 'media_url' => 'required_if:media_type,video|url',
        ]);
        $data = [
            'multimedia_categories_id'=>$request->multimedia_categories_id,
            'title'=>$request->title,
            'media_type'=>$request->media_type,
        ];
        if ($request->hasFile('media_url')) {
            $file = $request->file('media_url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $Y = date('Y');
            $m = date('m');
            $d = date('d');
            $path = "uploaded/multimedia/"."$Y/$m/$d";
            $file->move(public_path($path), $fileName);
            $data['media_url'] =   "$path/$fileName";
        }else{
            $data['media_url'] =   $request->media_url;
        }

        $multimedia = Multimedia::findOrFail($id);
        $multimedia->update($data);

        return response()->json(['message' => 'Multimedia updated successfully', 'multimedia' => $multimedia], 200);
    }

    public function destroy($id)
    {
        $multimedia = Multimedia::findOrFail($id);
        $multimedia->delete();

        return response()->json(['message' => 'Multimedia deleted successfully'], 200);
    }
}
