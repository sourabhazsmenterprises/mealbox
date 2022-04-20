<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('edit-profile',[\App\Http\Controllers\ApiController::class, 'editProfile']);
Route::post('login-detail-store',[\App\Http\Controllers\ApiController::class,'loginDetailStore']);
Route::post('banner-image',[App\Http\Controllers\ApiController::class,'banner']);   

Route::post('home',[App\Http\Controllers\ApiController::class,'home']);
Route::post('category',[App\Http\Controllers\ApiController::class,'category']);
Route::post('get-profile',[\App\Http\Controllers\ApiController::class, 'getProfile']);

Route::post('category-food-item',[App\Http\Controllers\ApiController::class,'categoryFoodItem']);


Route::post('food-item',[App\Http\Controllers\ApiController::class,'foodItem']);
Route::post('plan',[App\Http\Controllers\ApiController::class,'plan']);

Route::post('add-cart',[App\Http\Controllers\ApiController::class,'addcart']);
Route::post('cartlist',[App\Http\Controllers\ApiController::class,'cartList']);
Route::post('delete-cart',[App\Http\Controllers\ApiController::class,'deletecartList']);
Route::post('edit-cart',[App\Http\Controllers\ApiController::class,'editcart']);


Route::post('add-address',[App\Http\Controllers\ApiController::class,'addAddress']);
Route::post('addresslist',[App\Http\Controllers\ApiController::class,'addressList']);
Route::post('delete-address',[App\Http\Controllers\ApiController::class,'deleteaddressList']);
Route::post('edit-address',[App\Http\Controllers\ApiController::class,'editaddress']);
Route::post('primary-address',[App\Http\Controllers\ApiController::class,'primaryAddress']);



Route::post('add-favorite',[App\Http\Controllers\ApiController::class,'addfavorite']);
Route::post('favoritelist',[App\Http\Controllers\ApiController::class,'favoriteList']);
Route::post('delete-favoritelist',[App\Http\Controllers\ApiController::class,'deletefavoriteList']);

Route::post('order',[App\Http\Controllers\ApiController::class,'order']);
Route::post('order-item',[App\Http\Controllers\ApiController::class,'orderitem']);

Route::post('subscribtion',[App\Http\Controllers\ApiController::class,'subscribtion']);
Route::post('cancelsubscribtion',[App\Http\Controllers\ApiController::class,'cancelsubscribtion']);
Route::post('cancelsubscribtionlist',[App\Http\Controllers\ApiController::class,'cancelsubscribtionlist']);
Route::post('subscribtion-list',[App\Http\Controllers\ApiController::class,'subscribtionlist']);



Route::post('food-detail',[App\Http\Controllers\ApiController::class,'foodDetail']);
Route::post('address-detail',[App\Http\Controllers\ApiController::class,'addressDetail']);
Route::any('search-food',[App\Http\Controllers\ApiController::class, 'searchfood']);


Route::any('delivery-pincode',[App\Http\Controllers\ApiController::class, 'deliveryPincode']);
Route::any('pincode-value',[App\Http\Controllers\ApiController::class, 'pincodevalue']);
Route::any('user-address-primary',[App\Http\Controllers\ApiController::class, 'useraddprimary']);

Route::any('notification',[App\Http\Controllers\ApiController::class, 'notification']);
Route::any('track',[App\Http\Controllers\ApiController::class, 'track']);


Route::any('subscribtion-notification',[App\Http\Controllers\ApiController::class, 'subscribtionNotification']);