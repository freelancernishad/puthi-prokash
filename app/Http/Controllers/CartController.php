<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $userid = $request->userid;
        // Retrieve the user's cart items
         $user = User::find($userid);
       return   $cartItems = $user->carts()->with('user', 'product')->get();

        return response()->json($cartItems);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            // 'quantity' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $userId = $request->user_id;
        $productId = $request->input('product_id');



        $quantityItem = $request->input('quantity');
        if($quantityItem){
            $quantity = (int)$quantityItem;
        }else{
            $quantity = 1;
        }


    // Check if the cart item already exists for the same user and product
    $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();


    if ($cartItem) {
        // Update the quantity of the existing cart item
        if($quantityItem){
            $cartItem->quantity = (int)$quantityItem;
        }else{
            $cartItem->quantity += 1;

        }


        $cartItem->save();
    } else {
        // Create a new cart item
        $cartItem = Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    return response()->json($cartItem, 201);
    }

    public function destroy(Cart $cart)
    {
        // Delete a cart item
        $cart->delete();

        return response()->json(['message' => 'Cart item deleted successfully']);
    }


    public function emptyCart(Request $request)
        {
            $userid = $request->userid;
            $user = User::find($userid);

            // Delete all cart items associated with the user
            $user->carts()->delete();

            return response()->json(['message' => 'Cart emptied successfully']);
        }
}
