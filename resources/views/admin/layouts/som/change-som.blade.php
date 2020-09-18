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
                        <h4 class="page-title">Seller Of the Month</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Seller Of the Month</li>
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
                @endif
                <div class="row">
                    <!-- Column -->    
                    <div class="col-lg-8 col-xlg-8 col-md-8 offset-1">
                    <div class="card">
                        <form action="{{ route('som.update', $som -> id) }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data"> 
                        @csrf
                        @method('PATCH') 
                        <div class="card-body"> 
                            <div class="form-group">
                                <label class="col-sm-12">Realtor :</label>
                                <div class="col-sm-12">
                                    <select  name="realtor_id" class="form-control form-control-line" required>
                                    <option  style="display:none">Select Realtor</option>
                                    @foreach($realtors as $realtor)
                                        <option value="{{ $realtor->id }}" >{{ $realtor->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" style="margin: 0 auto;
                            display: block;" class="mt-5 btn btn-success">Update Som</button>
                        </div>
                    </div>

                    </div>
                    <!-- Column -->
                    <!-- Column -->
                 
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