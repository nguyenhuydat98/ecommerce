@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-edit-supplier-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.supplier_management.edit.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.suppliers.update', [$supplier->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('admin.supplier_management.edit.name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ $supplier->name }}" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.supplier_management.edit.address') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" value="{{ $supplier->address }}" required>
                            @error('address')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.supplier_management.edit.phone') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone" value="{{ $supplier->phone }}" required>
                            @error('phone')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.button_save') }}">
                            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-success">{{ trans('admin.button_back') }}</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
