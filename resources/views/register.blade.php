<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="{{URL::asset('post-register')}}" method="post">
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="password" name="password">
        <input type="submit" value="submit">
    </form>
</body>
</html>