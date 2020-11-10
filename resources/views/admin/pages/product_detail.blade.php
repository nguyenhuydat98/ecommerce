@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-product-detail-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.product_detail.title') }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="group-tabs">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#product" data-toggle="tab">{{ trans('admin.product_detail.product') }}</a></li>
                        <li><a href="#color" data-toggle="tab">{{ trans('admin.product_detail.list_color') }}</a></li>
                        <li><a href="#image" data-toggle="tab">{{ trans('admin.product_detail.image') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="product" active>
                            <div class="col-lg-9">
                                <div class="group-product">
                                    <span class="product-title">{{ trans('admin.product_detail.name') }}</span>
                                    <span class="product-content">{{ $product->name }}</span>
                                </div>
                                <div class="group-product">
                                    <span class="product-title">{{ trans('admin.product_detail.category') }}</span>
                                    <span class="product-content">{{ $product->category->name }}</span>
                                </div>
                                <div class="group-product">
                                    <span class="product-title">{{ trans('admin.product_detail.brand') }}</span>
                                    <span class="product-content">{{ $product->brand }}</span>
                                </div>
                                <div class="group-product">
                                    <span class="product-title">{{ trans('admin.product_detail.original_price') }}</span>
                                    <span class="product-content" id="original">{{ number_format($product->original_price) . " VND" }}</span>
                                </div>
                                <div class="group-product">
                                    <span class="product-title">{{ trans('admin.product_detail.current_price') }}</span>
                                    <span class="product-content" id="current">{{ number_format($product->current_price) . " VND" }}</span>
                                </div>
                                <div class="group-product">
                                    <span class="product-title">{{ trans('admin.product_detail.description') }}</span>
                                    <span class="product-content">{{ $product->description }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="color">
                            <div class="col-lg-8">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.product_detail.color') }}</th>
                                            <th>{{ trans('admin.product_detail.quantity') }}</th>
                                            <th>{{ trans('admin.product_detail.last_updated') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($productDetails as $productDetail)
                                        <tr>
                                            <td>{{ $index++ }}</td>

                                            <td>
                                                @switch ($productDetail->color)
                                                    @case (config('setting.color.black'))
                                                        {{ trans('admin.color.black') }}
                                                        @break

                                                    @case (config('setting.color.white'))
                                                        {{ trans('admin.color.white') }}
                                                        @break

                                                    @case (config('setting.color.gold'))
                                                        {{ trans('admin.color.gold') }}
                                                        @break

                                                    @case (config('setting.color.pink'))
                                                        {{ trans('admin.color.pink') }}
                                                        @break

                                                @endswitch
                                            </td>
                                            <td>{{ $productDetail->quantity }}</td>
                                            <td>{{ $productDetail->updated_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="image">
                            <div class="col-lg-10">
                                @foreach ($images as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset($image->image_link) }}" class="img-thumbnail" id="img-product-detail">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="btn-support">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-success">{{ trans('admin.product_detail.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
