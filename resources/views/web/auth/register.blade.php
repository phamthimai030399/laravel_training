@extends('web.layout.layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container my-4">
        <div class="row mt-3 justify-content-md-center"">
            <div class="col-6 border p-3">
                <h3>Đăng ký tài khoản</h3>
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Tài khoản:</label>
                        <input type="text" class="form-control" id="username" name="username" required
                            value="{{ old('username') }}">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" required
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Điện thoại:</label>
                        <input type="text" class="form-control" id="phone" name="phone" required
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address" required
                            value="{{ old('address') }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password" required
                            value="">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="re_password">Xác nhận mật khẩu:</label>
                        <input type="password" class="form-control" id="re_password" name="re_password" required
                            value="">
                        @error('re_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if (Session::has('message'))
                        <div class="form-group">
                            <span class="text-danger">{{ Session::get('message')['content'] }}</span>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('client.register') }}">Đăng ký tài khoản</a>
                </form>
            </div>

        </div>
    </div>
@stop
