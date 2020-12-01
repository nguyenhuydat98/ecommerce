<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-product-{{ $product->id }}">
    <i class="fa fa-fw fa-lg">&#xf014;</i>
</button>
<div class="wrap-modal-delete-product">
    <div id="delete-product-{{ $product->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xoá loại sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4>Bạn có chắc muốn xóa loại sản phẩm này không?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.products.destroy', [$product->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Xác nhận xóa">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Quay laị</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
