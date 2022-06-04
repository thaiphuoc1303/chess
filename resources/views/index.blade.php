<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>
       @yield('title')
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="{{URL::asset('img/logo.png')}}" type="image/x-icon">
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
    @yield('css')
</head>

<body>
   <div id="thongbao">
      
   </div>
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
                        @yield('players')
                        {{-- <div class="navbar-form navbar-left" style="text-align: center;">
                        <div>Thái Văn Phước</div>
                        <div>20:00</div>
                     </div>
                     <div class="navbar-form navbar-left" style="text-align: center;"><h2>-</h2></div>
                     <div class="navbar-form navbar-left" style="text-align: center;">
                        <div>Thái Văn Phước</div>
                        <div>20:00</div>
                     </div> --}}
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="right-nav">

                            <div class="nav-b hidden-xs">
                                <div class="nav-box">
                                    @yield('account')
                                    {{-- <ul>
                                 <li><a href="#">Thái Văn Phước</a></li>
                                 <li><a class="custom-b" href="#">Đăng xuất</a></li>
                              </ul> --}}
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
        @yield('hide-account')
        {{-- <ul id="sidebar-nav" class="sidebar-nav">
            <li><a href="#"><h4>Thái Văn Phước</h4></a></li>
            <li><a href="howitworks.html">Đăng xuất</a></li>
         </ul> --}}
    </div>

    @yield('main')
    {{-- <div class="main-product">
            <div class="container">
               <div class="row clearfix">
                  
               </div>
               <div class="row clearfix">
                  <div class="categories_link">
                     <a href="#">Tạo phòng</a>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-md-3">
                     <a href="productpage.html">
                        <div class="box-img">
                           <h4>Product</h4>
                           <img src="images/product/1.png" alt="" />
                        </div>
                     </a>
                  </div>
                  
               </div>
            </div>
         </div> --}}
    @yield('footer')
    {{-- <footer>
         <div class="main-footer">
            <div class="container">
               <div class="row">
                  <div class="footer-link-box clearfix">
                     <div class="col-md-6 col-sm-6">
                        <div class="left-f-box">
                           <div class="col-sm-4">
                              <h2>SELL ON chamb</h2>
                              <ul>
                                 <li><a href="#">Create account</a></li>
                                 <li><a href="howitworks.html">How it works suppliers</a></li>
                                 <li><a href="pricing.html">Pricing</a></li>
                                 <li><a href="#">FAQ for Suppliers</a></li>
                              </ul>
                           </div>
                           <div class="col-sm-4">
                              <h2>BUY ON chamb</h2>
                              <ul>
                                 <li><a href="#">Create account</a></li>
                                 <li><a href="#">How it works buyers</a></li>
                                 <li><a href="#">Categories</a></li>
                                 <li><a href="#">FAQ for buyers</a></li>
                              </ul>
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </footer> --}}
    <!--main js-->
    <script src="{{ URL::asset('theme/js/jquery-1.12.4.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ URL::asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/slick.min.js') }}"></script>
    <script src="{{ URL::asset('theme/js/wow.min.js') }}"></script>
    <!--custom js-->
    @yield('script')
</body>

</html>
