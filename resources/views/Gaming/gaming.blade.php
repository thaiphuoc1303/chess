<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{URL::asset('img/logo.png')}}" type="image/x-icon">
    <!--enable mobile device-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--fontawesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    {{-- <link rel="stylesheet" href="{{ URL::asset('theme/css/font-awesome.min.css') }}"> --}}
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
</head>

<body onload="VeBanCoTrangDen()">
    <div id="thongbao">

    </div>
    <header id="header" class="top-head">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="row">
                    <div class="left-rs">
                        <div class="navbar-header">
                            <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>

                        <div style="margin-top: 10px">
                            <div style="float: left; margin-left: 10%; text-align: center">
                                <div>
                                    <h4 onclick="ajaxprofile({{$player1->id}})"><b>{{ $player1->name }}</b></h4>
                                </div>
                                <div class="demnguoc">
                                    <b id="phut">20</b>
                                    :
                                    <b id="giay">00</b>
                                </div>
                            </div>
                            <div id="status" style="margin-left: 5%; text-align: center; float: left;">

                            </div>
                            <div style="float: left; margin-left: 5%; text-align: center">
                                <div id="player2">
                                    @if (isset($player2))
                                        <h4 onclick="ajaxprofile({{$player2->id}})">
                                            <b>
                                                {{ $player2->name }}
                                            </b>
                                        </h4>
                                    @endif
                                </div>
                                <div class="demnguoc">
                                    <b id="phut">20</b>
                                    :
                                    <b id="giay">00</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-nav">

                        <div class="nav-b hidden-xs">
                            <div class="nav-box">
                                {{-- @yield('account') --}}
                                <ul>
                                    <li><a href="{{URL::asset('profile')}}">{{ $user->name }}</a></li>
                                    <li><a class="custom-b" href="{{ URL::asset('logout') }}">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.container-fluid -->
        </nav>
    </header>

    <div id="sidebar" class="top-nav">
        {{-- @yield('hide-account') --}}
        <ul id="sidebar-nav" class="sidebar-nav">
            <li><a href="{{URL::asset('profile')}}">
                    <h4>{{ $user->name }}</h4>
                </a></li>
            <li><a href="{{ URL::asset('logout') }}">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="page-content-product">
        {{-- @yield('main') --}}
        <script type="text/javascript" src="{{ URL::asset('chess/JS/scripts.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/Sources.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/KhoiTao.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/Function.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/XacDinhDuongDi/Tot.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/XacDinhDuongDi/Vua.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/XacDinhDuongDi/Xe.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/XacDinhDuongDi/Tuong.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/XacDinhDuongDi/Ma.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('chess/JS/XacDinhDuongDi/Hau.js') }}"></script>

        <div class="main-product" style="overflow: hidden; padding: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="divBanCo">
                            <input id="idplayer" type="hidden" value="{{ $user->id }}">
                            <input id="idroom" type="hidden" value="{{ $room->id }}">
                            <input id="luot" type="hidden" value="">
                            <input id="quan" type="hidden" value="{{ $quan }}">
                            <input id="click" type="hidden" value="0">
                            <table id="BanCo">
                                <tr>
                                    <td id="11" piece="0" onclick="Click(this.id)"><img id="i11" /></td>
                                    <td id="12" piece="0" onclick="Click(this.id)"><img id="i12" /></td>
                                    <td id="13" piece="0" onclick="Click(this.id)"><img id="i13" /></td>
                                    <td id="14" piece="0" onclick="Click(this.id)"><img id="i14" /></td>
                                    <td id="15" piece="0" onclick="Click(this.id)"><img id="i15" /></td>
                                    <td id="16" piece="0" onclick="Click(this.id)"><img id="i16" /></td>
                                    <td id="17" piece="0" onclick="Click(this.id)"><img id="i17" /></td>
                                    <td id="18" piece="0" onclick="Click(this.id)"><img id="i18" /></td>
                                </tr>
                                <tr>
                                    <td id="21" piece="0" onclick="Click(this.id)"><img id="i21" /></td>
                                    <td id="22" piece="0" onclick="Click(this.id)"><img id="i22" /></td>
                                    <td id="23" piece="0" onclick="Click(this.id)"><img id="i23" /></td>
                                    <td id="24" piece="0" onclick="Click(this.id)"><img id="i24" /></td>
                                    <td id="25" piece="0" onclick="Click(this.id)"><img id="i25" /></td>
                                    <td id="26" piece="0" onclick="Click(this.id)"><img id="i26" /></td>
                                    <td id="27" piece="0" onclick="Click(this.id)"><img id="i27" /></td>
                                    <td id="28" piece="0" onclick="Click(this.id)"><img id="i28" /></td>
                                </tr>
                                <tr>
                                    <td id="31" piece="0" onclick="Click(this.id)"><img id="i31" /></td>
                                    <td id="32" piece="0" onclick="Click(this.id)"><img id="i32" /></td>
                                    <td id="33" piece="0" onclick="Click(this.id)"><img id="i33" /></td>
                                    <td id="34" piece="0" onclick="Click(this.id)"><img id="i34" /></td>
                                    <td id="35" piece="0" onclick="Click(this.id)"><img id="i35" /></td>
                                    <td id="36" piece="0" onclick="Click(this.id)"><img id="i36" /></td>
                                    <td id="37" piece="0" onclick="Click(this.id)"><img id="i37" /></td>
                                    <td id="38" piece="0" onclick="Click(this.id)"><img id="i38" /></td>
                                </tr>
                                <tr>
                                    <td id="41" piece="0" onclick="Click(this.id)"><img id="i41" /></td>
                                    <td id="42" piece="0" onclick="Click(this.id)"><img id="i42" /></td>
                                    <td id="43" piece="0" onclick="Click(this.id)"><img id="i43" /></td>
                                    <td id="44" piece="0" onclick="Click(this.id)"><img id="i44" /></td>
                                    <td id="45" piece="0" onclick="Click(this.id)"><img id="i45" /></td>
                                    <td id="46" piece="0" onclick="Click(this.id)"><img id="i46" /></td>
                                    <td id="47" piece="0" onclick="Click(this.id)"><img id="i47" /></td>
                                    <td id="48" piece="0" onclick="Click(this.id)"><img id="i48" /></td>
                                </tr>
                                <tr>
                                    <td id="51" piece="0" onclick="Click(this.id)"><img id="i51" /></td>
                                    <td id="52" piece="0" onclick="Click(this.id)"><img id="i52" /></td>
                                    <td id="53" piece="0" onclick="Click(this.id)"><img id="i53" /></td>
                                    <td id="54" piece="0" onclick="Click(this.id)"><img id="i54" /></td>
                                    <td id="55" piece="0" onclick="Click(this.id)"><img id="i55" /></td>
                                    <td id="56" piece="0" onclick="Click(this.id)"><img id="i56" /></td>
                                    <td id="57" piece="0" onclick="Click(this.id)"><img id="i57" /></td>
                                    <td id="58" piece="0" onclick="Click(this.id)"><img id="i58" /></td>
                                </tr>
                                <tr>
                                    <td id="61" piece="0" onclick="Click(this.id)"><img id="i61" /></td>
                                    <td id="62" piece="0" onclick="Click(this.id)"><img id="i62" /></td>
                                    <td id="63" piece="0" onclick="Click(this.id)"><img id="i63" /></td>
                                    <td id="64" piece="0" onclick="Click(this.id)"><img id="i64" /></td>
                                    <td id="65" piece="0" onclick="Click(this.id)"><img id="i65" /></td>
                                    <td id="66" piece="0" onclick="Click(this.id)"><img id="i66" /></td>
                                    <td id="67" piece="0" onclick="Click(this.id)"><img id="i67" /></td>
                                    <td id="68" piece="0" onclick="Click(this.id)"><img id="i68" /></td>
                                </tr>
                                <tr>
                                    <td id="71" piece="0" onclick="Click(this.id)"><img id="i71" /></td>
                                    <td id="72" piece="0" onclick="Click(this.id)"><img id="i72" /></td>
                                    <td id="73" piece="0" onclick="Click(this.id)"><img id="i73" /></td>
                                    <td id="74" piece="0" onclick="Click(this.id)"><img id="i74" /></td>
                                    <td id="75" piece="0" onclick="Click(this.id)"><img id="i75" /></td>
                                    <td id="76" piece="0" onclick="Click(this.id)"><img id="i76" /></td>
                                    <td id="77" piece="0" onclick="Click(this.id)"><img id="i77" /></td>
                                    <td id="78" piece="0" onclick="Click(this.id)"><img id="i78" /></td>
                                </tr>
                                <tr>
                                    <td id="81" piece="0" onclick="Click(this.id)"><img id="i81" /></td>
                                    <td id="82" piece="0" onclick="Click(this.id)"><img id="i82" /></td>
                                    <td id="83" piece="0" onclick="Click(this.id)"><img id="i83" /></td>
                                    <td id="84" piece="0" onclick="Click(this.id)"><img id="i84" /></td>
                                    <td id="85" piece="0" onclick="Click(this.id)"><img id="i85" /></td>
                                    <td id="86" piece="0" onclick="Click(this.id)"><img id="i86" /></td>
                                    <td id="87" piece="0" onclick="Click(this.id)"><img id="i87" /></td>
                                    <td id="88" piece="0" onclick="Click(this.id)"><img id="i88" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <footer>
        <div class="main-footer" style="padding-bottom: 50px; padding-top: 10px; text-align: center">
            <div class="container">
                <div style="box-sizing: border-box">
                    <div style="width: 20%; float: left;">
                        {{-- <button class="btn btn-info">Cầu hòa</button> --}}
                    </div>
                    <div style="width: 20%; float: left;">

                        <button id="surrender" class="btn btn-danger"> <i class="fas fa-flag"></i> Đầu Hàng</button>
                    </div>
                    <div style="width: 20%; float: left;">
                        <a href="{{ URL::asset('quit') }}/{{ $room->id }}" class="btn btn-warning"><i
                                class="fas fa-sign-out-alt"></i> Rời phòng</a>
                    </div>
                    <div style="clear: both;">

                    </div>
                </div>
                @if ($user->id == $room->player1)
                    <div style="margin: 0; padding: 10px; text-align: left">
                        <h3 class="h3setting" id="setting" onclick="setting()">Cài đặt phòng</h3>
                    </div>
                    <div id="tabsetting" style="display: none">
                        <div style="float: left;  margin-left: 10%">
                            <h4 style="color: rgb(255, 255, 255)">Khán giả</h4>
                            {{-- <i class="fas fa-eye-slash"></i> --}}
                            <div id="khangia">

                            </div>

                        </div>
                        <div style="float: left; margin-left: 10%">
                            <h4 style="color: rgb(255, 255, 255)">Khán giả chat</h4>
                            {{-- <i class="fas fa-comment-slash"></i> --}}
                            <div id="div-chat">

                            </div>

                        </div>
                    </div>
                @endif

            </div>
        </div>
    </footer>
    <div class="chat-box">
        <div>
            <button onclick="HideChatBox()" id="hide-chat-box"><i class="fas fa-chevron-right"></i></button>
            <button onclick="ShowChatBox()" id="show-chat-box" style="display: none"><i
                    class="fas fa-chevron-left"></i></button>
        </div>
        <div id="switch-chat">
            <div id="messages">

            </div>
            <div class="send-message">
                <form action="">
                    <input type="text" id="txtMessage" name="message" size="25" style="background-color: rgb(223, 235, 183);
                    border-radius: 10px; padding-left: 7px;
                    border-color: rgba(222, 184, 135, 0.39)">
                    <div onclick="btnChat()" class="btn btn-lg" style="color: rgba(0, 81, 255, 0.671)"><i
                            class="fas fa-paper-plane"></i></div>
                </form>
            </div>
        </div>
    </div>
    <!--main js-->
    {{-- <script src="{{ URL::asset('theme/js/jquery-1.12.4.min.js') }}"></script> --}}
    <!--bootstrap js-->
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/slick.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/wow.min.js') }}"></script>
    <!--custom js-->
    {{-- @yield('script') --}}
    {{-- <script type="module" src="{{URL::asset('js/firebase/gaming.js')}}"></script> --}}
    <script type="module" src="{{ URL::asset('js/firebase/statusPlayer.js') }}"></script>

</body>

</html>
