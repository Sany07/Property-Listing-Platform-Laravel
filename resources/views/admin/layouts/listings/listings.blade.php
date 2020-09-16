@extends('admin.base')

@section('content')

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
   
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Basic Table</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Realtors</li>
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
                <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">All Realtors</h4>
                                <a href="{{ route('realtors.create') }}"><span class="tr btn btn-sm btn-rounded btn-info">Add Realtors</span></a>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <!-- <th scope="col">Contact</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listings as $listing)
                                        <tr id="row_{{$listing->id}}">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $listing -> title }}</td>
                                            <td>{{ $listing -> price }}</td>
                                           
                                            <td>
                                            <a href="{{ route('listings.show', $listing -> id ) }}"><span class="btn btn-sm btn-rounded btn-success">View</span></a>

                                            <!-- <form style="display:inline-block" method="POST" action="{{ route('realtors.destroy', $listing -> id) }}">
                                            @csrf
                                            @method('DELETE')
                                            
                                            </form> -->
                                        <button onclick="deleteData('{{ route('listings.destroy', $listing -> id) }}','{{ $listing -> id }}')" type="submit" class="btn btn-sm btn-rounded btn-danger">Delete</button>
                                        </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
 
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

        
@endsection