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
                        <li class="breadcrumb-item"><a href="{{ route('productByCategory', [$productInformation->category_id]) }}">{{ $productInformation->category->name }}</a></li>
                        <li class="breadcrumb-item active"><a href="#">{{ $productInformation->name }}</a></li>
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
                    <div class="col-xl-7">
                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.name') }}</span>
                            <span class="content name">{{ $productInformation->name }}</span>
                        </div>
                        <div class="group-info">
                            <span class="text">{{ trans('user.product_detail.rate') }}</span>
                            <span class="content">
                                @if ($productInformation->rate == null)
                                    {{ trans('user.product.rate_empty') }}
                                @else
                                    {{ $productInformation->rate }}
                                @endif
                            </span>
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
                                @if ($minPrice != $maxPrice)
                                    {{ number_format($minPrice) . " đ" }}
                                    -
                                    {{ number_format($maxPrice) . " đ" }}
                                @else
                                    {{ number_format($maxPrice) . " đ" }}
                                @endif
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
                        <div class="row">
                            <div class="col-xl-6">
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
                                            <input type="hidden" name="color_id" id="choose-color">
                                            <input type="hidden" name="product_id" id="choose-product-id">
                                            <input type="submit" class="btn_3" value="{{ trans('user.product_detail.add_to_cart') }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-6" id="btn-buy-now">
                                <form action="{{ route('buyNow') }}" method="POST">
                                    @csrf
                                    <div class="card_area hide-quantity">
                                        <input type="hidden" name="quantity" id="buy-now-quantity" value="1" min="1">
                                        <input type="hidden" name="color_id" id="buy-now-choose-color">
                                        <input type="hidden" name="product_id" id="buy-now-choose-product-id">
                                        <input type="submit" class="btn_3 buy-now" value="{{ trans('user.product_detail.buy_now') }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12" id="rating-product">
                        <h2 class="title-rating">{{ trans('user.product_detail.list_comment') }} <small>({{ count($comments) }} {{ trans('user.product_detail.comment') }})</small></h2>
                        @foreach ($comments as $comment)
                            <div class="comment">
                                <div class="avatar">
                                    <img src="{{ asset($comment->user->avatar) }}" alt="avatar" class="img-user">
                                </div>
                                <div class="content-comment">
                                    <div>{{ $comment->user->name }}</div>
                                    <div>
                                        @for ($star = 1; $star <= 5; $star++)
                                        <span class="fa fa-star @if ($star <= $comment->rate) checked @endif"></span>
                                        @endfor
                                    </div>
                                    <div>{{ $comment->content }}</div>
                                    <div>{{ $comment->updated_at->format(config('setting.format_date')) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(Auth::guard('web')->check() && $isOrder && !$isComment)
                        <div class="col-xl-12">
                            <button type="button" class="btn_3" id="btn-rating" data-toggle="modal" data-target="#rating">Đánh giá</button>
                            <div class="wrap-modal-rating">
                                <div id="rating" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Đánh giá sản phẩm</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('rating', [$product->productInformation->id]) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="rate">
                                                            <input type="radio" id="star5" name="rate" value="5">
                                                            <label for="star5" title="5">5 stars</label>
                                                            <input type="radio" id="star4" name="rate" value="4">
                                                            <label for="star4" title="4">4 stars</label>
                                                            <input type="radio" id="star3" name="rate" value="3">
                                                            <label for="star3" title="3">3 stars</label>
                                                            <input type="radio" id="star2" name="rate" value="2">
                                                            <label for="star2" title="2">2 stars</label>
                                                            <input type="radio" id="star1" name="rate" value="1">
                                                            <label for="star1" title="1">1 star</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="content-comment" name="comment" placeholder="Hãy chia sẻ cảm nhận của bạn về sản phẩm" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn_3" id="send-rating" value="Đánh giá">
                                                    <button type="button" class="btn_3" id="close-rating" data-dismiss="modal">Quay lại</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/user_product_detail.js') }}"></script>
@endsection
