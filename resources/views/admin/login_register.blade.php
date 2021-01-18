<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{secure_asset('assets/admin/css/login_register.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/login_register.css')}}">
    <link rel="stylesheet" href="https://maxcdn.boostrapcdn.com/font-awesome/4.7.0/css/format-awesome.min.css">
</head>
<body>
<!-- Login Module -->
<div class="login">
    <div class="wrap">
        <!-- Toggle -->
        <div id="toggle-wrap">
            <div id="toggle-terms">
                <div id="cross">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- Terms -->
        <div class="terms">

        </div>

        <!-- Recovery -->
        <div class="recovery">
            <h2>Phục hồi mật khẩu</h2>
            <p>Điền <strong>địa chỉ Email</strong> của bạn vào ô dưới đây rồi <strong>ấn
                    Gửi</strong></p>
            <p>Chúng tôi sẽ gửi cho bạn một email để hướng dẫn chi tiết hơn về việc đổi mật khẩu.</p>
            <form action="#" method="POST" class="recovery-form">
                <input type="text" class="input" id="user-recover" placeholder="Email">
                <input type="submit" class="button" value="Gửi">
            </form>
            <p class="msg">Một email hướng dẫn đã được gửi cho bạn!</p>
        </div>

        <!-- Slider -->
        <div class="content">
            <!-- Logo -->
            <div class="logo">
                <a href="/"><img src="" alt=""></a>
            </div>
            <!-- Slideshow -->
            <div id="slideshow">
                <div class="one">
                    <h2><span>EVENTS</span></h2>
                    <p>Sign up to attend any of hundreds of events nationwide</p>
                </div>
                <div class="two">
                    <h2><span>LEARNING</span></h2>
                    <p>Thousands of instant online classes/tutorial included</p>
                </div>
                <div class="three">
                    <h2><span>GROUPS</span></h2>
                    <p>Create your own groups and connect with others that share your interests</p>
                </div>
                <div class="four">
                    <h2><span>SHARING</span></h2>
                    <p>Share your works and knowledge with the community on the public showcase section</p>
                </div>
            </div>
        </div>

        <!-- Login Form -->
        <div class="user">
            <!-- Actions
            <div class="actions">
                <a href="#signup-tab-content" class="help">Sign Up</a><a href="#login-tab-content" class="faq">Login</a>
            </div>
             -->
            <div class="form-wrap">
                <!-- Tabs -->
                <div class="tabs">
                    <h3 class="login-tab"><a class="log-in active" href="#login-tab-content"><span>Đăng nhập</span></a>
                    </h3>
                    {{--                    <h3 class="signup-tab"><a class="sign-up" href="#signup-tab-content"><span>Đăng ký</span></a></h3>--}}
                </div>
                <!-- Tabs Content -->
                <div class="tabs-content">
                    <!-- Tabs Content Login -->
                    <div id="login-tab-content" class="active">
                        <form action="{{route('logIn')}}" method="POST" class="login-form" id="login-form">
                            @csrf
                            <input type="text" class="input" id="user_login" autocomplete="off"
                                   placeholder="Email" name="EmailLogin">
                            <input type="password" class="input" id="user_pass" autocomplete="off"
                                   placeholder="Mật khẩu" name="PasswordLogin">
                            <input type="checkbox" class="checkbox" checked id="remember_me">
                            <label for="remember_me">Ghi nhớ tài khoản</label>
                            {{--                            <input type="submit" class="button" value="Đăng nhập">--}}
                            <button class="button" id="logIn">Đăng nhập</button>
                        </form>
                        <div class="help-action">
                            <p><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="#" class="forgot">Quên mật
                                    khẩu?</a></p>
                        </div>
                    </div>
                    <!-- Tabs Content Sign Up -->
                    {{--                    <div id="signup-tab-content">--}}
                    {{--                        <form action="" method="POST" class="signup-form">--}}
                    {{--                            <input type="text" class="input" id="user_name" autocomplete="off" placeholder="Họ và tên">--}}
                    {{--                            <input type="email" class="input" id="user_email" autocomplete="off" placeholder="Email">--}}
                    {{--                            <input type="date" class="input" id="user_dob" autocomplete="off">--}}
                    {{--                            <input type="tel" class="input" id="user_phonenumber" autocomplete="off"--}}
                    {{--                                   placeholder="Số điện thoại">--}}
                    {{--                            <input type="text" class="input" id="user_address" autocomplete="off" placeholder="Địa chỉ">--}}
                    {{--                            <input type="text" class="input" id="user_idno" autocomplete="off"--}}
                    {{--                                   placeholder="Chứng minh thư/Thẻ căn cước">--}}
                    {{--                            <input type="password" class="input" id="user_pass" autocomplete="off"--}}
                    {{--                                   placeholder="Mật khẩu">--}}
                    {{--                            <input type="submit" class="button" value="Đăng ký">--}}
                    {{--                        </form>--}}
                    {{--                        <div class="help-action">--}}
                    {{--                            <p>Thông qua đăng ký, bạn đã đồng ý với</p>--}}
                    {{--                            <p><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="#" class="agree">Danh sách--}}
                    {{--                                    các điều khoản</a></p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('assets/admin/js/login_register.js')}}"></script>
@include('sweetalert::alert')
</body>
</html>
