@foreach ($products as $product)
    <div class="product-loop col-md-3 col-sm-6 col-xs-6">
        <div class="product-image">
            <div class="product-image-inner">
                <div class="prod-img">
                    <div class="visible">
                        <a href="">
                            <img src="{{ asset($product->image);}}"
                                alt="">
                        </a>
                    </div>
                    <div class="visible-hover">
                        <img src="{{ asset($product->image_detail);}}"
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
