<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultimediaController extends Controller
{
    public function index()
    {
        $multimedia = Multimedia::paginate(20);
        return response()->json($multimedia);
    }

    public function store(Request $request)
    {
        return $request->all();

        $request->validate([
            'title' => 'required',
            'media_type' => 'required|in:video,youtube',
            // 'media_url' => 'required_if:media_type,video|url',
        ]);
        $data = [
            'title'=>$request->title,
            'media_type'=>$request->media_type,
        ];



        if ($request->hasFile('video_file')) {

            $file = $request->file('video_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('attachments', $fileName, 'public');
            return $filePath;

                die();
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
            'media_url' => 'required_if:media_type,video|url',
        ]);

        $multimedia = Multimedia::findOrFail($id);
        $multimedia->update($request->all());

        return response()->json(['message' => 'Multimedia updated successfully', 'multimedia' => $multimedia], 200);
    }

    public function destroy($id)
    {
        $multimedia = Multimedia::findOrFail($id);
        $multimedia->delete();

        return response()->json(['message' => 'Multimedia deleted successfully'], 200);
    }
}
