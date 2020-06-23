<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php
            $all_category = DB::table('tbl_category')
                ->where('category_status', 1)
                ->get();
            ?>
            @foreach($all_category as $tv_category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="{{URL::to('/show-product-by-category').'/'.$tv_category->category_name}}">{{$tv_category->category_name}}</a></h4>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php
                    $all_brand = DB::table('tbl_brand')
                        ->where('brand_status', 1)
                        ->get();
                    ?>
                    @foreach($all_brand as $tv_brand)
                        <li><a href="{{URL::to('/show-product-by-brand').'/'.$tv_brand->brand_name}}"> <span class="pull-right">(9)</span>{{$tv_brand->brand_name}}</a>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div><!--/brands_products-->

        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                       data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="{{asset('public/images/home/shipping.jpg')}}" alt=""/>
        </div><!--/shipping-->

    </div>
</div>