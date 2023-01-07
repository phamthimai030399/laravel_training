@extends('layout')

@section('title', 'Đồ Bộ Nữ')

@section('content')
    <div class="womem_detail">
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
                <li class="item-breadcrumb">
                    <a href="">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="item-breadcrumb">
                    <a href="">
                        <span>ĐỒ BỘ NỮ</span>
                    </a>
                </li>
            </ol>
        </div>
        <div class="banner-detail">
            <img src="https://file.hstatic.net/1000362084/collection/2_banner_web_phuong_nhi_1520_x_336__515b8bc90d714455be5d51f38fb1368e.png"
                alt="">
        </div>
        <div class="bgwhite-heading">
            <div class="layered-filter row">
                <div class="col-md-9">
                    <h1>ĐỒ BỘ NỮ</h1>
                </div>
                <div class="filter-menu col-md-3">
                    <div class="visible">
                        <a href="">
                            <div class="title-filter row">
                                <p class="col-md-10">
                                    <span><i class="fa-solid fa-arrow-down-a-z"></i></span>
                                    <span>Sắp xếp</span>
                                </p>
                                <p class="col-md-2">
                                    <span><i class="fa-solid fa-sort-down"></i></span>
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="visible-hover">
                        <div class="title-hover">
                            <ul class="item-hover">
                                <a href="">
                                    <li>Sản phẩm nổi bật</li>
                                </a>
                                <a href="">
                                    <li>Gía: giảm dần </li>
                                </a>
                                <a href="">
                                    <li>Gía: tăng dần </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="section-content">
            <div class="section-content-listproduct row">
                @foreach ($products as $product)
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
                                        <a href="">
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
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail">
                                <p class="product-vendor">
                                    <a href="">VINCY</a>
                                </p>
                                <p class="product-quickview">
                                    <a href="">{{ $product->name }}</a>
                                </p>
                                <p class="product-price">
                                    <span>{{ $product->price . ' VNĐ' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
