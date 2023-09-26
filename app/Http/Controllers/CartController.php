<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $userid = $request->userid;
         $user = User::find($userid);



        //  $cartItems = $user->carts()->with('user', 'product','product.author')->get();
    if ($user) {

        // If user exists, load the 'user', 'product', and 'product.author' relationships
        // $cartItems = $user->carts()->with('user', 'product', 'product.author')->get();
        $cartItems = Cart::where('user_id', $userid)
        ->with('product', 'product.author')
        ->get();


    } else {
        // If user does not exist, load only the 'product' and 'product.author' relationships

        $cartItems = Cart::with('product', 'product.author')->get();


    }


         if(count($cartItems) > 0){
             return response()->json($cartItems);
        }else{
               $cartItems = count($cartItems);
         }

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            // 'user_id' => 'required|exists:users,id',

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

        $product = Product::find($request->product_id);



            $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
            if ($cartItem) {

                $newStock = $cartItem->quantity;

                if ($product->stock-$newStock >= $quantity) {
                    if($quantityItem){
                        $cartItem->quantity = (int)$quantityItem;
                    }else{
                        $cartItem->quantity += 1;
                    }
                    $cartItem->save();
                }else{
                    return response()->json(['message' => 'Product not available in stock'], 400);
                }




            } else {
                if ($product->stock >= $quantity) {
                    $cartItem = Cart::create([
                        'user_id' => $userId,
                        'product_id' => $productId,
                        'quantity' => $quantity,
                    ]);
                } else {

                    return response()->json(['message' => 'Product not available in stock'], 400);
                }


            }
            return response()->json($cartItem, 201);








    }



    public function update(Request $request, Cart $cart)
    {
        // return $request->all();
        $user_id = $request->user_id;

        $product = Product::find($cart->product_id);



        if ($product->stock >= $request->quantity) {

            $cart->update(['quantity'=>$request->quantity]);


            $user = User::find($user_id);
            $cartItems = $user->carts()->with('user', 'product','product.author')->get();

        if(count($cartItems) > 0){
            //    return response()->json($cartItems);
                return response()->json($cartItems, 200);
          }else{
                 $cartItems = count($cartItems);
           }

        } else {

            return response()->json(['message' => 'Product not available in stock'], 400);
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


        public function getCartQuantity($user_id)
        {
            $carts = Cart::with(['product','user'])->where('user_id', $user_id)->get();
            $cartQuantity = Cart::where('user_id', $user_id)->sum('quantity');

            return response()->json(['cart_quantity' => $cartQuantity,'carts'=>$carts]);
        }



}
