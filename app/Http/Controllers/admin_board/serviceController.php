<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\local;
use Illuminate\Support\Facades\DB;

class serviceController extends Controller
{
    public function list_service_module(Request $request)
    {
        $sql="select * from tbl_service_module where 1=1 ";
        if(isset($request->id_module) || $request->id_module!="")
        {
            $sql.=" and id='$request->id_module'";
        }
        $data=DB::select($sql);
        return response()->json([
            'success' => "true",
            'data'=>$data
        ]);
    }
    
    public function update_service_module(Request $request)
    {
        
        $local=new local;
        $data=[];
        if(!isset($request->id_module) || $request->id_module=="")
        {
            return $local->returnError("Nhập id_module");
        }
        if(!isset($request->id_account) || $request->id_account=="")
        {
            return $local->returnError("Nhập id_account");
        }
       
        if(isset($request->module_title) || $request->module_title!="")
            $data["module_title"]=$request->module_title;
        
        if(isset($request->module_content) || $request->module_content!="")
            $data["module_content"]=$request->module_content;

        if(isset($request->id_account) || $request->id_account!="")
            $data["id_account"]=$request->id_account;

        if(isset($request->module_img) || $request->module_img!="")
        {
            //$sql="SELECT * FROM `tbl_process_module` WHERE id=$request->id_module";
            $url_img= DB::table('tbl_product_module')->where('id',$request->id_module)->get();
            if($url_img[0]->module_img!=null)
            {
                $check=$local->save_img($request->file('module_img'),'images/web_home/');
                if($check!="false")
                {
                    $data['module_img']=$check;
                    $filePath='../../'.$url_img[0]->module_img;
                    if (file_exists($filePath))
                            unlink($filePath);
                    
                }
                else
                {
                    return $local->returnError("Hinh ảnh sai định dạng");
                }
            }
           
            
        }
        if(count($data)>0)
        {
           
            $module=DB::table('tbl_service_module')->where('id',$request->id_module)->get();
            
            $data["module_total_update"]=$module[0]->module_total_update+1;
            $check=DB::table('tbl_service_module')->where("id",$request->id_module)->update($data);
            if($check==1)
                return $local->returnSuccess("Cập nhật thành công");
        }
        else
            return $local->returnError("Cập nhật thất bại");

        
    }


// SERVICE_SERVICE---SERVICE_SERVICE---SERVICE_SERVICE---SERVICE_SERVICE---SERVICE_SERVICE---SERVICE_SERVICE

    public function list_service_service(Request $request)
    {
        $sql="select * from tbl_service_service where 1=1 ";
        if(isset($request->id_module) || $request->id_service!="")
        {
            $sql.=" and id='$request->id_service'";
        }
        $data=DB::select($sql);
        return response()->json([
            'success' => "true",
            'data'=>$data
        ]);
    }
    public function create_service_service(Request $request)
    {
        $local=new local;
        $arr=$request->all();
        $check=$local->check_request($formdata=[
            "service_title"=>"Nhập tiêu đề",
            "service_img"=>"Nhập service_img",
            "id_module_service"=>"Nhập id_module_service",
            "service_content"=>"Nhập service_content",
        ],$arr);

        if($check["success"]=="false")
        {
            return response()->json($check);
        }   

        $data=[
            "service_title"=>$request->service_title,
            "service_content"=>$request->service_content,
            "id_module_service"=>$request->id_module_service,
        ];
        if(isset($request->service_img) || $request->service_img!="")
        {
            $img=$local->save_img($request->file('service_img'),'images/web_home/');
            if($img!="false")
            {
                $data['service_img']=$img;
            }
        }
    
        // $a=$local->save_img($request->file('home_img'),'images');
        // echo $a;
        DB::table('tbl_service_service')->insert($data);

        return response()->json([
            'success' => "true",
            'message'=>"Thêm thành công"
        ]);
       
    }
    public function update_service_service(Request $request)
    {
        
        $local=new local;
        $data=[];
        if(!isset($request->id_service) || $request->id_service=="")
        {
            return $local->returnError("Nhập id_service");
        }
       
        if(isset($request->service_title) && $request->service_title!="")
            $data["service_title"]=$request->service_title;
        
        if(isset($request->service_content) && $request->service_content!="")
            $data["service_content"]=$request->service_content;

        if(isset($request->service_img) && $request->service_img!="")
        {
            //$sql="SELECT * FROM `tbl_process_module` WHERE id=$request->id_module";
            $url_img= DB::table('tbl_service_service')->where('id',$request->id_service)->get();
            if($url_img[0]->service_img!=null)
            {
                $check=$local->save_img($request->file('service_img'),'images/web_home/');
                if($check!="false")
                {
                    $data['service_img']=$check;
                    $filePath='../../'.$url_img[0]->service_img;
                    if (file_exists($filePath))
                            unlink($filePath);
                    
                }
                else
                {
                    return $local->returnError("Hinh ảnh sai định dạng");
                }
            }
            
        }
        if(count($data)>0)
        {

            $check=DB::table('tbl_service_service')->where("id",$request->id_service)->update($data);
           
                return $local->returnSuccess("Cập nhật thành công");
        }
        else
            return $local->returnError("Cập nhật thất bại");

        
    }
    public function delete_service_service(Request $request)
    {
        $local=new local;
        if(!isset($request->id_service) || $request->id_service=="")
        {
            return $local->returnError("Nhập id_service");
        }
        $url_img=DB::table('tbl_service_service')->where('id',$request->id_service)->get();
        $filePath='../../'.$url_img[0]->service_img;
        if (file_exists($filePath))
            unlink($filePath);
        $check=DB::table('tbl_service_service')->where("id",$request->id_service)->delete();
       
            return $local->returnSuccess("Xóa thành công");
        
    }
}
