@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-create-sale-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.sale_management.create.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('admin.sales.store') }}" method="POST">
                    @csrf
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.create.code') }}</label>
                            <input type="text" class="form-control" name="code" required>
                            @error('code')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.create.name') }}</label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.create.category') }}</label>
                            <select class="form-control" name="category_id">
                                <option value="{{ null }}">{{ trans('admin.sale_management.create.all_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.create.description') }}</label>
                            <textarea class="form-control" name="description" rows="7" required></textarea>
                            @error('description')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.create.type') }}</label>
                            <select class="form-control" name="type">
                                <option value="{{ config('setting.sale_type.percent') }}" selected>{{ trans('admin.sale_management.create.percent') }}</option>
                                <option value="{{ config('setting.sale_type.amount') }}">{{ trans('admin.sale_management.create.amount') }}</option>
                            </select>
                            @error('type')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.create.detail_sale') }}</label>
                            <input type="text" class="form-control" name="detail_sale" required>
                            @error('detail_sale')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.create.start_date') }}</label>
                            <input type="date" name="start_date" class="form-control" required>
                            @error('start_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.create.end_date') }}</label>
                            <input type="date" name="end_date" class="form-control" required>
                            @error('end_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.sale_management.create.submit') }}">
                            <a href="{{ route('admin.sales.index') }}" class="btn btn-success">
                                {{ trans('admin.sale_management.create.back') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
