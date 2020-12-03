@extends('user.layouts.auth')

@section('content')
    <div class="wrap-user-forgot-pasword-page">
        <section class="login_part">
            <div class="container">
                <div class="row align-items-center">
                    @include ('user.elements.information')
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Lấy lại mật khẩu</h3>
                                <form action="{{ route('sendNewPassword') }}" method="POST" class="row contact_form">
                                    @csrf
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" name="email" placeholder="Nhập email của bạn" autofocus required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="submit" class="btn_3" value="Gửi" id="btn-submit">
                                        <div class="custom">
                                            <a class="back-login" href="{{ route('getLogin') }}">Quay lại đăng nhập</a>
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
