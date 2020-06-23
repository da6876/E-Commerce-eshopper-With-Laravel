@extends('layout')
@section('body-content')

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Category Items</h2>
            @foreach($show_Product_With_brand as $tv_Product_With_Category)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset($tv_Product_With_Category->product_image)}}" alt="" width="268px" height="249px"/>
                                <h2>{{$tv_Product_With_Category->product_price}} Tk</h2>
                                <p>{{$tv_Product_With_Category->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{$tv_Product_With_Category->product_price}} Tk</h2>
                                    <p>{{$tv_Product_With_Category->product_name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                            <img src="{{asset('public/images/home/new.png')}}" class="new" alt="" />
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href="{{URL::to('/show-product').'/'.$tv_Product_With_Category->product_name}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--features_items-->

    </div>

@endsection