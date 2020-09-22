@extends('admin.layouts.auth')

@section('content')
<div class="wrap-login-admin-page">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <h3 class="text-center">Admin {{ trans('admin.login.title') }}</h3>
                <div class="panel-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ trans('admin.login.email') }}" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="{{ trans('admin.login.password') }}">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> {{ trans('admin.login.remember_me') }}</label>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="{{ trans('admin.login.submit') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
