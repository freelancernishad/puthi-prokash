<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryCharge;

class DeliveryChargeController extends Controller
{
    public function index(Request $request)
    {
        if($request->district){


            $district = $request->district;
            if($district=='Dhaka'){
                $deliveryCharges = DeliveryCharge::where('distict','In Dhaka')->get();
            }else{
                $deliveryCharges = DeliveryCharge::where('distict','Out of Dhaka')->get();
            }


        }else{
            $deliveryCharges = DeliveryCharge::all();

        }

        return response()->json($deliveryCharges, 200);
    }

    public function store(Request $request)
    {
        // Validate input and create new delivery charge entry

        if($request->id){

            $deliveryCharge = DeliveryCharge::find($request->id);
            $deliveryCharge->update($request->all());
            return response()->json($deliveryCharge, 200);
        }




        $deliveryCharge = DeliveryCharge::create($request->all());
        return response()->json($deliveryCharge, 201);
    }

    // Implement other functions like show, update, destroy

    public function calculateDeliveryCharge(Request $request)
    {
        $weight = $request->input('weight');

        $deliveryCharge = calculateDeliveryChargeG($weight);

        if ($deliveryCharge) {
            return response()->json(['charge' => $deliveryCharge->charge], 200);
        } else {
            return response()->json(['message' => 'No delivery charge found for this weight'], 404);
        }
    }


    public function destroy(DeliveryCharge $deliveryCharge)
    {
        $deliveryCharge->delete();
        return response()->json(null, 204);
    }
}
