<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('public/assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('public/assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('public/assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('public/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/plugins/nouislider/nouislider.css') }}">

    @yield('css')
</head>
<body>
    <div class="page-wrapper">
        <!-- ======= Header ======= -->
        @include('web.layouts2._header')
        <!-- ======= End Header ======= -->

        <div id="main">
            @yield('content')
            <!-- ======= Header ======= -->
            @include('web.layouts2._footer')
            <!-- ======= End Header ======= -->
        </div>
    </div>

    <!-- ======= Mobile Menu  ======= -->
    @include('web.layouts2._mobile-menu')
    <!-- ======= End Mobile Menu  ======= -->

    @yield('javascript')

    <!-- Vendor JS Files -->
    <script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/superfish.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('public/assets/js/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('public/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/main.js') }}"></script>
</body>
</html>