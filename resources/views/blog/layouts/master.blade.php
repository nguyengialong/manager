<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="blogpage/blog/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="blogpage/blog/css/animate.css">

    <link rel="stylesheet" href="blogpage/blog/css/owl.carousel.min.css">
    <link rel="stylesheet" href="blogpage/blog/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="blogpage/blog/css/magnific-popup.css">

    <link rel="stylesheet" href="blogpage/blog/css/aos.css">

    <link rel="stylesheet" href="blogpage/blog/css/ionicons.min.css">

    <link rel="stylesheet" href="blogpage/blog/css/flaticon.css">
    <link rel="stylesheet" href="blogpage/blog/css/icomoon.css">
    <link rel="stylesheet" href="blogpage/blog/css/style.css">
    <script src="https://kit.fontawesome.com/3ad27d0fef.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
              crossorigin="anonymous">
      </script>

    @yield('css')
  </head>
  <body>

  <!-- nav -->
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
			 @include('blog.layouts.header')
	  </nav>
  <!-- END nav -->


  <!-- content -->

    @yield('content')


  <!-- endcontent -->


  <!-- subcribe -->
	<section class="ftco-subscribe ftco-section bg-light">
		@include('blog.layouts.subcribe')
    </section>

  <!-- end subcribe -->


  <!-- footer -->

	@include('blog.layouts.footer')

  <!-- end footer -->



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
   <!-- end loader -->


  <script src="blogpage/blog/js/jquery.min.js"></script>
  <script src="blogpage/blog/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="blogpage/blog/js/popper.min.js"></script>
  <script src="blogpage/blog/js/bootstrap.min.js"></script>
  <script src="blogpage/blog/js/jquery.easing.1.3.js"></script>
  <script src="blogpage/blog/js/jquery.waypoints.min.js"></script>
  <script src="blogpage/blog/js/jquery.stellar.min.js"></script>
  <script src="blogpage/blog/js/owl.carousel.min.js"></script>
  <script src="blogpage/blog/js/jquery.magnific-popup.min.js"></script>
  <script src="blogpage/blog/js/aos.js"></script>
  <script src="blogpage/blog/js/jquery.animateNumber.min.js"></script>
  <script src="blogpage/blog/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="blogpage/blog/js/google-map.js"></script>
  <script src="blogpage/blog/js/main.js"></script>
   @yield('js')
  </body>
</html>
