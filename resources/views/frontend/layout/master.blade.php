<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- Stylesheets -->
    <link href="{{ asset('frontend') }}/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/main.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('frontend') }}/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend') }}/images/favicon.png" type="image/x-icon">

    <link href="{{ asset('frontend') }}/https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Titillium+Web:wght@300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="{{ asset('frontend') }}/https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="{{ asset('frontend') }}/js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

@include('frontend.layout.header')

<!-- Banner Section -->
@include('frontend.layout.banner')
<!-- End Banner Section -->

@yield('content')

<!--Main Footer-->
    @include('frontend.layout.footer')

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

<script src="{{ asset('frontend') }}/js/jquery.js"></script>
<script src="{{ asset('frontend') }}/js/popper.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.scrollTo.js"></script>
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.fancybox.js"></script>
<script src="{{ asset('frontend') }}/js/appear.js"></script>
<script src="{{ asset('frontend') }}/js/swiper.min.js"></script>
<script src="{{ asset('frontend') }}/js/element-in-view.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.paroller.min.js"></script>
<script src="{{ asset('frontend') }}/js/parallax.min.js"></script>
<script src="{{ asset('frontend') }}/js/tilt.jquery.min.js"></script>
<!--Master Slider-->
<script src="{{ asset('frontend') }}/js/jquery.easing.min.js"></script>
<script src="{{ asset('frontend') }}/js/owl.js"></script>
<script src="{{ asset('frontend') }}/js/wow.js"></script>
<script src="{{ asset('frontend') }}/js/jquery-ui.js"></script>
<script src="{{ asset('frontend') }}/js/script.js"></script>

</body>

</html>
