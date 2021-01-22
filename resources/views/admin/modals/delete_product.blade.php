<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-product-{{ $product->id }}">
    <i class="fa fa-fw fa-lg">&#xf014;</i>
</button>
<div class="wrap-modal-delete-product">
    <div id="delete-product-{{ $product->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.product_detail.delete.title') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4>{{ trans('admin.product_detail.delete.confirm_delete') }}</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.products.destroy', [$product->id]) }}" method="POST">
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
