@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-order-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.order_detail.title') }}</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8" id="btn-support">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-success">{{ trans('admin.button_back') }}</a>
                </div>
                <div class="col-lg-4">
                    @if ($order->status == config('setting.status.pending'))
                        <a href="{{ route('admin.order.approved', [$order->id]) }}" class="btn btn-success">Duyệt đơn hàng</a>
                        <a href="{{ route('admin.order.rejected', [$order->id]) }}" class="btn btn-danger">Từ chối đơn hàng</a>
                    @endif
                </div>
                <div class="col-lg-10">
                    <div class="group-order">
                        <span class="title">{{ trans('admin.order_detail.name') }}</span>
                        <span class="content">{{ $order->name }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">{{ trans('admin.order_detail.address') }}</span>
                        <span class="content">{{ $order->address }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">{{ trans('admin.order_detail.phone') }}</span>
                        <span class="content">{{ $order->phone }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">{{ trans('admin.order_detail.status') }}</span>
                        <span class="content">
                            @switch ($order->status)
                                @case (config('setting.status.pending'))
                                    <span class="badge badge-primary">{{ trans('status.pending') }}</span>
                                    @break

                                @case (config('setting.status.approved'))
                                    <span class="badge badge-success">{{ trans('status.approved') }}</span>
                                    @break

                                @case (config('setting.status.rejected'))
                                    <span class="badge badge-danger">{{ trans('status.rejected') }}</span>
                                    @break

                                @case (config('setting.status.canceled'))
                                    <span class="badge badge-secondary">{{ trans('status.canceled') }}</span>
                                    @break

                            @endswitch
                        </span>
                    </div>
                    @if ($voucher)
                        <div class="group-order">
                            <span class="title">{{ trans('admin.order_detail.voucher_code') }}</span>
                            <span class="content">{{ $voucher->code }}</span>
                        </div>
                        <div class="group-order">
                            <span class="title">{{ trans('admin.order_detail.voucher_value') }}</span>
                            <span class="content">
                                @if ($voucher->formality == config('setting.formality.percent'))
                                    {{ $voucher->value . " %" }}
                                @else
                                    {{ number_format($voucher->value) . " đ" }}
                                @endif
                            </span>
                        </div>
                    @endif
                    <div class="group-order">
                        <span class="title">{{ trans('admin.order_detail.order_value') }}</span>
                        <span class="content" id="total-payment">{{ number_format($order->total_payment) . " đ" }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">{{ trans('admin.order_detail.note') }}</span>
                        <span class="content">{{ $order->note }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">{{ trans('admin.order_detail.created_at') }}</span>
                        <span class="content">{{ $order->created_at->format(config('setting.format_date')) }}</span>
                    </div>
                    @if ($order->status != config('setting.status.pending'))
                        <div class="group-order">
                            <span class="title">{{ trans('admin.order_detail.last_updated') }}</span>
                            <span class="content">{{ $order->updated_at->format(config('setting.format_date')) }}</span>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12" id="order-product">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            <th>{{ trans('admin.order_detail.table.image') }}</th>
                            <th>{{ trans('admin.order_detail.table.name') }}</th>
                            <th>{{ trans('admin.order_detail.table.color') }}</th>
                            <th>{{ trans('admin.order_detail.table.quantity') }}</th>
                            <th>{{ trans('admin.order_detail.table.unit_price') }}</th>
                            <th>{{ trans('admin.order_detail.table.total') }}</th>
                        </thead>
                        <tbody>
                            @php
                                $index = 0;
                            @endphp
                            @foreach ($order->products as $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($listProduct[$index]['image_link']) }}" id="demo-image">
                                    </td>
                                    <td>{{ $listProduct[$index]['name'] }}</td>
                                    <td>{{ $listProduct[$index++]['color'] }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ number_format($product->pivot->price) . " đ" }}</td>
                                    <td>{{ number_format($product->pivot->price *  $product->pivot->quantity) . " đ" }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
