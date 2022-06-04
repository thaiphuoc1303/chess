<div class="thongbao-gameover" onclick="clearthongbao()">
    <div class="container">
        <div class="row">
            <div style="padding-top: 10%">
                <div style="background-color: rgba(255, 255, 255, 0.849)">
                    <div class="profile-box banner-p">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-b" style="min-height: 200px">
                                        {{-- <img style="max-height: 200px" src="{{ URL::asset('img/background') }}/{{$user->background}}" alt="#" /> --}}
                                        <div style="background-image: url('{{ URL::asset('img/background') }}/{{ $player->background }}'); 
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
                                                <div
                                                    style="background-image: url('{{ URL::asset('img/avatar') }}/{{ $player->avatar }}'); background-size:cover; background-repeat:no-repeat; width:170px; height:170px;">
                                                </div>
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
                                                    <li class="active"><a href="#tab1default"
                                                            data-toggle="tab">Điểm:
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
                                                                        <a href="{{ url::asset('profile') }}/"><img
                                                                                width="32" src="" alt="">
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
                </div>
            </div>
        </div>
    </div>


</div>
