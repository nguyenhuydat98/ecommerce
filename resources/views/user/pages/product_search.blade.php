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
                        <p class="title-result">Kết quả tìm kiếm cho "{{ $keyWord }}"</p>
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
                                                @if ($productInformation->rate == null)
                                                    <span class="product-rate">chưa có đánh giá</span>
                                                @else
                                                    @php
                                                        $rate = $productInformation->rate;
                                                    @endphp
                                                    @for($star = 1; $star <= 5; $star++)
                                                        <span class="fa fa-star @if ($star <= $rate) checked @endif"></span>
                                                    @endfor
                                                    <span class="product-rate">({{ $productInformation->rate }})</span>
                                                @endif
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
                        @include('user.elements.custom_products')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
