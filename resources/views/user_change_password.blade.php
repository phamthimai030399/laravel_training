@extends('cms.layout.index')
@section('content')
    <div class="fade-in">
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Thay đổi mật khẩu</strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Tài khoản
                                                            <span class="text-danger">:</span>
                                                            <strong>{{$item->username}}</strong>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Nhập mật khẩu mới
                                                            <span class="text-danger">(*)</span>
                                                        </label>
                                                        <input class="form-control" name="password" type="password"
                                                            placeholder="Nhập vào mật khẩu mới" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Nhập lại mật khẩu
                                                            <span class="text-danger">(*)</span> 
                                                        </label>
                                                        <input class="form-control" name="re_password" type="password"
                                                            placeholder="Nhập lại mật khẩu"
                                                            value="">
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
    </div>
@endsection
