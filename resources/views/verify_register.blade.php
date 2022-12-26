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
                @if (empty($token))
                    <p>Token không hợp lệ, vui lòng kiểm tra lại</p>
                @else
                    <p>Chúc mừng bạn đã xác thực thành công. Click <a href="{{ route('admin.login') }}">vào đây để đăng
                            nhập</a></p>
                @endif
            </div>
        </div>
    </div>
    <script src="{{ url('cms/js/coreui/coreui.bundle.min.js') }}"></script>
</body>

</html>
