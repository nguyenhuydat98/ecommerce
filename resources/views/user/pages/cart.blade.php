@extends('user.layouts.app')

@section('content')
    <div class="wrap-user-cart-page">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('storage/background.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{ trans('user.cart') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="cart_area section_padding">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        @if (!Session::has('numberOfItemInCart') || Session::get('numberOfItemInCart') == 0)
                            <h4 class="text-center cart-empty">
                                {{ trans('user.cart.empty') }}
                            </h4>
                            <div class="text-center"><a href="{{ route('product') }}" class="buy-now">{{ trans('user.cart.buy_now') }}</a></div>
                        @else
                            <table class="table table-bordered table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th></th>
                                        <th>{{ trans('user.cart.image') }}</th>
                                        <th>{{ trans('user.cart.name_product') }}</th>
                                        <th>{{ trans('user.cart.quantity') }}</th>
                                        <th>{{ trans('user.cart.color') }}</th>
                                        <th>{{ trans('user.cart.unit_price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($productInCart as $item)
                                        <tr>
                                            <td class="td-delete">
                                                <form action="{{ route('deleteOneItem') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                    <input type="submit" class="btn btn-danger" value="X">
                                                </form>
                                            </td>
                                            <td class="td-image">
                                                <img class="image" src="{{ asset($item['image_link']) }}">
                                            </td>
                                            <td class="td-name">{{ $item['name'] }}</td>
                                            <td class="td-quantity">
                                                <form action="{{ route('updateQuantity') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                    <div class="form-group">
                                                        <div class="product_count">
                                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                                        </div>
                                                    </div>
                                                    <input type="submit" class="btn_1" id="btn-update" value="{{ trans('user.cart.update') }}">
                                                </form>
                                            </td>
                                            <td class="td-color">
                                                {{ $item['color'] }}
                                            </td>
                                            <td class="td-price price">{{ number_format($item['unit_price']) . " VND" }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <span class="button-left">
                                    <a href="{{ route('deleteAllItem') }}" class="btn_1 delete-all">{{ trans('user.cart.delete_all') }}</a>
                                </span>
                                <span>
                                    <a class="btn_1" href="{{ route('getListItem') }}">{{ trans('user.cart.checkout') }}</a>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
