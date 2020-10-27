@extends('user.layouts.app')

@section('content')
    @include('user.elements.preload')
    <div class="wrap-user-product-detail-page">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('storage/background.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{ trans('user.product_detail') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="product_list section_padding">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('product') }}">{{ trans('user.product.all_product') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
                        <li class="breadcrumb-item active"><a href="#">{{ $product->name }}</a></li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-xl-5">
                        <img src="{{ asset($images->first()->image_link) }}" class="imgage-product" alt="" id="image-show">
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col-xl-3">
                                    <img src="{{ asset($image->image_link) }}" class="list-image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.name') }}</span>
                            <span class="content name">{{ $product->name }}</span>
                        </div>
                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.brand') }}</span>
                            <span class="content">{{ $product->brand }}</span>
                        </div>
                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.description') }}</span>
                            <span class="content">{{ $product->description }}</span>
                        </div>
                        <div class="wrap-price">
                            <span class="original-price">{{ number_format($product->original_price) . " VND" }}</span>
                            <span class="current-price">{{ number_format($product->current_price) . " VND" }}</span>
                        </div>
                        <div class="wrap-color">
                            @foreach ($product->productDetails as $productDetail)
                                @switch ($productDetail->color)
                                    @case (config('setting.color.black'))
                                        <span class="color">{{ trans('user.product_detail.color.black') }}</span>
                                        @break

                                    @case (config('setting.color.white'))
                                        <span class="color">{{ trans('user.product_detail.color.white') }}</span>
                                        @break

                                    @case (config('setting.color.gold'))
                                        <span class="color">{{ trans('user.product_detail.color.gold') }}</span>
                                        @break

                                    @case (config('setting.color.pink'))
                                        <span class="color">{{ trans('user.product_detail.color.pink') }}</span>
                                        @break

                                @endswitch
                            @endforeach
                        </div>

                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.available') }}</span> :
                            <span></span>
                        </div>

                        <div class="card_area">
                            <div class="product_count_area">
                                <div>{{ trans('user.product_detail.quantity') }}</div>
                                <div class="product_count">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" type="text" value="1" min="1" max="100">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                            </div>
                            <div class="add_to_cart">
                                <a href="#" class="btn_3">{{ trans('user.product_detail.add_to_cart') }}</a>
                                <a href="#" class="btn_3 buy-now">{{ trans('user.product_detail.buy_now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/user_product_detail.js') }}"></script>
@endsection

<style>
    .wrap-user-product-detail-page .imgage-product {
        display: block;
        margin: 0 auto;
        margin-bottom: 30px;
        width: 65%;
        height: 310px;
    }

    .wrap-user-product-detail-page .list-image {
        display: block;
        margin: 0 auto;
        width: 90%;
        height: 97px;
    }

    .wrap-user-product-detail-page .list-image:hover {
        cursor: pointer;
        border: 1px solid #0000FF;
    }

    .wrap-user-product-detail-page .group-info {
        height: 45px;
    }

    .wrap-user-product-detail-page .group-info .text {
        display: inline-block;
        float: left;
        width: 25%;
        color: #757575;
    }

    .wrap-user-product-detail-page .group-info .content {
        display: inline-block;
        float: left;
        width: 75%;
    }

    .wrap-user-product-detail-page .wrap-price {
        margin-top: 40px;
        /*margin-bottom: 20px;*/
    }

    .wrap-user-product-detail-page .wrap-color {
        margin: 20px 0;
    }

    .wrap-user-product-detail-page .original-price {
        margin-left: 10px;
        text-decoration: line-through;
        font-weight: 600;
        font-size: 16px;
    }

    .wrap-user-product-detail-page .current-price {
        margin-left: 25px;
        color: #d0011b;
        font-size: 22px;
        font-weight: 700;
    }

    .wrap-user-product-detail-page .color {
        display: inline-block;
        border: 1px solid #0000FF;
        color: #0000FF;
        width: 90px;
        height: 40px;
        text-align: center;
        padding-top: 7px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .wrap-user-product-detail-page .color:hover {
        cursor: pointer;
        background-color: #58ACFA;
        color: #fff;
    }

    .wrap-user-product-detail-page .buy-now {
        background-color: #58ACFA;
        color: #fff;
    }

    .wrap-user-product-detail-page .group-info .name {
        font-size: 18px;
        font-weight: 600;
    }
</style>
