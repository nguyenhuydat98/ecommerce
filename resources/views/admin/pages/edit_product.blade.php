@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-edit-product-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.product_management.edit.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('admin.products.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.id') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->id }}" readonly>
                            @error('id')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.category') }}</label>
                            <select class="form-control" name="category_id">
                                <option value={{ $product->category_id }} selected>{{ $product->category->name }}</option>
                                @foreach ($categories as $category)
                                    @if ($category->id != $product->category_id)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.brand') }}</label>
                            <input type="text" class="form-control" name="brand" value="{{ $product->brand }}" required>
                            @error('brand')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.description') }}</label>
                            <textarea class="form-control" name="description" rows="7" required>{{ $product->description }}</textarea>
                            @error('description')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.original_price') }}</label>
                            <input type="text" class="form-control" name="original_price" value="{{ $product->original_price }}" required>
                            @error('original_price')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.current_price') }}</label>
                            <input type="text" class="form-control" name="current_price" value="{{ $product->current_price }}" required>
                            @error('current_price')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.product_management.edit.submit') }}">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-success">
                                {{ trans('admin.product_management.edit.back') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
