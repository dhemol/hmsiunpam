<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>@yield('title', 'ADMINISTRATOR | HMSI UNPAM')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('/img/hmsi.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('/template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('/template/assets/css/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ url('/template/assets/css/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ url('/template/assets/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('/template/assets/css/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ url('/template/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('/template/assets/css/owl.theme.default.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('/template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/template/assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/template/assets/css/trix.css') }}">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                @include('dashboardlayouts.navbar')
            </nav>

            <!-- Sidebar -->
            <div class="main-sidebar">
                @include('dashboardlayouts.sidebar')
            </div>
            <!-- End Sidebar -->

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <!-- End Content -->

            <!-- Footer -->
            <footer class="main-footer">
                @include('dashboardlayouts.footer')
            </footer>
            <!-- End Footer -->

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('/template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/Chart.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/stisla.js') }}"></script>
    <script src="{{ url('/template/assets/js/moment.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/popper.min.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('/template/assets/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/jquery.selectric.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/chocolat.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/summernote-bs4.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('/template/assets/js/scripts.js') }}"></script>
    <script src="{{ url('/template/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('/template/assets/js/page/calendar.js') }}"></script>
    <script type="text/javascript" src="{{ url('/template/assets/js/trix.js') }}"></script>
    @stack('javascript-internal')

</body>

</html>
