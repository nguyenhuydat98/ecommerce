@extends('user.layouts.app')

@section('content')
    <div class="wrap-user-order-detail-page">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('storage/background.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Chi Tiết Đơn Hàng</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="cart_area section_padding">
            <div class="container">
                <div class="information">
                    <div class="group-info">
                        <span class="title">Tên người nhận</span>
                        <span class="content">{{ $order->name }}</span>
                    </div>
                    <div class="group-info">
                        <span class="title">Địa chỉ nhận</span>
                        <span class="content">{{ $order->address }}</span>
                    </div>
                    <div class="group-info">
                        <span class="title">Số điện thoại</span>
                        <span class="content">{{ $order->phone }}</span>
                    </div>
                    <div class="group-info">
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
                    @if ($voucher)
                        <div class="group-info">
                            <span class="title">Mã giảm giá</span>
                            <span class="content">{{ $voucher->code }}</span>
                        </div>
                        <div class="group-info">
                            <span class="title">Đã giảm giá</span>
                            <span class="content">
                                @if ($voucher->formality == config('setting.formality.percent'))
                                    {{ $voucher->value . " %" }}
                                @else
                                    {{ number_format($voucher->value) . " đ" }}
                                @endif
                            </span>
                        </div>
                    @endif
                    <div class="group-info">
                        <span class="title">Giá trị đơn hàng</span>
                        <span class="content" id="total-payment">{{ number_format($order->total_payment) . " đ" }}</span>
                    </div>
                    <div class="group-info">
                        <span class="title">Ghi chú của bạn</span>
                        <span class="content">{{ $order->note }}</span>
                    </div>
                    <div class="group-info">
                        <span class="title">Thời gian đặt hàng</span>
                        <span class="content">{{ $order->created_at->format('H:i:s d/m/yy') }}</span>
                    </div>
                    @if ($order->status == config('setting.status.approved'))
                        <div class="group-info">
                            <span class="title">Thời gian đơn hàng được duyệt</span>
                            <span class="content">{{ $order->updated_at->format('H:i:s d/m/yy') }}</span>
                        </div>
                    @elseif ($order->status == config('setting.status.rejected'))
                        <div class="group-info">
                            <span class="title">Thời gian đơn hàng bị từ chối</span>
                            <span class="content">{{ $order->updated_at->format('H:i:s d/m/yy') }}</span>
                        </div>
                    @elseif ($order->status == config('setting.status.canceled'))
                        <div class="group-info">
                            <span class="title">Thời gian huỷ đơn hàng</span>
                            <span class="content">{{ $order->updated_at->format('H:i:s d/m/yy') }}</span>
                        </div>
                    @endif
                </div>
                <table class="table table-bordered tabel-striped">
                    <thead>
                        <th>#</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Màu sắc</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        @if ($order->status == config('setting.status.approved'))
                            <th></th>
                        @endif
                    </thead>
                    <tbody>
                        @php
                            $index = 0;
                        @endphp
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ asset($listProduct[$index]['image_link']) }}" id="image-product">
                                </td>
                                <td>{{ $listProduct[$index]['name'] }}</td>
                                <td>{{ $listProduct[$index++]['color'] }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ number_format($product->pivot->price) . " đ" }}</td>
                                <td>{{ number_format($product->pivot->price *  $product->pivot->quantity) . " đ" }}</td>
                                @if ($order->status == config('setting.status.approved'))
                                    <td>
                                        <a href="{{ route('productDetail', [$product->product_information_id]) }}" class="btn_3" id="btn-rating">Đánh giá</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($order->status == config('setting.status.pending'))
                    <a href="{{ route('cancelOrder', [$order->id]) }}" class="btn_3" id="cancel-order">Hủy đơn hàng</a>
                @endif
            </div>
        </section>
    </div>
@endsection
