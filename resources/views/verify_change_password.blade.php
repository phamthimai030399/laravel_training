<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Đăng nhập Vincy</title>
    <link rel="icon" href="{{ asset('image/favicon.jpeg') }}" sizes="32x32">
    <link rel="stylesheet" href="{{ url('cms/css/coreui/coreui.min.css') }}">
</head>

<body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-group mb-5">
                    <div class="card p-4">
                        @if (empty($token))
                            <p>Token không hợp lệ, vui lòng kiểm tra lại</p>
                        @elseif ($token->is_expried)
                            <p>Token đã hết hạn</p>
                        @else
                            <form method="post" action="">
                                @csrf
                                <div class="card-body">
                                    <h4 class="text-center mb-4">Nhập mật khẩu thay đổi</h4>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg class="c-icon">
                                                    <use
                                                        xlink:href="{{ asset('image/icon-svg/free.svg#cil-lock-locked') }}">
                                                    </use>
                                                </svg></span>
                                        </div>
                                        <input class="form-control" name="password" type="password" placeholder="Mật khẩu"
                                            value="{{ old('password') }}">
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg class="c-icon">
                                                    <use
                                                        xlink:href="{{ asset('image/icon-svg/free.svg#cil-lock-locked') }}">
                                                    </use>
                                                </svg></span>
                                        </div>
                                        <input class="form-control" name="re_password" type="password"
                                            placeholder="Nhập lại mật khẩu" value="{{ old('re_password') }}">
                                    </div>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div>
                                                <span class="text-danger">(*)</span>
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                    @if (Session::has('message'))
                                    <div class="input-group mb-3">
                                        <span class="text-danger">{{ Session::get('message')['content'] }}</span>
                                    </div>
                                @endif
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary px-4 ajax-login" type="submit">Xác
                                                nhận</button>
                                        </div>
                                        <div class="col-12 text-center">
                                            <a href="{{ route('admin.login') }}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('cms/js/coreui/coreui.bundle.min.js') }}"></script>
</body>


</html>
