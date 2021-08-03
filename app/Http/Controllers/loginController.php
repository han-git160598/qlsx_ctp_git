<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\account_acount;
use App\business_store;
use Exception;
use App\local;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();

class loginController extends Controller
{
    public function login(Request $request)
    {
        // $response = Http::post('http://192.168.100.21/kse_trade/api/',[
        //     'detect' => 'login',
        //     'username' => $request->account_username,
        //     'password' => $request->account_password
        //  ]);
        // nho api_token
        // $local=new local;
        // $response = Http::post($local->urlapi,[
        //     'detect' => 'login',
        //     'username' => $request->account_username,
        //     'password' => $request->account_password
        // ]);
        //  $a=$response->getBody();

        // $b=json_decode($a);
       
        //     if($b->success=="true")
        //     {
               
        //             Session::put("mess","");
        //             Session::put("data_admin",$b->data[0]);
        //             return Redirect("/dashboard");
        //     }
        //     else
        //     {
        //         Session::put("mess","Username hoặc password không đúng");
        //         return Redirect("/");
        //     }
        return response()->json([
            'success'=>"true"
        ]);
    }
    public function logout()
    {
        Session::put("data_admin",'');
        return Redirect("/");

    }
    public function chat_tawk()
    {
        return view('customer.chat_tawk');
        

    }
    public function send_otp(Request $request)
    {

        //$arrEmail = ['khanh01636819000@gmail.com'];
        try
        {
            $data = ['mail'=>'khanh01636819000@gmail.com','otp' => '45465'];
            Mail::send(function($message){
                 $message->from('khanh.phungquocminh@gmail.com', 'QTC infomatic')->subject('Visitor Feedback!');
                 $message->to('khanh01636819000@gmail.com')->subject('MÃ XÁC NHẬN OTP');
           });
           return response()->json([
               'status'=>200
           ]);
        }
        catch(Exception $e)
        {
            return response()->json([
                'err'=>$e
            ]);
        }

    }

  
    


}
