@extends('web.layout.layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container my-4">
        <div class="row mt-3 justify-content-md-center"">
            <div class="col-6 border p-3">
                <h3>Đăng nhập</h3>
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Tài khoản:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            required value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" class="form-control" id="password"
                            name="password" required value="{{ old('password') }}">
                    </div>
                    @if (Session::has('message'))
                        <div class="form-group">
                            <span class="text-danger">{{ Session::get('message')['content'] }}</span>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    <a href="{{ route('client.register') }}">Đăng ký tài khoản</a>
                </form>
            </div>

        </div>
    </div>
@stop
