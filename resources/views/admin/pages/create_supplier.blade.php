@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-create-supplier-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.supplier_management.create.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.suppliers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('admin.supplier_management.create.name') }}</label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.supplier_management.create.address') }}</label>
                            <input type="text" class="form-control" name="address" required>
                            @error('address')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.supplier_management.create.phone') }}</label>
                            <input type="text" class="form-control" name="phone" required>
                            @error('phone')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.supplier_management.create.submit') }}">
                            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-success">
                                {{ trans('admin.supplier_management.create.back') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
