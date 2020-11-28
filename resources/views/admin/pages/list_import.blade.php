@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-import-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách đơn nhập hàng</h1>
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
                                            <th>Nhân viên</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Màu</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thời gian nhập</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($index = 0; $index < count($listImport); $index++)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $listImport[$index]['admin_name'] }}</td>
                                                <td>{{ $listImport[$index]['supplier_name'] }}</td>
                                                <td>{{ $listImport[$index]['product_name'] }}</td>
                                                <td>{{ $listImport[$index]['color'] }}</td>
                                                <td>{{ $listImport[$index]['quantity'] }}</td>
                                                <td>{{ number_format($listImport[$index]['import_price']) . " đ" }}</td>
                                                <td>{{ date('H:i:s d/m/yy', strtotime($listImport[$index]['created_at']))  }}</td>
                                            </tr>
                                        @endfor
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
