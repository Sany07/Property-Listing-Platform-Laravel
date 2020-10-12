
<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md navbar-light">
      <div class="navbar-header" data-logobg="skin5">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
              <i class="ti-menu ti-close"></i>
          </a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <div class="navbar-brand">
            <a href="index.html" class="logo">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    
                    <img src="{{ asset('assets/img/logo.png') }}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    {{-- <img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> --}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text ml-5" style="color: #ddd;">
                    <!-- dark Logo text -->
                        <b> BTRE </b>
                </span>
            </a>
        </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="ti-more"></i>
          </a>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-left mr-auto">
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              <li class="nav-item search-box">
                  <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                      <div class="d-flex align-items-center">
                          <i class="mdi mdi-magnify font-20 mr-1"></i>
                          <div class="ml-1 d-none d-sm-block">
                              <span>Search</span>
                          </div>
                      </div>
                  </a>
                  <form class="app-search position-absolute">
                      <input type="text" class="form-control" placeholder="Search &amp; enter">
                      <a class="srh-btn">
                          <i class="ti-close"></i>
                      </a>
                  </form>
              </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-right">
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</a>
                  <div class="dropdown-menu dropdown-menu-right user-dd animated">
                      <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                      <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                        document.getElementById('frm-logout').submit();">
                        <i class="ti-email m-r-5 m-l-5"></i> Logout</a>
                      <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                  </div>
              </li>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
          </ul>
      </div>
  </nav>
</header>