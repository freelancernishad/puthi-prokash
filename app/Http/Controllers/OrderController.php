<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {


        $status = $request->status;
        $customer = $request->customer;

        if($status){
            $orders = Order::with(['user.userAddresses', 'orderProducts.product'])->where('status',$status)->orderBy('id','desc')->paginate(20);
            return response()->json($orders);
        }

        if($customer){
            $orders = Order::with(['user.userAddresses', 'orderProducts.product'])->where('user_id',$customer)->orderBy('id','desc')->paginate(20);
            return response()->json($orders);
        }


        $orders = Order::with(['user.userAddresses', 'orderProducts.product'])->orderBy('id','desc')->paginate(20);
        return response()->json($orders);

    }



    public function getOrdersByUserId($user_id)
    {
        $orders = Order::where('user_id', $user_id)
            ->with('orderProducts.product')
            ->with('user')
            ->orderBy('id','desc')
            ->get();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No orders found for the user'], 404);
        }

        return response()->json($orders, 200);
    }


    public function show($id)
    {
        $order = Order::with(['orderProducts.product'])->findOrFail($id);

        return response()->json($order);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $userId = $request->user_id;


        $cartItems = Cart::where('user_id', $userId)->get();
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'The cart is empty'], 400);
        }

            // Calculate the total amount and total quantity from the cart items
            $totalAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->product->price * $cartItem->quantity;
            });

            $totalQuantity = $cartItems->sum('quantity');

             $orderId =   Order::generateSerial();
        $orderData = [
            'orderId' => $orderId,
            'user_id' => $userId,
            'total_amount' => $totalAmount,
            'total_quantity' => $totalQuantity,

            'name'=> $request->name,
            'email'=> $request->email,
            'address'=> $request->address,
            'address2'=> $request->address2,
            'country'=> $request->country,
            'state'=> $request->state,
            'zip'=> $request->zip,
            'paymentMethod'=> $request->paymentMethod,

        ];

        $order = Order::create($orderData);

        foreach ($cartItems as $cartItem) {
            $productId = $cartItem->product_id;
            $quantity = $cartItem->quantity;

            $orderProduct = new OrderProduct([
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);

            $order->orderProducts()->save($orderProduct);
        }

        Cart::where('user_id', $userId)->delete();
        $order->load(['orderProducts.product']);


        return response()->json([
            'message'=>'Order Complete'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $order = Order::findOrFail($id);

        $order->user_id = $request->input('user_id');
        $order->total_amount = $request->input('total_amount');
        $order->save();

        return response()->json($order);
    }




    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,processing,completed,canceled',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return response()->json(['message' => 'Order status updated successfully', 'order' => $order], 200);
    }




    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Delete the associated order products
        $order->orderProducts()->delete();

        // Delete the order itself
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }









}
