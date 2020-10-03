<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin E-commerce</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/startmin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        @include('admin.header')
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/raphael.min.js') }}"></script>
    {{-- <script src="{{ asset('bower_components/bower_ecommerce/admin/js/morris.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('bower_components/bower_ecommerce/admin/js/morris-data.js') }}"></script> --}}
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/startmin.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    {{-- <script src="{{ asset('js/all.js') }}"></script> --}}
</body>
</html>
