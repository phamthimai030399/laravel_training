<div class="header">
    <div class="top-header text-center bg-top-header">
        <span class="text-white promotion-text">Khuyến mãi khủng giảm tới 10% tất cả các sản phẩm </span>
    </div>
    <div class="bottom-header ">
        <div class="container">
            <nav class="navbar navbar-expand-sm row p-0">
                <div class="navbar-image col-sm-2">
                    <a href="{{ route('client.home') }}">
                        <img src="https://file.hstatic.net/1000362084/file/logo_a4ed9d56b890453aa8df3b2f2a6d5887.png"
                            alt="">
                    </a>
                </div>
                <div class="col-sm-9">
                    <ul class="navbar-nav">
                        @php
                            $menus = [
                                (object) [
                                    'name' => 'Nam',
                                    'link' => 'nam',
                                ],
                                (object) [
                                    'name' => 'Nữ',
                                    'link' => 'nam',
                                ],
                                (object) [
                                    'name' => 'Trẻ em',
                                    'link' => 'nam',
                                ],
                                (object) [
                                    'name' => 'Gia đình',
                                    'link' => 'nam',
                                ],
                            ];
                        @endphp
                        @foreach ($menus as $menu)
                            <li class=""><a class="navbar-link" href="{{ $menu->link }}">{{ $menu->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-1">
                    <i class="fa fa-search"></i>
                    <i class="fa fa-cart-shopping"></i>
                </div>
            </nav>
        </div>
    </div>
</div>
