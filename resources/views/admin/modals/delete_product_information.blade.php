<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProduct-{{ $productInformation->id }}">
    <i class="fa fa-fw fa-lg" aria-hidden="true">&#xf014;</i>
</button>
<div class="wrap-modal-delete-product">
    <div id="deleteProduct-{{ $productInformation->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.modal_delete_product.title') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4>{{ trans('admin.modal_delete_product.confirm_delete') }}</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.product_informations.destroy', $productInformation->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $productInformation->id }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('admin.modal_delete_product.delete') }}">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('admin.modal_delete_product.back') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
