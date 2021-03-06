@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-voucher-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="page-header">{{ trans('admin.voucher_management.list.title') }}</h1>
                </div>
                <div class="col-lg-5" id="flash">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <a href="{{ route('admin.vouchers.create') }}" class="btn btn-primary">{{ trans('admin.button_create_new') }}</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.voucher_management.list.code') }}</th>
                                            <th>{{ trans('admin.voucher_management.list.name') }}</th>
                                            <th>{{ trans('admin.voucher_management.list.value') }}</th>
                                            <th>{{ trans('admin.voucher_management.list.order_value_from') }}</th>
                                            <th>{{ trans('admin.voucher_management.list.start_time') }}</th>
                                            <th>{{ trans('admin.voucher_management.list.end_time') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($vouchers as $voucher)
                                            <tr>
                                                <td>{{ $index++ }}</td>
                                                <td>{{ $voucher->code }}</td>
                                                <td>{{ $voucher->name }}</td>
                                                <td>
                                                    @if ($voucher->formality == 0)
                                                        {{ $voucher->value . " %"}}
                                                    @else
                                                        {{ number_format($voucher->value) . " đ" }}
                                                    @endif
                                                </td>
                                                <td>{{ number_format($voucher->value_order) . " đ" }}</td>
                                                <td>{{ date(config('setting.format_date'), strtotime($voucher->start_date)) }}</td>
                                                <td>{{ date(config('setting.format_date'), strtotime($voucher->end_date)) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.vouchers.edit', [$voucher->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg">&#xf044;</i></a>
                                                    @include ('admin.modals.delete_voucher')
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
