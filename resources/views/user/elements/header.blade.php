<header>
    <div class="header-area">
        <div class="main-header ">
            <!-- Backgroud Black -->
            <div class="header-top top-bg d-none d-lg-block">
                <div class="container">
                    <ul>
                        <li class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="language">
                                {{ trans('language') }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('localization', ['en']) }}">{{ trans('language.english') }}</a>
                                <a class="dropdown-item" href="{{ route('localization', ['vi']) }}">{{ trans('language.vietnamese') }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main header -->
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                            <div class="logo">
                                <a href="index.html">
                                   <img src="{{ asset('storage/logo.png') }}" alt="LOGO">
                                </a>
                            </div>
                        </div>
                        <!-- Main menu -->
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#">{{ trans('user.header.home') }}</a></li>
                                        <li><a href="#">{{ trans('user.header.about') }}</a></li>
                                        <li class="hot">
                                            <a href="#">{{ trans('user.header.product') }}</a>
                                            <ul class="submenu">
                                                <li><a href="#"> Product</a></li>
                                                <li><a href="#"> Product</a></li>
                                                <li><a href="#"> Product</a></li>
                                                <li><a href="#"> Product</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">{{ trans('user.header.post') }}</a></li>
                                        <li><a href="#">{{ trans('user.header.contact') }}</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>  <!-- End Main menu -->

                        <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                <li class="d-none d-xl-block"> <!-- Search -->
                                    <div class="form-box f-right ">
                                        <input type="text" name="search" placeholder="{{ trans('user.header.search') }}">
                                        <div class="search-icon">
                                            <i class="fas fa-search special-tag"></i>
                                        </div>
                                    </div>
                                </li>
                                <li> <!-- Cart -->
                                    <div class="shopping-card">
                                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </li>
                                <li class="d-none d-lg-block"> <!-- Login / Register -->
                                    @if(Auth::check())
                                        <a href="#" class="btn header-btn">{{ trans('user.header.logout') }}</a>
                                    @else
                                        <a href="#" class="btn header-btn">{{ trans('user.header.login') }}</a>
                                    @endif
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
</header>
<style type="text/css">
    header #language {
        letter-spacing: 0;
        font-size: 15px;
        padding: 15px;
    }
</style>
