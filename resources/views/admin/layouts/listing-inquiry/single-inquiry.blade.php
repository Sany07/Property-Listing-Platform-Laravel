@extends('admin.base')

@section('content')
 
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
                            <center class="m-t-30">
                                    <h4 class="card-title m-t-10">{{ $inquiry ->user-> username }}</h4>

                            </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{ $inquiry -> email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{ $inquiry -> contact_number }}</h6> 
                                <br/>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Listing :</label>
                                        <div class="col-md-12">
                                            <td>{{ $inquiry -> listing -> title }}</td>
                                            <td class="mr-5">
                                                <a href="{{ route('single.listing', $inquiry -> listing -> id ) }}"><span class="btn btn-sm btn-rounded btn-success">View</span></a>
                                            </td>
                                        </div>
                                    </div>
                            </div>
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Message :</label>
                                        <div class="col-md-12">
                                            {{ $inquiry -> description }}
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection