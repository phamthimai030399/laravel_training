@extends('web.layout.layout')

@section('title', 'Thời trang mặc nhà cao cấp')

@section('content')
    <div class="content">
        <div class="carousel slide">
            <ul class="carousel-indicators">
                <li data-target="" data-slide-to="0" class="active"></li>
                <li data-target="" data-slide-to="1"></li>
                <li data-target="" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://file.hstatic.net/1000362084/file/z3922927016926_cbf6537dbe5d1295f4397575152aed3c_46aecdc4c85f4c6c9f53f20787d925bb.jpg"
                        alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://file.hstatic.net/1000362084/file/z3745116746525_a54906861d3ab0c5160c4eed5ddb2fdd_68812563593540489036cd172043cdce.jpg"
                        alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://file.hstatic.net/1000362084/file/slide__1__0d2d87e9ae054234aa2cafb09e3da531.jpg"
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
            @foreach ($categories as $category)
                <div class="container">
                    <div class="section-heading text-center">
                        <h2 class="Title">
                            <a href="">{{ $category->category_name }}</a>
                        </h2>
                        <a href="{{ route('client.category', $category->id) }}" class="view-all-collection">Xem tất cả</a>
                    </div>
                    <div class="section-content">
                        <div class="section-content-listproduct row">
                            @include('web.list_product', ['products' => $category->products])
                        </div>
                    </div>
                    <div class="swaplist-buton">
                        <a href="{{ route('client.category', $category->id) }}" class="buton btn-collection">
                            XEM THÊM SẢN PHẨM {{ $category->name }}
                        </a>
                    </div>
                </div>
            @endforeach;

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
