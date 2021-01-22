@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-list-user-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('admin.user_management.title') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('admin.user_management.email') }}</th>
                                            <th>{{ trans('admin.user_management.name') }}</th>
                                            <th>{{ trans('admin.user_management.address') }}</th>
                                            <th>{{ trans('admin.user_management.phone') }}</th>
                                            <th>{{ trans('admin.user_management.start_date') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->created_at->format(config('setting.format_date')) }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.show', [$user->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-lg">&#xf06e;</i></a>
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
