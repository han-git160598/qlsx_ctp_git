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