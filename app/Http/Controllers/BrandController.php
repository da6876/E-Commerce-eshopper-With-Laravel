<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class BrandController extends Controller
{
    public function index()
    {
        $this->AuthCheck();
        return view('admin.add_brand');
    }

    public function allbrand()
    {
        $this->AuthCheck();
        $all_brand = DB::table('tbl_brand')->get();
        $manage_brand = view('admin.all_brand')
            ->with('all_brand', $all_brand);
        return view('admin_layout')->with('admin.all_brand', $manage_brand);

    }

    public function savebrand(Request $request)
    {
        $this->AuthCheck();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_status'] = $request->brand_status;
        $data['brand_description'] = $request->brand_description;
        $result = DB::table('tbl_brand')->insert($data);
        /* echo "<pre>";
         print_r($data);
         echo "</pre>";*/
        if ($result) {
            Session::put('msg', 'Brand Added Successfully !');
            return Redirect::to('/add-brand');
        }
    }


    public function unactive_brand($id)
    {
        $this->AuthCheck();
        DB::table('tbl_brand')
            ->where('brand_id', $id)
            ->update(['brand_status' => 0]);
        Session::put('msg', "Brand Unactive Successfully");
        return Redirect::to('/all-brand');
    }

    public function active_brand($id)
    {
        $this->AuthCheck();
        DB::table('tbl_brand')
            ->where('brand_id', $id)
            ->update(['brand_status' => 1]);
        Session::put('msg', "Brand Active Successfully");
        return Redirect::to('/all-brand');
    }

    public function delete_brand($id)
    {
        $this->AuthCheck();
        DB::table('tbl_brand')
            ->where('brand_id', $id)
            ->delete();
        Session::put('msg', "Brand Delete Successfully");
        return Redirect::to('/all-brand');
    }


    public function edit_brand($id)
    {
        $this->AuthCheck();
        $all_brand = DB::table('tbl_brand')
            ->where('brand_id', $id)
            ->first();
        $manage_brand = view('admin.edit_brand')
            ->with('edit_brand', $all_brand);
        return view('admin_layout')->with('admin.edit_brand', $manage_brand);
    }

    public function updatebrand(Request $request, $id)
    {
        $this->AuthCheck();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_status'] = $request->brand_status;
        $data['brand_description'] = $request->brand_description;
        DB::table('tbl_brand')
            ->where('brand_id', $id)
            ->update($data);
        Session::put('msg', 'Brand Update Successfully !');
        return Redirect::to('/all-brand');
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
