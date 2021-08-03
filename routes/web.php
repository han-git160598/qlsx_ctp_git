<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

// Route::get('/', function () {
//     return view('customer.index');
// });
//--------------------------------CUSTOMER---------------------------------------
Route::get('register',function(){
    return view('customer.register');

});


Route::get('/login',function(){
    return view('customer.login');
});
Route::get('/customer-home',function(){
    return view('customer.customer-home');
});
Route::get('/my-info',function()
{
    return view('customer.my-info');
});

Route::get('/my-order',function()
{
    return view('customer.my-order');
});

Route::get('/detail-product',function()
{
    return view('customer.detail_product');
});
Route::get('/cart',function(){
    return view('customer.cart');
});
Route::get('my-detail-invoice',function(){
    return view('customer.my-detail-invoice');
});
Route::get('my-announce',function(){
    return view('customer.my-announce');
});
/// slide
// Route::get('about-us',function(){

//     return view('customer.about-us');
// });

// Route::get('process',function(){

//     return view('customer.process');
// });
// Route::get('product',function(){

//     return view('customer.product');
// });
// Route::get('service',function(){

//     return view('customer.service');
// });
// Route::get('contact',function(){

//     return view('customer.contact');
// });


//--------------------------------ADMIN---------------------------------------


Route::get('login-admin',function(){
    return view('admin.login');
});

// Route::get('admin',function(){
//     return view('admin.customer_index');
// });

Route::get('customer-list-customer',function(){
    return view('admin.customer_list_customer');
});
Route::get('customer-detail',function(){
    return view('admin.customer_detail');
});


Route::get('list-product-storage',function(){
    return view('admin.customer_list_storage');
});


Route::get('list-production',function(){
    return view('admin.customer_list_production');
});

Route::get('list-production-detail',function(){
    return view('admin.customer_list_production_detail');
});

Route::get('list-product',function(){
    return view('admin.customer_list_product');
});
Route::get('product-detail',function(){
    return view('admin.product_detail');
});

Route::get('list-ship',function(){
    return view('admin.customer_list_ship');
});

Route::get('unit-setting',function(){
    return view('admin.customer_setting');
});

Route::get('my-info-admin',function(){
    return view('admin.my-info');
});

Route::get('my-reset-password',function(){
    return view('admin.my-reset-password');
});
//////////////////////// PHIIIIIIIIIIIIIIIIIII ////////////////////////


//--------------------------------ADMIN---------------------------------------
// -----------------------------Admin Customer--------------------------------
Route::get('admin', function () {
    return view('admin.login');
});

Route::post('login/verify', 'LoginVerifyController@verify')->name('verify');
// Route::post('login/verify', 'LoginVerifyController@verify')->name('login.verify');

Route::get('admin/customer_index', function () {
    return view('admin.customer_index');
})->name('admin.customer_index');

Route::get('admin/customer_list_order', function () {
    return view('admin.customer_list_order');
});
Route::get('admin/customer_list_product_inventory', function () {
    return view('admin.customer_list_product_inventory');
});
Route::get('admin/customer_list_inventory', function () {
    return view('admin.customer_list_inventory');
});

Route::get('admin/customer_inventory_detail', function () {
    return view('admin.customer_inventory_detail');
});

Route::get('admin/customer_list_vendor', function () {
    return view('admin.customer_list_vendor');
});

Route::get('admin/customer_list_account', function () {
    return view('admin.customer_list_account');
});

/////////////////////////////////////////// HOME PAGE ///////////////////////////////////////////////
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //tra ve gia tri
});



Route::get('/',function() {
        return view('home_page.home.home');
    });
Route::group(['prefix' => 'home'], function () {
    Route::get('/',function() {
        return view('home_page.home.home');
    });
    Route::get('about-us',function () {
        return view('home_page.home.home_about_us');
    });
    Route::get('process',function () {
        return view('home_page.home.home_process');
    });
    Route::get('product',function () {
        return view('home_page.home.home_product');
    });
    Route::get('service',function () {
        return view('home_page.home.home_service');
    });
    Route::get('contact',function () {
        return view('home_page.home.home_contact');
    });
});
Route::group(['prefix' => 'customer'], function () {
    Route::get('login',function () {
        return view('home_page.customer.customer_login');
    });
    Route::get('register',function () {
        return view('home_page.customer.customer_register');
    });

    Route::post('check_login', 'loginController@login');
    Route::get('check_logout', 'loginController@logout');
    
    Route::get('home',function () {
        return view('home_page.customer.customer_home');
    });
    Route::get('cart',function () {
        return view('home_page.customer.customer_cart');
    });
    Route::get('order',function () {
        return view('home_page.customer.customer_order');
    });
    Route::get('profile',function () {
        return view('home_page.customer.customer_profile');
    });
    Route::get('notify',function () {
        return view('home_page.customer.customer_notify');
    });

});
    


Route::group(['prefix' => 'admin-setting'], function () {

    Route::get('/',function () {
        return view('home_page.admin.admin_home');
    });

    Route::get('/about',function () {
        return view('home_page.admin.admin_about');
    });

     Route::get('/product',function () {
        return view('home_page.admin.admin_product');
    });

      Route::get('/process',function () {
        return view('home_page.admin.admin_process');
    });

       Route::get('/service',function () {
        return view('home_page.admin.admin_service');
    });
       
        Route::get('/contact',function () {
        return view('home_page.admin.admin_contact');
    });

});






Route::group(['prefix' => 'page'], function () {
    Route::post('login', 'loginController@login');
    Route::get('logout', 'loginController@logout');
    Route::post('send-otp', 'loginController@send_otp');
});