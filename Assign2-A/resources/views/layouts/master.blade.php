<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fonts/icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet" media="screen">
    <link href="{{URL::asset('css/owl.theme.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">


    <!-- Colors -->
    <link href="{{URL::asset('css/css-index.css')}}" rel="stylesheet" media="screen">
    <!-- <link href="css/css-index-green.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/css-index-purple.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/css-index-red.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/css-index-orange.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/css-index-yellow.css" rel="stylesheet" media="screen"> -->

    <!-- Google Fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />

</head>
<body>
<!-- /.preloader -->
<div id="preloader"></div>
<div id="top"></div>
@yield('header')
@include('shared.navbar')




<div class="text-inter">
    <div class="container">
        @yield('content')
    </div>
</div>


<div class="shadow"></div>
@include('shared.footer')
<!-- /.javascript files -->
<script src="{{URL::asset('js/jquery.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/custom.js')}}"></script>
<script src="{{URL::asset('js/jquery.sticky.js')}}"></script>
<script src="{{URL::asset('js/wow.min.js')}}"></script>
<script src="{{URL::asset('js/owl.carousel.min.js')}}"></script>

<script>
    new WOW().init();
</script>


</body>
</html>
