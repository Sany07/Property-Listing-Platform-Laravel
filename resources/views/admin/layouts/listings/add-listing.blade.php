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
                <h4 class="page-title">Add Listing</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Listing</li>
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
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="card card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                    <form action="{{ route('listings.store') }}" method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data"> 
                        @csrf
                        
                        <div class="form-group">
                            <label>Property Title :</label>
                            <input type="text" name="title" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Price :</label>
                            <input type="number" name="price" class="form-control" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label>Square Feet :</label>
                            <input type="number" name="square_feet" class="form-control" placeholder="Square Feet">
                        </div>
                        <div class="form-group">
                            <label>Lot Size :</label>
                            <input type="number" name="lot_size" class="form-control" placeholder="Lot Size">
                        </div>
                        <div class="form-group">
                            <label>Bedroom :</label>
                            <input type="number" name="bedroom" class="form-control" placeholder="Bedroom">
                        </div>
  
                        <div class="form-group">
                            <label>Garage :</label>
                            <input type="number" name="garage" class="form-control" placeholder="Garage">
                        </div>
                        <div class="form-group">
                            <label>Description :</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Thumbnail :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input">
                                <label for="image" class="custom-file-label">Choose Image</label>
                                
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Other Image :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="image_one" class="custom-file-input">
                                <label for="image_one" class="custom-file-label">Choose Image</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Other Image :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="image_two" class="custom-file-input">
                                <label for="image_two" class="custom-file-label">Choose Image</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Other Image :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="image_three" class="custom-file-input">
                                <label for="image_three" class="custom-file-label">Choose Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Other Image :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="image_four" class="custom-file-input">
                                <label for="image_four" class="custom-file-label">Choose Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Other Image :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="image_five" class="custom-file-input">
                                <label for="image_five" class="custom-file-label">Choose Image</label>                           
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Other Image :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name="image_six" class="custom-file-input">
                                <label for="image_six" class="custom-file-label">Choose Image</label>                           
                                
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Realtor :</label>
                            <div class="col-sm-12">
                                <select  name="realtor_id" class="form-control form-control-line" required>
                                <option selected style="display:none">Select Realtor</option>
                                @foreach($realtors as $realtor)
                                    <option value="{{ $realtor->id }}">{{ $realtor->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Is Publish :</label>
                            <div class="col-sm-12">
                                <select  name="is_publish" class="form-control form-control-line" required>
                                <option selected style="display:none">Select Publish/Draft</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Un Publish</option>
                                </select>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
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