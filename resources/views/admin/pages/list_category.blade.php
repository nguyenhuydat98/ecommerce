@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-category-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.category_management.title') }}</h1>
                </div>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">{{ trans('admin.category_management.create_new_category') }}</a>
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
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', [$category->id]) }}" class="btn btn-primary"><i class="fa fa-fw fa-lg">&#xf044</i></a>
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
