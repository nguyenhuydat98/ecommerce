@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-edit-sale-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.sale_management.edit.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('admin.sales.update', [$sale->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.edit.code') }}</label>
                            <input type="text" class="form-control" name="code" value="{{ $sale->code }}" required>
                            @error('code')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.edit.name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ $sale->name }}" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.edit.category') }}</label>
                            <select class="form-control" name="category_id">
                                <option value="{{ $sale->category_id }}">
                                    @if ($sale->category_id == null)
                                        {{ trans('admin.sale_management.edit.all_category') }}
                                    @else
                                        {{ $sale->category->name }}
                                    @endif
                                </option>
                                @if ($sale->category_id != null)
                                    <option value="{{ null }}">{{ trans('admin.sale_management.edit.all_category') }}</option>
                                @endif
                                @foreach ($categories as $category)
                                    @if ($sale->category_id != $category->id)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.edit.description') }}</label>
                            <textarea class="form-control" name="description" rows="7" required>{{ $sale->description }}</textarea>
                            @error('description')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.edit.type') }}</label>
                            <select class="form-control" name="type">
                                @if ($sale->type == config('setting.sale_type.percent'))
                                    <option value="{{ config('setting.sale_type.percent') }}" selected>
                                        {{ trans('admin.sale_management.edit.percent') }}
                                    </option>
                                    <option value="{{ config('setting.sale_type.amount') }}">
                                        {{ trans('admin.sale_management.edit.amount') }}
                                    </option>
                                @else
                                    <option value="{{ config('setting.sale_type.amount') }}" selected>
                                        {{ trans('admin.sale_management.edit.amount') }}
                                    </option>
                                    <option value="{{ config('setting.sale_type.percent') }}">
                                        {{ trans('admin.sale_management.edit.percent') }}
                                    </option>
                                @endif
                            </select>
                            @error('type')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.edit.detail_sale') }}</label>
                            @if ($sale->type == config('setting.sale_type.percent'))
                                <input type="text" class="form-control" name="detail_sale" value="{{ $sale->percent }}" required>
                            @else
                                <input type="text" class="form-control" name="detail_sale" value="{{ $sale->amount }}" required>
                            @endif
                            @error('detail_sale')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.edit.start_date') }}</label>
                            <input type="date" name="start_date" class="form-control" required>
                            @error('start_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.sale_management.edit.end_date') }}</label>
                            <input type="date" name="end_date" class="form-control" required>
                            @error('end_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.sale_management.edit.submit') }}">
                            <a href="{{ route('admin.sales.index') }}" class="btn btn-success">
                                {{ trans('admin.sale_management.edit.back') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
