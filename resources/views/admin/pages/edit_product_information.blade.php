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
                <form action="{{ route('admin.product_informations.update', [$productInformation->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ $productInformation->name }}" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.category') }}</label>
                            <select class="form-control" name="category_id">
                                <option value={{ $productInformation->category_id }} selected>{{ $productInformation->category->name }}</option>
                                @foreach ($categories as $category)
                                    @if ($category->id != $productInformation->category_id)
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
                            <input type="text" class="form-control" name="brand" value="{{ $productInformation->brand }}" required>
                            @error('brand')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.edit.description') }}</label>
                            <textarea class="form-control" name="description" rows="7" required>{{ $productInformation->description }}</textarea>
                            @error('description')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.product_management.edit.submit') }}">
                            <a href="{{ route('admin.product_informations.index') }}" class="btn btn-success">
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
