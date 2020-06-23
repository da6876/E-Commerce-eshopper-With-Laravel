<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class SliderController extends Controller
{
    public function index()
    {
        $this->AuthCheck();
        return view('admin.add_slider');
    }

    public function allslider()
    {
        $this->AuthCheck();
        $all_brand = DB::table('tbl_slider')->get();
        $manage_brand = view('admin.all_slider')
            ->with('all_slider', $all_brand);
        return view('admin_layout')->with('admin.all_slider', $manage_brand);
    }



    public function saveslider(Request $request){
        $this->AuthCheck();
        $data=array();
        $data['slider_status']=$request->slider_status;
        $product_image=$request->slider_image;
        if ($product_image){
            $image_name=str_random(10);
            $ext=strtolower($product_image->getClientOriginalExtension());
            $image_full_name=$image_name.'_slider.'.$ext;
            $upload_path="slider/";
            $image_url=$upload_path.$image_full_name;
            $success=$product_image->move($upload_path,$image_full_name);
            if ($success){
                $data['slider_image']=$image_url;
                DB::table('tbl_slider')->insert($data);
                Session::put('msg','Slider Added Successfully !' );
                return Redirect::to('/add-slider');
            }
        }else{
            $data['slider_image']='';
            DB::table('tbl_slider')->insert($data);
            Session::put('msg','Slider Added Successfully !' );
            return Redirect::to('/add-slider');
        }
    }

    public function allbrand()
    {
        $this->AuthCheck();
        $all_brand = DB::table('tbl_slider')->get();
        $manage_brand = view('admin.all_slider')
            ->with('all_slider', $all_brand);
        return view('admin_layout')->with('admin.all_slider', $manage_brand);

    }


    public function unactive_slider($id)
    {
        $this->AuthCheck();
        DB::table('tbl_slider')
            ->where('slider_id', $id)
            ->update(['slider_status' => 0]);
        Session::put('msg', "Slider Unactive Successfully");
        return Redirect::to('/all-slider');
    }

    public function active_slider($id)
    {
        $this->AuthCheck();
        DB::table('tbl_slider')
            ->where('slider_id', $id)
            ->update(['slider_status' => 1]);
        Session::put('msg', "Slider Active Successfully");
        return Redirect::to('/all-slider');
    }

    public function delete_slider($id)
    {
        $this->AuthCheck();
        DB::table('tbl_slider')
            ->where('slider_id', $id)
            ->delete();
        Session::put('msg', "Slider Delete Successfully");
        return Redirect::to('/all-slider');
    }

    public function AuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('admin/login')->send();
        }
    }

}
