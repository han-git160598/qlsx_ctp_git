<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\local;
use Illuminate\Support\Facades\DB;
class aboutController extends Controller
{
    public function list_about_module(Request $request)
    {
       
        $sql="select * from tbl_about_module where 1=1 ";
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
    public function list_about_about(Request $request)
    {
        $local=new local;
        if(!isset($request->id_module_about) || $request->id_module_about=="")
        {
            return $local->returnError("Nhập id_module_about");
        }
        $sql="select * from tbl_about_about where 1=1 and id_module_about='$request->id_module_about'";
        if(isset($request->id_about) || $request->id_about!="")
        {
            $sql.=" and id='$request->id_about'";
        }
        $data=DB::select($sql);
        return response()->json([
            'success' => "true",
            'data'=>$data
        ]);
    }
    

    public function create_about_module(Request $request)
    {
        $local=new local;
        $arr=$request->all();
        $check=$local->check_request( $formdata=[
            "module_title"=>"Nhập tiêu đề",
            "id_account"=>"Nhập id quản lý"
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
        // $a=$local->save_img($request->file('home_img'),'images');
        // echo $a;
        DB::table('tbl_about_module')->insert($data);

        return response()->json([
            'success' => "true",
            'message'=>"Thêm thành công"
        ]);
       
    }
    public function create_about_about(Request $request)
    {
        $local=new local;
        $arr=$request->all();
        $check=$local->check_request($formdata=[
            "about_title"=>"Nhập tiêu đề",
            "about_img"=>"Nhập hình ảnh",
            "id_module_about"=>"Nhập id_module_about",
        ],$arr);

        if($check["success"]=="false")
        {
            return response()->json($check);
        }   

        $data=[
            "id_module_about"=>$request->id_module_about,
            "about_title"=>$request->about_title,
            "about_content"=>$request->about_content,
        ];
        $img=$local->save_img($request->file('about_img'),'images/web_home/');
        if($img!="false")
        {
            $data['about_img']=$img;
        }
        else
        {
            return $local->returnError("Hinh ảnh sai định dạng");
        }
        // $a=$local->save_img($request->file('home_img'),'images');
        // echo $a;
        DB::table('tbl_about_about')->insert($data);

        return response()->json([
            'success' => "true",
            'message'=>"Thêm thành công"
        ]);
       
    }
    public function update_about_module(Request $request)
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
        if(count($data)>0)
        {
            $about=DB::table('tbl_about_module')->where('id',$request->id_module)->get();
            $data["module_total_update"]=$about[0]->module_total_update+1;
            $check=DB::table('tbl_about_module')->where("id",$request->id_module)->update($data);
          
                return $local->returnSuccess("Cập nhật thành công");
        }
        else
        return $local->returnError("Cập nhật thất bại");

        
    }
    public function update_about_about(Request $request)
    {
        
        $local=new local;
        $data=[];
        if(!isset($request->id_about) || $request->id_about=="")
        {
            return $local->returnError("Nhập id_about");
        }
       

        if(isset($request->about_title) || $request->about_title!="")
            $data["about_title"]=$request->about_title;
        
        if(isset($request->about_content) || $request->about_content!="")
            $data["about_content"]=$request->about_content;
       
        if(isset($request->about_img) || $request->about_img!="")
        {
            $check=$local->save_img($request->file('about_img'),'images/web_home/');
            if($check!="false")
            {
                $data['about_img']=$check;
                $url_img=DB::table('tbl_about_about')->where('id',$request->id_about)->get();
                $filePath='../../'.$url_img[0]->about_img;
                if (file_exists($filePath))
                        unlink($filePath);
            }
            else
            {
                return $local->returnError("Hinh ảnh sai định dạng");
            }
            
        }
        if(count($data)>0)
        {
            
            $check=DB::table('tbl_about_about')->where("id",$request->id_about)->update($data);
          
                return $local->returnSuccess("Cập nhật thành công");
        }
        else
        return $local->returnError("Cập nhật thất bại");

        
    }
    public function delete_about_module(Request $request)
    {
        $local=new local;
        if(!isset($request->id_module) || $request->id_module=="")
        {
            return $local->returnError("Nhập id_module");
        }
        $check=DB::table('tbl_about_module')->where("id",$request->id_module)->delete();
       
            return $local->returnSuccess("Xóa thành công");
    }
    public function delete_about_about(Request $request)
    {
        $local=new local;
        if(!isset($request->id_about) || $request->id_about=="")
        {
            return $local->returnError("Nhập id_about");
        }
        $url_img=DB::table('tbl_about_about')->where('id',$request->id_about)->get();
        $filePath='../../'.$url_img[0]->about_img;
        if (file_exists($filePath))
            unlink($filePath);
        $check=DB::table('tbl_about_about')->where("id",$request->id_about)->delete();
       
            return $local->returnSuccess("Xóa thành công");
    }
}
