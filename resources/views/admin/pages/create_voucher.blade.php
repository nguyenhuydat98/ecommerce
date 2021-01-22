@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-create-category-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.voucher_management.create.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.vouchers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.create.code') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="code" required>
                            @error('code')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.create.name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.create.formality') }} <span class="text-danger">*</span></label>
                            <select class="form-control" name="formality" required>
                                <option value="">{{ trans('admin.voucher_management.create.choose_formality') }}</option>
                                <option value="0">{{ trans('admin.voucher_management.create.formality_by_percent') }}</option>
                                <option value="1">{{ trans('admin.voucher_management.create.formality_by_money') }}</option>
                            </select>
                            @error('formality')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.create.value') }} <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="value" required>
                            @error('value')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.create.order_value_from') }} (VND) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="value_order" required>
                            @error('value_order')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.create.start_time') }} <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" name="start_date" required>
                            @error('start_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.create.end_time') }} <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" name="end_date" required>
                            @error('end_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.button_create_new') }}">
                            <a href="{{ route('admin.vouchers.index') }}" class="btn btn-success">{{ trans('admin.button_back') }}</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
