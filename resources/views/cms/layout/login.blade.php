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
                        <form method="post" action="">
                            @csrf
                            <div class="card-body">
                                <h1 class="text-center mb-4">Đăng nhập</h1>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><svg class="c-icon">
                                                <use xlink:href="{{ asset('image/icon-svg/free.svg#cil-user') }}"></use>
                                            </svg></span>
                                    </div>
                                    <input class="form-control" name="username" type="text" placeholder="Tài khoản"
                                        value="{{ old('username') }}">
                                </div>
                                {{-- @if ($errors->has('username'))
                                    @foreach ($errors->all() as $error)
                                    <div>
                                        <span class="text-danger">(*)</span>
                                        {{ $error}}
                                    </div>
                                    @endforeach
                                @endif --}}
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
                                        <button class="btn btn-primary px-4 ajax-login" type="submit">Đăng
                                            nhập</button>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a href="{{ route('admin.register') }}">Đăng kí tài khoản</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('cms/js/coreui/coreui.bundle.min.js') }}"></script>
</body>
</html>
