@extends('admin.layouts.app')

@section('content')
    <div class="wrap-admin-import-product-page">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{ trans('admin.import_product.title') }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="group-supplier">
                            <span class="title">{{ trans('admin.import_product.name') }}</span>
                            <span class="content">{{ $supplier->name }}</span>
                        </div>
                        <div class="group-supplier">
                            <span class="title">{{ trans('admin.import_product.address') }}</span>
                            <span class="content">{{ $supplier->address }}</span>
                        </div>
                        <div class="group-supplier">
                            <span class="title">{{ trans('admin.import_product.phone') }}</span>
                            <span class="content">{{ $supplier->phone }}</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-striped" id="tbl-list-product">
                            <thead>
                                <tr>
                                    <th id="th-stt">#</th>
                                    <th>{{ trans('admin.import_product.name_product') }}</th>
                                    <th id="th-btn"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($productInformations as $productInformation)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $productInformation->name }}</td>
                                        <td>
                                            @include('admin.modals.import_product')
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
@endsection
