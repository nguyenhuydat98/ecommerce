@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-summary-report-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.summary_report.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    {{-- <i class="fa fa-comments fa-5x"></i> --}}
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $totalUser }}</div>
                                    <div>{{ trans('admin.summary_report.user') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.users.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('admin.summary_report.view_detail') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-ul fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $totalCategory }}</div>
                                    <div>{{ trans('admin.summary_report.category') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.categories.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('admin.summary_report.view_detail') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $totalProductInformation }}</div>
                                    <div>{{ trans('admin.summary_report.product') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.product_informations.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('admin.summary_report.view_detail') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $totalOrder }}</div>
                                    <div>{{ trans('admin.summary_report.order') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.orders.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('admin.summary_report.view_detail') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
