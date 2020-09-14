<!DOCTYPE html>
<html>
<head>
    @include('admin.includes._head')
    <title> 
        @yield('title') Real State
    </title>
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
            
        @include('admin.includes._header')
            
        @include('admin.includes._sidebar')
            
            @yield('content')
            
        @include('admin.includes._footer')
        @include('admin.includes._scripts')
    </div>
</body>
</html>