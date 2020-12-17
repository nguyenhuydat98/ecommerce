@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-product-information-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="page-header">{{ trans('admin.product_management.list.title') }}</h1>
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
            <a href="{{ route('admin.product_informations.create') }}" class="btn btn-primary">{{ trans('admin.product_management.list.create_new') }}</a>
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
                                            <th>{{ trans('admin.product_management.list.amount') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 0;
                                        @endphp
                                        @foreach ($productInformations as $productInformation)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $productInformation->name }}</td>
                                            <td>{{ $productInformation->category->name }}</td>
                                            <td>{{ $productInformation->brand }}</td>
                                            <td>{{ $listAmount[$index++] }}</td>
                                            <td>
                                                <a href="{{ route('admin.product_informations.show', [$productInformation->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-lg">&#xf06e;</i></a>
                                                <a href="{{ route('admin.product_informations.edit', [$productInformation->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg">&#xf044;</i></a>
                                                @include('admin.modals.delete_product_information')
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
