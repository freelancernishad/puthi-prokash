<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function createDownload(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'published_date' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $title = $request->input('title');
        $publishedDate = $request->input('published_date');
        $description = $request->input('description');

        // Handle file upload
        // $file = $request->file('file');
        // $fileName = $file->getClientOriginalName();
        // $file->storeAs('downloads', $fileName, 'public');

        $fileName='';
        if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->store('downloads', 'public');
        }


        // Create a new Download instance
        $download = new Download();
        $download->title = $title;
        $download->published_date = $publishedDate;
        $download->description = $description;
        $download->file = $fileName;
        $download->save();

        return response()->json(['message' => 'Download created successfully'], 201);
    }

    public function updateDownload(Request $request, $id)
    {
        $download = Download::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'published_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $download->title = $request->input('title');
        $download->published_date = $request->input('published_date');
        $download->description = $request->input('description');
        $download->save();

        return response()->json(['message' => 'Download updated successfully'], 200);
    }

    public function deleteDownload($id)
    {
        $download = Download::findOrFail($id);
        $download->delete();

        return response()->json(['message' => 'Download deleted successfully'], 200);
    }

    public function getDownload($id)
    {
        $download = Download::findOrFail($id);
        return response()->json($download, 200);
    }

    public function getAllDownloads()
    {
        $downloads = Download::paginate(20);
        return response()->json($downloads, 200);
    }
}
