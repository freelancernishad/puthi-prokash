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
         $cartItems = $user->carts()->with('user', 'product','product.author')->get();

         if(count($cartItems) > 0){
             return response()->json($cartItems);
        }else{
               $cartItems = count($cartItems);
         }

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



    public function update(Request $request, Cart $cart)
    {
        $user_id = $request->user_id;

         $cart->update(['quantity'=>$request->quantity]);


         $user = User::find($user_id);
         $cartItems = $user->carts()->with('user', 'product','product.author')->get();

         if(count($cartItems) > 0){
            return response()->json($cartItems);
       }else{
              $cartItems = count($cartItems);
        }

    }


    public function destroy(Cart $cart)
    {

        $user_id = $cart->user_id;
        // Delete a cart item
        $cart->delete();



        $user = User::find($user_id);
        $cartItems = $user->carts()->with('user', 'product','product.author')->get();

        if(count($cartItems) > 0){
            return response()->json($cartItems);
       }else{
              $cartItems = count($cartItems);
        }

        // return response()->json(['message' => 'Cart item deleted successfully']);
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
