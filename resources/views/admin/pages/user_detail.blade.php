@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-user-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thông tin chi tiết người dùng</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12" id="btn-back">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-success">Quay lại</a>
                    </div>
                    <div class="col-lg-8">
                        <div class="group">
                            <span class="title">Email</span>
                            <span class="content">{{ $user->email }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Họ tên</span>
                            <span class="content">{{ $user->name }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Địa chỉ</span>
                            <span class="content">{{ $user->address }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Điện thoại</span>
                            <span class="content">{{ $user->phone }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Ngày đăng ký</span>
                            <span class="content">{{ $user->created_at->format(config('setting.format_date')) }}</span>
                        </div>
                        <div class="group">
                            <span class="title">Cập nhật lần cuối</span>
                            <span class="content">{{ $user->updated_at->format(config('setting.format_date')) }}</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset($user->avatar) }}" alt="avatar">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
