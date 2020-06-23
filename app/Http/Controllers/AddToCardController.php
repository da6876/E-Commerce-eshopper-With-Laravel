<?php

namespace App\Http\Controllers;


use \Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class AddToCardController extends Controller
{
    public function addtoCard(Request $request){
        $quentity=$request->quantity;
        $product_id=$request->product_id;
        $productInfo=DB::table('tbl_products')
            ->where('product_id',$product_id)
        ->first();
        /*echo "<pre>";
        print_r($productInfo) ;
        echo "</pre>";
        echo $quentity;*/
        $data['qty']=$quentity;
        $data['id']=$productInfo->product_id;
        $data['name']=$productInfo->product_name;
        $data['price']=$productInfo->product_price;
        $data['options']['image']=$productInfo->product_image;
        Cart::add($data);
        return Redirect::to('/show-card');
    }

    public function showCard(){
        $all_pulished_catagory=DB::table('tbl_category')
            ->where('category_status',1)
            ->get();
        $manage_published_category=view('pages.add_to_card')
            ->with('all_published_category',$all_pulished_catagory);
        return view('layout')->with('pages.add_to_card',$manage_published_category);
    }

    public function deleteCard($rowId){
        Cart::update($rowId,0);

        return Redirect::to('/show-card');
    }

    public function updateCard(Request $request){
        $rowId=$request->rowId;
        $quantity=$request->quantity;
        Cart::update($rowId,$quantity);

        return Redirect::to('/show-card');
    }
}
