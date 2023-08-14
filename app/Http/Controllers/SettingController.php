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
        $settings['header_logo'] = asset($settings->header_logo);
        $settings['footer_logo'] = asset($settings->footer_logo);
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

            $datas = $request->except('header_logo','footer_logo');

            $header_logo = $request->header_logo;
            $header_logoCount =  count(explode(';', $header_logo));
            if ($header_logoCount > 1) {
                $datas['header_logo'] =   fileupload($header_logo, "uploaded/header_logo/");
            }


            $footer_logo = $request->footer_logo;
            $footer_logoCount =  count(explode(';', $footer_logo));
            if ($footer_logoCount > 1) {
                $datas['footer_logo']  =   fileupload($footer_logo, "uploaded/footer_logo/");
            }




            $settings->update($datas);
            return response()->json(['message' => 'Settings updated successfully'], 200);
        }else{

            $datas = $request->except('header_logo','footer_logo');

            $header_logo = $request->header_logo;
            $header_logoCount =  count(explode(';', $header_logo));
            if ($header_logoCount > 1) {
                $datas['header_logo'] =   fileupload($header_logo, "uploaded/header_logo/");
            }


            $footer_logo = $request->footer_logo;
            $footer_logoCount =  count(explode(';', $footer_logo));
            if ($footer_logoCount > 1) {
                $datas['footer_logo']  =   fileupload($footer_logo, "uploaded/footer_logo/");
            }



            Setting::create($datas);
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
