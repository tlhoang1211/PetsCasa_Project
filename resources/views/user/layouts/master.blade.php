<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE] -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- [endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="We are woof">
    <meta name="author" content="PetCasa">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- page title -->
    <title>PetsCasa</title>
    <!--[if lt IE 9] -->
    <script src={{asset('assets/user/js/respond.js')}}></script>
    <!-- [endif]-->
    <!-- Font files -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CQuicksand:400,500,700" rel="stylesheet">
    <link href={{asset('assets/user/fonts/flaticon/flaticon.css')}} rel="stylesheet" type="text/css">
    <link href={{asset('assets/user/fonts/fontawesome/fontawesome-all.min.css')}} rel="stylesheet" type="text/css">
    <!-- Fav icons -->
    <link rel="apple-touch-icon" sizes="57x57" href={{asset('assets/user/img/icons/apple-icon-57x57.png')}}>
    <link rel="apple-touch-icon" sizes="72x72" href={{asset('assets/user/img/icons/apple-icon-72x72.png')}}>
    <link rel="apple-touch-icon" sizes="114x114" href={{asset('assets/user/img/icons/apple-icon-114x114.png')}}>
    <link rel="shortcut icon" type="image/x-icon" href={{asset('assets/user/img/icons/favicon.ico')}}>
    <!-- Bootstrap core CSS -->
    <link href={{asset('assets/user/vendor/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
    <!-- style CSS -->
    <link href={{asset('assets/user/css/style.css')}} rel="stylesheet">
    <!-- plugins CSS -->
    <link href={{asset('assets/user/css/plugins.css')}} rel="stylesheet">
    <!-- Colors CSS -->
    <link href={{asset('assets/user/styles/dogwalker.css')}} rel="stylesheet">
    <!-- Layer Slider -->
    <link href={{asset('assets/user/vendor/layerslider/css/layerslider.css')}} rel="stylesheet">
    <!-- Datepicker -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- SPECIFIC CSS -->
    <link href={{asset('assets/user/css/custom.css')}} rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .fb_dialog_content > iframe {
            bottom: 100px !important;
            right: 24px !important;
        }

        .login-image {
            border-radius: 50%;
            height: 35px;
            padding-right: 5px;
            /*margin-top: 20px;*/
        }

        .fast-link {
            color: yellow;
            background-color: red;
            margin-left: 25px;
        }

        .button-sos {
            margin-bottom: 120px;
            background: #000000;
            border-radius: 50%;
            position: fixed;
            bottom: 55px;
            right: 22px;
            transition: all 0.2s ease-in-out;
            z-index: 9999;
            padding: 10px 10px;
        }

        .button-sos:after {
            content: "\f126";
            z-index: 0;
            font-family: "flaticon";
            font-size: 50px;
            bottom: -20px;
            z-index: 0;
            text-shadow: 0px 4px 17px rgba(255, 255, 255, 0.6);
        }

        a:hover {
            color: #ff8500;
        }

        .blog-card .post-info:before, .color1, a:hover, a:focus, .dog-elements:after, .cat-elements:after, .bg-secondary a, .header-text:before, ul.social-media li:hover i {
            color: #ff8500;
        }

        iframe {
            width: 0;
        }
    </style>

    @yield('specific_css')
</head>

<!-- ==== body starts ==== -->
<body id="top">
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v8.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="107245207763414"
     theme_color="#ff8500"
     logged_in_greeting="Xin chào! Chúng tôi có thể giúp gì cho bạn?"
     logged_out_greeting="Xin chào! Chúng tôi có thể giúp gì cho bạn?">
</div>
<!-- Preloader -->
<div id="preloader">
    <div class="spinner">
        <div class="bounce1"></div>
    </div>
    <!-- /spinner -->
</div>
<!-- /Preloader ends -->
<nav id="main-nav" class="navbar-expand-xl fixed-top">
    <div class="row">
        <!-- Start Top Bar -->
        <div class="container-fluid top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Start Contact Info -->
                        <ul class="contact-details float-left">
                            <li><i class="fa fa-map-marker"></i>8 Tôn Thất Thuyết - Hà Nội</li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:t1908e@gmail.com">t1908e@gmail.com</a>
                            </li>
                            <li><i class="fa fa-phone"></i>(123) 456-789</li>
                        </ul>
                        <!-- End Contact Info -->
                        <!-- Start Social Links -->
                        <ul class="social-list float-right list-inline">
                            <li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="list-inline-item"><a title="Instagram" href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                        <!-- /End Social Links -->
                    </div>
                    <!-- col-md-12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- End Top bar -->
        <!-- Navbar Starts -->
        <div class="navbar container-fluid">
            <div class="container ">
                <!-- logo -->
                <a class="navbar-brand" href="/">
                    <i class="flaticon-dog-20"></i><span>PetsCasa</span>
                </a>
                <!-- Main service -->
                <!-- Navbartoggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggle-icon">
                  <i class="fas fa-bars"></i>
                  </span>
                </button>
                @php
                            $current_account = session()->get('current_account');
                        @endphp
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <!-- menu item -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('services')}}" id="services-dropdown"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Hoạt động
                            </a>
                            <div class="dropdown-menu" aria-labelledby="services-dropdown">
                                <a class="dropdown-item" href="{{route('rescue_form')}}">Cứu hộ chó mèo</a>
                                @if(isset($current_account) && $current_account != null)
                                <a class="dropdown-item" href="{{route('pet_list_adoption')}}">Nhận nuôi thú cưng</a>
                                @endif
                                <a class="dropdown-item" href="{{route('concession_form')}}">Nhượng thú cưng</a>
                                {{--                                <a class="dropdown-item" href="{{route('volunteer')}}">Tình nguyện</a>--}}
                            </div>
                        </li>
                        <!-- menu item -->
                    {{--                        <li class="nav-item dropdown">--}}
                    {{--                            <a class="nav-link dropdown-toggle" href="/store" id="adopt-dropdown" data-toggle="dropdown"--}}
                    {{--                               aria-haspopup="true" aria-expanded="false">--}}
                    {{--                                Cửa hàng--}}
                    {{--                            </a>--}}
                    {{--                            <div class="dropdown-menu" aria-labelledby="adopt-dropdown">--}}
                    {{--                                <a class="dropdown-item" href="#">Đồ dùng thú cưng</a>--}}
                    {{--                                <a class="dropdown-item" href="#">Chăm sóc thú cưng</a>--}}
                    {{--                            </div>--}}
                    {{--                        </li>--}}
                    <!-- menu item -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('news')}}">Tin tức</a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('about')}}" id="about-dropdown"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Về chúng tôi
                            </a>
                            <div class="dropdown-menu" aria-labelledby="about-dropdown">
                                <a class="dropdown-item" href="{{route('about')}}">Giới thiệu</a>
                                <a class="dropdown-item" href="{{route('team')}}">Thành viên</a>
                            </div>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('contact')}}">Liên hệ</a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('donation')}}">
                                Donate
                            </a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item dropdown">
                        <!-- menu item -->
                            @if(isset($current_account) && $current_account != null)
                                <a href="{{route('personal_info')}}" class="nav-link dropdown-toggle"
                                   id="about-dropdown" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img class="login-image" src="{{$current_account->Avatar128x128}}"
                                         alt="">{{$current_account->FullName}}</a>
                                <div class="dropdown-menu" aria-labelledby="about-dropdown">
                                    <a class="dropdown-item" href="{{route('personal_info')}}">Hồ sơ cá nhân</a>
                                    <a class="dropdown-item"
                                       href="{{route('user_account_change_password', $current_account->Slug)}}">Thay đổi
                                        mật khẩu</a>
                                    <a class="dropdown-item"
                                       href="{{route('user_account_update_timeline', $current_account->Slug)}}">Cập nhập
                                        Timeline</a>
                                    <a class="dropdown-item"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                    >Đăng xuất</a>
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login_register')}}">
                                    Đăng nhập/Đăng ký
                                </a>
                            </li>
                        @endif
                    </ul>
                    <!--ul -->
                </div>
                <!--collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar -->
    </div>
    <!--row -->
