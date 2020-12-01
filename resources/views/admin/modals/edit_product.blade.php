<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-product-{{ $product->id }}">
    <i class="fa fa-fw fa-lg">&#xf044;</i>
</button>
<div class="wrap-modal-edit-product">
    <div id="edit-product-{{ $product->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Chỉnh sửa phân loại sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.products.update', [$product->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Đơn giá (VND) <span class="text-danger">*</span></label>
                            <input type="text" name="unit_price" class="form-control" value="{{ $product->unit_price }}" required>
                            @error('unit_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Lưu thay đổi">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Quay lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
