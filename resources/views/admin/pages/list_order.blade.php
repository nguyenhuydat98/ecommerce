@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-orders-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="page-header">Danh Sách Đơn Hàng</h1>
                </div>
                <div class="col-lg-5" id="message-status">
                    @if (session('message_rejected'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('message_rejected') }}</strong>
                        </div>
                    @elseif (session('message_approved_success'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('message_approved_success') }}</strong>
                        </div>
                    @elseif (session('message_approved_error'))
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('message_approved_error') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên người nhận</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Giá trị đơn hàng</th>
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
                                            <td>
                                                <a href="{{ route('admin.orders.show', [$order->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-lg">&#xf06e;</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_dataTables.js') }}"></script>
@endsection
