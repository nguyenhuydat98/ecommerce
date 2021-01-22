@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-import-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="page-header">{{ trans('admin.import_product.list.title') }}</h1>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.import_product.list.admin') }}</th>
                                            <th>{{ trans('admin.import_product.list.supplier') }}</th>
                                            <th>{{ trans('admin.import_product.list.name_product') }}</th>
                                            <th>{{ trans('admin.import_product.list.color') }}</th>
                                            <th>{{ trans('admin.import_product.list.quantity') }}</th>
                                            <th>{{ trans('admin.import_product.list.unit_price') }}</th>
                                            <th>{{ trans('admin.import_product.list.time') }}</th>
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
                                                <td>{{ date(config('setting.format_date'), strtotime($listImport[$index]['created_at']))  }}</td>
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
