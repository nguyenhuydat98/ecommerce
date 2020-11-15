@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-product-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.product_detail.title') }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="group-tabs">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#product" data-toggle="tab">{{ trans('admin.product_detail.product') }}</a></li>
                        <li><a href="#color" data-toggle="tab">{{ trans('admin.product_detail.list_color') }}</a></li>
                        <li><a href="#image" data-toggle="tab">{{ trans('admin.product_detail.image') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="product" active></div>
                        <div class="tab-pane fade" id="color"></div>
                        <div class="tab-pane fade" id="image"></div>
                    </div>
                </div> --}}
                <div class="col-lg-12" id="btn-support">
                    <a href="{{ route('admin.product_informations.index') }}" class="btn btn-success">{{ trans('admin.product_detail.back') }}</a>
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
                    <a href="#" class="btn btn-primary">Thêm phân loại mới</a>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Màu sắc</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
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
                                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-fw fa-lg">&#xf06e</i></a>
                                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg">&#xf044</i></a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-lg">&#xf014;</i></a>
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
