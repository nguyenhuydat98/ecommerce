@extends('user.layouts.auth')

@section('content')
    @include('user.elements.preload')
    <div class="wrap-user-login-page">
        <section class="login_part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>New to our Shop?</h2>
                                <p>There are advances being made in science and technology
                                    everyday, and a good example of this is the</p>
                                <a href="#" class="btn_3">Create an Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>{{ trans('user.login.welcome') }}<br>{{ trans('user.login.title') }}</h3>
                                <form action="{{ route('postLogin') }}" method="POST" class="row contact_form" >
                                    @csrf
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" name="email" placeholder="{{ trans('user.login.email') }}" autofocus="" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" name="password" placeholder="{{ trans('user.login.password') }}" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="creat_account d-flex align-items-center">
                                            <input type="checkbox" id="f-option" name="remember">
                                            <label for="f-option">{{ trans('user.login.remember_me') }}</label>
                                        </div>
                                        <input type="submit" class="btn_3" value="{{ trans('user.login.submit') }}" id="btn-login">
                                        <div class="custom">
                                            <a class="forgot" href="#">{{ trans('user.login.forgot_password') }}</a>
                                            <a class="register" href="{{ route('getRegister') }}">{{ trans('user.login.register_an_account') }}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
