@extends('user.layouts.auth')

@section('content')
<div class="wrap-user-register-page">
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
                            <h3>{{ trans('user.register.welcome') }}<br>{{ trans('user.register.title') }}</h3>
                            <form action="{{ route('postRegister') }}" method="POST" class="row contact_form" >
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" name="name" placeholder="{{ trans('user.register.name') }}" autofocus="" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" name="email" placeholder="{{ trans('user.register.email') }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="password" placeholder="{{ trans('user.register.password') }}" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="repeat_password" placeholder="{{ trans('user.register.repeat_password') }}" required>
                                    @error('repeat_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="submit" class="btn_3" value="{{ trans('user.register.submit') }}">
                                    <div class="custom">
                                        <a class="back-login" href="{{ route('getLogin') }}">{{ trans('user.register.back_to_login') }}</a>
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
