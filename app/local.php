<?php

namespace App;
use Validator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class local
{
     public $urlapi="http://192.168.100.37/edu_player/api/";
     
     public function check_request($formdata=[],$arr)// kiểm tra xem param truyền đủ hay chưa
     {
       
         foreach($formdata as $k=>$f) // f : may cai item chyen vao khi lay api
         {
             $i=0;
             foreach($arr as $check=>$v)
             {
                 if($k==$check && $v!="")// kiem xem co thieu thuoc tinh nao khong
                 {
                     $i++;
                 }
             }
             if($i==0)
             {
                 return [
                     'success' => "false",
                     'message'=>$f
                 ];
             }
         }
         return [
             'success' => "true",
         ];
     }
     function returnError($string)
     {
          return response()->json([
               'success' => 'false',
               'message' => $string
          ]);
        
     }
     
     function returnSuccess($string)
     {
          return response()->json([
               'success' => 'true',
               'message' => $string
          ]);
     }
     public function save_img($file,$target_save="")//$file,$target_save = ''
     {
         
          try{
               $validation = Validator::make(["select_file"=>$file], [
                   'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                  ]);
                  if($validation->passes())
                  {
                   $image = $file;
                   $new_name = rand() . '.' . $image->getClientOriginalExtension();
                   // $image->move('../images/product_category', $new_name);// them vao thu muc cate trong image
                   // nho ../ theo doanh muc tren host
                   $image->move('../../'.$target_save, $new_name);
                   return $target_save.$new_name;
                  }
                  else
                  {
                   return "false";
                  }
           } catch(Exception $e){
               return "false";
           }
     }
}