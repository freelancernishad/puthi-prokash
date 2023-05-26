<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $payments = Payment::with('order')->get();
        $payments = Payment::with('order.products', 'order.user')->get();

        return response()->json($payments);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $order_id = $request->order_id;


     $order = Order::find($order_id);
     if(!$order){
        return response()->json(['errors' => 'Orders Not Found'], 404);
     }


   // Generate a random unique trx_id
   $trxId = Str::random(10);

   // Check if the generated trx_id already exists
   while (Payment::where('trx_id', $trxId)->exists()) {
       $trxId = Str::random(10);
   }
   $trx_date = date('Y-m-d');
   $trx_month = date('F');
   $trx_year = date('Y');

        $paymentData = [
            'order_id' => $order_id,
            'trx_id' => $trxId,
            'trx_date' => $trx_date,
            'trx_month' => $trx_month,
            'trx_year' => $trx_year,
            'amount' => $order->total_amount,
            'payment_status' => 'Pending',
        ];

        $paymentData['payment_url'] = 'payment url';
        $paymentData['payment_ipn'] = 'payment_ipn';


        // Create a new payment
        $payment = Payment::create($paymentData);

        // Return the created payment
        return response()->json($payment, 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::with('order.products', 'order.user')->findOrFail($id);

        return response()->json($payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->delete();

        return response()->json(null, 204);
    }
}
