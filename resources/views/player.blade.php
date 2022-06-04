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
    <div id="thongbao">
        
    </div>
    <div class="profile-box banner-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-b" style="min-height: 200px">
                        {{-- <img style="max-height: 200px" src="{{ URL::asset('img/background') }}/{{$user->background}}" alt="#" /> --}}
                        <div style="background-image: url('{{ URL::asset('img/background') }}/{{$player->background}}'); 
                        background-size:cover; background-repeat:no-repeat; height:250px;"></div>
                        <div class="dit-p">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="profile-left-b">

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-profile-box">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 pr">
                    <div class="profile-pro-left">
                        <div class="left-profile-box-m">
                            <div class="pro-img">
                                <div style="background-image: url('{{ URL::asset('img/avatar') }}/{{$player->avatar}}'); background-size:cover; background-repeat:no-repeat; width:170px; height:170px;"></div>
                                {{-- <img width="200px" height="200px" src="{{ URL::asset('img/avatar') }}/"
                                    alt=" {{$user->avatar}} " /> --}}
                            </div>
                            <div class="pof-text center" style="text-align: center;">
                                <h3 style="display: inline-block;">{{ $player->name }}</h3>
                                {{-- <div class="check-box"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-sm-8">
                    <div class="profile-pro-right">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="nav nav-tabs pull-left">
                                    <li class="active"><a href="#tab1default" data-toggle="tab">Điểm:
                                            <span>{{ $player->point }}</span></a></li>
                                    <li>
                                        <a href="#tab2default" data-toggle="tab">
                                            Số trận:
                                            <span>{{ $player->count }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3default" data-toggle="tab">
                                            Số trận thắng:
                                            <span>{{ $player->win }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-tabs pull-right right-t">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1default">
                                        <div class="furniture-right">
                                            <h3>Bạn bè</h3>
                                            <div class="right-list-f">
                                                <ul>
                                                    <li>
                                                        <a href="{{ url::asset('profile') }}/"><img width="32" src=""
                                                                alt="">
                                                            Thai Van Phuoc
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ url::asset('js/profile.js') }}"></script>
@endsection
