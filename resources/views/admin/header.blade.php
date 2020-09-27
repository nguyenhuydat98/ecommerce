<!-- Navigation -->
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
            <a href="http://localhost:8000">
                <i class="fa fa-home fa-fw"></i> {{ trans('admin.header.website') }}
            </a>
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
                <i class="fa fa-user fa-fw"></i> Admin <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-fw"></i> {{ trans('admin.header.logout') }}</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
