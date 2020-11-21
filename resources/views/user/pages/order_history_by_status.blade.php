@extends('user.layouts.app')

@section('content')
    <div class="wrap-user-order-history-by-status-page">
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
                <div class="group-tabs">
                    <ul class="nav nav-pills">
                        <li class="tab-status active"><a href="#pending" data-toggle="tab">{{ trans('status.pending') }}</a></li>
                        <li class="tab-status"><a href="#approved" data-toggle="tab">{{ trans('status.approved') }}</a></li>
                        <li class="tab-status"><a href="#rejected" data-toggle="tab">{{ trans('status.rejected') }}</a></li>
                        <li class="tab-status"><a href="#canceled" data-toggle="tab">{{ trans('status.canceled') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show fade in active" id="pending" active>
                            @if ($existPending)
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
                                            @if ($order->status == config('setting.status.pending'))
                                                <tr>
                                                    <td>{{ $index++ }}</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->address }}</td>
                                                    <td>
                                                        <span class="badge badge-primary">{{ trans('status.pending') }}</span>
                                                    </td>
                                                    <td>{{ number_format($order->total_payment) . " đ" }}</td>
                                                    <td>{{ $order->created_at->format('H:i:s d/m/yy') }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info" id="detail">Chi tiết</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="approved">
                            @if ($existApproved)
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
                                            @if ($order->status == config('setting.status.approved'))
                                                <tr>
                                                    <td>{{ $index++ }}</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->address }}</td>
                                                    <td>
                                                        <span class="badge badge-success">{{ trans('status.approved') }}</span>
                                                    </td>
                                                    <td>{{ number_format($order->total_payment) . " đ" }}</td>
                                                    <td>{{ $order->created_at->format('H:i:s d/m/yy') }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info" id="detail">Chi tiết</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="rejected">
                            @if ($existRejected)
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
                                            @if ($order->status == config('setting.status.rejected'))
                                                <tr>
                                                    <td>{{ $index++ }}</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->address }}</td>
                                                    <td>
                                                        <span class="badge badge-danger">{{ trans('status.rejected') }}</span>
                                                    </td>
                                                    <td>{{ number_format($order->total_payment) . " đ" }}</td>
                                                    <td>{{ $order->created_at->format('H:i:s d/m/yy') }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info" id="detail">Chi tiết</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="canceled">
                            @if ($existCanceled)
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
                                            @if ($order->status == config('setting.status.canceled'))
                                                <tr>
                                                    <td>{{ $index++ }}</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->address }}</td>
                                                    <td>
                                                        <span class="badge badge-secondary">{{ trans('status.canceled') }}</span>
                                                    </td>
                                                    <td>{{ number_format($order->total_payment) . " đ" }}</td>
                                                    <td>{{ $order->created_at->format('H:i:s d/m/yy') }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info" id="detail">Chi tiết</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/user_order_history_by_status.js') }}"></script>
@endsection
