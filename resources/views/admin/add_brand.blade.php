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
                        <h6 class="m-0 font-weight-bold text-primary">Add Brand</h6>

                        <div class="text-info">
                            <a class="small" href="{{URL::to('/all-brand')}}">Brand List</a>
                        </div>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
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
                            $success_msg=Session::get('msg');
                            if ($success_msg){
                            ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?php
                                echo $success_msg;
                                Session::put('msg',null);

                                ?>
                            </div>
                            <?php
                            }
                            ?>
                            <form class="user" action="{{url('/save-brand')}}" method="post">
                                {{ csrf_field()  }}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="brand_name" placeholder="Brand Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" name="brand_status" placeholder="Brand Status" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="brand_description" placeholder="Brand Description" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Add Brand
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