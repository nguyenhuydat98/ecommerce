<div class="product_sidebar" id="custom-products">
    <div class="single_sedebar">
        <div class="select_option">
            <p>{{ trans('user.product.sort_by_price') }}</p>
            <a href="{{ route('sortByPriceAsc') }}" class="btn_3 sort-price">{{ trans('user.product.increment') }}</a>
            <a href="{{ route('sortByPriceDesc') }}" class="btn_3 sort-price">{{ trans('user.product.decrement') }}</a>
        </div>

        <div class="select_option">
            <p>{{ trans('user.product.filter_by_price') }}</p>
            <form action="{{ route('filterByPrice') }}" method="GET">
                <div class="form-group">
                    <input type="number" class="form-control filter-by-price" min="1" max="100000000" name="from_price" placeholder="{{ trans('user.product.from_price') }}" autocomplete="false" required>
                    @error('from_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" class="form-control filter-by-price" min="1" max="100000000" name="to_price" placeholder="{{ trans('user.product.to_price') }}" autocomplete="false" required>
                    @error('to_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control filter-by-price" value="{{ trans('user.product.filter') }}" id="btn-filter">
                </div>
            </form>
        </div>

        <div class="select_option">
            <p>{{ trans('user.product.choose_category') }}</p>
            <div class="select_option_list">{{ trans('user.product.category') }}</div>
            <div class="select_option_dropdown">
                @foreach ($categories as $category)
                    <p><a href="{{ route('productByCategory', [$category->id]) }}">{{ $category->name }}</a></p>
                @endforeach
            </div>
        </div>
    </div>
</div>
