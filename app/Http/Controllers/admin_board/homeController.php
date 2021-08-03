<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\local;
use Illuminate\Support\Facades\DB;
class homeController extends Controller
{

    public function list_home(Request $request)
    {

        $sql="select * from tbl_home where 1=1 ";
        if(isset($request->id_home) || $request->id_home!="")
        {
            $sql.=" and id='$request->id_home'";
        }
        $sql.= " order by home_priority asc";
            
        $data=DB::select($sql);
        return response()->json([
            'success' => "true",
            'data'=>$data
        ]);
    }
    

    public function create_home(Request $request)
    {
        $local=new local;
        $arr=$request->all();
        $check=$local->check_request( $formdata=[
            "home_title"=>"Nhập tiêu đề",
            "home_img"=> "Nhập hình ảnh",
            "id_account"=>"Nhập id quản lý ",
            "home_priority"=>"Nhập số thứ tự"
        ],$arr);

        if($check["success"]=="false")
        {
            return response()->json($check);
        }
        $data=[
             "home_title"=>$request->home_title,
             "id_account"=>$request->id_account,
             "home_priority"=>$request->home_priority,
        ];
        $img=$local->save_img($request->file('home_img'),'images/web_home/');
        if($img!="false")
        {
            $data['home_img']=$img;
        }
        else
        {
            return $local->returnError("Hinh ảnh sai định dạng");
        }
        
        // $a=$local->save_img($request->file('home_img'),'images');
        // echo $a;
        DB::table('tbl_home')->insert($data);

        return response()->json([
            'success' => "true",
            'message'=>"Thêm thành công"
        ]);
       
    }
    public function update_home(Request $request)
    {
        $local=new local;
        $data=[];
        if(!isset($request->id_home) || $request->id_home=="")
        {
            return $local->returnError("Nhập id_home");
        }
        if(!isset($request->id_account) || $request->id_account=="")
        {
            return $local->returnError("Nhập id_account");
        }

        if(isset($request->home_title) || $request->home_title!="")
            $data["home_title"]=$request->home_title;

        if(isset($request->home_priority) || $request->home_priority!="")
            $data["home_priority"]=$request->home_priority;
        
        if(isset($request->home_img) || $request->home_img!="")
        {
            $check=$local->save_img($request->file('home_img'),'images/web_home/');
            if($check!="false")
            {
                $data['home_img']=$check;
                $url_img=DB::table('tbl_home')->where('id',$request->id_home)->get();
                $filePath='../../'.$url_img[0]->home_img;
                if (file_exists($filePath))
                        unlink($filePath);
            }
            else
            {
                return $local->returnError("Hinh ảnh sai định dạng");
            }
            
        }
        if(isset($request->id_account) || $request->id_account!="")
            $data["id_account"]=$request->id_account;
        if(count($data)>0)
        {
            $home=DB::table('tbl_home')->where('id',$request->id_home)->get();
            $data["home_total_update"]=$home[0]->home_total_update+1;
            $check=DB::table('tbl_home')->where("id",$request->id_home)->update($data);
            if($check==1)
                return $local->returnSuccess("Cập nhật thành công");
        }

        
    }
    public function delete_home(Request $request)
    {
        $local=new local;
        if(!isset($request->id_home) || $request->id_home=="")
        {
            return $local->returnError("Nhập id_home");
        }
        $url_img=DB::table('tbl_home')->where('id',$request->id_home)->get();
        $filePath='../../'.$url_img[0]->home_img;
        if (file_exists($filePath))
            unlink($filePath);
        $check=DB::table('tbl_home')->where("id",$request->id_home)->delete();
        if($check==1)
            return $local->returnSuccess("Xóa thành công");
    }
}
