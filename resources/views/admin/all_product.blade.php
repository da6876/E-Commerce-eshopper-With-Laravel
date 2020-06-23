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
                        <h6 class="m-0 font-weight-bold text-primary">All Catagory</h6>
                        <?php
                        $status=Session::get('msg');
                        if ($status){
                        ?>
                        <div class="alert alert-success text-center" role="alert">
                            <?php
                            echo $status;
                            Session::put('msg',null);

                            ?>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="text-info">
                            <a class="small" href="{{URL::to('/add-product')}}">Add Product</a>
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
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Brand Name</th>
                                    <th>Category Name</th>
                                    <th>Product Price</th>
                                    <th>Product Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Brand Name</th>
                                    <th>Category Name</th>
                                    <th>Product Price</th>
                                    <th>Product Color</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($all_product as $tv_product)
                                    <tr>
                                        <td>{{ $tv_product-> product_id }}</td>
                                        <td>{{ $tv_product-> product_name }}</td>
                                        <td>{{ $tv_product-> brand_name }}</td>
                                        <td>{{ $tv_product-> category_name }}</td>
                                        <td>{{ $tv_product-> product_price }}</td>
                                        <td><img src="{{URL::to($tv_product-> product_image)}}" width="80px" height="80px"/></td>
                                        <td>
                                            @if($tv_product-> product_status==1)
                                                <a href="#" class="btn btn-info btn-icon-split btn-sm">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-flag"></i>
                                                </span>
                                                    <span class="text">Active</span>
                                                </a>
                                            @else
                                                <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                    <span class="text text-danger">Unactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($tv_product-> product_status==1)
                                                <a href="{{URL::to('/unactive_product/'.$tv_product->product_id)}}" class="btn btn-warning btn-circle btn-sm"><i
                                                            class="fas fa-thumbs-down"></i></a>
                                            @else
                                                <a href="{{URL::to('/active_product/'.$tv_product->product_id)}}" class="btn btn-info btn-circle btn-sm"><i
                                                            class="fas fa-thumbs-up"></i></a>
                                            @endif
                                            <a href="{{URL::to('/edit_product/'.$tv_product->product_id)}}" class="btn btn-success btn-circle btn-sm"><i
                                                        class="fas fa-edit"></i></a>
                                            <a href="{{URL::to('/delete_product/'.$tv_product->product_id)}}" class="btn btn-danger btn-circle btn-sm" id="delete"><i
                                                        class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->

        </div>
    </div>
@endsection