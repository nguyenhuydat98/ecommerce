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
                                        <th>{{ trans('user.cart.total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 0;
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td class="td-delete">
                                                <form action="{{ route('deleteOneItem') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_detail_id" value="{{ $item['product_detail_id'] }}">
                                                    <input type="submit" class="btn btn-danger" value="X">
                                                </form>
                                            </td>
                                            <td class="td-image">
                                                <img class="image" src="{{ asset($images[$index]) }}">
                                            </td>
                                            <td class="td-name">{{ $names[$index] }}</td>
                                            <td class="td-quantity">{{ $item['quantity'] }}</td>
                                            <td class="td-color">
                                                @switch ($item['color'])
                                                    @case (config('setting.color.black'))
                                                        {{ trans('user.color.black') }}
                                                        @break

                                                    @case (config('setting.color.white'))
                                                        {{ trans('user.color.white') }}
                                                        @break

                                                    @case (config('setting.color.gold'))
                                                        {{ trans('user.color.gold') }}
                                                        @break

                                                    @case (config('setting.color.pink'))
                                                        {{ trans('user.color.pink') }}
                                                        @break

                                                @endswitch
                                            </td>
                                            <td class="td-price price">{{ number_format($item['unit_price']) . " VND" }}</td>
                                            <td class="td-price price">{{ number_format($item['unit_price'] * $item['quantity']) . " VND" }}</td>
                                        </tr>
                                        @php
                                            $index++;
                                            $total += $item['unit_price'] * $item['quantity'];
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="total-payment">{{ trans('user.cart.total_payment') }}</td>
                                        <td class="td-price price-payment">{{ number_format($total) . " VND" }}</td>
                                    </tr>
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
