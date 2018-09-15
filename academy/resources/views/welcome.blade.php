<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- Basic Page Needs -->

<!-- Bootstrap  -->
<link rel="stylesheet" type="text/css" href=" {{ asset('stylesheets/bootstrap.css') }} " >

<!-- Theme Style -->
<link rel="stylesheet" type="text/css" href="  {{ asset('stylesheets/style.css') }}  ">
<link rel="stylesheet" type="text/css" href="  {{ asset('stylesheets/styleadd.css') }}  ">

<!-- Responsive -->
<link rel="stylesheet" type="text/css" href=" {{ asset('stylesheets/responsive.css') }} ">

<!-- Colors -->
<link rel="stylesheet" type="text/css" href=" {{ asset('stylesheets/colors/color1.css') }}" id="colors">

<!-- Animation Style -->
<link rel="stylesheet" type="text/css" href="  {{ asset('stylesheets/animate.css') }}">

<!-- Favicon and touch icons  -->
<link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
<link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
<link href="icon/favicon.png" rel="shortcut icon">


<!--[if lt IE 9]>
    <script src="javascript/html5shiv.js"></script>
    <script src="javascript/respond.min.js"></script>
<![endif]-->
</head>
    <body>
        <div id="app"></div>  
    </body>

        <!-- Javascript -->

<script type="text/javascript" src="/javascripts/jquery.min.js"></script>
<script type="text/javascript" src="/javascripts/bootstrap.min.js"></script>
<script type="text/javascript" src="/javascripts/jquery.easing.js"></script> 
<script type="text/javascript" src="/javascripts/jquery-waypoints.js"></script>
<script type="text/javascript" src="/javascripts/parallax.js"></script>
<script type="text/javascript" src="/javascripts/jquery.cookie.js"></script>

{{-- <script type="text/javascript" src="/javascripts/jquery.isotope.min.js"></script> --}}
<script type="text/javascript" src="/javascripts/owl.carousel.js"></script> 
<script type="text/javascript" src="/javascripts/main.js"></script>

<script type="text/javascript" src="/javascripts/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/javascripts/jquery.themepunch.revolution.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
  


</html>
