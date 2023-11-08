<?php

namespace App\Http\Controllers;

use App\Mail\CancelOrderMail;
use App\Mail\NewOrderMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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



    public function getOrdersByUserId(Request $request,$user_id)
    {

        if($request->status){
            $orders = Order::where('user_id', $user_id)
            ->where('status',$request->status)
            ->with('orderProducts.product')
            ->with('user')
            ->orderBy('id','desc')
            ->get();
        }else{
            $orders = Order::where('user_id', $user_id)
            ->where('status','!==','canceled')
            ->with('orderProducts.product')
            ->with('user')
            ->orderBy('id','desc')
            ->get();
        }

        // $orders = Order::where('user_id', $user_id)
        //     ->with('orderProducts.product')
        //     ->with('user')
        //     ->orderBy('id','desc')
        //     ->get();



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
            $ProducttotalAmount = $cartItems->sum(function ($cartItem) {
                return $cartItem->product->price * $cartItem->quantity;
            });



            $totalWeight = 0; // Initialize the total weight variable
            $totalWeight = $cartItems->sum(function ($cartItem) {
                return $cartItem->product->weight * $cartItem->quantity;
            });


            $delivery = calculateDeliveryChargeG($totalWeight);

            $totalAmount =  $ProducttotalAmount + $delivery;


            $totalQuantity = $cartItems->sum('quantity');

             $orderId =   Order::generateSerial();
        $orderData = [
            'orderId' => $orderId,
            'user_id' => $userId,
            'amount' => $ProducttotalAmount,
            'delevery' => $delivery,
            'total_amount' => $totalAmount,
            'total_quantity' => $totalQuantity,

            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'address2'=> $request->address2,
            'country'=> $request->country,
            'user_division'=> $request->user_division,
            'user_district'=> $request->user_district,
            'user_thana'=> $request->user_thana,
            'user_union'=> $request->user_union,
            'state'=> $request->state,
            'zip'=> $request->zip,
            'paymentMethod'=> $request->paymentMethod,

        ];

        $order = Order::create($orderData);

        foreach ($cartItems as $cartItem) {
            $productId = $cartItem->product_id;
            $quantity = $cartItem->quantity;

            $product = Product::find($productId);
            $product->stock -= $quantity;
            $product->save();

            $orderProduct = new OrderProduct([
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);

            $order->orderProducts()->save($orderProduct);






        }

        Cart::where('user_id', $userId)->delete();
        $order->load(['orderProducts.product','user']);

        // return $order;


        // $message = "Dear ".$order->name.", Your Order $order->orderId has been confirmed";
        $message = "পুথিপ্রকাশ: $order->name, আপনার অর্ডারের জন্য ধন্যবাদ!";
        SmsBdsmsportal($message,$order->user->phone);

        $data = [
            'name' => $order->name,
            'email' => $order->email,
            'contact' => $order->phone,
            'subject' => 'New Order Alert!',
            'message' => $order,
        ];
        Mail::to(env('ADMIN_EMAIL'))->send(new NewOrderMail($data));

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


        $order = Order::with('user')->findOrFail($id);

        if($order->status==$request->input('status')){
            return response()->json('Cant update same status' , 422);
        }

        $user = $order->user;

        $order->status = $request->input('status');


        $order->save();

        $order->load(['orderProducts.product','user']);



        // $message = "Dear $user->name, Your Order $order->orderId status updated.Your order status is $order->status";

        if($request->status=='processing'){
            $message = "পুথিপ্রকাশ: $user->name, আপনার অর্ডার প্রক্রিয়াধীণ রয়েছে।";
        }elseif($request->status=='shipped'){
            $message = "পুথিপ্রকাশ: $user->name, আপনার অর্ডারটি ডেলিভারির ব্যবস্থা করা হয়েছে।";
        }elseif($request->status=='completed'){
            $message = "পুথিপ্রকাশ: $user->name, আপনার অর্ডারটির ডেলিভারি সম্পন্ন হয়েছে, পরবর্তী অর্ডারের অপেক্ষায় আমরা আছি আপনার পাশে।";
        }elseif($request->status=='canceled'){
            $message = "পুথিপ্রকাশ: $user->name, আপনার অর্ডারটির বাতিল করা হয়েছে। যে কোন প্রয়োজনে কল করুন- ০১৭৪৫-১৬৬৬৬২।";
            $data = [
                'name' => $order->name,
                'email' => $order->email,
                'contact' => $order->phone,
                'subject' => 'Order cancel Alert!',
                'message' => $order,
            ];
            Mail::to(env('ADMIN_EMAIL'))->send(new CancelOrderMail($data));
        }
        SmsBdsmsportal($message,$order->user->phone);







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