</nav>
<!-- /nav -->
<!-- Jumbotron -->

<!-- content start -->
@yield('content')
<!-- content end -->
<!-- content end -->

<!-- ==== footer ==== -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <a class="navbar-brand" href="/"><i class="flaticon-dog-20"></i><span>PetsCasa</span></a>
                <p class="mt-3">Nhóm trẻ tình nguyện viên Việt Nam và quốc tế, hoạt động vì tình yêu chó mèo.</p>
            </div>
            <!-- col-lg -->
            <div class="col-lg-3">
                <h6><i class="fas fa-envelope margin-icon"></i>Liên hệ</h6>
                <ul class="list-unstyled">
                    <li>(123) 456-789</li>
                    <li><a href="mailto:t1908e@gmail.com">t1908e@gmail.com</a></li>
                    <li>8 Tôn Thất Thuyết - Hà Nội</li>
                </ul>
                <!--ul -->
            </div>
            <!-- col-lg -->
            <div class="col-lg-3">
                <h6><i class="far fa-clock margin-icon"></i>Đường dẫn nhanh</h6>
                <ul class="list-unstyled">
                    <li><a href="{{route('login_register')}}">Đăng nhập hoặc đăng ký</a></li>
                    <li><a href="{{route('pet_list_adoption')}}">Nhận nuôi</a></li>
                    <li><a href="{{route('foster')}}">Nhận nuôi ảo</a></li>
                </ul>
                <!--ul -->
            </div>
            <!-- col-lg -->
        </div>
        <!-- row-->
        <div class="row">
            <div class="credits col-sm-12">
                <p>Copyright 2020 / Designed by <a href="{{route('team')}}">Avenger Team</a></p>
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
    <!-- SOS -->
    <div class="page-scroll hidden-sm hidden-xs">
        <a class="button-sos" href="{{route('rescue_form')}}"><strong>SOS</strong></a>
    </div>
    <!-- End SOS -->
    <!-- Go To Top Link -->
    <div class="page-scroll hidden-sm hidden-xs">
        <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    </div>
    <!--page-scroll-->
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
        };
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="107245207763414"
         theme_color="#ff7e29"
         logged_in_greeting="Xin chào! Chúng tôi có thể giúp gì cho bạn?"
         logged_out_greeting="Xin chào! Chúng tôi có thể giúp gì cho bạn?">
    </div>
</footer>
<!-- footer-->

<!-- Bootstrap core & Jquery -->
<script src={{asset('assets/user/vendor/jquery/jquery.min.js')}}></script>
<script src={{asset('assets/user/vendor/bootstrap/js/bootstrap.min.js')}}></script>
<!-- Custom Js -->
<script src={{asset('assets/user/js/custom.js')}}></script>
<script src={{asset('assets/user/js/plugins.js')}}></script>
<!-- Prefix free -->
<script src={{asset('assets/user/js/prefixfree.min.js')}}></script>
<!-- GreenSock -->
<script src={{asset('assets/user/vendor/layerslider/js/greensock.js')}}></script>
<!-- LayerSlider script files -->
<script src={{asset('assets/user/vendor/layerslider/js/layerslider.transitions.js')}}></script>
<script src={{asset('assets/user/vendor/layerslider/js/layerslider.kreaturamedia.jquery.js')}}></script>
<script src={{asset('assets/user/vendor/layerslider/js/layerslider.load.js')}}></script>
@yield('specific_js')
</body>
</html>
