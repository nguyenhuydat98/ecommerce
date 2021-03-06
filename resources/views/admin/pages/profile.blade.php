@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-admin-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.profile.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-8">
                        <div class="group">
                            <span class="title">{{ trans('admin.profile.name') }}</span>
                            <span class="content">{{ $admin->name }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.profile.address') }}</span>
                            <span class="content">{{ $admin->address }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.profile.phone') }}</span>
                            <span class="content">{{ $admin->phone }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.profile.email') }}</span>
                            <span class="content">{{ $admin->email }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.profile.created_at') }}</span>
                            <span class="content">{{ $admin->created_at->format(config('setting.format_date')) }}</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset($admin->avatar) }}" alt="avatar">
                    </div>
                </div>
                @include('admin.modals.change_profile')
            </div>
        </div>
    </div>
</div>
@endsection
