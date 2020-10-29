<div class="wrap-user-menu-element">
    <div class="header-bottom  header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                           <img src="{{ asset('storage/logo.png') }}" alt="LOGO">
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                    <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{ route('home') }}">{{ trans('user.menu.home') }}</a></li>
                                <li><a href="#">{{ trans('user.menu.about') }}</a></li>
                                <li>
                                    <a href="{{ route('product') }}">{{ trans('user.menu.product') }}</a>
                                    {{-- <ul class="submenu">
                                        <li><a href="#"> Product</a></li>
                                        <li><a href="#"> Product</a></li>
                                        <li><a href="#"> Product</a></li>
                                        <li><a href="#"> Product</a></li>
                                    </ul> --}}
                                </li>
                                <li><a href="#">{{ trans('user.menu.contact') }}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                    <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                        <li> <!-- Cart -->
                            <div class="shopping-card">
                                <a href="{{ route('viewCart') }}">
                                    <i class="fas fa-shopping-cart"></i>
                                    @if (Session::has('numberOfItemInCart'))
                                        <span class="badge badge-pill badge-primary">{{ Session::get('numberOfItemInCart') }}</span>
                                    @else
                                        <span class="badge badge-pill badge-primary">0</span>
                                    @endif
                                </a>
                            </div>
                        </li>
                        <li class="d-none d-lg-block"> <!-- Login / Register -->
                            @if(Auth::check())
                                <button class="btn user-btn" data-toggle="dropdown" id="language">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">{{ trans('user.menu.my_profile') }}</a>
                                    <a class="dropdown-item" href="#">{{ trans('user.menu.change_password') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">{{ trans('user.menu.logout') }}</a>
                                </div>
                            @else
                                <a href="{{ route('getLogin') }}" class="btn header-btn">{{ trans('user.menu.login') }}</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
