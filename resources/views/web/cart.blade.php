@extends('web.layout.layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container my-4">
        <div class="row">
            <h3>Giỏ hàng</h3>
        </div>
        <div class="row mt-3">
            <table>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
                <tr>
                    <td>
                        HGHGy23423
                    </td>
                    <td>Bộ satin lửng</td>
                    <td><input type="number" value='2'></td>
                    <td>{{ moneyFormat(5000000) }}</td>
                    <td>{{ moneyFormat(5000000 * 2) }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
