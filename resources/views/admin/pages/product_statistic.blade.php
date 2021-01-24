@extends('admin.layouts.app')

@section('content')
    <div class="wrap-statistic-order-page">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{ trans('admin.product_statistic.title') }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div id="container">
                        <div class="col-lg-12">
                            <form action="#" method="GET">
                                @csrf
                                <div class="col-lg-1 form-group">
                                    <label>{{ trans('admin.order_statistic.from_date') }}</label>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="date" class="form-control" name="from_date" required>
                                </div>
                                <div class="col-lg-1 form-group">
                                    <label>{{ trans('admin.order_statistic.to_date') }}</label>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="date" class="form-control" name="to_date" required>
                                </div>
                                <div class="col-lg-2 form-group">
                                    <input type="submit" class="btn btn-primary" value="{{ trans('admin.button_search') }}">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-11">
                            <canvas id="bar-chart-product"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-statistic" data-url="{{ route('admin.getDataProductStatistic') }}"></div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_product_statistic.js') }}"></script>
@endsection
