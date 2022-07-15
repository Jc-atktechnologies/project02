<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- application name --}}
    <title>{{ config('app.name', 'Klaims Manager') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    <link href="{{asset('assets/css/theme.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>

<!-- Begin page -->
<div id="wrapper">

    @if(!empty(auth()->user()))
        @include('layouts.v2.sidebar')
        @include('layouts.v2.header')
    @endif

    <div class="content-page">
        <div class="content">

            @yield('content')

        </div>
        @include('layouts.v2.footer')

    </div>

</div>
<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!--C3 Chart-->
<script src="{{asset('assets/libs/d3/d3.min.js')}}"></script>
<script src="{{asset('assets/libs/c3/c3.min.js')}}"></script>


<!-- Chart JS -->
<script src="{{asset('assets/libs/chart-js/Chart.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/pages/chartjs.init.js')}}"></script>

<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
@stack('customejs')
</body>
</html>
