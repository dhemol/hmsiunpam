<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    {{-- Title --}}
    <title>@yield('title', 'ADMINISTRATOR | HMSI UNPAM')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('/img/hmsi.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('/template/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('/template/node_modules/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ url('/template/node_modules/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ url('/template/node_modules/summernote/dist/summernote-bs4.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('/template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/template/assets/css/components.css') }}">
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
    <script src="{{ url('/template/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('/template/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('/template/node_modules/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ url('/template/assets/js/stisla.js') }}"></script>
    <script src="{{ url('/template/node_modules/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('/template/node_modules/popper.js/dist/popper.min.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('/template/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ url('/template/node_modules/fullcalendar/dist/fullcalendar.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('/template/assets/js/scripts.js') }}"></script>
    <script src="{{ url('/template/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('/template/assets/js/page/index-0.js') }}"></script>
    <script src="{{ url('/template/assets/js/page/features-posts.js') }}"></script>
    <script src="{{ url('/template/assets/js/page/calendar.js') }}"></script>

</body>

</html>
