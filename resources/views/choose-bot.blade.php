@extends('index')
@section('account')
    <ul>
        <li><a href="{{ URL::asset('profile') }}">{{ $user->name }}</a></li>
        <li><a class="custom-b" href="{{ URL::asset('logout') }}">Đăng xuất</a></li>
    </ul>
@endsection
@section('hide-account')
    <ul id="sidebar-nav" class="sidebar-nav">
        <li><a href="{{ URL::asset('profile') }}">
                <h4>{{ $user->name }}</h4>
            </a></li>
        <li><a href="{{ URL::asset('logout') }}">Đăng xuất</a></li>
    </ul>
@endsection
@section('main')
    <div class="main-product">
        <div class="container">
            <div class="row clearfix">

            </div>
            <div class="row clearfix">
                <div class="categories_link">
                    <a href="#">Chọn mức</a>
                    
                </div>
                <br><br>
                <div id="rooms">
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="{{URL::asset('bot-easy')}}">
                            <div class="box-img"><h4>Dễ</h4>
                                <img src="http://127.0.0.1:8000/img/1nguoi.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="{{URL::asset('bot-medium')}}">
                            <div class="box-img"><h4>Vừa</h4>
                                <img src="http://127.0.0.1:8000/img/1nguoi.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="{{URL::asset('bot-hard')}}">
                            <div class="box-img"><h4>Khó</h4>
                                <img src="http://127.0.0.1:8000/img/1nguoi.png">
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <footer>
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="footer-link-box clearfix">
                        <div class="left-f-box">
                            <div class="col-sm-6">
                                <h2>Bảng xếp hạng</h2>
                                <table class="table" style="color: rgb(255, 255, 255)">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Điểm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($charts as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->point}}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
@endsection