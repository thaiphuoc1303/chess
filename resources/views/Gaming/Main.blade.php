<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--enable mobile device-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--fontawesome css-->
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
</head>

<body>
    <header id="header" class="top-head">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12 left-rs">
                        <div class="navbar-header">
                            <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>

                        {{-- players --}}
                        <div class="navbar-form navbar-left" style="text-align: center;">
                            <div> {{ $player1->name }} </div>
                            <div>20:00</div>
                        </div>
                        <div class="navbar-form navbar-left" style="text-align: center;">
                            <h2>-</h2>
                        </div>
                        <div class="navbar-form navbar-left" style="text-align: center;">
                            <div>{{ $player2->name }}</div>
                            <div>20:00</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="right-nav">

                            <div class="nav-b hidden-xs">
                                <div class="nav-box">
                                    {{-- @yield('account') --}}
                                    <ul>
                                        <li><a href="#">{{ $user->name }}</a></li>
                                        <li><a class="custom-b" href="{{ URL::asset('logout') }}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
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
            <li><a href="#">
                    <h4>{{ $user->name }}</h4>
                </a></li>
            <li><a href="{{ URL::asset('logout') }}">Đăng xuất</a></li>
        </ul>
        <div class="page-content-product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
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
                        <script>
                            var isClick = false,
                                isQuanDo = false;
                            var Location = "00";

                            function Click(id) {
                                // id player
                                if ($('#luot').val() != 1) {
                                    return;
                                }
                                var X = id.charAt(0);
                                var Y = id.charAt(1);
                                var rr = "{{ URL::asset('./chess') }}";
                                isClick = !isClick;
                                if (isClick) {
                                    if (isCoDo(X, Y) != isQuanDo) {
                                        isClick = !isClick;
                                        return;
                                    }
                                }
                                if (isClick) {
                                    var Name = GetName(id);
                                    Location = id;
                                    // Kiểm tra này là quân cờ nào để xác định đường đi
                                    switch (Name) {
                                        case 2:
                                            Xe(id);
                                            break;

                                        case 3:
                                            Ma(id);
                                            break;

                                        case 4:
                                            Tuong(id);
                                            break;

                                        case 5:
                                            Hau(id);
                                            break;

                                        case 6:
                                            Vua(id);
                                            break;

                                        case 1:
                                            Tot(id);
                                            break;

                                        default:

                                            // Không click vào ổ chức quân cờ nào
                                            isClick = !isClick;
                                            break;
                                    }
                                } else {
                                    var Name = GetName(id);
                                    Name = Name.substring(0, Name.indexOf('_'));

                                    if (DiChuyen(Location, id, rr)) {
                                        isQuanDo = !isQuanDo;
                                    }
                                    VeBanCoTrangDen();
                                }
                            }
                        </script>
                        <div id="">
                            <div id="divBanCo">
                                <input id="idroom" type="hidden" value="">
                                <input id="luot" type="hidden" value="">
                                <input id="quan" type="hidden" value="">
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
            {{-- @yield('main') --}}


        </div>

        <!--main js-->
        {{-- <script src="{{ URL::asset('theme/js/jquery-1.12.4.min.js') }}"></script> --}}
        <!--bootstrap js-->
        {{-- <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('theme/js/bootstrap-select.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('theme/js/slick.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('theme/js/wow.min.js') }}"></script> --}}

        <!--custom js-->
        <script type="module" src="{{ URL::asset('js/firebase/gaming.js') }}"></script>
</body>

</html>
{{-- <div class="messages">

    </div>

    <div class="send-message">
        <form action="">
            <input type="text" name="mess" style="background-color: rgba(223, 235, 183, 0);
                                    border-radius: 10px;
                                    border-color: burlywood">
            <a href="#" class="btn btn-sm"><i class="fas fa-paper-plane"></i></a>


        </form>

    </div> --}}
