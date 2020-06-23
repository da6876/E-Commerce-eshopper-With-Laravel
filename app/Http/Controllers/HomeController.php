<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();
class HomeController extends Controller
{
    public function index(){

        $all_live_product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','tbl_brand.brand_id')
            ->select('tbl_products.product_name','tbl_products.product_price','tbl_products.product_image',
                'tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.product_status',1)
            ->limit(6)
            ->get();
        $manage_product = view('pages.home')
            ->with('all_live_product', $all_live_product);
        return view('layout')->with('pages.home', $manage_product);
    }
    public function showProductCategory($category_name){

        $show_Product_With_Category = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','tbl_brand.brand_id')
            ->select('tbl_products.product_name','tbl_products.product_price','tbl_products.product_image',
                'tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.product_status',1)
            ->where('tbl_category.category_name',$category_name)
            ->limit(21)
            ->get();
        $manage_roduct_With_Category = view('pages.category_by_product')
            ->with('show_Product_With_Category', $show_Product_With_Category);
        return view('layout')->with('pages.category_by_product', $manage_roduct_With_Category);
    }
    public function showProductBrand($brand_id){

        $show_Product_With_brand = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','tbl_brand.brand_id')
            ->select('tbl_products.product_name','tbl_products.product_price','tbl_products.product_image',
                'tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.product_status',1)
            ->where('tbl_brand.brand_name',$brand_id)
            ->limit(21)
            ->get();
        $manage_roduct_With_brand = view('pages.brand_by_product')
            ->with('show_Product_With_brand', $show_Product_With_brand);
        return view('layout')->with('pages.brand_by_product', $manage_roduct_With_brand);
    }
    public function showProductSingle($product_id){

        $show_Product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','tbl_brand.brand_id')
            ->select('tbl_products.product_id','tbl_products.product_name','tbl_products.product_price','tbl_products.product_image',
                'tbl_products.product_color','tbl_products.product_size','tbl_products.product_short_description','tbl_products.product_long_description',
                'tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.product_status',1)
            ->where('tbl_products.product_name',$product_id)
            ->first();
        $manage_Product = view('pages.view_product')
            ->with('show_Product', $show_Product);
        return view('layout')->with('pages.view_product', $manage_Product);
    }
}
