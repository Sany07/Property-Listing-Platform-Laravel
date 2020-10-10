
@extends('site.base')

@section('title') About Us | @endsection
@section('content')

<section id="showcase-inner" class="py-5 text-white">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h1 class="display-4">User Dashboard</h1>
        <p class="lead">Manage your BT Real Estate account</p>
      </div>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<section id="bc" class="mt-3">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">
            <i class="fas fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active"> Dashboard</li>
      </ol>
    </nav>
  </div>
</section>

<section id="dashboard" class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Welcome {{ Auth::user()->get_full_name() }} </h2>
        <p>Here are the property listings that you have inquired about</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Property</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lists as $list)
            <tr>
              <td>22</td>
              <td>{{ $list ->listing -> title }}</td>
              <td>
                <a class="btn btn-light" href="{{ route('single.listing', $list-> listing -> id) }}">View Listing</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection