@extends('admin.layouts.app')

@section('content')
    <div class="wrap-statistic-revenue-in-month-page">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thống kê doanh thu trong tháng {{ (int) date("m", strtotime($time)) }} năm {{ date("Y", strtotime($time)) }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div id="container">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.getViewStatisticRevenue', $time) }}" method="GET">
                                @csrf
                                <div class="col-lg-2 form-group">
                                    <h4>Chọn thời gian</h4>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <input type="month" class="form-control" name="time" min="2020-01" value="{{ date($time) }}">
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="submit" class="btn btn-primary" value="Tìm kiếm">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-11">
                            <canvas id="bar-chart-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="revenue-in-month" data-url="{{ route('admin.getStatisticRevenueInMonth', $time) }}"></div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_statistic_revenue.js') }}"></script>
@endsection
