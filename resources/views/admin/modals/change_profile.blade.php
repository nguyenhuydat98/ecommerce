<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change-profile-{{ $admin->id }}">Thay đổi</button>
<div class="wrap-modal-chnage-profile-admin">
    <div id="change-profile-{{ $admin->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thay đổi thông tin cá nhân</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.changeProfile') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="name" value="{{ $admin->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" value="{{ $admin->address }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" value="{{ $admin->phone }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" value="Lưu thay đổi" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
