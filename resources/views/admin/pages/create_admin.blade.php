@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-create-admin-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.admin_management.create.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.admins.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('admin.admin_management.create.email') }} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.admin_management.create.role') }} <span class="text-danger">*</span></label>
                            <select class="form-control" name="role_id">
                                <option value="">{{ trans('admin.admin_management.create.choose_role') }}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.admin_management.create.name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.admin_management.create.address') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" required>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.admin_management.create.phone') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.button_create_new') }}">
                            <a href="{{ route('admin.admins.index') }}" class="btn btn-success">{{ trans('admin.button_back') }}</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
