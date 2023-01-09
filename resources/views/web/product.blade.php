@extends('web.layout.layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container my-4">
        <div class="row">
            <a href="{{route('client.category',  $product->category->id)}}}">{{ $product->category->category_name }}</a> > <span>{{ $product->product_name }}</span>
        </div>
        <div class="row mt-3">
            <div class="col-5 text-center border p-3">
                <img src="{{ asset($product->image);}}"
                    alt="" style="height: 400px; width: auto">
            </div>
            <div class="col-7">
                <p>{{ $product->product_name }}</p>
                <h3 class="text-danger font-weight-bold">{{ moneyFormat($product->price) }}</h3>
                <p>
                    Mô tả về sản phẩm
                </p>
                <button class="btn btn-primary btn-add-cart" data-product-id="{{ $product->id }}">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>
@stop
