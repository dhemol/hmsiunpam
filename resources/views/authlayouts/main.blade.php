<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    {{-- Title --}}
    <title>@yield('title', 'Login | HMSI UNPAM')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('/img/hmsi.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('/template/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('/template/node_modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('/template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/template/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ url('/template/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ url('/template/assets/js/scripts.js') }}"></script>
    <script src="{{ url('/template/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
</body>

</html>
