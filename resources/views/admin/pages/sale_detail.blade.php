@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-sale-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.sale_detail.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="group-sale">
                        <span class="title">{{ trans('admin.sale_detail.code') }}</span>
                        <span class="content">{{ $sale->code }}</span>
                    </div>
                    <div class="group-sale">
                        <span class="title">{{ trans('admin.sale_detail.name') }}</span>
                        <span class="content">{{ $sale->name }}</span>
                    </div>
                    <div class="group-sale">
                        <span class="title">{{ trans('admin.sale_detail.category') }}</span>
                        <span class="content">
                            @if ($sale->category_id == null)
                                {{ trans('admin.sale_detail.all') }}
                            @else
                                {{ $sale->category->name }}
                            @endif
                        </span>
                    </div>
                    <div class="group-sale">
                        <span class="title">{{ trans('admin.sale_detail.type') }}</span>
                        <span class="content">
                            @if ($sale->type == config('setting.sale_type.percent'))
                                {{ trans('admin.sale_detail.percent') }}
                            @else
                                {{ trans('admin.sale_detail.amount') }}
                            @endif
                        </span>
                    </div>
                    <div class="group-sale">
                        <span class="title">{{ trans('admin.sale_detail.detail_sale') }}</span>
                        <span class="content">
                            @if ($sale->type == config('setting.sale_type.percent'))
                                {{ $sale->percent . " %" }}
                            @else
                                {{ number_format($sale->amount) . " VND" }}
                            @endif
                        </span>
                    </div>
                     <div class="group-sale">
                        <span class="title">{{ trans('admin.sale_detail.start_date') }}</span>
                        <span class="content">{{ $sale->start_date }}</span>
                    </div>
                     <div class="group-sale">
                        <span class="title">{{ trans('admin.sale_detail.end_date') }}</span>
                        <span class="content">{{ $sale->end_date }}</span>
                    </div>
                    <div class="group-sale">
                        <span class="title">{{ trans('admin.sale_detail.description') }}</span>
                        <span class="content">{{ $sale->description }}</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a href="{{ route('admin.sales.index') }}" class="btn btn-success">
                        {{ trans('admin.sale_detail.back') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
