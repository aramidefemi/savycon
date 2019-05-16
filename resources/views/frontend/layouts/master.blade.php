<!DOCTYPE html>
<html lang="en">

<head>
    
    @yield('facebook')
     <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TTQVJ4V');</script>
<!-- End Google Tag Manager -->

    <title>SavyCon-Get your Job/work done, A place to meet professional near you.</title>
    <link rel="stylesheet" href="{{ url("assets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ url("assets/css/bootstrap-select.css") }}">
    <link href="{{ url("assets/css/style.css") }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url("assets/css/flexslider.css") }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ url("assets/css/font-awesome.min.css") }}" />
    <link href="{{ url("assets/css/jquery.uls.css") }}" rel="stylesheet"/>
    <link href="{{ url("assets/css/jquery.uls.grid.css") }}" rel="stylesheet"/>
    <link href="{{ url("assets/css/jquery.uls.lcd.css") }}" rel="stylesheet"/>
{{--    <link rel="stylesheet" href="{{ url("css/backend/plugin/dropzone.css") }}">--}}
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <style>
       .nav-drop{
            position: relative;
            top: 20px;
            left: 3px;
        }
        .card{
            box-shadow: 0px 0px 4px rgba(110,110,110, 0.24);
            padding: 10px;
            background: #fff;
        }
        .card h4{
            color: #f90;
        }
    </style>
    @yield('head')
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTQVJ4V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div  class="body-wrapper theme-clearfix">
    @include('frontend.includes.nav')

    <div class="">
        @include('includes.partials.messages')
        @yield('content')
        @include('frontend.includes.footer')
    </div><!-- container -->
</div><!--#app-->
@include('frontend.includes.home-modal')
        <!-- Scripts -->
<!-- js -->
<script type="text/javascript" src="{{ url("assets/js/jquery.min.js") }}"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ url("assets/js/bootstrap.min.js") }}"></script>

<script type="text/javascript" src="{{ url("assets/js/jquery.leanModal.min.js") }}"></script>
<!-- Source -->
<script src="{{ url("assets/js/jquery.uls.data.js") }}"></script>
<script src="{{ url("assets/js/jquery.uls.data.utils.js") }}"></script>
<script src="{{ url("assets/js/jquery.uls.lcd.js") }}"></script>
<script src="{{ url("assets/js/jquery.uls.core.js") }}"></script>
<script src="{{ url("js/vendor/dropzone.js") }}"></script>
@yield('js-after')

@yield('ajax')
@yield('footer')
</body>
</html>