<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class SuperAdminController extends Controller
{
    public function index(){
        $this->AuthCheck();
        return view('admin.dashbord');
    }
    public function logout(){
        Session::flush();
        return Redirect::to('admin/login');
    }
    public function AuthCheck(){
        $admin_id=Session::get('admin_id');
        if ($admin_id){
            return;
        }else{
            return Redirect::to('admin/login')->send();
        }
    }

}
