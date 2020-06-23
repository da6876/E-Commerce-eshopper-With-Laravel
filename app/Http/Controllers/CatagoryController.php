<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
use Symfony\Component\Console\Helper\Table;
session_start();
class CatagoryController extends Controller
{
    public function index()
    {
        $this->AuthCheck();
        return view('admin.add_catagory');
    }

    public function allcatagory(){
        $this->AuthCheck();
        $all_category=DB::table('tbl_category')->get();
        $manage_catagory=view('admin.all_catagory')
            ->with('all_category',$all_category);
        return view('admin_layout')->with('admin.all_catagory',$manage_catagory);
    }

    public function savecatagory(Request $request){
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_status']=$request->category_status;
        $data['category_description']=$request->category_description;

        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $result=DB::table('tbl_category')->insert($data);
        if ($result){
            Session::put('msg_success','Category Added Successfully !');
            return Redirect::to('/add-catagory');
        }
    }

    public function unactive_category($id){
        DB::table('tbl_category')
            ->where('category_id',$id)
            ->update(['category_status'=>0]);
        Session::put('msg',"Category Unactive Successfully");
        return Redirect::to('/all-catagory');
    }
    public function active_category($id){
        DB::table('tbl_category')
            ->where('category_id',$id)
            ->update(['category_status'=>1]);
        Session::put('msg',"Category Active Successfully");
        return Redirect::to('/all-catagory');
    }
    public function edit_category($id){
        $all_category=DB::table('tbl_category')
            ->where('category_id',$id)
            ->first();
        $manage_catagory=view('admin.edit_catagory')
            ->with('edit_category',$all_category);
        return view('admin_layout')->with('admin.edit_catagory',$manage_catagory);
    }
    public function updatecatagory(Request $request,$id){
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_status']=$request->category_status;
        $data['category_description']=$request->category_description;
        DB::table('tbl_category')
            ->where('category_id',$id)
        ->update($data);
        Session::put('msg','Category Update Successfully !');
        return Redirect::to('/all-catagory');

    }
    public function delete_category($id){
        DB::table('tbl_category')
            ->where('category_id',$id)
            ->delete();
        Session::put('msg',"Category Delete Successfully");
        return Redirect::to('/all-catagory');
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
