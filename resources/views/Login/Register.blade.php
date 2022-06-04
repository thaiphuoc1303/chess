<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
    <title>Đăng ký</title>
    <style>
        html {
            background: url('{{ URL::asset('img/login_background.jpg') }}') no-repeat center center fixed;
        }

    </style>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active">Đăng ký</h2>
            <!-- Login Form -->
            <form action="{{ url::asset('post-register') }}" method="POST">
                @csrf
                <input type="text" class="fadeIn second" name="name" placeholder="Tên">
                @if ($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
                <input type="text" class="fadeIn second" name="email" placeholder="Email">
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
                <input type="password" class="fadeIn third" name="password" placeholder="Mật khẩu">
                @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
                <input type="submit" class="fadeIn fourth" value="Đăng ký">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="{{ url::asset('login') }}">Đăng nhập</a>
            </div>

        </div>
    </div>
</body>

</html>
