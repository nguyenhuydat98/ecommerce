@extends('user.layouts.app')

@section('content')
<div class="wrap-user-product-page">
    <section class="product_list">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('product')}}">{{ trans('user.product.all_product') }}</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-2">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="{{ trans('user.product.search') }} ...">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        @foreach($categories as $category)
                            <div class="single_sedebar">
                                <div class="select_option">
                                    <div class="select_option_list">{{ $category->name }}</div>
                                    <div class="select_option_dropdown">
                                        @foreach ($children as $child)
                                            @if ($child->parent_id == $category->id)
                                                <p><a href="#">{{ $child->name }}</a></p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="product_list">
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-lg-3 col-sm-3">
                                <div class="single_product_item">
                                    <a href="#">
                                        <img src="{{ asset($product->images->first()->image_link) }}" alt="" class="img-fluid">
                                    </a>
                                    <div class="product-info">
                                        <div class="product-name">{{ $product->name }}</div>
                                        <div class="product-brand">{{ $product->brand }}</div>
                                        <div class="product-original">
                                            @php
                                                echo number_format($product->original_price, 0, '', ',') . " VND";
                                            @endphp
                                        </div>
                                        <div class="product-current">
                                            @php
                                                echo number_format($product->current_price, 0, '', ',') . " VND";
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="paginate">{{ $products->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
