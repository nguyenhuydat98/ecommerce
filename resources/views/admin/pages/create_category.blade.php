@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-create-category-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.category_management.create.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('admin.category_management.create.name') }}</label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ trans('admin.category_management.create.submit') }}">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-success">
                                {{ trans('admin.category_management.create.back') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
