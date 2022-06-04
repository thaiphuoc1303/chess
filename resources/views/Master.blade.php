<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Chess Online">
    <meta name="description" content="Game cờ vua online, Ai">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href=" {{ URL::asset('chess/CSS/style.css') }}">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>

<body>
    <div id="content">
        <div class="container">
            <div>
                <div class="">@yield('header-page')</div>
            </div>
            <div style="" class="
                    main">@yield('table')</div>
            </div>
        </div>
        <div class="chat-box">
            @yield('chat-box')
        </div>
        {{-- <script>
        var v = new Vue({
            el: "#content"
        })
    </script> --}}
</body>

</html>
