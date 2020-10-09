@extends('site.base')
@section('title')All Properties | @endsection
@section('content')

    

  <section id="showcase-inner" class="py-5 text-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h1 class="display-4">Browse Our Properties</h1>
          <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt, pariatur!</p>
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
            <a href="{% url 'listing:home' %}">
              <i class="fas fa-home"></i> Home</a>
          </li>
          <li class="breadcrumb-item active"> Browse Listings</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Listings -->
  <section id="listings" class="py-4">
    <div class="container">
      <div class="row">

        <!-- Listing 1 -->
@if(count($listings) > 0)
        @foreach($listings as $listing)
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card listing-preview">
            <img class="card-img-top" src="{{ url($listing ->thumbnail_0)}}" alt="">
            <div class="card-img-overlay">
              <h2>
                <span class="badge badge-secondary text-white">${{ $listing ->price }}</span>
              </h2>
            </div>
            <div class="card-body">
              <div class="listing-heading text-center">
                <h4 class="text-primary">{{ $listing ->title }} </h4>
                <p>
                  <i class="fas fa-map-marker text-secondary"></i> {{ $listing ->city }}  {{ $listing ->state }}</p>
              </div>
              <hr>
              <div class="row py-2 text-secondary">
                <div class="col-6">
                  <i class="fas fa-th-large"></i> Sqft: {{ $listing ->sqft }} </div>
                <div class="col-6">
                  <i class="fas fa-car"></i> Garage: {{ $listing ->garage }}</div>
              </div>
              <div class="row py-2 text-secondary">
                <div class="col-6">
                  <i class="fas fa-bed"></i> Bedrooms: {{ $listing ->bedroom }}</div>
                <div class="col-6">
                  <i class="fas fa-bath"></i> Bathrooms: {{ $listing ->bathroom }}</div>
              </div>
              <hr>
              <div class="row py-2 text-secondary">
                <div class="col-12">
                  <i class="fas fa-user"></i> {{ $listing -> realtor-> name }}</div>
              </div>
              <div class="row text-secondary pb-2">
                <div class="col-6">
                  <i class="fas fa-clock"></i> {{ $listing -> created_at->diffForHumans() }} </div>
              </div>
              <hr>
              <a href="{{ route('single.listing', $listing -> id) }}" class="btn btn-primary btn-block">More Info</a>
            </div>
          </div>
        </div>

        @endforeach
      @else
          No Details found. Try to search again !!
      @endif

      </div>

      </div>
  </section>
  @endsection