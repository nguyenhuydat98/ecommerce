@extends('admin.layouts.auth')

@section('content')
<div class="wrap-admin-change-password-page">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('storage/logo.png') }}" alt="logo" class="img-center">
                </a>
                <h3 class="text-center">{{ trans('admin.login.change_password') }}</h3>
                <div class="panel-body">
                    <form action="{{ route('admin.postChangePassword') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="password" name="current_password" class="form-control" placeholder="{{ trans('admin.login.current_password') }}" autofocus required>
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="new_password" class="form-control" placeholder="{{ trans('admin.login.new_password') }}" required>
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="repeat_password" class="form-control" placeholder="{{ trans('admin.login.repeat_password') }}" required>
                            @error('repeat_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="{{ trans('admin.login.change_password') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
