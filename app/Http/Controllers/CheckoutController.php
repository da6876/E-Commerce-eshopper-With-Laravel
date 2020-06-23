<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class CheckoutController extends Controller
{
    public function loginCheck(){
        return view('pages.login');
    }

    public function cutomerRegistration(Request $request){
        $data=array();
        $data['cutomer_name']=$request->customre_name;
        $data['cutomer_phone']=$request->customre_number;
        $data['cutomer_email']=$request->customre_email;
        $data['customer_password']=md5($request->customre_password);
        print $cutomer_id = DB::table('tbl_customer')->insertGetId($data);
        Session::put('customer_id',$cutomer_id);
        Session::put('cutomer_name',$request->customre_name);
        return Redirect::to('/checkout');

    }

    public function checkout(){
        return view('pages.checkout_page');
    }

    public function saveShippingDetails(Request $request){
        $data=array();
        $data['shipping_Email']=$request->shipping_Email;
        $data['shipping_FirstName']=$request->shipping_FirstName;
        $data['shipping_LastName']=$request->shipping_LastName;
        $data['shipping_Address']=$request->shipping_Address;
        $data['shipping_MobileNumber']=$request->shipping_MobileNumber;
        $data['shipping_City']=$request->shipping_City;
        print $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }
    public function customerLogin(Request $request){
        $customer_email=$request->customer_email;
        $password=$request->password;
        $result = DB::table('tbl_customer')
            ->where('cutomer_email',$customer_email)
            ->where('customer_password',$password)
            ->first();
        if ($result){
            //print_r($result);
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/customer-login');
        }
    }

    public function customerLogOut(){
        Session::flush();
        return Redirect::to('/');
    }
}
