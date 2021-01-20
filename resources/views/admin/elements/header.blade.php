<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <span class="navbar-brand">Admin Ecommerce</span>
    </div>

    {{-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button> --}}

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li>
            <a href="{{ route('home') }}">
                <i class="fa fa-home fa-fw"></i> {{ trans('admin.header.website') }}
            </a>
        </li>
    </ul>
    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i>
                <span class="badge badge-pill badge-primary">
                    {{ count(Auth::guard('admin')->user()->notifications()->where('type', 'App\Notifications\NewOrderNotification')->where('read_at', null)->get()) }}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                @foreach (Auth::guard('admin')->user()->notifications->where('type', 'App\Notifications\NewOrderNotification') as $notification)
                    <li class="notification-list @if($notification->read_at == null) new-notification @endif">
                        <a href="{{ route('admin.readNotification', [$notification->id]) }}">
                            <div>
                                {{ trans($notification->data['content']) }}
                                <span class="pull-right text-muted small">{{ $notification->created_at->format(config('setting.format_date')) }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <!-- language -->
        <li class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                {{ trans('language') }}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('localization', ['en']) }}">{{ trans('language.english') }}</a>
                <a class="dropdown-item" href="{{ route('localization', ['vi']) }}">{{ trans('language.vietnamese') }}</a>
            </div>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                @if (Auth::guard('admin')->check())
                    {{ Auth::guard('admin')->user()->name }}
                @endif
                <i class="fa fa-user fa-fw"></i><b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="{{ route('admin.profile') }}"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                </li>
                <li>
                    <a href="{{ route('admin.getChangePassword') }}"><i class="fa fa-key" aria-hidden="true"></i> {{ trans('admin.login.change_password') }}</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-fw"></i> {{ trans('admin.header.logout') }}</a>
                </li>
            </ul>
        </li>
    </ul>
    @include('admin.elements.menu')
</nav>
