@extends('user.layouts.app')

@section('content')
    <div class="wrap-user-product-page">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('storage/background.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{ trans('user.product') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="product_list section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="product_list">
                            <div class="row">
                                @php
                                    $index = 0;
                                @endphp
                                @foreach ($productInformations as $productInformation)
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="single_product_item">
                                            <a href="{{ route('productDetail', [$productInformation->id] )}}">
                                                <img src="{{ asset($productInformation->products->first()->images->first()->image_link) }}" class="img-fluid">
                                            </a>
                                            <div class="product-info">
                                                <div class="product-name">{{ $productInformation->name }}</div>
                                                <div class="product-brand">{{ $productInformation->brand }}</div>
                                                <div class="product-current">
                                                    @if ($listMinPrice[$index] != $listMaxPrice[$index])
                                                        {{ number_format($listMinPrice[$index]) . " đ" }}
                                                        -
                                                        {{ number_format($listMaxPrice[$index++]) . " đ" }}
                                                    @else
                                                        {{ number_format($listMaxPrice[$index++]) . " đ" }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="paginate">{{ $productInformations->links() }}</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="product_sidebar">
                            <div class="single_sedebar">
                                <div class="select_option">
                                    <div class="select_option_list">{{ trans('user.product.category') }}</div>
                                    <div class="select_option_dropdown">
                                        @foreach ($categories as $category)
                                            <p><a href="{{ route('productByCategory', [$category->id]) }}">{{ $category->name }}</a></p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection