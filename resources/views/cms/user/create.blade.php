@extends('cms.layout.index')
@section('content')
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Thêm mới</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Tài khoản
                                                        <span class="text-danger">(*)</span>
                                                    </label>
                                                    <input class="form-control" name="username" type="text"
                                                        placeholder="Nhập vào tài khoản" value="{{ old('username') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Email
                                                        <span class="text-danger">(*)</span>
                                                    </label>
                                                    <input class="form-control" name="email" type="email"
                                                        placeholder="Nhập vào email" value="{{ old('email') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Số điện thoại
                                                        <span class="text-danger">(*)</span>
                                                    </label>
                                                    <input class="form-control" name="phone" type="number"
                                                        placeholder="Nhập vào số điện thoại" value="{{ old('phone') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Mật khẩu
                                                        <span class="text-danger">(*)</span>
                                                    </label>
                                                    <input class="form-control" name="password" type="password"
                                                        placeholder="Nhập vào mật khẩu" value="{{ old('password') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Nhập lại mật khẩu
                                                        <span class="text-danger">(*)</span>
                                                    </label>
                                                    <input class="form-control" name="re_password" type="password"
                                                        placeholder="Nhắc lại mật khẩu" value="{{ old('re_password') }}">
                                                </div>
                                                @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        <div>
                                                            <span class="text-danger">(*)</span>
                                                            {{ $error }}
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="form-group">
                                                    <span class="text-danger">(*)</span>
                                                    Trường bắt buộc!
                                                </div>
                                                <div class="form-group float-right">
                                                    <button class="btn btn-primary" type="submit">Lưu lại</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
