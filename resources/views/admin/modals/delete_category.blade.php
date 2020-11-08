<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteCategory-{{ $category->id }}">
    <i class="fa fa-fw fa-lg" aria-hidden="true">&#xf014;</i>
</button>
<div class="wrap-modal-delete-category">
    <div id="deleteCategory-{{ $category->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.modal_delete_category.title') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4>{{ trans('admin.modal_delete_category.confirm_delete') }}</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <input type="submit" class="btn btn-danger" value="{{ trans('admin.modal_delete_category.delete') }}">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('admin.modal_delete_category.back') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
