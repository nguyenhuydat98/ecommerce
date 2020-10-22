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
                                            <th>{{ trans('admin.user_management.role') }}</th>
                                            <th>{{ trans('admin.user_management.name') }}</th>
                                            <th>{{ trans('admin.user_management.address') }}</th>
                                            <th>{{ trans('admin.user_management.phone') }}</th>
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
                                            <td>
                                                @switch ($user->role_id)
                                                    @case (config('migration.role.user'))
                                                        {{ trans('admin.user_management.role_user') }}
                                                        @break

                                                    @case (config('migration.role.management'))
                                                        {{ trans('admin.user_management.role_management') }}
                                                        @break

                                                    @case (config('migration.role.admin_product'))
                                                        {{ trans('admin.user_management.role_admin_product') }}
                                                        @break

                                                    @case (config('migration.role.admin_order'))
                                                        {{ trans('admin.user_management.role_admin_order') }}
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info"><i class="fa fa-fw fa-lg">&#xf05a</i></a>
                                                <a href="#" class="btn btn-primary"><i class="fa fa-fw fa-lg">&#xf044</i></a>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-fw fa-lg">&#xf014</i></a>
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
