@extends('layout')
@section('body-content')
    <div class="col-sm-9 padding-right">
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php $contents = Cart::content();
                /*echo "<pre>";
                print_r($contents);
                echo "</pre>";*/
                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $v_data)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{$v_data->options->image}}" alt="" width="80px" height="80px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$v_data->name}}</a></h4>
                                <p>Web ID: {{$v_data->id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$v_data->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{url('/update-card')}}" method="post">
                                        {{ csrf_field()  }}
                                        <input class="cart_quantity_input" type="text" name="quantity"
                                               value="{{$v_data->qty}}"
                                               autocomplete="off" size="2">
                                        <input type="hidden" name="rowId"
                                               value="{{$v_data->rowId}}">
                                        <button type="submit" name="submit" class="btn-primary"> Update </button>
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$v_data->total}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-cart').'/'.$v_data->rowId}}"><i
                                            class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate
                    your delivery cost.</p>
            </div>

            <div class="row">

                <div class="col-md-8">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>

                        <?php $cutomer_id = Session::get('cutomers_id'); ?>
                        @if($cutomer_id!=NULL)
                            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                        @else
                            <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
    </div>
@endsection