<!-- menu -->
<nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- input search -->
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="{{ trans('admin.menu.search') }}">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                    </span>
                    </div>
                </li>

                <li>
                    <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> {{ trans('admin.menu.summary_report') }} </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.user_management') }}
                        <span class="fa arrow"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.product_management') }}
                        <span class="fa arrow"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.order_management') }}
                        <span class="fa arrow"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.blog_management') }}
                        <span class="fa arrow"></span>
                    </a>
                </li>

                {{-- <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="flot.html">First</a></li>
                        <li><a href="morris.html">Second</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
