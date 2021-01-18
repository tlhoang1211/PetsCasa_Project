<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/user/css/login_register.css')}}"/>
    <link href={{asset('assets/user/fonts/flaticon/flaticon.css')}} rel="stylesheet" type="text/css">
    <title>Sign in & Sign up Form</title>
</head>
<body>
<div class="container">
    <div class="bg_cover"></div>
    <div class="forms-container">
        <div class="signin-signup">
            <form action="{{route('loginP')}}" class="sign-in-form" method="POST">
                @csrf
                <h2 class="title">ĐĂNG NHẬP</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email" name="EmailLogin"/>
                </div>
                @if($errors->has('Email'))
                    <div class="error">{{ $errors->first('Email') }}</div>
                @endif
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="PasswordLogin"/>
                </div>
                <input type="submit" value="Gửi" class="btn solid"/>
                <p class="social-text">Đăng nhập bằng: </p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
            </form>
            <form action="{{route('register')}}" class="sign-up-form" method="POST">
                @csrf
                <h2 class="title" style="background-color: coral; border: 1px solid #F9575C">ĐĂNG KÝ</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>

                    <input type="text"
                           placeholder="@if ($errors->first('FullName') != "") {{$errors->first('FullName')}} @else Họ và Tên @endif"
                           name="FullName"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email"
                           placeholder="@if ($errors->first('Email') != "") {{$errors->first('Email')}} @else Email @endif"
                           name="Email"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="text"
                           placeholder="@if ($errors->first('PhoneNumber') != "") {{$errors->first('PhoneNumber')}} @else Số điện thoại @endif"
                           name="PhoneNumber"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-home"></i>
                    <input type="text"
                           placeholder="@if ($errors->first('Address') != "") {{$errors->first('Address')}} @else Địa chỉ @endif"
                           name="Address"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-birthday-cake"></i>
                    <input type="date"
                           placeholder="@if ($errors->first('DateOfBirth') != "") {{$errors->first('DateOfBirth')}} @else dd/mm/yy @endif"
                           name="DateOfBirth"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password"
                           placeholder="@if ($errors->first('Password') != "") {{$errors->first('Password')}} @else Mật khẩu @endif"
                           name="Password"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-id-card"></i>
                    <input type="number"
                           placeholder="@if ($errors->first('IDNo') != "") {{$errors->first('IDNo')}} @else Chứng minh Thư / Thẻ căn cước @endif"
                           name="IDNo"/>
                </div>
                <input type="submit" class="btn" value="Gửi" style="background-color: coral"/>
                {{--                <p class="social-text">Đăng ký với: </p>--}}
                {{--                <div class="social-media">--}}
                {{--                    <a href="#" class="social-icon">--}}
                {{--                        <i class="fab fa-facebook-f"></i>--}}
                {{--                    </a>--}}
                {{--                    <a href="#" class="social-icon">--}}
                {{--                        <i class="fab fa-google"></i>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Chưa có tài khoản?</h3>
                <p>Trở thành 1 thành viên của &nbsp;<a href="/" class="home_direction"><i class="flaticon-dog-20">PetsCasa</i></a>&nbsp;
                    ngay
                    thôi nào!!</p>
                <button class="btn transparent" id="sign-up-btn">
                    Đăng ký
                </button>
                <button class="btn transparent" id="sign-up-btn">
                    <a class="home_direction" href="/">Trang chủ</a>
                </button>
            </div>
            <img
                src="https://res.cloudinary.com/dwarrion/image/upload/v1597853775/PetCasa/Login_Signup_Page/cat_slv9kc.png"
                class="image" alt="">
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Đã có tài khoản?</h3>
                <p>Trải nghiệm dịch vụ của &nbsp;<a href="/" class="home_direction"><i class="flaticon-dog-20"
                                                                                       style="color: #F9BE4F">PetsCasa</i></a>&nbsp;
                    ngay thôi nào!!</p>
                <button class="btn transparent" id="sign-in-btn">
                    Đăng nhập
                </button>
                <button class="btn transparent" id="sign-up-btn">
                    <a class="home_direction" href="/">Trang chủ</a>
                </button>
            </div>
            <img
                src="https://res.cloudinary.com/dwarrion/image/upload/v1597855372/PetCasa/Login_Signup_Page/dog_gdewko.png"
                class="image" alt=""/>
        </div>
    </div>
</div>

<script src={{asset('assets/user/vendor/jquery/jquery.min.js')}}></script>
<script src="{{asset("assets/user/js/login_register.js")}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(isset($toast_error1))
    <script>
        $(document).ready(function () {
            toastr["error"]("Email không tồn tại!")

            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        })
    </script>
@endif
@if(isset($toast_error2))
    <script>
        $(document).ready(function () {
            toastr["error"]("Mật khẩu không đúng!")

            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        })
    </script>
@endif
@if(isset($success))
    <script>
        $(document).ready(function () {
            toastr["success"]("Đăng ký thành công! Đăng nhập ngay thôi nào.")

            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        })
    </script>
@endif
</body>
</html>
