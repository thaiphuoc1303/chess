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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
@endsection
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
    <div class="page-content-product">
        <div class="main-product">
            <div class="container">
                <div class="row clearfix">

                </div>
                <div class="row clearfix">
                    <div class="categories_link">
                        <a href="{{ URL::asset('create-room') }}">Tạo phòng Online</a>
                    </div>
                    <br><br>
                    <div id="rooms">

                    </div>
                    <div class="categories_link">
                        <a href="{{ URL::asset('bot') }}">Chơi với máy</a>
                    </div>
                    <div>

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
                                            <th>Số trận thắng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($charts as $item)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ URL::asset('profile') }}/{{ $item->id }}">{{ $item->name }}</a>
                                                </td>
                                                <td>{{ $item->point }}</td>
                                                <td> {{$item->win}} </td>
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
@section('script')
    <script type="module" src="{{ URL::asset('js/firebase/room.js') }}"></script>
    <script src="{{ URL::asset('theme/js/jquery-1.12.4.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/slick.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/wow.min.js') }}"></script>
@endsection
