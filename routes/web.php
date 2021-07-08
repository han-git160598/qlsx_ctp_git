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
    return view('customer.index');
});
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
Route::get('about-us',function(){

    return view('customer.about-us');
});

Route::get('process',function(){

    return view('customer.process');
});
Route::get('product',function(){

    return view('customer.product');
});
Route::get('service',function(){

    return view('customer.service');
});
Route::get('contact',function(){

    return view('customer.contact');
});


//--------------------------------ADMIN---------------------------------------


Route::get('login-admin',function(){
    return view('admin.login');
});

Route::get('admin',function(){
    return view('admin.customer_index');
});

Route::get('customer-list-customer',function(){
    return view('admin.customer_list_customer');
});
Route::get('customer-detail',function(){
    return view('admin.customer_detail');
});


Route::get('list-product-inventory',function(){
    return view('admin.customer_list_product_inventory');
});