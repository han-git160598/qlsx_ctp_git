<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\local;
use Illuminate\Support\Facades\DB;
 
class contactController extends Controller
{
    public function list_contact(Request $request)
    {
        $sql="select * from tbl_contact_contact where 1=1 ";
        if(isset($request->id_module) || $request->id_module!="")
        {
            $sql.=" and id='$request->id_contact'";
        }
        $contact=DB::select($sql);
        $data=[];
        foreach($contact as $k=>$v)
        {
            $tam=array();
            $tam['id']=$v->id;
            $tam['id_account']=$v->id_account;
            $tam['contact_phone']=$v->contact_phone;
            $tam['contact_messeger']=$v->contact_messeger;
            $tam['contact_viber']=$v->contact_viber;
            $tam['contact_zalo']=$v->contact_zalo;
            $tam['contact_email']=$v->contact_email;
            $tam['contact_update']=$v->contact_update;
            $tam['contact_total_update']=$v->contact_total_update;
            $adress=DB::table('tbl_contact_adress')->where("id_contact",$v->id)->get();
            $tam['contact_adress']=$adress;

            $data[]=$tam;

        }
        return response()->json([
            'success' => "true",
            'data'=>$data
        ]);
    }
    public function update_contact(Request $request)
    {
        
        $local=new local;
        $data=[];
        if(!isset($request->id_contact) || $request->id_contact=="")
        {
            return $local->returnError("Nhập id_contact");
        }
       
        if(isset($request->contact_phone) || $request->contact_phone!="")
            $data["contact_phone"]=$request->contact_phone;
        
        if(isset($request->contact_messeger) || $request->contact_messeger!="")
            $data["contact_messeger"]=$request->contact_messeger;

        if(isset($request->contact_viber) || $request->contact_viber!="")
            $data["contact_viber"]=$request->contact_viber;

        if(isset($request->contact_zalo) || $request->contact_zalo!="")
            $data["contact_zalo"]=$request->contact_zalo;

        if(isset($request->contact_email) || $request->contact_email!="")
            $data["contact_email"]=$request->contact_email;

       

        

        if(count($data)>0)
        {
            $module=DB::table('tbl_contact_contact')->where('id',$request->id_contact)->get();           
            $data["contact_total_update"]=$module[0]->contact_total_update+1;

            $check=DB::table('tbl_contact_contact')->where("id",$request->id_contact)->update($data);
            
                return $local->returnSuccess("Cập nhật thành công");
        }
        else
            return $local->returnError("Cập nhật thất bại");

        
    }
}
