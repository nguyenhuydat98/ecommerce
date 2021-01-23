<button type="button" class="btn_3" id="btn-change-profile" data-toggle="modal" data-target="#password">Đổi mật khẩu</button>
<div class="wrap-modal-rating">
    <div id="password" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Đổi mật khẩu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('changePassword') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="new_pasword" required>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu mới</label>
                            <input type="password" class="form-control" name="repeat_pasword" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn_3" value="Lưu thay đổi">
                        <button type="button" class="btn_3" data-dismiss="modal">Quay lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
