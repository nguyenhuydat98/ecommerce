@extends('admin.layouts.app')

@section('content')
    <div class="wrap-statistic-order-page">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="page-header">Thống kê đơn hàng trong năm {{ date("Y") }}</h1>
                    </div>
                    <div class="col-lg-5" style="margin-top:35px;">
                        @if (session('error_date'))
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ session('error_date') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div id="container">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.chartOrderByTime') }}" method="GET">
                                <div class="col-lg-1 form-group">
                                    <label>Từ ngày</label>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="date" class="form-control" name="from_date" required>
                                </div>
                                <div class="col-lg-1 form-group">
                                    <label>Đến ngày</label>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="date" class="form-control" name="to_date" required>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="submit" class="btn btn-primary" value="Tìm kiếm">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-10">
                            <canvas id="bar-chart"></canvas>
                        </div>
                        <div class="col-lg-2" id="status">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-8 text-center">
                                            <div>{{ trans('status.pending') }}</div>
                                        </div>
                                        <div class="col-xs-4">{{ $pending }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-8 text-center">
                                            <div>{{ trans('status.approved') }}</div>
                                        </div>
                                        <div class="col-xs-4">{{ $approved }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-8 text-center">
                                            <div>{{ trans('status.rejected') }}</div>
                                        </div>
                                        <div class="col-xs-4">{{ $rejected }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel" id="panel-gray">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-8 text-center">
                                            <div>{{ trans('status.canceled') }}</div>
                                        </div>
                                        <div class="col-xs-4">{{ $canceled }}</div>
                                    </div>
                                </div>
                            </div>
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
