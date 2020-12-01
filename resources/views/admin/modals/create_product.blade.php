<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-product-{{ $productInformation->id }}">Thêm phân loại mới</button>
<div class="wrap-modal-create-product">
    <div id="create-product-{{ $productInformation->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm phân loại mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_information_id" value="{{ $productInformation->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <label class="form-control">{{ $productInformation->name }}</label>
                        </div>
                        <div class="form-group">
                            <label>Chọn màu <span class="text-danger">*</span></label>
                            <select class="form-control" name="color_id" required>
                                <option value="">Chọn 1 màu mới</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                            @error('color_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Đơn giá (VND) <span class="text-danger">*</span></label>
                            <input type="text" name="unit_price" class="form-control" required>
                            @error('unit_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="images[]" class="form-control" multiple required>
                            @error('images')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('images.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Lưu sản phẩm">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Quay lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
