<!DOCTYPE html>
<html lang="en">
<head>
    <title>@if(GetSetting('site_title')) {{GetSetting('site_title'). '|' .GetSetting('site_slogan')}} @else Shop @endif</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="robots" content="index,follow" />
    <meta name="keywords" content="{{GetSetting('site_keyword')}}">
    {{--            Meta publish--}}
    @if(isset($is_publish))<meta property="article:published_time" content="{{$is_publish}}" />@endif
    {{--        Meta tite SEO--}}
    <meta itemprop="name" content="{{$titleSiteSEO ?? GetSetting('site_title')}}">
    <meta property="og:title" content="{{$titleSiteSEO ?? GetSetting('site_title')}}" />
    <meta property="og:site_name" content="{{$titleSiteSEO ?? GetSetting('site_title')}}" />
    {{--        Meta description SEO--}}
    <meta name="description" content="{{$descriptionSiteSEO ?? GetSetting('site_description')}}" />
    <meta property=description content="{{$descriptionSiteSEO ?? GetSetting('site_description')}}" />
    <meta itemprop="description" content="{{$descriptionSiteSEO ?? GetSetting('site_description')}}">
    <meta property="og:description" content="{{$descriptionSiteSEO ?? GetSetting('site_description')}}" />
    {{--        Meta image--}}
    <meta property="og:image" content="{{$imageSiteSEO ?? GetSetting('site_logo')}}" />
    <meta property="og:image:secure_url" content="{{$imageSiteSEO ?? GetSetting('site_logo')}}" />
    <meta property="og:image:width" content="1000" />
    <meta property="og:image:height" content="562" />


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
