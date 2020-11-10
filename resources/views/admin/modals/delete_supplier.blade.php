<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteSupplier-{{ $supplier->id }}">
    <i class="fa fa-fw fa-lg" aria-hidden="true">&#xf014;</i>
</button>
<div class="wrap-modal-delete-supplier">
    <div id="deleteSupplier-{{ $supplier->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.modal_delete_supplier.title') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4>{{ trans('admin.modal_delete_supplier.confirm_delete') }}</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $supplier->id }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('admin.modal_delete_supplier.delete') }}">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('admin.modal_delete_supplier.back') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
