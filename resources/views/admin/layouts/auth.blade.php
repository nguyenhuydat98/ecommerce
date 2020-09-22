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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <span class="navbar-brand">Admin Ecommerce</span>
        </div>
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li>
                <a href="#"><i class="fa fa-home fa-fw"></i> {{ trans('admin.header.website') }}</a>
            </li>
        </ul>

        <ul class="nav navbar-right navbar-top-links">
            <!-- language -->
            <li class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    {{ trans('language') }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('change-language', ['en']) }}">{{ trans('language.english') }}</a>
                    <a class="dropdown-item" href="{{ route('change-language', ['vi']) }}">{{ trans('language.vietnamese') }}</a>
                </div>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                </a>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="container">
        @yield('content')
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
