<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TheBookOfPuthiprakash;
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


Route::get('genrate-sitemap', function () {
    // create new sitemap object
    $sitemap = App::make("sitemap");
    // add items to the sitemap (url, date, priority, freq)
    $sitemap->add(URL::to('categories'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('products'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
    $sitemap->add(URL::to('cart'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
    $sitemap->add(URL::to('checkout'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
    $sitemap->add(URL::to('multimedia'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
    $sitemap->add(URL::to('gallery'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
    $sitemap->add(URL::to('writer'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
    $sitemap->add(URL::to('contact-us'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');

    // // get all posts from db
    // $categories = Category::all();
    // // add every post to the sitemap
    // foreach ($categories as $category)
    // {
    //     $sitemap->add(URL::to('categories/'.$category->id.'/edit'), $category->updated_at, '1.0', 'daily');
    // }
    // generate your sitemap (format, filename)
    $sitemap->store('xml', 'sitemap');
    // this will generate file mysitemap.xml to your public folder
    return redirect(url('sitemap.xml'));
});






Route::post('auth/login',[LoginController::class,'userLogin']);
Route::post('login',[LoginController::class,'login']);
Route::post('logout',[LoginController::class,'logout']);

Route::get('/books/{slug}/{id}', function ($slug,$id) {

    $BooksCount =  Product::with('flippingBooks')->where(['slug'=>$slug,'id'=>$id])->count();

    if($BooksCount>0){

        $Books =  Product::with('flippingBooks')->where(['slug'=>$slug,'id'=>$id])->first();
         $flipping_books = $Books->flippingBooks;
         $settings = Setting::firstOrFail();
        return view('flipbook.index',compact('Books','flipping_books','settings'));
    }else{
        echo "Books Not Found";
    }

});


Route::get('/invoice/{id}', function ($id) {

    $order = Order::with(['user','user.userAddresses','user.userAddresses.user_division','user.userAddresses.user_district','user.userAddresses.user_thana','user.userAddresses.user_union','orderProducts.product'])->find($id);
    if($order){
        return view('invoice',compact('order'));
    }else{
        return "<h1 style='color:red;text-align:center'>Invoice not found!</h1>";
    }

});




Route::group(['prefix' => 'dashboard','middleware' => ['auth']], function() {


    Route::get('/{vue_capture?}', function () {
        // return   Auth::user()->roles->permission;

         $settinyint =  json_encode(tinyInt());
        return view('layout',compact('settinyint'));
    })->where('vue_capture', '[\/\w\.-]*')->name('dashboard');
});
Route::get('/{vue_capture?}', function ($vue_capture='') {





    $urldata = explode('/',$vue_capture);
    if(count($urldata)>2){

        if($urldata[0]=='product' && $urldata[1]=='single'){
            $productId = $urldata[2];
            $web_details =  Product::find($productId);

            if(file_exists($web_details->image)){
                $fiture =  base64Withsize("Product-$productId",$web_details->image);
            }else{

                $fiture =  base64Withsize("Product-$productId", settings()->header_logo);
            }

            $web_details['fiture'] = $fiture;


        }else{

            if(file_exists(settings()->header_logo)){
                $fiture =  base64Withsize('Product-main',settings()->header_logo);
            }else{
                $fiture =  '';
            }
            $web_details = [
                "name"=> "পুথিপ্রকাশ",
                "short_description"=> 'পুথিপ্রকাশ',
                "long_description"=> "",
                "slug"=> "পুথিপ্রকাশ",
                "fiture"=> $fiture,
            ]  ;
            $web_details= json_decode(json_encode($web_details));
        }

    }else{


        if(file_exists(settings()->header_logo)){
            $fiture =  base64Withsize('Product-main',settings()->header_logo);
        }else{
            $fiture =  '';
        }
        // $fiture =  base64Withsize('Product-main',settings()->header_logo);
        $web_details = [
            "name"=> "পুথিপ্রকাশ",
            "short_description"=> 'পুথিপ্রকাশ',
            "long_description"=> "",
            "slug"=> "পুথিপ্রকাশ",
            "fiture"=> $fiture,
        ]  ;
        $web_details= json_decode(json_encode($web_details));
    }














     $categories = TheBookOfPuthiprakash::with('category')->get();

     $sliders = Slider::orderBy('order','asc')->get();
     $settings = Setting::firstOrFail();
     return view('frontlayout',compact('categories','sliders','settings','web_details'));






})->where('vue_capture', '[\/\w\.-]*')->name('frontend');
