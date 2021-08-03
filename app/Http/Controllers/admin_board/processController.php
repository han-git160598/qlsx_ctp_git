<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\local;
use Illuminate\Support\Facades\DB;

class processController extends Controller
{
    public function list_process_module(Request $request)
    {
        $sql="select * from tbl_process_module where 1=1 ";
        if(isset($request->id_module) || $request->id_module!="")
        {
            $sql.=" and id='$request->id_module'";
        }
        $sql.= " order by module_priority asc";
        $data=DB::select($sql);
        return response()->json([
            'success' => "true",
            'data'=>$data
        ]);
    }
    public function list_process_process(Request $request)
    {

        $sql="select * from tbl_process_process where 1=1 ";
        if(isset($request->id_process) || $request->id_process!="")
        {
            $sql.=" and id='$request->id_process'";
        }
        $data=DB::select($sql);
        return response()->json([
            'success' => "true",
            'data'=>$data
        ]);
    }
    public function create_process_module(Request $request)
    {
        $local=new local;
        $arr=$request->all();
        $check=$local->check_request($formdata=[
            "module_title"=>"Nhập tiêu đề",
            "id_account"=>"Nhập id_account",
        ],$arr);

        if($check["success"]=="false")
        {
            return response()->json($check);
        }   

        $data=[
            "module_title"=>$request->module_title,
            "module_content"=>$request->module_content,
            "id_account"=>$request->id_account,
        ];
        if(isset($request->module_img) || $request->module_img!="")
        {
            $img=$local->save_img($request->file('module_img'),'images/web_home/');
            if($img!="false")
            {
                $data['module_img']=$img;
            }
        }
    
        // $a=$local->save_img($request->file('home_img'),'images');
        // echo $a;
        DB::table('tbl_process_module')->insert($data);

        return response()->json([
            'success' => "true",
            'message'=>"Thêm thành công"
        ]);
       
    }
    public function create_process_process(Request $request)
    {
        $local=new local;
        $arr=$request->all();
        $check=$local->check_request($formdata=[
            "process_title"=>"Nhập tiêu đề",
            "process_content"=>"Nhập nội dung",
            "process_img"=>"Nhập hình ảnh",
            "id_module_process"=>"Nhập id_module_process",
        ],$arr);

        if($check["success"]=="false")
        {
            return response()->json($check);
        }   

        $data=[
            "process_title"=>$request->process_title,
            "process_content"=>$request->process_content,
            "id_module_process"=>$request->id_module_process,
        ];
        if(isset($request->process_img) || $request->process_img!="")
        {
            $img=$local->save_img($request->file('process_img'),'images/web_home/');
            if($img!="false")
            {
                $data['process_img']=$img;
            }
        }
    
        // $a=$local->save_img($request->file('home_img'),'images');
        // echo $a;
        DB::table('tbl_process_process')->insert($data);

        return response()->json([
            'success' => "true",
            'message'=>"Thêm thành công"
        ]);
       
    }
    public function update_process_module(Request $request)
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


        if(isset($request->module_title) && $request->module_title!="")
            $data["module_title"]=$request->module_title;
        
        if(isset($request->module_content) && $request->module_content!="")
            $data["module_content"]=$request->module_content;

        if(isset($request->id_account) && $request->id_account!="")
            $data["id_account"]=$request->id_account;

        if(isset($request->module_img) && $request->module_img!="")
        {
            //$sql="SELECT * FROM `tbl_process_module` WHERE id=$request->id_module";
            $url_img= DB::table('tbl_process_module')->where('id',$request->id_module)->get();
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
           
            $module=DB::table('tbl_process_module')->where('id',$request->id_module)->get();
            
            $data["module_total_update"]=$module[0]->module_total_update+1;
            $check=DB::table('tbl_process_module')->where("id",$request->id_module)->update($data);
           
                return $local->returnSuccess("Cập nhật thành công");
        }
        else
            return $local->returnError("Cập nhật thất bại");

        
    }
    public function update_process_process(Request $request)
    {
        
        $local=new local;
        $data=[];
        if(!isset($request->id_process) || $request->id_process=="")
        {
            return $local->returnError("Nhập id_process");
        }
       
        if(isset($request->process_title) || $request->process_title!="")
            $data["process_title"]=$request->process_title;
        
        if(isset($request->process_content) || $request->process_content!="")
            $data["process_content"]=$request->process_content;

        if(isset($request->process_img) || $request->process_img!="")
        {
            //$sql="SELECT * FROM `tbl_process_module` WHERE id=$request->id_module";
            $url_img= DB::table('tbl_process_process')->where('id',$request->id_process)->get();
            if($url_img[0]->process_img!=null)
            {
                $check=$local->save_img($request->file('process_img'),'images/web_home/');
                if($check!="false")
                {
                    $data['process_img']=$check;
                    $filePath='../../'.$url_img[0]->process_img;
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
            $check=DB::table('tbl_process_process')->where("id",$request->id_process)->update($data);
            
                return $local->returnSuccess("Cập nhật thành công");
        }
        else
            return $local->returnError("Cập nhật thất bại");

        
    }
    
    public function delete_process_module(Request $request)
    {
        $local=new local;
        if(!isset($request->id_module) || $request->id_module=="")
        {
            return $local->returnError("Nhập id_module");
        }
        $url_img=DB::table('tbl_process_module')->where('id',$request->id_module)->get();
        $filePath='../../'.$url_img[0]->module_img;
        if (file_exists($filePath))
            unlink($filePath);
        $check=DB::table('tbl_process_module')->where("id",$request->id_module)->delete();
        
            return $local->returnSuccess("Xóa thành công");
    }

    public function delete_process_process(Request $request)
    {
        $local=new local;
        if(!isset($request->id_process) || $request->id_process=="")
        {
            return $local->returnError("Nhập id_process");
        }
        $url_img=DB::table('tbl_process_process')->where('id',$request->id_process)->get();
        $filePath='../../'.$url_img[0]->process_img;
        if (file_exists($filePath))
            unlink($filePath);
        $check=DB::table('tbl_process_process')->where("id",$request->id_process)->delete();
        
            return $local->returnSuccess("Xóa thành công");
    }
}
