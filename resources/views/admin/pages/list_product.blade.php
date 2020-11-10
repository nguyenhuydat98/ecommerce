@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-product-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.product_management.list.title') }}</h1>
                </div>
            </div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">{{ trans('admin.product_management.list.create_new') }}</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.product_management.list.name') }}</th>
                                            <th>{{ trans('admin.product_management.list.category') }}</th>
                                            <th>{{ trans('admin.product_management.list.brand') }}</th>
                                            <th>{{ trans('admin.product_management.list.original_price') }}</th>
                                            <th>{{ trans('admin.product_management.list.current_price') }}</th>
                                            <th>{{ trans('admin.product_management.list.amount') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 0;
                                        @endphp
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->brand }}</td>
                                            <td>{{ number_format($product->original_price) . " VND" }}</td>
                                            <td>{{ number_format($product->current_price) . " VND" }}</td>
                                            <td>{{ $listAmount[$index++] }}</td>
                                            <td>
                                                <a href="{{ route('admin.products.show', [$product->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-lg">&#xf06e</i></a>
                                                <a href="{{ route('admin.products.edit', [$product->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg">&#xf044</i></a>
                                                @include('admin.modals.delete_product')
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
