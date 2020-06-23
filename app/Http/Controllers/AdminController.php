<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function dashbord(Request $request){
        $admin_email=$request->admin_name;
        $admin_password=md5($request->admin_password);
        $result=DB::table('tbl_admin')
                ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();
/*            echo "<pre>";
            print_r($result);
            exit();*/
            if ($result){
               Session::put('admin_name',$result->admin_name);
               Session::put('admin_id',$result->admin_id);
               return Redirect::to('admin/dashbord');
            }else{
                Session::put('error_msg','User Name Password Is Invalid !');
                return Redirect::to('admin/login');
            }
       // return view('admin.dashbord');
    }
}
