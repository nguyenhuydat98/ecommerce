@extends('admin.layouts.app')

@section('content')
    <div class="wrap-statistic-order-page">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{ trans('admin.order_statistic.filter.title') }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div id="container">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.chartOrderByTime') }}" method="GET">
                                <div class="col-lg-1 form-group">
                                    <label>{{ trans('admin.order_statistic.from_date') }}</label>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="date" class="form-control" name="from_date" value="{{ $fromDate }}" required>
                                </div>
                                <div class="col-lg-1 form-group">
                                    <label>{{ trans('admin.order_statistic.to_date') }}</label>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="date" class="form-control" name="to_date" value="{{ $toDate }}" required>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="submit" class="btn btn-primary" value="{{ trans('admin.button_search') }}">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <canvas id="bar-chart-pending"></canvas>
                        </div>
                        <div class="col-lg-12">
                            <canvas id="bar-chart-approved"></canvas>
                        </div>
                        <div class="col-lg-12">
                            <canvas id="bar-chart-rejected"></canvas>
                        </div>
                        <div class="col-lg-12">
                            <canvas id="bar-chart-canceled"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pending" data-url="{{ route('admin.getPendingByTime', [$fromDate, $toDate]) }}"></div>
        <div class="approved" data-url="{{ route('admin.getApprovedByTime', [$fromDate, $toDate]) }}"></div>
        <div class="rejected" data-url="{{ route('admin.getRejectedByTime', [$fromDate, $toDate]) }}"></div>
        <div class="canceled" data-url="{{ route('admin.getCanceledByTime', [$fromDate, $toDate]) }}"></div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_chart_order_by_time.js') }}"></script>
@endsection
