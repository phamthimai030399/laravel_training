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
                        <img src="https://product.hstatic.net/1000362084/product/btd090s21b_311b339c1bc64147a8037eb567c0df0c_large.png"
                            alt="">
                        <div class="product-image-action text-center">
                            @if (Auth::check())
                                <div class="icon-shopping btn-add-cart" data-product-id="{{ $product->id }}">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-detail">
                <p class="product-vendor">
                    <a href="">VINCY</a>
                </p>
                <p class="product-quickview">
                    <a href="{{ route('client.product', $product->id) }}">{{ $product->product_name }}</a>
                </p>
                <p class="product-price">
                    <span>{{ moneyFormat($product->price) }}</span>
                </p>
            </div>
        </div>
    </div>
@endforeach
