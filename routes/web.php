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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');   

require __DIR__.'/auth.php';



Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'],'login','AdminController@login');
    // Route::get('register','AdminController@register');
    Route::group(['middleware'=>['admin']],function(){

        Route::get('dashboard','AdminController@dashboard');

        Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');
        
        Route::post('check-admin-password','AdminController@checkAdminPassword');

         Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

         Route::match(['get','post'],'update-vendor-details/{slug}','AdminController@updateVendorDetails');

         Route::get('admins/{type?}','AdminController@admins');

         Route::get('view-vendor-details/{id}','AdminController@viewVendorDetails');

         Route::post('update-admin-status','AdminController@updateAdminStatus');

        Route::get('logout','AdminController@logout');
    });
   

});

Route::namespace('App\Http\Controllers\Front')->group(function(){
    // Route::get('/','IndexController@index');

    Route::get('About_us','VendorController@About_us');

    Route::get('vendorlogin','VendorController@vendorlogin');

    //vendor login/register
    Route::get('front/vendors/login_register','VendorController@loginRegister');

    //vendor register
    Route::post('vendor/register','VendorController@vendorRegister');

    //confirm vendor account
    Route::get('vendor/confirm/{code}','VendorController@confirmVendor');
});
