<?php

use Illuminate\Support\Facades\Route;
 
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

  Route::get('/', function () {
     return redirect('login');
 });
 Route::get('order-process/{id}/{val}',[\App\Http\Controllers\Backend\BannerImagesController::class,'orderprocess']); 
//Route::get('/', [\App\Http\Controllers\Frontend\UiController::class, 'index'])->name('index');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');
	Route::get('bannerimages',[\App\Http\Controllers\Backend\BannerImagesController::class, 'index']);   
	Route::get('bannerimages/create',[\App\Http\Controllers\Backend\BannerImagesController::class, 'create']);    
  Route::get('bannerimages/edit/{id}',[\App\Http\Controllers\Backend\BannerImagesController::class, 'edit']);    
  Route::any('bannerimages/store/',[\App\Http\Controllers\Backend\BannerImagesController::class, 'store']);    
   Route::any('bannerimages/update/{id}',[\App\Http\Controllers\Backend\BannerImagesController::class, 'update']);    
  Route::any('bannerimages/destroy/{id}',[\App\Http\Controllers\Backend\BannerImagesController::class, 'destroy']);    
	  Route::any('bannerimages/show/{id}',[\App\Http\Controllers\Backend\BannerImagesController::class, 'show']);    
 
    Route::delete('bannerimages/destroy',[\App\Http\Controllers\Backend\BannerImagesController::class,'massDestroy'])->name('bannerimages.massDestroy');
	
	
		Route::get('category',[\App\Http\Controllers\Backend\CategoryController::class, 'index']);   
	Route::get('category/create',[\App\Http\Controllers\Backend\CategoryController::class, 'create']);    
  Route::get('category/edit/{id}',[\App\Http\Controllers\Backend\CategoryController::class, 'edit']);    
  Route::any('category/store/',[\App\Http\Controllers\Backend\CategoryController::class, 'store']);    
   Route::any('category/update/{id}',[\App\Http\Controllers\Backend\CategoryController::class, 'update']);    
  Route::any('category/destroy/{id}',[\App\Http\Controllers\Backend\CategoryController::class, 'destroy']);    
	  Route::any('category/show/{id}',[\App\Http\Controllers\Backend\CategoryController::class, 'show']);    
 
    Route::delete('category/destroy',[\App\Http\Controllers\Backend\CategoryController::class,'massDestroy'])->name('category.massDestroy');
	
	
	 
	
	
	Route::get('foodactive/{id}/{val}',[\App\Http\Controllers\Backend\FoodItemController::class, 'foodactive']);   
	
		Route::get('food-item',[\App\Http\Controllers\Backend\FoodItemController::class, 'index']);   
	Route::get('food-item/create',[\App\Http\Controllers\Backend\FoodItemController::class, 'create']);    
  Route::get('food-item/edit/{id}',[\App\Http\Controllers\Backend\FoodItemController::class, 'edit']);    
  Route::any('food-item/store/',[\App\Http\Controllers\Backend\FoodItemController::class, 'store']);    
   Route::any('food-item/update/{id}',[\App\Http\Controllers\Backend\FoodItemController::class, 'update']);    
  Route::any('food-item/destroy/{id}',[\App\Http\Controllers\Backend\FoodItemController::class, 'destroy']);    
	  Route::any('food-item/show/{id}',[\App\Http\Controllers\Backend\FoodItemController::class, 'show']);    
 
    Route::delete('food-item/destroy',[\App\Http\Controllers\Backend\FoodItemController::class,'massDestroy'])->name('food-tem.massDestroy');
	
	
	
		Route::get('plan',[\App\Http\Controllers\Backend\PlanController::class, 'index']);   
	Route::get('plan/create',[\App\Http\Controllers\Backend\PlanController::class, 'create']);    
  Route::get('plan/edit/{id}',[\App\Http\Controllers\Backend\PlanController::class, 'edit']);    
  Route::any('plan/store/',[\App\Http\Controllers\Backend\PlanController::class, 'store']);    
   Route::any('plan/update/{id}',[\App\Http\Controllers\Backend\PlanController::class, 'update']);    
  Route::any('plan/destroy/{id}',[\App\Http\Controllers\Backend\PlanController::class, 'destroy']);    
	  Route::any('plan/show/{id}',[\App\Http\Controllers\Backend\PlanController::class, 'show']);    
 
    Route::delete('plan/destroy',[\App\Http\Controllers\Backend\PlanController::class,'massDestroy'])->name('plan.massDestroy');
	
	
	 Route::any('order-item',[\App\Http\Controllers\Backend\PlanController::class, 'orderItem']);
	
	
	
	Route::get('services',[\App\Http\Controllers\Backend\ServicesController::class, 'index']);   
	Route::get('services/create',[\App\Http\Controllers\Backend\ServicesController::class, 'create']);    
  Route::get('services/edit/{id}',[\App\Http\Controllers\Backend\ServicesController::class, 'edit']);    
  Route::any('services/store/',[\App\Http\Controllers\Backend\ServicesController::class, 'store']);    
   Route::any('services/update/{id}',[\App\Http\Controllers\Backend\ServicesController::class, 'update']);    
  Route::any('services/destroy/{id}',[\App\Http\Controllers\Backend\ServicesController::class, 'destroy']);    
	  Route::any('services/show/{id}',[\App\Http\Controllers\Backend\ServicesController::class, 'show']);    
 
    Route::delete('services/destroy',[\App\Http\Controllers\Backend\Services::class,'massDestroy'])->name('services.massDestroy');
   
   Route::get('users',[\App\Http\Controllers\Backend\ServicesController::class, 'index']);   
	Route::get('users/create',[\App\Http\Controllers\Backend\ServicesController::class, 'create']);    
  Route::get('users/edit/{id}',[\App\Http\Controllers\Backend\ServicesController::class, 'edit']);    
  Route::any('users/store/',[\App\Http\Controllers\Backend\ServicesController::class, 'store']);    
   Route::any('users/update/{id}',[\App\Http\Controllers\Backend\ServicesController::class, 'update']);    
  Route::any('users/destroy/{id}',[\App\Http\Controllers\Backend\ServicesController::class, 'destroy']);    
	  Route::any('users/show/{id}',[\App\Http\Controllers\Backend\ServicesController::class, 'show']);    
 
    Route::delete('users/destroy',[\App\Http\Controllers\Backend\Services::class,'massDestroy'])->name('users.massDestroy');
   
	
	
	   Route::get('property',[\App\Http\Controllers\Backend\PropertyController::class, 'index']);   
	Route::get('property/create',[\App\Http\Controllers\Backend\PropertyController::class, 'create']);    
  Route::get('property/edit/{id}',[\App\Http\Controllers\Backend\PropertyController::class, 'edit']);    
  Route::any('property/store/',[\App\Http\Controllers\Backend\PropertyController::class, 'store']);    
   Route::any('property/update/{id}',[\App\Http\Controllers\Backend\PropertyController::class, 'update']);    
  Route::any('property/destroy/{id}',[\App\Http\Controllers\Backend\PropertyController::class, 'destroy']);    
	  Route::any('property/show/{id}',[\App\Http\Controllers\Backend\PropertyController::class, 'show']);    
 
    Route::delete('property/destroy',[\App\Http\Controllers\Backend\Services::class,'massDestroy'])->name('Property.massDestroy');
   
    
	
	  Route::get('delevery-pincode',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'index']);   
	Route::get('delevery-pincode/create',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'create']);    
  Route::get('delevery-pincode/edit/{id}',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'edit']);    
  Route::any('delevery-pincode/store/',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'store']);    
   Route::any('delevery-pincode/update/{id}',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'update']);    
  Route::any('delevery-pincode/destroy/{id}',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'destroy']);    
	  Route::any('delevery-pincode/show/{id}',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'show']);    
 
    Route::delete('delevery-pincode/destroy',[\App\Http\Controllers\Backend\DeliveryPincode::class,'massDestroy'])->name('delevery-pincode.massDestroy');
    Route::any('add-master/{id}/{val}',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'addmaster']);    
 
    Route::any('user-find-pincode',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'userFindPincode']);    
  Route::any('user-plan',[\App\Http\Controllers\Backend\DeliveryPincodeController::class, 'userPlan']);    
 
    
}); 

Route::get('/index', [\App\Http\Controllers\Frontend\UiController::class, 'index'])->name('index');
Route::get('/about-us', [\App\Http\Controllers\Frontend\UiController::class, 'aboutus'])->name('about-us');
Route::get('/contact-us', [\App\Http\Controllers\Frontend\UiController::class, 'contactus'])->name('contact-us');
Route::get('/services', [\App\Http\Controllers\Frontend\UiController::class, 'services'])->name('services');
Route::get('/userreg', [\App\Http\Controllers\Frontend\UiController::class, 'userreg'])->name('userreg');
Route::post('/registersubmit', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('registersubmit');
Route::post('/loginsubmit', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('loginsubmit');
Route::get('/profile', [\App\Http\Controllers\Frontend\UiController::class, 'profile'])->name('profile');
Route::get('/json-response', [\App\Http\Controllers\Frontend\UiController::class, 'jsonresponse'])->name('json-response');

Route::get('logout1', function () {
        Auth::logout();
        return redirect('/');
    });
 Route::get('/cache', function() {
    Artisan::call('config:cache');
    return "Cache is cleared";
});