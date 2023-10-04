<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use lemonpatwari\bangladeshgeocode\Models\Thana;
use lemonpatwari\bangladeshgeocode\Models\Union;
use lemonpatwari\bangladeshgeocode\Models\District;
use lemonpatwari\bangladeshgeocode\Models\Division;


class GeoCode extends Controller
{


    function Divisions(Request $request) {

        if($request->id){
            return $divisions = Division::find($request->id);
         }

        if($request->relation){
           return $divisions = Division::with('districts')->get(); // districts hasMany
        }

       return $divisions = Division::all();
    }

    function Districts(Request $request) {

        if($request->id){
            return $divisions = District::find($request->id);
         }

        if($request->relation){
           return $districts = District::with('division','thanas')->get(); //division belongsTo and thanas hasMany
        }
       return $districts = District::all();
    }


    function Thanas(Request $request) {


        if($request->id){
            return $divisions = Thana::find($request->id);
         }

        if($request->relation){
           return $thanas = Thana::with('district','unions')->get(); //district belongsTo and unions hasMany;
        }
       return $thanas = Thana::all();
    }

    function Unions(Request $request) {

        if($request->id){
            return $divisions = Union::find($request->id);
         }
       return $union = Union::all();
    }


}
