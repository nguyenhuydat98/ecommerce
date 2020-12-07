<div class="product_sidebar" id="custom-products">
    <div class="single_sedebar">
        <div class="select_option">
            <p>Sắp xếp theo giá</p>
            <a href="{{ route('sortByPriceAsc') }}" class="btn_3 sort-price">Tăng dần</a>
            <a href="{{ route('sortByPriceDesc') }}" class="btn_3 sort-price">Giảm dần</a>
        </div>

        <div class="select_option">
            <p>Bộ lọc theo giá</p>
            <form action="{{ route('filterByPrice') }}" method="GET">
                <div class="form-group">
                    <input type="number" class="form-control filter-by-price" min="1" max="100000000" name="from_price" placeholder="Từ giá" autocomplete="false" required>
                    @error('from_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" class="form-control filter-by-price" min="1" max="100000000" name="to_price" placeholder="Đến giá" autocomplete="false" required>
                    @error('to_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control filter-by-price" value="Lọc sản phẩm" id="btn-filter">
                </div>
            </form>
        </div>

        <div class="select_option">
            <p>Chọn danh mục</p>
            <div class="select_option_list">{{ trans('user.product.category') }}</div>
            <div class="select_option_dropdown">
                @foreach ($categories as $category)
                    <p><a href="{{ route('productByCategory', [$category->id]) }}">{{ $category->name }}</a></p>
                @endforeach
            </div>
        </div>
    </div>
</div>
