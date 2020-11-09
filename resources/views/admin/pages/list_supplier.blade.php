@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-supplier-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.supplier_management.title') }}</h1>
                </div>
            </div>
            <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary">{{ trans('admin.supplier_management.create_new') }}</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.supplier_management.name') }}</th>
                                            <th>{{ trans('admin.supplier_management.address') }}</th>
                                            <th>{{ trans('admin.supplier_management.phone') }}</th>
                                            <th>{{ trans('admin.supplier_management.created_at') }}</th>
                                            <th>{{ trans('admin.supplier_management.updated_at') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>{{ $index++ }}</td>
                                                <td>{{ $supplier->name }}</td>
                                                <td>{{ $supplier->address }}</td>
                                                <td>{{ $supplier->phone }}</td>
                                                <td>{{ $supplier->created_at }}</td>
                                                <td>{{ $supplier->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.suppliers.edit', [$supplier->id]) }}" class="btn btn-primary"><i class="fa fa-fw fa-lg">&#xf044</i></a>
                                                    @include('admin.modals.delete_supplier')
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
