@extends('user.layouts.app')

@section('content')
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
                        <li class="breadcrumb-item"><a href="#">{{ $productInformation->products->first()->category->name }}</a></li>
                        <li class="breadcrumb-item active"><a href="">{{ $productInformation->name }}</a></li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-xl-5">
                        <img src="{{ asset($images[0]->image_link) }}" class="imgage-product" id="image-show">
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
                            <span class="content name">{{ $productInformation->name }}</span>
                        </div>
                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.brand') }}</span>
                            <span class="content">{{ $productInformation->brand }}</span>
                        </div>
                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.description') }}</span>
                            <span class="content">{{ $productInformation->description }}</span>
                        </div>
                        <div class="wrap-price">
                            <span class="text">{{ trans('user.product_detail.price') }}</span>
                            {{-- <span class="original-price"></span> --}}
                            <span class="current-price" id="unit_price">
                                {{ number_format($productInformation->products->first()->unit_price) . " VND" }}
                            </span>
                        </div>
                        <div class="wrap-color">
                            @foreach ($productInformation->products as $product)
                                <span class="color" data-url="{{ route('quantity', $product->id) }}">{{ $product->color->name }}</span>
                            @endforeach
                        </div>

                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.available') }}</span>
                            <span id="available"></span>
                        </div>
                        <form action="{{ route('addToCart') }}" method="POST">
                            @csrf
                            <div class="card_area hide-quantity">
                                <div class="product_count_area">
                                    <div class="text">{{ trans('user.product_detail.quantity') }}</div>
                                    <div class="product_count">
                                        <span class="product_count_item" id="sub-quantity"><i class="ti-minus"></i></span>
                                        <input type="text" class="product_count_item" name="quantity" id="quantity" value="1" min="1" readonly>
                                        <span class="product_count_item" id="add-quantity"><i class="ti-plus"></i></span>
                                    </div>
                                </div>
                                <div class="add_to_cart">
                                    <input type="hidden" name="color" id="choose-color">
                                    <input type="hidden" name="product_id" id="choose-product-id">
                                    <input type="submit" class="btn_3" value="{{ trans('user.product_detail.add_to_cart') }}">
                                    <a href="#" class="btn_3 buy-now">{{ trans('user.product_detail.buy_now') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/user_product_detail.js') }}"></script>
@endsection
