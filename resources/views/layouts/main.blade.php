<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content='https://page.co.id/hmsiunpam'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>@yield('title', 'HMSI UNPAM')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('/img/hmsi.png') }}">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('/umum/css/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ url('/umum/css/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/umum/css/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ url('/umum/css/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ url('/umum/css/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ url('/umum/css/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ url('/umum/css/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ url('/umum/css/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ url('/umum/css/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ url('/umum/css/slicknav.min.css') }}">

    <!-- HMSI StyleSheet -->
    <link rel="stylesheet" href="{{ url('/umum/css/reset.css') }}">
    <link rel="stylesheet" href="{{ url('/umum/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/umum/css/responsive.css') }}">



</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header -->
    <header class="header shop">
        @include('layouts.header')
    </header>
    <!--/ End Header -->

    <!-- Main Content -->
    @yield('content')
    <!--/ End Main COntent -->

    <!-- Start Footer Area -->
    <footer class="footer">
        @include('layouts.footer')
    </footer>
    <!-- /End Footer Area -->

    <!-- Jquery -->
    <script src="{{ url('/umum/js/jquery.min.js') }}"></script>
    <script src="{{ url('/umum/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ url('/umum/js/jquery-ui.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ url('/umum/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ url('/umum/js/bootstrap.min.js') }}"></script>
    <!-- Color JS -->
    <script src="{{ url('/umum/js/colors.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ url('/umum/js/slicknav.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ url('/umum/js/owl-carousel.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ url('/umum/js/magnific-popup.js') }}"></script>
    <!-- Fancybox JS -->
    <script src="{{ url('/umum/js/facnybox.min.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ url('/umum/js/waypoints.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ url('/umum/js/finalcountdown.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ url('/umum/js/nicesellect.js') }}"></script>
    <!-- Flex Slider JS -->
    <script src="{{ url('/umum/js/flex-slider.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ url('/umum/js/scrollup.js') }}"></script>
    <!-- Onepage Nav JS -->
    <script src="{{ url('/umum/js/onepage-nav.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ url('/umum/js/easing.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ url('/umum/js/active.js') }}"></script>
    <!-- Google Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>
    <script src="{{ url('/umum/js/gmap.min.js') }}"></script>
    <script src="{{ url('/umum/js/map-script.js') }}"></script>
</body>

</html>
