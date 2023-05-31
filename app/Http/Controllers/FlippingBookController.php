<?php

namespace App\Http\Controllers;

use App\Models\FlippingBook;
use Illuminate\Http\Request;

class FlippingBookController extends Controller
{
    public function index()
    {
        $flippingBooks = FlippingBook::with('product')->get();

        return response()->json($flippingBooks, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'flipping_books' => 'required|array',
            'flipping_books.*.flipping_book' => 'required',
            'flipping_books.*.image' => 'required',
            'flipping_books.*.type' => 'required',
            'flipping_books.*.status' => 'required',
            'flipping_books.*.product_id' => 'required|exists:products,id',
        ]);

        $flippingBooks = [];

        foreach ($request->input('flipping_books') as $flippingBookData) {
            $flippingBook = FlippingBook::create($flippingBookData);

            // Load the product relationship
            $flippingBook->load('product');

            $flippingBooks[] = $flippingBook;
        }

        return response()->json($flippingBooks, 201);
    }


    public function show(FlippingBook $flippingBook)
    {
        // Load the product relationship
        $flippingBook->load('product');

        return response()->json($flippingBook, 200);
    }

    public function update(Request $request, FlippingBook $flippingBook)
    {
        $request->validate([
            'flipping_book' => 'required',
            'image' => 'required',
            'type' => 'required',
            'status' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);

        $flippingBook->update($request->all());

        // Load the product relationship
        $flippingBook->load('product');

        return response()->json($flippingBook, 200);
    }

    public function destroy(FlippingBook $flippingBook)
    {
        $flippingBook->delete();

        return response()->json(null, 204);
    }
}
