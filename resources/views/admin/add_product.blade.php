@extends("admin_layout")
@section('admin-content')

    <div class="container-fluid">
        <div class="col-md-12">

        </div>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>

                        <div class="text-info">
                            <a class="small" href="{{URL::to('/all-product')}}">Product List</a>
                        </div>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body For Add Category -->

                    <div class="card-body">
                        <div class="p-5">

                            <?php
                            $success_msg = Session::get('msg');
                            if ($success_msg){
                            ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?php
                                echo $success_msg;
                                Session::put('msg', null);

                                ?>
                            </div>
                            <?php
                            }
                            ?>
                            <form class="user" action="{{url('/save-product')}}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field()  }}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="product_name"
                                               placeholder="Product Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" name="product_status"
                                               placeholder="Product Status" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control" name="category_id">
                                            <option>Category select</option>
                                            <?php
                                            $all_category = DB::table('tbl_category')
                                                ->where('category_status', 1)
                                                ->get();
                                            ?>
                                            @foreach($all_category as $tv_category)
                                                <option value="{{{$tv_category->category_id}}}">{{$tv_category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control " name="brand_id">
                                            <?php
                                            $all_brand = DB::table('tbl_brand')
                                                ->where('brand_status', 1)
                                                ->get();
                                            ?>
                                            <option>Brand select</option>
                                            @foreach($all_brand as $tv_brand)
                                                <option value="{{$tv_brand->brand_id}}">{{$tv_brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                               name="product_short_description" placeholder="Product Short Desc"
                                               required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                               name="product_long_description" placeholder="Product Long Desc" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" name="product_price"
                                               placeholder="Product Price" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control form-control-user" name="product_image"
                                               placeholder="Product Image" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="product_size"
                                               placeholder="Product Size" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="product_color"
                                               placeholder="Product Color" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Add Catagory
                                </button>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->

        </div>
    </div>
@endsection