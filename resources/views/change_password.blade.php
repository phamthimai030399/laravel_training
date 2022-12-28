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
                                <h4 class="text-center mb-4">Nhập email xác minh tài khoản</h4>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="email" type="text" placeholder="Email xác minh"
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
                                {{-- @if (Session::has('message'))
                                    <div class="input-group mb-3">
                                        <span class="text-danger">{{ Session::get('message')['content'] }}</span>
                                    </div>
                                @endif --}}
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary px-4 ajax-login" type="submit">Xác nhận</button>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a href="{{ route('admin.login') }}">Cancel</a>
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
