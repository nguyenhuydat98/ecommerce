@extends('admin.layouts.app')

@section('content')
<div class="wrap-admin-create-category-page">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm khuyến mại mới</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.vouchers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="code" required>
                            @error('code')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tên khuyến mại <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình thức khuyến mại <span class="text-danger">*</span></label>
                            <select class="form-control" name="formality" required>
                                <option value="">Chọn hình thức khuyến mại</option>
                                <option value="0">Theo phần trăm</option>
                                <option value="1">Theo số tiền cụ thể</option>
                            </select>
                            @error('formality')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mức khuyến mại <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="value" required>
                            @error('value')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Áp dụng cho đơn hàng từ (VND) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="value_order" required>
                            @error('value_order')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thời gian bắt đầu <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" name="start_date" required>
                            @error('start_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thời gian kết thúc <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" name="end_date" required>
                            @error('end_date')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Thêm mới">
                            <a href="{{ route('admin.vouchers.index') }}" class="btn btn-success">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
