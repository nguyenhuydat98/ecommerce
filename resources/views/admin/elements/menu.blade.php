<nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
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
                    <a href="{{ route('admin.dashboard') }}" class="active">
                        <i class="fa fa-dashboard fa-fw"></i> {{ trans('admin.menu.summary_report') }} </a>
                </li>
                <li>
                    <a href="{{ route('admin.admins.index') }}">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.admin_management') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.user_management') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.category_management') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.product_informations.index') }}">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.product_management') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.vouchers.index') }}">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.voucher_management') }}
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.import_product') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('admin.suppliers.index') }}">{{ trans('admin.menu.supplier_management') }}</a></li>
                        <li><a href="{{ route('admin.listImportProduct') }}">{{ trans('admin.menu.list_import') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}">
                        <i class="fa fa-table fa-fw"></i> {{ trans('admin.menu.order_management') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.chartOrder') }}">
                        <i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('admin.menu.chart_order') }}
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.getViewStatisticRevenue') }}">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê doanh thu
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
