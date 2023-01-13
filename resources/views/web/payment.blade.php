@extends('web.layout.layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container my-4">
        <div class="row mt-3 justify-content-md-center">
            <div class="col-6 border p-3">
                <h3>Thông tin thanh toán</h3>
                <form method="POST">
                    <div class="form-group">
                        <label for="fullname">Họ và tên:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" 
                            value="{{ old('fullname') }}">
                        @error('fullname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" 
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Điện thoại:</label>
                        <input type="text" class="form-control" id="phone" name="phone" 
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address" 
                            value="{{ old('address') }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (Session::has('message'))
                        <div class="form-group">
                            <span class="text-danger">{{ Session::get('message') }}</span>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Mua hàng</button>
                </form>
            </div>

        </div>
    </div>
@stop
