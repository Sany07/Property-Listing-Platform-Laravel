<!DOCTYPE html>
<html>

        @include('site.includes._head')

    <title> 
        @yield('title') Real State
    </title>
    </head>
<body id="top">




    @include('site.includes._header')
    @include('site.includes._notification')
    @yield('content')
    

    @include('site.includes._footer')

    @include('site.includes._scripts')



</body>

</html>