@extends('web.layout.layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container my-4">
        <div class="row">
            <h3>Giỏ hàng</h3>
        </div>
        <div class="row mt-3">
            <form action="" method="POST" style="width:100%">

                <table class="table table-bordered">
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                    @foreach ($carts as $key => $cartItem)
                        <tr>
                            <td>
                                {{ $cartItem->product->product_code }}
                            </td>
                            <td>{{ $cartItem->product->product_name }}</td>
                            <td style="width: 100px">
                                <input class="form-control" type="number" value="{{ $cartItem->quantity }}"
                                    name="cart[{{ $key }}][quantity]">
                                <input type="hidden" value='{{ $cartItem->product->id }}'
                                    name="cart[{{ $key }}][product_id]">
                            </td>
                            <td>{{ moneyFormat($cartItem->product->price) }}</td>
                            <td>{{ moneyFormat($cartItem->product->price * $cartItem->quantity) }}</td>
                        </tr>
                    @endforeach
                </table>
                <div>Tổng: <span
                        class="text-danger font-weight-bold">{{ moneyFormat(
                            array_reduce($carts->toArray(), function ($result, $item) {
                                return $result + $item['quantity'] * $item['product']['price'];
                            }),
                        ) }}</span>
                </div>
                <div class="text-right w-100">
                    <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
                    <a href="" class="btn btn-success">Thanh toán</a>
                </div>
            </form>
        </div>
    </div>
@stop
