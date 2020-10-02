@extends('admin.base')

@section('content')


    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">15852</span>
                        Total Sales
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Sales <span class="pull-right">60%</span></h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">956</span>
                        New Orders
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Orders <span class="pull-right">90%</span></h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                    <span class="sr-only">90% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">20544</span>
                        Unique Visitors
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Visitors <span class="pull-right">60%</span></h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">5210</span>
                        New Users
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Users <span class="pull-right">57%</span></h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                                    <span class="sr-only">57% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">New Listings</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Realtor</th>
                                    <th class="border-top-0">Date </th>
                                    <th scope="col">Published/Draft</th>
                                    <th class="border-top-0">View</th>
                                    <th class="border-top-0">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($listings as $listing)                                    
                                        <td class="txt-oflo">{{ $listing -> title }}</td>
                                        <td><span class="label label-success label-rounded">{{ $listing -> price }}</span> </td>
                                        <td class="txt-oflo">{{ $listing -> realtor-> name }}</td>
                                        <td><span class="font-medium">{{ $listing -> created_at->diffForHumans() }}</span></td>
                                        <td><span class="">
                                            @if ( $listing -> is_published == '1' )
                                             Published
                                            @else
                                                Draft
                                            @endif   
                                        
                                        </span></td>
                                        <td><span class="font-medium"><a href="{{ route('single.listing', $listing -> id) }}" class="btn btn-primary btn-block">View</a></span></td>
                                        <td><span class="font-medium"><a href="{{ route('listings.show', $listing -> id ) }}" class="btn btn-primary btn-block">Edit</span></a>
                                        </span></td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->


@endsection