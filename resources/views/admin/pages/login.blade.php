@extends('admin.layouts.auth')

@section('content')
<div class="wrap-admin-login-page">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <img src="{{ asset('storage/logo.png') }}" alt="logo" class="img-center">
                <h3 class="text-center">Admin {{ trans('admin.login.title') }}</h3>
                <div class="panel-body">
                    <form action="{{ route('admin.postLogin') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ trans('admin.login.email') }}" autofocus required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="{{ trans('admin.login.password') }}" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="{{ trans('admin.login.submit') }}">
                        </div>
                        <div class="form-group">
                            <a href="#" class="text-primary">{{ trans('admin.login.forgot_password') }}</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
