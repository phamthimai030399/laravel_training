<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ư, initial-scale=1.0">
    <title>VINCY - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e71fd5c678.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/common.js')}}"></script>
    <script src="{{asset('js/giohang.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/vincy.css') }}">
</head>

<body>
    <div class="header">
        <div class="top-header text-center bg-top-header">
            <span class="text-white promotion-text">Khuyến mãi khủng giảm tới 10% tất cả các sản phẩm </span>
        </div>
        <div class="bottom-header ">
            <div class="container">
                <nav class="navbar navbar-expand-sm row p-0">
                    <div class="navbar-image col-sm-2">
                        <img src="https://file.hstatic.net/1000362084/file/logo_a4ed9d56b890453aa8df3b2f2a6d5887.png"
                            alt="">
                    </div>
                    {{-- <div class="col-sm-9">
                        <ul class="navbar-nav">
                            @foreach ($menus as $menu)
                                <li class="{{ $menu->name == $menuActive ? 'active' : '' }}"><a class="navbar-link"
                                        href="{{ $menu->link }}">{{ $menu->name }}</a></li>
                            @endforeach
                        </ul>
                    </div> --}}
                    <div class="col-sm-1">
                        <i class="fa fa-search"></i>
                        <i class="fa fa-cart-shopping"></i>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>
