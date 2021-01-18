@extends('user.layouts.master')
@section('title')
    Update Password
@endsection
@section('specific_css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
    <link href="{{asset('assets/user/css/personal_info.css')}}" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('specific_js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    @if(isset($toast_error1))
        <script>
            $(document).ready(function () {
                toastr["error"]("Mật khẩu cũ sai!")

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
                toastr["warning"]("Mật khẩu mới nhập lại không trùng!")

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
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
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

                toastr["success"]("Thay đổi mật khẩu thành công!")
            })
        </script>
    @endif
@endsection
@section('content')
    <div class="page bg-light">
        <div class="container margin_30 block-padding">
            <div class="row">
                <div class="col-md-2">
                    <div class="all">
                        <div class="user-page-brief">
                            <a class="user-page-brief__avatar" href="{{route('personal_info')}}">
                                <div class="petscasa-avatar">
                                    <div class="petscasa-avatar__placeholder">
                                        <svg class="petscasa-svg-icon icon-headshot" enable-background="new 0 0 15 15"
                                             viewBox="0 0 15 15" x="0" y="0">
                                            <g>
                                                <circle cx="7.5" cy="4.5" fill="none" r="3.8"
                                                        stroke-miterlimit="10"></circle>
                                                <path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none"
                                                      stroke-linecap="round" stroke-miterlimit="10"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <img class="petscasa-avatar__img"
                                         src="{{$account->Avatar128x128}}">
                                </div>
                            </a>
                            <div class="user-page-brief__right">
                                <div class="user-page-brief__username">{{$account->FullName}}</div>
                                <div style="margin-top: 3px">
                                    <a class="user-page-brief__edit" href="{{route('personal_info')}}">
                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                             xmlns="http://www.w3.org/2000/svg"
                                             style="margin-right: 4px;">
                                            <path
                                                d="M8.54 0L6.987 1.56l3.46 3.48L12 3.48M0 8.52l.073 3.428L3.46 12l6.21-6.18-3.46-3.48"
                                                fill="#9B9B9B" fill-rule="evenodd"></path>
                                        </svg>
                                        Sửa hồ sơ
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="userpage-sidebar-menu">
                            <a class="userpage-sidebar-menu-entry"
                               href="{{route('personal_info')}}">
                                <div class="userpage-sidebar-menu-entry__icon"
                                     style="background-color: black;">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="userpage-sidebar-menu-entry__text">
                                    Tài khoản của tôi
                                </div>
                            </a>
                        </div>
                        <div class="userpage-sidebar-menu">
                            <a class="userpage-sidebar-menu-entry"
                               href="{{route('user_account_change_password', $account->Slug)}}">
                                <div class="userpage-sidebar-menu-entry__icon"
                                     style="background-color: #48A06A;">
                                    <i class="fa fa-key"></i>
                                </div>
                                <div class="userpage-sidebar-menu-entry__text" style="color: #48A06A">
                                    Thay đổi mật khẩu
                                </div>
                            </a>
                        </div>
                        <div class="userpage-sidebar-menu">
                            <a class="userpage-sidebar-menu-entry"
                               href="{{route('user_account_update_timeline', $account->Slug)}}">
                                <div class="userpage-sidebar-menu-entry__icon" style="background-color: black">
                                    <i class="fa fa-clock"></i>
                                </div>
                                <div class="userpage-sidebar-menu-entry__text" style="color: black">
                                    Cập nhập Timeline
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="my-account-section">
                        <div class="my-account-section__header">
                            <div class="my-account-section__header-left">
                                <div class="my-account-section__header-title">Hồ sơ của tôi</div>
                                <div class="my-account-section__header-subtitle">
                                    Thay đổi mật khẩu tài khoản cá nhân
                                </div>
                            </div>
                        </div>
                        <div class="my-account-profile">
                            <div class="my-account-profile__left">
                                <form id="account_form" action="{{route('user_change_password', $account->Slug)}}"
                                      method="POST"
                                      style="width: 100%">
                                    @csrf
                                    @method("PUT")
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Mật khẩu cũ</label></div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator">
                                                        <input type="password" name="OldPass" id="password">
                                                        <i class="fa fa-eye" id="togglePassword"></i>
                                                    </div>
                                                    @if($errors->has('OldPass'))
                                                        <div class="error">{{ $errors->first('OldPass') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Mật khẩu mới</label></div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator">
                                                        <input type="password" name="NewPass">
                                                    </div>
                                                    @if($errors->has('NewPass'))
                                                        <div class="error">{{ $errors->first('NewPass') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Nhập lại mật khẩu mới</label>
                                            </div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator">
                                                        <input type="password" name="NewPassCheck">
                                                    </div>
                                                    @if($errors->has('NewPassCheck'))
                                                        <div class="error">{{ $errors->first('NewPassCheck') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="Slug" value="{{$account->Slug}}">
                                    <div class="my-account-page__submit">
                                        <button type="submit" id="button"
                                                class="btn btn-solid-primary btn--m btn--inline"
                                                aria-disabled="false">Lưu
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
