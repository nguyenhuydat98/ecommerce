<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-product-{{ $productInformation->id }}">
    {{ trans('admin.button_create_new') }}
</button>
<div class="wrap-modal-create-product">
    <div id="create-product-{{ $productInformation->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.product_detail.create.title') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_information_id" value="{{ $productInformation->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ trans('admin.product_detail.create.name') }}</label>
                            <label class="form-control">{{ $productInformation->name }}</label>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_detail.create.color') }} <span class="text-danger">*</span></label>
                            <select class="form-control" name="color_id" required>
                                <option value="">{{ trans('admin.product_detail.create.choose_new_color') }}</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                            @error('color_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_detail.create.import_price') }} (VND) <span class="text-danger">*</span></label>
                            <input type="text" name="import_price" class="form-control"
                            @if (count($productInformation->products) > 0)
                                value="{{ $productInformation->products->first()->import_price }}"
                            @endif
                            required>
                            @error('import_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_detail.create.unit_price') }} (VND) <span class="text-danger">*</span></label>
                            <input type="text" name="unit_price" class="form-control" required>
                            @error('unit_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.product_detail.create.image') }}</label>
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
                        <input type="submit" class="btn btn-primary" value="{{ trans('admin.button_create_new') }}">
                        <button type="button" class="btn btn-success" data-dismiss="modal">{{ trans('admin.button_back') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
