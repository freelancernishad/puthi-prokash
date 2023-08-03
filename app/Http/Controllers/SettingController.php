<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrFail();
        return response()->json($settings, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Define the validation rules for the fields
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $settingsCount = Setting::count();
        if($settingsCount){
            $settings = Setting::firstOrFail();
            $settings->update($request->all());
            return response()->json(['message' => 'Settings updated successfully'], 200);
        }else{
            Setting::create($request->all());
            return response()->json(['message' => 'Settings created successfully'], 201);
        }



    }

    public function update(Request $request, Setting $setting)
    {
        $validator = Validator::make($request->all(), [
            // Define the validation rules for the fields
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $setting->update($request->all());

        return response()->json(['message' => 'Settings updated successfully'], 200);
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return response()->json(['message' => 'Settings deleted successfully'], 200);
    }
}
