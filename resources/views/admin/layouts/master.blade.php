<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title','Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <!-- App css -->
    {{--        <link href="{{asset("assets/admin/admin/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />--}}
    <link href={{asset("assets/")."/admin/css/bootstrap.min.css"}}  rel="stylesheet" type="text/css"
          id="bootstrap-stylesheet"/>
    <link href={{asset("assets/admin/css/icons.min.css")}} rel="stylesheet" type="text/css"/>
    <link href={{asset("assets/admin/css/app.min.css")}} rel="stylesheet" type="text/css" id="app-stylesheet"/>
    <link href={{asset("assets/admin/css/custom.css")}} rel="stylesheet" type="text/css" id="app-stylesheet"/>
    <link href={{asset("assets/admin/css/custom_admin.css")}} rel="stylesheet" type="text/css" id="app-stylesheet"/>
    @yield('specific_css')
</head>
<body class="enlarged">
<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list dropdown d-none d-lg-inline-block ml-2">
            <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <img src="/assets/admin/images/flags/us.jpg" alt="lang-image" height="12">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="/assets/admin/images/flags/germany.jpg" alt="lang-image" class="mr-1" height="12"> <span
                            class="align-middle">German</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="/assets/admin/images/flags/italy.jpg" alt="lang-image" class="mr-1" height="12"> <span
                            class="align-middle">Italian</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="/assets/admin/images/flags/spain.jpg" alt="lang-image" class="mr-1" height="12"> <span
                            class="align-middle">Spanish</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="/assets/admin/images/flags/russia.jpg" alt="lang-image" class="mr-1" height="12"> <span
                            class="align-middle">Russian</span>
                </a>

            </div>
        </li>
        <?php
                    $report_hang = App\Report::where("Status",'=',0)->get();
                ?>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="badge badge-pink rounded-circle noti-icon-badge">@if (isset($report_hang) && count($report_hang) > 0 ) 1 @endif</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <div class="dropdown-header noti-title">
                    <h5 class="text-overflow m-0"><span class="float-right">
                                    <span class="badge badge-danger float-right">5</span>
                                    </span>Notification</h5>
                </div>

                <div class="slimscroll noti-scroll">
                    @if (isset($report_hang) && count($report_hang) > 0 )
                        <a href="{{route('admin_report_list')}}" class="dropdown-item notify-item">
                        <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                        <p class="notify-details">Có {{count($report_hang)}} báo cáo hỗ trợ chưa được xử lý !<small class="text-muted">1 min
                                ago</small></p>
                    </a>
                    @endif

                    <!-- item-->

                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View all
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{session()->get('current_account')->Avatar128x128}}" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                                {{session()->get('current_account')->FullName}}  <i class="mdi mdi-chevron-down"></i>
                            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Profile</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{route('logOut')}}" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <i class="fe-settings noti-icon"></i>
            </a>
        </li>


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{route('admin_home')}}" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('assets/logo.png')}}" alt="" height="25">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
            <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('assets/logo-2.png')}}" alt="" height="28">
                        </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>

    </ul>
</div>
<!-- end Topbar -->
<!-- ========== Left Sidebar Start ========== -->
@include('admin.layouts.sidebar')
<!-- Left Sidebar End -->
<div class="content-page" style="margin-top: 0px">
    <div class="content">
        @yield('content')
    </div>
    <footer class="footer"></footer>
</div>

</body>


<!-- Vendor js -->
<script src={{asset('assets/admin/')."/js/vendor.min.js"}}></script>

<script src={{asset('assets/admin/')."/libs/morris-js/morris.min.js"}}></script>
<script src={{asset('assets/admin/')."/libs/raphael/raphael.min.js"}}></script>

<!-- KNOB JS -->
<script src={{asset('assets/admin/')."/libs/jquery-knob/jquery.knob.min.js"}}></script>

<!-- Sparkline charts -->
<script src={{asset('assets/admin/')."/libs/jquery-sparkline/jquery.sparkline.min.js"}}></script>


<!-- App js -->
<script src={{asset('assets/admin/')."/js/app.min.js"}}></script>
<!-- Custom js -->
@yield('specific_js')
<!--End JS -->
</body>
</html>