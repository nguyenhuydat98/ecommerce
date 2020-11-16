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
                            <div class="col-xl-4">
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
                                    <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        {{ trans('user.checkout.receiver_phone') }}
                                        <span class="text text-danger">*</span>
                                    </label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('user.checkout.receiver_note') }}</label>
                                    <input type="text" name="note" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <h2>{{ trans('user.checkout.your_order') }}</h2>
                                <hr>
                                @php
                                    $totalPayment = 0;
                                @endphp
                                <ul class="list">
                                    @foreach ($productInCart as $item)
                                        <li class="item">
                                            <div class="image">
                                                <img src="{{ asset($item['image_link']) }}" id="image-description">
                                            </div>
                                            <div class="name">{{ $item['name'] }}</div>
                                            <div class="image">{{ $item['color'] }}</div>
                                            @if ($item['sale_id'] == null)
                                                <div class="unit-price">
                                                    {{ number_format($item['unit_price']) . " đ" }}
                                                </div>
                                            @else
                                                {{-- <div class="sale-price"></div> --}}
                                            @endif
                                            <div class="quantity">{{ $item['quantity'] . " SP" }} </div>
                                            <div class="price">{{ number_format($item['unit_price'] * $item['quantity']) . " đ" }}</div>
                                        </li>
                                        @php
                                            $totalPayment += $item['unit_price'] * $item['quantity'];
                                        @endphp
                                    @endforeach
                                </ul>
                                <div class="checkout">
                                    <div class="total-payment">
                                        <span>{{ trans('user.checkout.total_payment') }}: </span>
                                        <span id="color-red">{{ number_format($totalPayment) . " đ" }}</span>
                                    </div>
                                    <div class="btn-checkout">
                                        <input type="hidden" name="payment" value="{{ $totalPayment }}">
                                        <input type="submit" class="btn_1 btn-payment" value="{{ trans('user.checkout.confirm_checkout') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
