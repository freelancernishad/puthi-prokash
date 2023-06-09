<?php

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Product;

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

Route::get('/books/{slug}/{id}', function ($slug,$id) {

    $BooksCount =  Product::with('flippingBooks')->where(['slug'=>$slug,'id'=>$id])->count();

    if($BooksCount>0){

        $Books =  Product::with('flippingBooks')->where(['slug'=>$slug,'id'=>$id])->first();
         $flipping_books = $Books->flippingBooks;
        return view('flipbook.index',compact('Books','flipping_books'));
    }else{
        echo "Books Not Found";
    }

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
