<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class ProductController extends Controller
{
    public function index(){

        $this->AuthCheck();
        return view('admin.add_product');
    }

    public function saveproduct(Request $request){
        $this->AuthCheck();
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_color']=$request->product_color;
        $data['product_status']=$request->product_status;

        $product_image=$request->product_image;
        if ($product_image){
            $image_name=str_random(20);
            $ext=strtolower($product_image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path="product_images/";
            $image_url=$upload_path.$image_full_name;
            $success=$product_image->move($upload_path,$image_full_name);
            if ($success){
                $data['product_image']=$image_url;

                DB::table('tbl_products')->insert($data);
                Session::put('msg','Product Added Successfully !' );
                return Redirect::to('/add-product');
            }
        }else{

            $data['product_image']='';

            DB::table('tbl_product')->insert($data);
            Session::put('msg','Product Added Successfully without Image!' );
            return Redirect::to('/add-product');
        }
    }

    public function allproduct(){

        $this->AuthCheck();
        $all_product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
            ->get();
        $manage_product = view('admin.all_product')
            ->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manage_product);
    }



    public function unactive_product($id){
        $this->AuthCheck();
        DB::table('tbl_products')
            ->where('product_id',$id)
            ->update(['product_status'=>0]);
        Session::put('msg',"Product Unactive Successfully");
        return Redirect::to('/all-product');
    }
    public function active_product($id){
        $this->AuthCheck();
        DB::table('tbl_products')
            ->where('product_id',$id)
            ->update(['product_status'=>1]);
        Session::put('msg',"Product Active Successfully");
        return Redirect::to('/all-product');
    }

    public function delete_product($id){
        $this->AuthCheck();
        DB::table('tbl_products')
            ->where('product_id',$id)
            ->delete();
        Session::put('msg',"Product Delete Successfully");
        return Redirect::to('/all-product');
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
