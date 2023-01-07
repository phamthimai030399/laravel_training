@extends('cms.layout.index')
@section('content')
    <div class="fade-in">
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <form action="{{ route('admin.user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Thay đổi thông tin tài khoản</strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Tài khoản
                                                            <span class="text-danger">:</span>
                                                            <strong>{{ $item->username }}</strong>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Email
                                                            <span class="text-danger">(*)</span>
                                                        </label>
                                                        <input class="form-control" name="email" type="email"
                                                            placeholder="Nhập vào email" value="{{ $item->email }}">
                                                            @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Số điện thoại</label>
                                                        <input class="form-control" name="phone" type="number"
                                                            placeholder="Nhập vào số điện thoại"
                                                            value="{{ $item->phone }}">
                                                            @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
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
