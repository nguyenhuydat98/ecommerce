@if (Auth::guard('web')->check())
<section class="latest-product-area" id="wrap-product-in-home-page">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <div class="col-xl-12">
                <div class="section-tittle mb-30">
                    <h4 class="title">Gợi ý cho bạn</h4>
                </div>
            </div>
        </div>

        <div class="row">
            @php
                $index = 0;
            @endphp
            @if (sizeof($productRecommenders) > 0)
                @foreach ($productRecommenders as $productInformation)
                    <div class="col-xl-2">
                        <div class="single-product mb-60">
                            <div class="product-img">
                                <a href="{{ route('productDetail', [$productInformation->id] )}}">
                                    <img src="{{ asset($productInformation->products->first()->images()->first()->image_link) }}">
                                </a>
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
                                    @if ($rateMinPrice[$index] != $rateMaxPrice[$index])
                                        {{ number_format($rateMinPrice[$index]) . " đ" }}
                                        -
                                        {{ number_format($rateMaxPrice[$index++]) . " đ" }}
                                    @else
                                        {{ number_format($rateMaxPrice[$index++]) . " đ" }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endif
