<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteVoucher-{{ $voucher->id }}">
    <i class="fa fa-fw fa-lg" aria-hidden="true">&#xf014;</i>
</button>
<div class="wrap-modal-delete-voucher">
    <div id="deleteVoucher-{{ $voucher->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa Khuyến mại</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4>Bạn có chắc chắn muốn xóa khuyến mãi này không?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.vouchers.destroy', $voucher->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $voucher->id }}">
                        <input type="submit" class="btn btn-danger" value="Xóa khuyến mại">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Quay lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
