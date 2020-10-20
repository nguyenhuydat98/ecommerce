<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-Commerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bower_ecommerce/user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
</head>
<body>
    <header>
        <div class="header-area">
            <div class="main-header ">
                @include('user.elements.header')
            </div>
        </div>
    </header>
    @yield('content')
    @include('sweetalert::alert')

    <script src="{{ asset('bower_components/bower_ecommerce/user/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/popper.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/slick.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/wow.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/animated.headline.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/contact.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/jquery.form.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/mail-script.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/plugins.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/user/js/main.js') }}"></script>
</body>
</html>
