@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-user-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.user_detail.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12" id="btn-back">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-success">{{ trans('admin.button_back') }}</a>
                    </div>
                    <div class="col-lg-8">
                        <div class="group">
                            <span class="title">{{ trans('admin.user_detail.email') }}</span>
                            <span class="content">{{ $user->email }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.user_detail.name') }}</span>
                            <span class="content">{{ $user->name }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.user_detail.address') }}</span>
                            <span class="content">{{ $user->address }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.user_detail.phone') }}</span>
                            <span class="content">{{ $user->phone }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.user_detail.start_date') }}</span>
                            <span class="content">{{ $user->created_at->format(config('setting.format_date')) }}</span>
                        </div>
                        <div class="group">
                            <span class="title">{{ trans('admin.user_detail.last_updated') }}</span>
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
