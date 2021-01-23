@extends('user.layouts.app')

@section('content')
    <div class="wrap-profile-user-page">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('storage/background.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Hồ sơ cá nhân</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="cart_area section_padding">
            <div class="container">
                <div class="group">
                    <span class="title">Tên người dùng</span>
                    <span class="content">{{ $user->name }}</span>
                </div>
                <div class="group">
                    <span class="title">Địa chỉ</span>
                    <span class="content">
                        @if($user->address != null)
                            {{ $user->address }}
                        @else
                            <i class="empty">Hiện đang bỏ trống</i>
                        @endif
                    </span>
                </div>
                <div class="group">
                    <span class="title">Số điện thoại</span>
                    <span class="content">
                        @if($user->phone != null)
                            {{ $user->phone }}
                        @else
                            <i class="empty">Hiện đang bỏ trống</i>
                        @endif
                    </span>
                </div>
                <div class="group">
                    <span class="title">Email</span>
                    <span class="content">{{ $user->email }}</span>
                </div>
                <div class="group">
                    <span class="title">Thời điểm đăng ký</span>
                    <span class="content">{{ $user->created_at->format(config('setting.format_date')) }}</span>
                </div>
                <div class="group">
                    @include('user.modals.change_profile')
                    @include('user.modals.change_password')
                </div>
            </div>
        </section>
    </div>
@endsection
