@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-edit-voucher-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.voucher_management.edit.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.vouchers.update', [$voucher->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.edit.code') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="code" value="{{ $voucher->code }}" required>
                            @error('code')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.edit.name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ $voucher->name }}" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.edit.formality') }} <span class="text-danger">*</span></label>
                            <select class="form-control" name="formality" required>
                                @if ($voucher->formality == 0)
                                    <option value="0">{{ trans('admin.voucher_management.edit.formality_by_percent') }}</option>
                                    <option value="1">{{ trans('admin.voucher_management.edit.formality_by_money') }}</option>
                                @else
                                    <option value="1">{{ trans('admin.voucher_management.edit.formality_by_money') }}</option>
                                    <option value="0">{{ trans('admin.voucher_management.edit.formality_by_percent') }}</option>
                                @endif
                            </select>
                            @error('formality')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.edit.value') }} <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="value" value="{{ $voucher->value }}" required>
                            @error('value')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.edit.order_value_from') }} (VND) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="value_order" value="{{ $voucher->value_order }}" required>
                            @error('value_order')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.edit.start_time') }} <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" name="start_date" value="{{ $startDate }}" required>
                            @error('start_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.voucher_management.edit.end_time') }} <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" name="end_date" value="{{ $endDate }}" required>
                            @error('end_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.button_save') }}">
                            <a href="{{ route('admin.vouchers.index') }}" class="btn btn-success">{{ trans('admin.button_back') }}</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
