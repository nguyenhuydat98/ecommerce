<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-admin-{{ $admin->id }}">
    <i class="fa fa-fw fa-lg" aria-hidden="true">&#xf014;</i>
</button>
<div class="wrap-modal-delete-admin">
    <div id="delete-admin-{{ $admin->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.admin_management.delete.title') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4>{{ trans('admin.admin_management.delete.confirm') }}</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="{{ trans('admin.button_confirm_delete') }}">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('admin.button_back') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
