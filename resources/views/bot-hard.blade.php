@extends('index')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('theme/css/font-awesome.min.css') }}">
    <!--bootstrap css-->
    <link rel="stylesheet" href="{{ URL::asset('theme/css/bootstrap.min.css') }}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ URL::asset('theme/css/animate-wow.css') }}">
    <!--main css-->
    <link rel="stylesheet" href="{{ URL::asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('theme/css/slick.min.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ URL::asset('theme/css/responsive.css') }}">

    <link rel="stylesheet" href=" {{ URL::asset('chess/CSS/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/chessboard-0.3.0.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/chessAI.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
@endsection
@section('title')
    Máy Khó
@endsection
@section('account')
    <ul>
        <li><a href="#">{{ $user->name }}</a></li>
        <li><a class="custom-b" href="{{ URL::asset('logout') }}">Đăng xuất</a>
        </li>
    </ul>
@endsection
@section('players')
    <div class="nav-box">
        <ul>
            <li>
                <a href="{{ URL::asset('home') }}">Trang chủ</a>
            </li>
        </ul>
    </div>
@endsection
@section('hide-account')
    <ul id="sidebar-nav" class="sidebar-nav">
        <li><a href="#">
                <h4>{{ $user->name }}</h4>
            </a></li>
        <li><a href="{{ URL::asset('logout') }}">Đăng xuất</a></li>
    </ul>
@endsection
@section('main')
    <div class="page-content-product">
        <div class="container">
            <div class="col-md-9">
                <div id="batdau" style="text-align: center" class="col-md-12">
                    <h3>Chơi với máy mức Khó</h3>
                    <br><br>
                    <button type="button" onclick="batdau()" id="batdau" class="btn hard btn-success btn-sm">Bắt đầu</button>
                </div>
                <br>
                <div id="board" style="width: 600px"></div>
            </div>
        </div>

    </div>

@endsection
@section('footer')
<br>
    <div style="display: none" id="restart" class="restartGame">
        <button type="button" onclick="restart()" class="btn  btn-danger btn-sm">Restart</button>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src='{{ URL::asset('js/lib/chessboard-0.3.0.js') }}'> </script>
    <script type="text/javascript" src='{{ URL::asset('js/lib/chess.js') }}'> </script>
    <script type="text/javascript" src="{{ URL::asset('js/chessAI.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('chess/JS/Function.js') }}"></script>
@endsection