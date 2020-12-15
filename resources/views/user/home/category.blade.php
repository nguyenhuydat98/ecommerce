<section class="category-area section-padding30" id="wrap-category-in-home-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle">
                    <h4 class="title">Danh Mục</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-xl-3">
                    <div class="single-category mb-30">
                        <div class="category-img">
                            <img src="{{ asset('storage/category.jpg') }}" alt="">
                            <div class="category-caption">
                                <span class="best"><a href="{{ route('productByCategory', [$category->id]) }}">{{ $category->name }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
