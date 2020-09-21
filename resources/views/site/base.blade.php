<!DOCTYPE html>
<html>

        @include('site.includes._head')

    <title> 
        @yield('title') Real State
    </title>
    </head>
<body id="top">




    @include('site.includes._header')
    @yield('content')
    

    @include('site.includes._footer')

    @include('site.includes._scripts')
    @include('site.includes._notification')



</body>

</html>