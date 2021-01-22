<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change-profile-{{ $admin->id }}">
    {{ trans('admin.profile.modal.button') }}
</button>
<div class="wrap-modal-chnage-profile-admin">
    <div id="change-profile-{{ $admin->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.profile.modal.title') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.changeProfile') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ trans('admin.profile.modal.name') }}</label>
                            <input type="text" name="name" value="{{ $admin->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.profile.modal.address') }}</label>
                            <input type="text" name="address" value="{{ $admin->address }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.profile.modal.phone') }}</label>
                            <input type="text" name="phone" value="{{ $admin->phone }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" value="{{ trans('admin.button_save') }}" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
