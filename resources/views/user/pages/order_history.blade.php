@extends('user.layouts.app')

@section('content')
    <div class="wrap-user-order-history-page">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('storage/background.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Lịch Sử Mua Hàng</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="cart_area section_padding">
            <div class="container">
                <div class="choose-list">
                    <a href="{{ route('orderHistory') }}" class="btn_3">Xem tất cả</a>
                    <a href="{{ route('orderHistoryByStatus') }}" class="btn_3">Xem theo trạng thái</a>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ nhận</th>
                            <th>Trạng thái</th>
                            <th>Giá trị đơn hàng</th>
                            <th>Thời gian đặt hàng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
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
                                </td>
                                <td>{{ number_format($order->total_payment) . " đ" }}</td>
                                <td>{{ $order->created_at->format('H:i:s d/m/yy') }}</td>
                                <td>
                                    <a href="#" class="btn btn-info">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate">{{ $orders->links() }}</div>
            </div>
        </section>
    </div>
@endsection
