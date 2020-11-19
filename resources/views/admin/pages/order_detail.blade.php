@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-order-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi Tiết Đơn Hàng</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8" id="btn-support">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-success">Quay lại</a>
                </div>
                <div class="col-lg-4">
                    @if ($order->status == config('setting.status.pending'))
                        <a href="#" class="btn btn-success">Duyệt đơn hàng</a>
                        <a href="#" class="btn btn-danger">Từ chối đơn hàng</a>
                    @endif
                </div>
                <div class="col-lg-10">
                    <div class="group-order">
                        <span class="title">Tên người nhận</span>
                        <span class="content">{{ $order->name }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">Địa chỉ nhận hàng</span>
                        <span class="content">{{ $order->address }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">Số điện thoại</span>
                        <span class="content">{{ $order->phone }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">Trạng thái đơn hàng</span>
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
                    <div class="group-order">
                        <span class="title">Giá trị đơn hàng</span>
                        <span class="content" id="total-payment">{{ number_format($order->total_payment) . " đ" }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">Ghi chú</span>
                        <span class="content">{{ $order->note }}</span>
                    </div>
                    <div class="group-order">
                        <span class="title">Thời gian đặt hàng</span>
                        <span class="content">{{ $order->created_at->format('H:i:s d/m/yy') }}</span>
                    </div>
                    @if ($order->status != config('setting.status.pending'))
                        <div class="group-order">
                            <span class="title">Cập nhật lần cuối</span>
                            <span class="content">{{ $order->updated_at->format('H:i:s d/m/yy') }}</span>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12" id="order-product">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Thành tiền</th>
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
