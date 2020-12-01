@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-admin-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thông tin quản trị viên</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="col-lg-12" id="btn-back">
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-success">Quay lại</a>
                    </div>
                    <div class="col-lg-8">
                        <div class="group">
                            <span class="title">Email</span>
                            <span class="content">{{ $admin->email }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Quyền</span>
                            <span class="content">{{ $admin->role->name }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Họ tên</span>
                            <span class="content">{{ $admin->name }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Địa chỉ</span>
                            <span class="content">{{ $admin->address }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Điện thoại</span>
                            <span class="content">{{ $admin->phone }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Ngày bắt đầu</span>
                            <span class="content">{{ $admin->created_at->format('H:i:s d/m/yy') }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Cập nhật lần cuối</span>
                            <span class="content">{{ $admin->updated_at->format('H:i:s d/m/yy') }}</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset($admin->avatar) }}" alt="avatar">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
