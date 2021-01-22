@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-category-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="page-header">{{ trans('admin.category_management.title') }}</h1>
                </div>
                <div class="col-lg-5" id="flash">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">{{ trans('admin.button_create_new') }}</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.category_management.name') }}</th>
                                            <th>{{ trans('admin.category_management.created_at') }}</th>
                                            <th>{{ trans('admin.category_management.updated_at') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->created_at->format(config('setting.format_date')) }}</td>
                                            <td>{{ $category->updated_at->format(config('setting.format_date')) }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', [$category->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-lg">&#xf044;</i></a>
                                                @include('admin.modals.delete_category')
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_dataTables.js') }}"></script>
@endsection
