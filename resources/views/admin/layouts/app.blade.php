<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ trans('admin.title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/startmin.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower_ecommerce/admin/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        @include('admin.elements.header')
        @yield('content')
    </div>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/raphael.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/startmin.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower_ecommerce/admin/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/chart.js/dist/Chart.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('my-channel').listen('.event-new-order', (notification) => {
            numberNotification = parseInt($('#number-notification').text()) + 1;
            $('#number-notification').text(numberNotification);
            var content = notification.content;
            var newNotificationHtml = `
                <a class="dropdown-item unread" href="read-at/${notification.order_id}">
                    ${content}
                </a>
            `;
            $('.notification-list').prepend(newNotificationHtml);
        });
    </script>
    @yield('js')
</body>
</html>
