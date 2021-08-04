<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\sendMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\testTokenController;
use Illuminate\Support\Facades\App;

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

Route::group([
    'middleware' => 'api'
], function ($router) {

    Route::post('/', function (Request $request) {
        if (isset($request->detect) && !empty($request->detect)) {
            switch ($request->detect) {
                case "login": {

                        return App::call('App\Http\Controllers\view_board\view_boarddController@login');
                        break;
                    }
                case "logout": {
                        return App::call('App\Http\Controllers\view_board\view_boarddController@logout');
                        break;
                    }
                case "home_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_home": {
                                        return App::call('App\Http\Controllers\admin_board\homeController@list_home');
                                        break;
                                    }
                                case "create_home": {
                                        return App::call('App\Http\Controllers\admin_board\homeController@create_home');
                                        break;
                                    }
                                case "update_home": {
                                        return App::call('App\Http\Controllers\admin_board\homeController@update_home');
                                        break;
                                    }
                                case "delete_home": {
                                        return App::call('App\Http\Controllers\admin_board\homeController@delete_home');
                                        break;
                                    }
                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "about_module_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_about_module": {
                                        return App::call('App\Http\Controllers\admin_board\aboutController@list_about_module');
                                        break;
                                    }
                                case "create_about_module": {
                                        return App::call('App\Http\Controllers\admin_board\aboutController@create_about_module');
                                        break;
                                    }
                                case "update_about_module": {
                                        return App::call('App\Http\Controllers\admin_board\aboutController@update_about_module');
                                        break;
                                    }
                                case "delete_about_module": {
                                        return App::call('App\Http\Controllers\admin_board\aboutController@delete_about_module');
                                        break;
                                    }



                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "about_about_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_about_about": {
                                        return App::call('App\Http\Controllers\admin_board\aboutController@list_about_about');
                                        break;
                                    }
                                case "create_about_about": {
                                        return App::call('App\Http\Controllers\admin_board\aboutController@create_about_about');
                                        break;
                                    }
                                case "update_about_about": {
                                        return App::call('App\Http\Controllers\admin_board\aboutController@update_about_about');
                                        break;
                                    }
                                case "delete_about_about": {
                                        return App::call('App\Http\Controllers\admin_board\aboutController@delete_about_about');
                                        break;
                                    }
                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "process_module_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_process_module": {
                                        return App::call('App\Http\Controllers\admin_board\processController@list_process_module');
                                        break;
                                    }
                                case "create_process_module": {
                                        return App::call('App\Http\Controllers\admin_board\processController@create_process_module');
                                        break;
                                    }
                                case "update_process_module": {
                                        return App::call('App\Http\Controllers\admin_board\processController@update_process_module');
                                        break;
                                    }
                                case "delete_process_module": {
                                        return App::call('App\Http\Controllers\admin_board\processController@delete_process_module');
                                        break;
                                    }



                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "process_process_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_process_process": {
                                        return App::call('App\Http\Controllers\admin_board\processController@list_process_process');
                                        break;
                                    }
                                case "create_process_process": {
                                        return App::call('App\Http\Controllers\admin_board\processController@create_process_process');
                                        break;
                                    }
                                case "update_process_process": {
                                        return App::call('App\Http\Controllers\admin_board\processController@update_process_process');
                                        break;
                                    }
                                case "delete_process_process": {
                                        return App::call('App\Http\Controllers\admin_board\processController@delete_process_process');
                                        break;
                                    }

                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "product_module_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_product_module": {
                                        return App::call('App\Http\Controllers\admin_board\productController@list_product_module');
                                        break;
                                    }
                                case "create_product_module": {
                                        return App::call('App\Http\Controllers\admin_board\productController@create_product_module');
                                        break;
                                    }
                                case "update_product_module": {
                                        return App::call('App\Http\Controllers\admin_board\productController@update_product_module');
                                        break;
                                    }
                                case "delete_product_module": {
                                        return App::call('App\Http\Controllers\admin_board\productController@delete_product_module');
                                        break;
                                    }
                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "product_product_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_product_product": {
                                        return App::call('App\Http\Controllers\admin_board\productController@list_product_product');
                                        break;
                                    }
                                case "create_product_product": {
                                        return App::call('App\Http\Controllers\admin_board\productController@create_product_product');
                                        break;
                                    }
                                case "update_product_product": {
                                        return App::call('App\Http\Controllers\admin_board\productController@update_product_product');
                                        break;
                                    }
                                case "delete_product_product": {
                                        return App::call('App\Http\Controllers\admin_board\productController@delete_product_product');
                                        break;
                                    }
                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "service_module_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_service_module": {
                                        return App::call('App\Http\Controllers\admin_board\serviceController@list_service_module');
                                        break;
                                    }
                                case "update_service_module": {
                                        return App::call('App\Http\Controllers\admin_board\serviceController@update_service_module');
                                        break;
                                    }
                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "service_service_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_service_service": {
                                        return App::call('App\Http\Controllers\admin_board\serviceController@list_service_service');
                                        break;
                                    }
                                case "create_service_service": {
                                        return App::call('App\Http\Controllers\admin_board\serviceController@create_service_service');
                                        break;
                                    }
                                case "update_service_service": {
                                        return App::call('App\Http\Controllers\admin_board\serviceController@update_service_service');
                                        break;
                                    }
                                case "delete_service_service": {
                                        return App::call('App\Http\Controllers\admin_board\serviceController@delete_service_service');
                                        break;
                                    }
                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else { 
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                case "contact_manager": {

                        if (isset($request->type_manager) && !empty($request->type_manager)) {
                            switch ($request->type_manager) {
                                case "list_contact": {
                                        return App::call('App\Http\Controllers\admin_board\contactController@list_contact');
                                        break;
                                    }
                                case "update_contact": {
                                        return App::call('App\Http\Controllers\admin_board\contactController@update_contact');
                                        break;
                                    }
                                default: {
                                        return response()->json([
                                            'success' => "false",
                                            'message' => 'type_manager not found',
                                        ]);
                                    }
                            }
                        } else {
                            return response()->json([
                                'success' => "false",
                                'message' => 'type_manager not found',
                            ]);
                        }
                        break;
                    }
                default: {
                        return response()->json([
                            'success' => "false",
                            'message' => 'detect not found',
                        ]);
                    }
            }
        } else {
            return response()->json([
                'success' => "false",
                'message' => 'detect not found',
            ]);
        }
    })->middleware('cors');
});
