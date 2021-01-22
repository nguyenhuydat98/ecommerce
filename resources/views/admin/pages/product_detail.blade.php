@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-product-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="page-header">{{ trans('admin.product_detail.title') }}</h1>
                </div>
                <div class="col-lg-5" id="flash-session">
                    @if (session('error_color'))
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('error_color') }}</strong>
                        </div>
                    @elseif (session('error_price'))
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('error_price') }}</strong>
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-warning alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @elseif (session('done'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12" id="btn-support">
                    <a href="{{ route('admin.product_informations.index') }}" class="btn btn-success">{{ trans('admin.button_back') }}</a>
                </div>
                <div class="col-lg-9" id="information">
                    <div class="group-product">
                        <span class="product-title">{{ trans('admin.product_detail.name') }}</span>
                        <span class="product-content">{{ $productInformation->name }}</span>
                    </div>
                    <div class="group-product">
                        <span class="product-title">{{ trans('admin.product_detail.category') }}</span>
                        <span class="product-content">{{ $productInformation->category->name }}</span>
                    </div>
                    <div class="group-product">
                        <span class="product-title">{{ trans('admin.product_detail.brand') }}</span>
                        <span class="product-content">{{ $productInformation->brand }}</span>
                    </div>
                    <div class="group-product">
                        <span class="product-title">{{ trans('admin.product_detail.description') }}</span>
                        <span class="product-content">{{ $productInformation->description }}</span>
                    </div>
                </div>

                <div class="col-lg-9">
                    @include ('admin.modals.create_product')
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.product_detail.color') }}</th>
                                            <th>{{ trans('admin.product_detail.quantity') }}</th>
                                            <th>{{ trans('admin.product_detail.unit_price') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $product->color->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ number_format($product->unit_price) . " đ" }}</td>
                                            <td>
                                                @include ('admin.modals.edit_product')
                                                @include ('admin.modals.delete_product')
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
