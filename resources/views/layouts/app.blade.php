<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>
        @yield('title')
    </title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/feather.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ URL::asset('css/app-dark.css') }}" id="darkTheme" disabled>
    @yield('style')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Changa:400,700&subset=arabic');

/* font-family: 'Lateef', serif; */
        body * {
            font-family: 'Changa';

        }
        .btn-primay{
            color: #fff;
            background-color: #17629b;
        }
        .text-primary{
            color:#17629b
        }
    </style>
</head>

<body class="light rtl">
    <div class="wrapper vh-100">

        @yield('content')
    </div>
    <script src="{{ URL::asset('js//jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js//popper.min.js') }}"></script>
    <script src="{{ URL::asset('js//moment.min.js') }}"></script>
    <script src="{{ URL::asset('js//bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js//simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('js//daterangepicker.js') }}"></script>
    <script src="{{ URL::asset('js//jquery.stickOnScroll.js') }}"></script>
    <script src="{{ URL::asset('js//tinycolor-min.js') }}"></script>
    <script src="{{ URL::asset('js//config.js') }}"></script>
    <script src="{{ URL::asset('js//apps.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
</body>

</html>
