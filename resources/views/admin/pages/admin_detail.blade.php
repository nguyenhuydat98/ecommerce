@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-admin-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.admin_detail.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12" id="btn-back">
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-success">{{ trans('admin.button_back') }}</a>
                    </div>
                    <div class="col-lg-8">
                        <div class="group">
                            <span class="title">{{ trans('admin.admin_detail.email') }}</span>
                            <span class="content">{{ $admin->email }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.admin_detail.role') }}</span>
                            <span class="content">{{ $admin->role->name }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.admin_detail.name') }}</span>
                            <span class="content">{{ $admin->name }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.admin_detail.address') }}</span>
                            <span class="content">{{ $admin->address }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.admin_detail.phone') }}</span>
                            <span class="content">{{ $admin->phone }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.admin_detail.start_date') }}</span>
                            <span class="content">{{ $admin->created_at->format(config('setting.format_date')) }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.admin_detail.last_updated') }}</span>
                            <span class="content">{{ $admin->updated_at->format(config('setting.format_date')) }}</span>
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
