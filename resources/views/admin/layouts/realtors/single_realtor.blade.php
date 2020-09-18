@extends('admin.base')

@section('content')

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{ url($realtor->image) }}" class="rounded-circle mb-5" width="150" height="150" />
                                   
                                    <h4 class="card-title m-t-10">{{ $realtor -> name }}</h4>


                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email Address </small>
                                <h6>{{ $realtor -> email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{ $realtor -> contact_number }}</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{ $realtor -> address }}</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                            <form action="{{ route('realtors.update', $realtor -> id) }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH') 
                        
                        <div class="form-group">
                            <label>Realtor Name :</label>
                            <input type="text" name="name" class="form-control" value="{{ $realtor -> name }}">
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" id="example-email" name="email" class="form-control" value="{{ $realtor -> email }}">
                        </div>
  
                        <div class="form-group">
                            <label>Address :</label>
                            <input type="text" id="example-email" name="address" class="form-control" value="{{ $realtor -> address }}">
                        </div>
                        <div class="form-group">
                            <label>Contact Number :</label>
                            <input type="number" name="contact_number" class="form-control" value="{{ $realtor -> contact_number }}">
                            <!-- <textarea class="form-control" rows="5"></textarea> -->
                        </div>

                        <div class="form-group">
                            <label>Custom File upload</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->


<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
@endsection