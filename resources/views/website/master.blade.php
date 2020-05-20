<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('modules/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('modules/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('modules/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('modules/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('modules/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('modules/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('modules/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('modules/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('modules/css/style.css')}}">
</head>
<body class="goto-here">

@include('website.layouts.header')
@include('website.layouts.menu')

@yield('content')

@include('website.layouts.footer')

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script src="{{asset('modules/js/jquery.min.js')}}"></script>
<script src="{{asset('modules/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('modules/js/popper.min.js')}}"></script>
<script src="{{asset('modules/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modules/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('modules/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('modules/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('modules/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('modules/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('modules/js/aos.js')}}"></script>
<script src="{{asset('modules/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('modules/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('modules/js/scrollax.min.js')}}"></script>
<script src="{{asset('modules/js/main.js')}}"></script>

</body>
</html>
