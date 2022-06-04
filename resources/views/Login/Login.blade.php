<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
    <title>Login</title>
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
            <h2 class="active">Đăng nhập</h2>
            <!-- Login Form -->
            <form method="POST" action="{{ url::asset('post-login') }}">
                @csrf
                <input type="text" class="fadeIn second" name="email" placeholder="Email">
                <h6>
                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                </h6>
                <input type="password" class="fadeIn third" name="password" placeholder="Mật khẩu">
                <h6>
                    @if ($errors->has('password'))
                        {{ $errors->first('password') }}
                    @endif
                </h6>
                <input type="submit" class="fadeIn fourth" value="Đăng nhập">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="{{ url::asset('register') }}">Đăng ký</a>
            </div>

        </div>
    </div>
</body>

</html>
