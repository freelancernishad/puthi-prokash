<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheBookOfPuthiprakash;

class TheBookOfPuthiprakashController extends Controller
{
    public function index()
    {
        $theBookOfPuthiprakashes = TheBookOfPuthiprakash::with('category')->get();
        return response()->json($theBookOfPuthiprakashes, 200);
    }

    public function store(Request $request)
    {

        TheBookOfPuthiprakash::truncate();
        $theBookOfPuthiprakash =  $request->categories;

        foreach ($theBookOfPuthiprakash as $value) {

            TheBookOfPuthiprakash::create([
                'category_id' => $value['id'],
            ]);
        }

        $theBookOfPuthiprakash = TheBookOfPuthiprakash::with('category')->get();

        return response()->json(['message' => 'created successfully', 'data' => $theBookOfPuthiprakash], 200);

        // Validate input and create new entry
        // $theBookOfPuthiprakash = TheBookOfPuthiprakash::create($request->all());
        // return response()->json($theBookOfPuthiprakash, 201);
    }
}
