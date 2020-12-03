@extends('admin.layouts.auth')

@section('content')
<div class="wrap-admin-forgot-password-page">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <img src="{{ asset('storage/logo.png') }}" alt="logo" class="img-center">
                <h3 class="text-center">Admin {{ trans('admin.login.title') }}</h3>
                <div class="panel-body">
                    <form action="{{ route('admin.sendNewPassword') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ trans('admin.login.email') }}" autofocus required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Gửi">
                        </div>
                        <div class="form-group">
                            <a href="{{ route('admin.getLogin') }}" class="text-primary">Quay lại đăng nhập</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
