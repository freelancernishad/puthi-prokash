<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use  App\Http\Controllers\api\authController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\FeatureCategoryController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [authController::class,'login']);
    Route::post('logout', [authController::class,'logout']);
    Route::post('refresh', [authController::class,'refresh']);
    Route::post('me', [authController::class,'login']);
    Route::post('register', [authController::class,'register']);

});


Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::post('/users/password/change/{id}', [UserController::class, 'changePassword']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/users/position/{position}', [UserController::class, 'getUsersByPosition']);
Route::post('/users/register-writer', [UserController::class, 'registerWriter']);
Route::post('/users/{user_id}/addresses', [UserController::class, 'addUserAddress']);









Route::get('get/roles',[authController::class,'getRoles']);

Route::post('role/assign',[authController::class,'roleAssign']);

Route::post('visitorcreate',[VisitorController::class, 'visitorcreate']);
Route::get('visitorcount',[VisitorController::class, 'visitorCount']);


//////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/sliders', [SliderController::class, 'index']);
Route::get('/sliders/{id}', [SliderController::class, 'show']);
Route::post('/sliders', [SliderController::class, 'store']);
Route::put('/sliders/{id}', [SliderController::class, 'update']);
Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);





Route::get('/all/categories', [CategoryController::class,'indexAll']);
Route::get('/categories', [CategoryController::class,'index']);
Route::get('categories/search/{slug}', [CategoryController::class, 'searchBySlug']);
Route::get('categories/products/{slug}', [CategoryController::class, 'ProductsList']);
Route::get('categories/{category}/images', [CategoryController::class,'getImages']);
Route::post('categories/{category}/images', [CategoryController::class,'uploadImages']);
Route::put('categories/{category}/images', [CategoryController::class,'uploadImages']);
Route::get('serach/categories', [CategoryController::class,'SearchItem']);
Route::get('/category/list/{slug}', [CategoryController::class,'showCategoryChild']);
Route::get('/categories/{category}', [CategoryController::class,'show']);
Route::get('/category/latest-product', [CategoryController::class,'getAllCategoriesWithLatestProduct']);
Route::post('/categories', [CategoryController::class,'store']);
Route::put('/categories/{category}', [CategoryController::class,'update']);
Route::delete('/categories/{category}', [CategoryController::class,'destroy']);



Route::get('/products', [ProductController::class,'index']);


Route::get('/products/{product}', [ProductController::class,'show']);
Route::post('/products', [ProductController::class,'store']);
Route::put('/products/{product}', [ProductController::class,'update']);
Route::delete('/products/{product}', [ProductController::class,'destroy']);
Route::get('/products/{product}/fliping/book', [ProductController::class,'getFlipingImages']);
Route::post('/products/{product}/fliping/book', [ProductController::class,'uploadFlipingImages']);
Route::get('/filter/products', [ProductController::class, 'filter'])->name('products.filter');


Route::get('/products/{product}/images', [ProductImageController::class,'index']);
Route::post('/products/{product}/images', [ProductImageController::class,'store']);
Route::delete('/products/{product}/images/{image}', [ProductImageController::class,'destroy']);



Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart', [CartController::class,'store'])->name('cart.store');
Route::put('/cart/{cart}', [CartController::class,'update'])->name('cart.update');
Route::delete('/cart/{cart}', [CartController::class,'destroy'])->name('cart.destroy');
Route::delete('/empty/cart', [CartController::class,'emptyCart'])->name('cart.empty');



Route::get('/orders', [OrderController::class,'index'])->name('orders.index');
Route::get('/users/{user_id}/orders', [OrderController::class,'getOrdersByUserId']);
Route::get('/orders/{id}', [OrderController::class,'show'])->name('orders.show');
Route::post('/orders', [OrderController::class,'store'])->name('orders.store');
Route::put('/orders/{id}', [OrderController::class,'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class,'destroy'])->name('orders.destroy');
Route::put('orders/{id}/status', [OrderController::class,'updateStatus']);


Route::get('payments', [PaymentController::class,'index']);
Route::get('payments/{id}', [PaymentController::class,'show']);
Route::post('payments', [PaymentController::class,'store']);
Route::put('payments/{id}', [PaymentController::class,'update']);
Route::delete('payments/{id}', [PaymentController::class,'destroy']);



Route::get('galleries', [GalleryController::class, 'index']);
Route::post('galleries', [GalleryController::class, 'store']);
Route::get('galleries/{gallery}', [GalleryController::class, 'show']);
Route::put('galleries/{gallery}', [GalleryController::class, 'update']);
Route::delete('galleries/{gallery}', [GalleryController::class, 'destroy']);
Route::get('galleries/{gallery}/images', [GalleryController::class,'getImages']);
Route::post('galleries/{gallery}/images', [GalleryController::class,'uploadImages']);

Route::get('get/gallery/for/editor', [GalleryController::class,'forEditorImage']);



Route::apiResource('settings', SettingController::class);
Route::apiResource('feature-categories', FeatureCategoryController::class);
Route::apiResource('pages', PageController::class);
Route::get('pages/slug/{slug}', [PageController::class,'showBySlug']);


