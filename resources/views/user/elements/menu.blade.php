<div class="wrap-user-menu-element">
    <div class="header-bottom  header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-1">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                           <img src="{{ asset('storage/logo.png') }}" alt="LOGO">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
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

                <div class="col-lg-6 fix-card">
                    <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                        <li> <!-- Search product -->
                            <li class="d-none d-xl-block">
                                <div class="form-box f-right ">
                                    <form action="{{ route('searchProduct') }}" method="GET">
                                        @csrf
                                        <input type="text" name="keyword" placeholder="{{ trans('user.menu.search_product') }}" id="input-search" required>
                                        <input type="submit" value="{{ trans('user.menu.search') }}" id="btn-search">
                                    </form>
                                </div>
                             </li>
                        </li>
                        <li> <!-- Cart -->
                            <div class="shopping-card">
                                <a href="{{ route('viewCart') }}">
                                    <i class="fas fa-shopping-cart" id="icon-cart"></i>
                                    @if (Session::has('numberOfItemInCart'))
                                        <span class="badge badge-pill badge-primary" id="number-item">{{ Session::get('numberOfItemInCart') }}</span>
                                    @else
                                        <span class="badge badge-pill badge-primary" id="number-item">0</span>
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
                                    {{-- <a class="dropdown-item" href="#">{{ trans('user.menu.change_password') }}</a> --}}
                                    <a class="dropdown-item" href="{{ route('orderHistory') }}">{{ trans('user.menu.order_history') }}</a>
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
