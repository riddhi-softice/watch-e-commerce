<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        if (top !== window) {
            top.location.href = window.location.href;
        }
        if (window.location.hash) {
            window.location.href = window.location.href.replace(window.location.hash, '');
        }
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Commerce</title>
    <meta name="author" content="p-Themes">
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://www.portotheme.com/html/molla/assets/images/demos-img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../../../www.portotheme.com/html/molla/assets/images/demos-img/apple-touch-icon.html">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('public/lib/bootstrap/bootstrap.min.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/main.min.css') }}">
@yield('css')
</head>
<body>

    <div class="page-wrapper">
        <!-- ======= Header ======= -->
            @include('web.layouts._header')
        <!-- ======= End Header ======= -->

        <div id="main">
            @yield('content')
            
            <!-- ======= Header ======= -->
                @include('web.layouts._footer')
            <!-- ======= End Header ======= -->           
        </div>
    </div>
    
    <!-- ======= Mobile Menu  ======= -->
        @include('web.layouts._mobile-menu')
    <!-- ======= End Mobile Menu  ======= -->       

    @yield('javascript')

    <!-- Vendor JS Files -->
    <script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/lib/jquery.appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('public/lib/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('public/lib/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('public/assets/main.js') }}"></script>

</body>
</html>