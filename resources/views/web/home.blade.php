@include('layout')

@section('title', 'Thời trang mặc nhà cao cấp')

@section('content')
    <div class="content">
        <div class="carousel slide">
            <ul class="carousel-indicators">
                <li data-target="" data-slide-to="0" class="active"></li>
                <li data-target="" data-slide-to="1"></li>
                <li data-target="" data-slide-to="2"></li>
                <li data-target="" data-slide-to="3"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://file.hstatic.net/1000362084/file/banner_fbc4aa91828f42e0936a1e933efbff35.jpg"
                        alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://file.hstatic.net/1000362084/file/banner_fbc4aa91828f42e0936a1e933efbff35.jpg"
                        alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://file.hstatic.net/1000362084/file/banner_chinh_1903x1090_56f3fb1894e04dd0842d80515d09ba6c.png"
                        alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://file.hstatic.net/1000362084/file/banner_fbc4aa91828f42e0936a1e933efbff35.jpg"
                        alt="">
                </div>
            </div>
            <a class="carousel-control-prev" href="" data-slide="prev">
                <span class="carousel-control-btn carousel-control-prev-btn"></span>
            </a>
            <a class="carousel-control-next" href="" data-slide="next">
                <span class="carousel-control-btn carousel-control-next-btn"></span>
            </a>
        </div>
        <div>
            <div class="container">
                <div class="section-heading text-center">
                    <span>
                        <img src="https://file.hstatic.net/200000401437/file/fb1088de81e42c4e538967ec12cb5caa_24c3f22fd286428eaf97e5e0a042090d.png"
                            alt="">
                        <div>Hết hạn</div>
                    </span>
                    <a href="" class="view-all-collection">Xem tất cả</a>
                </div>
            </div>
            <div class="container">
                <div class="section-heading text-center">
                    <h2 class="Title">
                        <a href="">BEST SALLER</a>
                    </h2>
                    <a href="" class="view-all-collection">Xem tất cả</a>
                </div>
                <div class="section-content">
                    <div class="section-content-listproduct row">
                        {{-- @foreach ($best_saller as $item) --}}
                            <div class="product-loop col-md-3 col-sm-6 col-xs-6">
                                <div class="product-image">
                                    <div class="product-image-inner">
                                        <div class="prod-img">
                                            <div class="visible">
                                                <a href="">
                                                    <img src="https://product.hstatic.net/1000362084/product/btd090s21a_7bccb3f6491e4172b50b30d99cbd0852_large.png"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="visible-hover">
                                                <img src="https://product.hstatic.net/1000362084/product/btd090s21b_311b339c1bc64147a8037eb567c0df0c_large.png"
                                                    alt="">
                                                <div class="product-image-action">
                                                    <div class="icon-shopping">
                                                        <i class="fa-solid fa-bag-shopping"></i>
                                                    </div>
                                                    <div class="icon-search">
                                                        <i class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <p class="product-vendor">
                                            <a href="">VINCY</a>
                                        </p>
                                        <p class="product-quickview">
                                            {{-- <a href="">{{ $item->name }}</a> --}}
                                        </p>
                                        <p class="product-price">
                                            {{-- <span>{{ $item->price . ' VNĐ' }}</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
                <div class="swaplist-buton">
                    <a href="" class="buton btn-collection">
                        XEM THÊM SẢN PHẨM
                        <b>BEST SALLER</b>
                    </a>
                </div>
            </div>
            {{-- @foreach ($categories as $category) --}}
                <div class="container">
                    <div class="section-heading text-center">
                        <h2 class="Title">
                            {{-- <a href="">{{ $category->name }}</a> --}}
                        </h2>
                        <a href="" class="view-all-collection">Xem tất cả</a>
                    </div>
                    <div class="section-content">
                        <div class="section-content-listproduct row">
                            {{-- @foreach ($category->products as $product) --}}
                                <div class="product-loop col-md-3 col-sm-6 col-xs-6">
                                    <div class="product-image">
                                        <div class="product-image-inner">
                                            <div class="prod-img">
                                                <div class="visible">
                                                    <a href="">
                                                        <img src="https://product.hstatic.net/1000362084/product/btd090s21a_7bccb3f6491e4172b50b30d99cbd0852_large.png"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="visible-hover">
                                                    <img src="https://product.hstatic.net/1000362084/product/btd090s21b_311b339c1bc64147a8037eb567c0df0c_large.png"
                                                        alt="">
                                                    <div class="product-image-action">
                                                        {{-- <div class="icon-shopping" data-name="{{ $product->name }}" data-id="{{ $product->id }}" data-price="{{ $product->price }}" >
                                                            <i class="fa-solid fa-bag-shopping"></i>
                                                        </div> --}}
                                                        <div class="icon-search">
                                                            <i class="fa fa-search"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-detail">
                                            <p class="product-vendor">
                                                <a href="">VINCY</a>
                                            </p>
                                            <p class="product-quickview">
                                                {{-- <a href="">{{ $product->name }}</a> --}}
                                            </p>
                                            <p class="product-price">
                                                {{-- <span>{{ $product->price . ' VNĐ' }}</span> --}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                    <div class="swaplist-buton">
                        <a href="" class="buton btn-collection">
                            {{-- XEM THÊM SẢN PHẨM {{ $category->name }} --}}
                        </a>
                    </div>
                </div>
            {{-- @endforeach; --}}

        </div>
        <div class="container" style="background-color: #fff;">
            <div class="section-heading">
                <h2 class="Title">
                    <a href="">TIN TỨC</a>
                </h2>
            </div>
            <div class="section-content">
                <div class="list-blog row">
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail col-sm-4">
                        <div class="blog-article row">
                            <div class="blog-article-image col-sm-3">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000362084/article/thumbnail_kid_59702d26564d4c6ab54119725f567241_small.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-article-item col-sm-9">
                                <a href="">CHƯƠNG TRÌNH KHUYẾN MẠI CHO BÉ THÁNG 7 "MUA ĐỒ CHO BÉ - SALE LỚN CHO
                                    MẸ"</a>
                                <p>11/07/2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="font-size: 11px; padding-bottom: 15px;">
                <a href="">Xem các bài viết khác >> </a>
            </div>
        </div>
    </div>

@stop
