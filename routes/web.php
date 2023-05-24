<?php

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/








Route::post('login',[LoginController::class,'login']);
Route::post('logout',[LoginController::class,'logout']);

Route::get('/books', function () {


    return view('flipbook.index');

});




Route::group(['prefix' => 'dashboard','middleware' => ['auth']], function() {


    Route::get('/{vue_capture?}', function () {
        // return   Auth::user()->roles->permission;

        return view('layout');
    })->where('vue_capture', '[\/\w\.-]*')->name('dashboard');
});
Route::get('/{vue_capture?}', function () {


     return view('frontlayout');

})->where('vue_capture', '[\/\w\.-]*')->name('frontend');
