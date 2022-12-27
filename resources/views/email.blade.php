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
        <div>
            <h2>Xác thực tài khoản</h2>
            <p> Bạn vui lòng click vào link bên dưới để xác minh tài khoản.</p>
            <p> <a href="{{$data['url']}}">{{$data['url']}}</a></p>
         </div>
    </div>
    <script src="{{ url('cms/js/coreui/coreui.bundle.min.js') }}"></script>
</body>

</html>
