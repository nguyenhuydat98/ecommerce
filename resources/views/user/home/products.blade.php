<section class="latest-product-area" id="wrap-product-in-home-page">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="section-tittle mb-30">
                    <h4 class="title">Sản phẩm phổ biến</h4>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="properties__button f-right">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-iphone" role="tab" aria-controls="nav-home" aria-selected="true">Iphone</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-samsung" role="tab" aria-controls="nav-profile" aria-selected="false">Samsung</a>
                            {{-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Oppo</a> --}}
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-iphone" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @php
                        $index = 0;
                    @endphp
                    @foreach ($productInformations as $productInformation)
                        @if ($productInformation->category_id == 1)
                            <div class="col-xl-2">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="{{ asset($productInformation->products->first()->images()->first()->image_link) }}" alt="">
                                    </div>
                                    <h4>
                                        <a href="{{ route('productDetail', [$productInformation->id]) }}">{{ $productInformation->name }}</a>
                                    </h4>
                                    <div class="product-caption">
                                        @if ($productInformation->rate == null)
                                            <span class="product-rate">chưa có đánh giá</span>
                                        @else
                                            @for($star = 1; $star <= 5; $star++)
                                                <span class="fa fa-star @if ($star <= $productInformation->rate) checked @endif"></span>
                                            @endfor
                                            <span class="product-rate">({{ $productInformation->rate }})</span>
                                        @endif
                                        <div class="price">
                                            @if ($listIphoneMinPrice[$index] != $listIphoneMaxPrice[$index])
                                                {{ number_format($listIphoneMinPrice[$index]) . " đ" }}
                                                -
                                                {{ number_format($listIphoneMaxPrice[$index++]) . " đ" }}
                                            @else
                                                {{ number_format($listIphoneMaxPrice[$index++]) . " đ" }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="nav-samsung" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    @php
                        $index = 0;
                    @endphp
                    @foreach ($productInformations as $productInformation)
                        @if ($productInformation->category_id == 2)
                            <div class="col-xl-2">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="{{ asset($productInformation->products->first()->images()->first()->image_link) }}" alt="">
                                    </div>
                                    <h4>
                                        <a href="{{ route('productDetail', [$productInformation->id]) }}">{{ $productInformation->name }}</a>
                                    </h4>
                                    <div class="product-caption">
                                        @if ($productInformation->rate == null)
                                            <span class="product-rate">chưa có đánh giá</span>
                                        @else
                                            @for($star = 1; $star <= 5; $star++)
                                                <span class="fa fa-star @if ($star <= $productInformation->rate) checked @endif"></span>
                                            @endfor
                                            <span class="product-rate">({{ $productInformation->rate }})</span>
                                        @endif
                                        <div class="price">
                                            @if ($listSamSungMinPrice[$index] != $listSamSungMaxPrice[$index])
                                                {{ number_format($listSamSungMinPrice[$index]) . " đ" }}
                                                -
                                                {{ number_format($listSamSungMaxPrice[$index++]) . " đ" }}
                                            @else
                                                {{ number_format($listSamSungMaxPrice[$index++]) . " đ" }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                </div>
            </div> --}}
        </div>
    </div>
</section>
