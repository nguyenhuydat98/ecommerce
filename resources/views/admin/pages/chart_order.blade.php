@extends('admin.layouts.app')

@section('content')
    <div class="wrap-statistic-order-page">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thống kê đơn hàng theo tháng trong năm</h1>
                    </div>
                </div>
                <div class="row">
                    <div id="container">
                        <div class="col-lg-2" id="status">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">{{ $pending }}</div>
                                        <div class="col-xs-9 text-right">
                                            <div>{{ trans('status.pending') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">{{ $approved }}</div>
                                        <div class="col-xs-9 text-right">
                                            <div>{{ trans('status.approved') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">{{ $rejected }}</div>
                                        <div class="col-xs-9 text-right">
                                            <div>{{ trans('status.rejected') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel" id="panel-gray">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">{{ $canceled }}</div>
                                        <div class="col-xs-9 text-right">
                                            <div>{{ trans('status.canceled') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="url" data-url="{{ route('admin.getStatusByMonth') }}"></div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_chart.js') }}"></script>
@endsection
