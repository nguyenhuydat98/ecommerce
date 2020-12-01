@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-edit-admin-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chỉnh sửa quản trị viên</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.admins.update', [$admin->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" value="{{ $admin->email }}" readonly>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Quyền quản trị <span class="text-danger">*</span></label>
                            <select class="form-control" name="role_id">
                                <option value={{ $admin->role_id }} selected>{{ $admin->role->name }}</option>
                                @foreach ($roles as $role)
                                    @if ($role->id != $admin->role_id)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Họ tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ $admin->name }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" value="{{ $admin->address }}" required>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Điện thoại <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone" value="{{ $admin->phone }}" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Lưu thay đổi">
                            <a href="{{ route('admin.admins.index') }}" class="btn btn-success">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
