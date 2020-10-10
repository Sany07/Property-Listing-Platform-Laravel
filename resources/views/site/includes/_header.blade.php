  <!-- Top Bar -->


  <section id="top-bar" class="p-3">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <i class="fas fa-phone"></i> 
         <!-- site_config.phone  -->
         8801751006793
        </div>
        <div class="col-md-4">
          <i class="fas fa-envelope-open"></i> 
          <!-- site_config.email  -->
          sany.baust@gmail.com
        </div>
        <div class="col-md-4">
          <div class="social text-right">
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="#">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
              <i class="fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="{{ asset('assets/img/logo.png') }}" class="logo" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
        <li class="nav-item {{ (request()->routeIs('index')) ? 'active' : '' }}  mr-3">
            <a class="nav-link" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item mr-3 {{ (request()->routeIs('about')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item mr-3 {{ (request()->routeIs('listings')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('listings') }}">Featured Listings</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          @auth
          <li class="nav-item mr-3 {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="fas fa-user-plus"></i> Dashboard</a>
          </li>
          <li class="nav-item mr-3">

          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); 
            document.getElementById('frm-logout').submit();">
            <i class="fas fa-sign-in-alt"></i>  Logout
          </a>    
          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
            {{-- <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit">Logout</button>
            </form> --}}
            </li>
          @else
          <li class="nav-item mr-3 {{ (request()->routeIs('register')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('register') }}">
              <i class="fas fa-user-plus"></i> Register</a>
          </li>
          <li class="nav-item mr-3 {{ (request()->routeIs('login')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('login') }}">
              <i class="fas fa-sign-in-alt"></i>

              Login</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>