@extends('admin.layouts.app')

@section('content')
    <div class="wrap-admin-import-product-page">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="page-header">Nhập sản phẩm từ {{$supplier->name }}</h1>
                    </div>
                    <div class="col-lg-5" style="margin-top: 35px;">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="group-supplier">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">Danh Sách Sản Phẩm Đã Chọn</div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Màu sắc</th>
                                                    <th>Số lượng</th>
                                                    <th>Đơn giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $index = 1;
                                                    $totalPayment = 0;
                                                @endphp
                                                @if ($listImport)
                                                    @foreach ($listImport as $item)
                                                        <tr>
                                                            <td>{{ $index++ }}</td>
                                                            <td>{{ $item['product_name'] }}</td>
                                                            <td>{{ $item['color'] }}</td>
                                                            <td>{{ $item['quantity'] }}</td>
                                                            <td>{{ number_format($item['import_price']) . " đ" }}</td>
                                                        </tr>
                                                        @php
                                                            $totalPayment += $item['import_price'] * $item['quantity'];
                                                        @endphp
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="group-supplier">
                            <span class="title">Tổng thanh toán</span>
                            <span class="content">{{ number_format($totalPayment) . " đ" }}</span>
                        </div>
                        <div class="group-supplier">
                            {{-- <a href="{{ route('admin.importProductToDB') }}" class="btn btn-success">Nhập hàng</a> --}}
                            <a href="#" class="btn btn-success">Nhập hàng</a>
                            <a href="{{ route('admin.deleteImport', [$supplier->id]) }}" class="btn btn-danger">Xóa danh sách</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <table class="table table-striped" id="tbl-list-product">
                            <thead>
                                <tr>
                                    <th id="th-stt">#</th>
                                    <th>Tên sản phẩm</th>
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
