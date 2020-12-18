@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-admin-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="page-header">Danh sách quản trị viên</h1>
                </div>
                <div class="col-lg-5" id="flash">
                    @if (session('done'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('done') }}</strong>
                        </div>
                    @elseif (session('error_delete'))
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('error_delete') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">Thêm quản trị viên mới</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Họ tên</th>
                                            <th>Quyền</th>
                                            <th>Ngày bắt đầu</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->role->name }}</td>
                                            <td>{{ $admin->created_at->format(config('setting.format_date')) }}</td>
                                            <td>
                                                <a href="{{ route('admin.admins.show', [$admin->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-lg">&#xf06e;</i></a>
                                                <a href="{{ route('admin.admins.edit', [$admin->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg">&#xf044;</i></a>
                                                @include ('admin.modals.delete_admin')
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
