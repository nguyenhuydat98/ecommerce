@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-sale-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.sale_management.list.title') }}</h1>
                </div>
            </div>
            <a href="{{ route('admin.sales.create') }}" class="btn btn-primary">{{ trans('admin.sale_management.list.create_new') }}</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.sale_management.list.code') }}</th>
                                            <th>{{ trans('admin.sale_management.list.category') }}</th>
                                            <th>{{ trans('admin.sale_management.list.type') }}</th>
                                            <th>{{ trans('admin.sale_management.list.sale') }}</th>
                                            <th>{{ trans('admin.sale_management.list.start_date') }}</th>
                                            <th>{{ trans('admin.sale_management.list.end_date') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $sale->code }}</td>
                                            <td>
                                                @if ($sale->category_id != null)
                                                    {{ $sale->category->name }}
                                                @else
                                                    {{ trans('admin.sale_management.list.all_category') }}
                                                @endif

                                            </td>
                                            <td>
                                                @if ($sale->type == config('setting.sale_type.percent'))
                                                    {{ trans('admin.sale_management.list.percent') }}
                                                @else
                                                    {{ trans('admin.sale_management.list.amount') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($sale->type == config('setting.sale_type.percent'))
                                                    {{ $sale->percent . " %" }}
                                                @else
                                                    {{ number_format($sale->amount) . " VND" }}
                                                @endif
                                            </td>
                                            <td>{{ $sale->start_date }}</td>
                                            <td>{{ $sale->end_date }}</td>
                                            <td>
                                                <a href="{{ route('admin.sales.show', [$sale->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-lg">&#xf06e</i></a>
                                                <a href="{{ route('admin.sales.edit', [$sale->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg">&#xf044</i></a>
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
