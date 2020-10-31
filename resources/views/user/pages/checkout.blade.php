@extends('user.layouts.app')

@section('content')
    <div class="wrap-user-checkout-page">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('storage/background.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{ trans('user.checkout') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="cart_area section_padding">
            <div class="container">
                <div class="billing_details">
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-7">
                                <h2>{{ trans('user.checkout.bill_detail') }}</h2>
                                <hr>
                                <div class="form-group">
                                    <label>
                                        {{ trans('user.checkout.receiver_name') }}
                                        <span class="text text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="{{ trans('user.checkout.enter_your_name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        {{ trans('user.checkout.receiver_address') }}
                                        <span class="text text-danger">*</span>
                                    </label>
                                    <input type="text" name="address" class="form-control" value="{{ $user->address }}" placeholder="{{ trans('user.checkout.enter_your_address') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        {{ trans('user.checkout.receiver_phone') }}
                                        <span class="text text-danger">*</span>
                                    </label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="{{ trans('user.checkout.enter_your_phone') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('user.checkout.receiver_note') }}</label>
                                    <input type="text" name="note" class="form-control" placeholder="{{ trans('user.checkout.enter_your_note') }}">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <h2>{{ trans('user.checkout.your_order') }}</h2>
                                <hr>
                                @php
                                    $index = 0;
                                    $totalPayment = 0;
                                @endphp
                                <ul class="list">
                                    @foreach ($cart as $item)
                                        <li>
                                            <div class="product-detail">
                                                <span class="left">{{ trans('user.checkout.name_product') }}</span>
                                                <span class="content">{{ $names[$index++] }}</span>
                                                <span class="left">{{ trans('user.checkout.quantity') }}</span>
                                                <span class="content">{{ $item['quantity'] }}</span>
                                                <span class="left">{{ trans('user.checkout.color') }}</span>
                                                @switch ($item['color'])
                                                    @case (config('setting.color.black'))
                                                        <span class="content">{{ trans('user.color.black') }}</span>
                                                        @break

                                                    @case (config('setting.color.white'))
                                                        <span class="content">{{ trans('user.color.white') }}</span>
                                                        @break

                                                    @case (config('setting.color.gold'))
                                                        <span class="content">{{ trans('user.color.gold') }}</span>
                                                        @break

                                                    @case (config('setting.color.pink'))
                                                        <span class="content">{{ trans('user.color.pink') }}</span>
                                                        @break
                                                @endswitch
                                                <span class="left">{{ trans('user.checkout.unit_price') }}</span>
                                                <span class="content">{{ number_format($item['unit_price']) . " VND" }}</span>
                                                <span class="left">{{ trans('user.checkout.total') }}</span>
                                                <span class="content">{{ number_format($item['unit_price'] * $item['quantity']) . " VND" }}</span>
                                            </div>
                                        </li>
                                        @php
                                            $totalPayment += $item['unit_price'] * $item['quantity'];
                                        @endphp
                                    @endforeach
                                    <li>
                                        <span class="left">{{ trans('user.checkout.total_payment') }}</span>
                                        <span class="content-payment">{{ number_format($totalPayment) . " VND" }}</span>
                                    </li>
                                    <input type="hidden" name="payment" value="{{ $totalPayment }}">
                                    <input type="submit" class="btn_1 btn-payment" value="{{ trans('user.checkout.confirm_checkout') }}">
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
