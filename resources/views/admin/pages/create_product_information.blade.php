@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-create-product-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.product_management.create.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('admin.product_informations.store') }}" method="POST" {{-- enctype="multipart/form-data" --}}>
                    <div class="col-lg-6">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.create.name') }}</label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.create.category') }}</label>
                            <select class="form-control" name="category_id">
                                <option>{{ trans('admin.product_management.create.choose_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.create.brand') }}</label>
                            <input type="text" class="form-control" name="brand" required>
                            @error('brand')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_management.create.description') }}</label>
                            <textarea class="form-control" name="description" rows="7" required></textarea>
                            @error('description')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label>{{ trans('admin.product_management.create.image') }}</label>
                            <input type="file" class="form-control" name="images[]" multiple>
                        </div> --}}
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.product_management.create.submit') }}">
                            <a href="{{ route('admin.product_informations.index') }}" class="btn btn-success">
                                {{ trans('admin.product_management.create.back') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
