<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\local;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function list_product_module(Request $request)
    {
        $sql="select * from tbl_product_module where 1=1 ";
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
    public function list_product_product(Request $request)
    {

         $sql="select 
        tbl_product_product.id,
        tbl_product_product.product_category,
        tbl_product_product.id_module_product,
        tbl_product_product.product_title,
        tbl_product_product.product_content,
        tbl_product_product.product_img
        from tbl_product_product
        where 1=1 ";
        if(isset($request->id_product) || $request->id_product!="")
        {
            $sql.=" and id='$request->id_product'";
        }
        $data=DB::select($sql);
        return response()->json([
            'success' => "true",
            'data'=>$data
        ]);
    }
    public function create_product_module(Request $request)
    {
        $local=new local;
        $arr=$request->all();
        $check=$local->check_request($formdata=[
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
        DB::table('tbl_product_module')->insert($data);

        return response()->json([
            'success' => "true",
            'message'=>"Thêm thành công"
        ]);
       
    }
    public function create_product_product(Request $request)
    {
        $local=new local;
        $arr=$request->all();
        $check=$local->check_request($formdata=[
            "product_title"=>"Nhập tiêu đề",
            "product_img"=>"Nhập hình ảnh",
            "id_module_product"=>"Nhập id_module_product",
            "product_category"=>"Nhập danh mục",
        ],$arr);

        if($check["success"]=="false")
        {
            return response()->json($check);
        }   

        $data=[
            "product_title"=>$request->product_title,
            "product_content"=>$request->product_content,
            "product_category"=>$request->product_category,
            "id_module_product"=>$request->id_module_product,
        ];
        if(isset($request->product_img) || $request->product_img!="")
        {
            $img=$local->save_img($request->file('product_img'),'images/web_home/');
            if($img!="false")
            {
                $data['product_img']=$img;
            }
        }
    
        // $a=$local->save_img($request->file('home_img'),'images');
        // echo $a;
        DB::table('tbl_product_product')->insert($data);

        return response()->json([
            'success' => "true",
            'message'=>"Thêm thành công"
        ]);
       
    }
    public function update_product_module(Request $request)
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
           
            $module=DB::table('tbl_product_module')->where('id',$request->id_module)->get();
            
            $data["module_total_update"]=$module[0]->module_total_update+1;
            $check=DB::table('tbl_product_module')->where("id",$request->id_module)->update($data);
           
                return $local->returnSuccess("Cập nhật thành công");
        }
        else
            return $local->returnError("Cập nhật thất bại");

        
    }
    public function update_product_product(Request $request)
    {
        
        $local=new local;
        $data=[];
        if(!isset($request->id_product) || $request->id_product=="")
        {
            return $local->returnError("Nhập id_product");
        }
       
        if(isset($request->product_title) && $request->product_title!="")
            $data["product_title"]=$request->product_title;
        
        if(isset($request->product_content) && $request->product_content!="")
            $data["product_content"]=$request->product_content;

        if(isset($request->product_category) && $request->product_category!="")
            $data["product_category"]=$request->product_category;

        if(isset($request->product_img) && $request->product_img!="")
        {
            //$sql="SELECT * FROM `tbl_process_module` WHERE id=$request->id_module";
            $url_img= DB::table('tbl_product_product')->where('id',$request->id_product)->get();
            if($url_img[0]->product_img!=null)
            {
                $check=$local->save_img($request->file('product_img'),'images/web_home/');
                if($check!="false")
                {
                    $data['product_img']=$check;
                    $filePath='../../'.$url_img[0]->product_img;
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
             
            $check=DB::table('tbl_product_product')->where("id",$request->id_product)->update($data);
            return $local->returnSuccess("Cập nhật thành công");
        }
        else
            return $local->returnError("Cập nhật thất bại");

        
    }
    
    public function delete_product_module(Request $request)
    {
        $local=new local;
        if(!isset($request->id_module) || $request->id_module=="")
        {
            return $local->returnError("Nhập id_module");
        }
        $url_img=DB::table('tbl_product_module')->where('id',$request->id_module)->get();
        $filePath='../../'.$url_img[0]->module_img;
        if (file_exists($filePath))
            unlink($filePath);
        $check=DB::table('tbl_product_module')->where("id",$request->id_module)->delete();
       
            return $local->returnSuccess("Xóa thành công");
    }

    public function delete_product_product(Request $request)
    {
        $local=new local;
        if(!isset($request->id_product) || $request->id_product=="")
        {
            return $local->returnError("Nhập id_product");
        }
        $url_img=DB::table('tbl_product_product')->where('id',$request->id_product)->get();
        $filePath='../../'.$url_img[0]->product_img;
        if (file_exists($filePath))
            unlink($filePath);
        $check=DB::table('tbl_product_product')->where("id",$request->id_product)->delete();
       
            return $local->returnSuccess("Xóa thành công");
        
    }
}
