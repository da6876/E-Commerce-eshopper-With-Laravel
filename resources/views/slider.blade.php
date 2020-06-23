
<section id="slider"><!--slider-->
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <?php
            $all_slider = DB::table('tbl_slider')
                ->where('slider_status', 1)
                ->get();
            ?>
            <ol class="carousel-indicators">
                @foreach($all_slider as $tv_slider)
                    <li data-target="#myCarousel" data-slide-to="{{$loop->index}}"
                        class="{{ $loop->first ? 'active' : ''}}"></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach($all_slider as $tv_slider)
                    <div class="item {{$loop->first ? 'active' : ''}}">
                        <img src="{{$tv_slider->slider_image}}" alt="Los Angeles" style="width:100%;">
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section><!--/slider-->
