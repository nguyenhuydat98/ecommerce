<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#import-{{ $productInformation->id }}">
    <i class="fa fa-fw fa-lg">&#xf0fe;</i>
</button>
<div class="wrap-modal-import-product">
    <div id="import-{{ $productInformation->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nhập sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <form action="{{ route('admin.postImportProduct', [$supplier->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_information_id" value="{{ $productInformation->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" value="{{ $productInformation->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Chọn màu sắc <span class="text-danger">*</span></label>
                            <select class="form-control" name="color_id" required>
                                <option value="">Chọn màu</option>
                                @foreach ($productInformation->products as $product)
                                    <option value="{{ $product->color_id }}">{{ $product->color->name }}</option>
                                @endforeach
                                @error('color_id')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Số lượng <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="quantity" required>
                            @error('quantity')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Đơn giá (VND) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="import_price" required>
                            @error('import_price')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" value="Nhập sản phẩm">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Quay lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
