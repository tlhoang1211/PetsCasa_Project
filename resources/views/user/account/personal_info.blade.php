@extends('user.layouts.master')
@section('title')
    Personal Info
@endsection
@section('specific_css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
    <link href="{{asset('assets/user/css/personal_info.css')}}" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('specific_js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'rdjyel16',
                multiple: false,
                form: '#account_form',
                folder: 'PetCasa/UserAvatar',
                fieldName: 'avatar',
                thumbnails: '.avatar'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.secure_url);
                    var thumbnail = document.querySelector('.avatar-uploader__avatar-image');
                    var thumbnail1 = document.querySelector('.petscasa-avatar__img');
                    var urlString = 'url(' + result.info.secure_url + ')';
                    thumbnail.style.backgroundImage = urlString;
                    // var thumbnailInput = document.querySelector('input[name="avatar"]');
                    // thumbnailInput.value = thumbnailInput.getAttribute('data-cloudinary-public-id');
                    document.querySelector('input[name="avatar"]').remove();
                    var thumbnailInput = document.querySelector('input[name="avatar"]');
                    thumbnailInput.value = thumbnailInput.getAttribute('data-cloudinary-public-id');
                    console.log(result.info);
                    console.log(thumbnailInput.getAttribute('data-cloudinary-public-id'));
                    // let publicId = JSON.parse($(this).parent().attr('data-cloudinary')).public_id;
                    // console.log(publicId);
                }
            }
        );
        $('#upload_widget').click(function () {
            myWidget.open();
        })

        // xử lý js trên dynamic content.
        $('body').on('click', '.cloudinary-delete', function () {
            let publicId = JSON.parse($(this).parent().attr('data-cloudinary')).public_id;
            $(`input[data-cloudinary-public-id="${publicId}"]`).remove();
        });
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy'
        });
    </script>
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
    @if(isset($error))
        <script>
            $(document).ready(function () {
                toastr["error"]("Cập nhập thông tin cá nhân không thành công!")

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
                toastr["success"]("Cập nhập thông tin cá nhân thành công!")

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
@endsection
@section('content')
    {{--    {{dd($current_account)}}--}}
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
                                         src="{{$current_account->Avatar128x128}}">
                                </div>
                            </a>
                            <div class="user-page-brief__right">
                                <div class="user-page-brief__username">{{$current_account->FullName}}</div>
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
                                     style="background-color: #48A06A;">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="userpage-sidebar-menu-entry__text" style="color: #48A06A">
                                    Tài khoản của tôi
                                </div>
                            </a>
                        </div>
                        <div class="userpage-sidebar-menu">
                            <a class="userpage-sidebar-menu-entry"
                               href="{{route('user_account_change_password', $current_account->Slug)}}">
                                <div class="userpage-sidebar-menu-entry__icon" style="background-color: black">
                                    <i class="fa fa-key"></i>
                                </div>
                                <div class="userpage-sidebar-menu-entry__text" style="color: black">
                                    Thay đổi mật khẩu
                                </div>
                            </a>
                        </div>
                        <div class="userpage-sidebar-menu">
                            <a class="userpage-sidebar-menu-entry"
                               href="{{route('user_account_update_timeline', $current_account->Slug)}}">
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
                                <div class="my-account-section__header-subtitle">Quản lý thông tin hồ sơ để
                                    bảo mật tài khoản
                                </div>
                            </div>
                        </div>
                        <div class="my-account-profile">
                            <div class="my-account-profile__left">
                                <form id="account_form" action="{{route('personal_info_update')}}" method="POST"
                                      style="width: 100%">
                                    @csrf
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Tên</label></div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator"><input type="text"
                                                                                             placeholder=""
                                                                                             value="{{$current_account->FullName}}"
                                                                                             name="FullName">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Email</label></div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator"><input type="text"
                                                                                             placeholder=""
                                                                                             value="{{$current_account->Email}}"
                                                                                             name="Email">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label for="password">Mật khẩu mã
                                                    hoá</label>
                                            </div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator">
                                                        <input type="password"
                                                               placeholder=""
                                                               value="{{$current_account->PasswordHash}}"
                                                               name="Password"
                                                               id="password">
                                                        <i class="fa fa-eye" id="togglePassword"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Số điện thoại</label>
                                            </div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator"><input type="text"
                                                                                             placeholder=""
                                                                                             value="{{$current_account->PhoneNumber}}"
                                                                                             name="PhoneNumber">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Địa chỉ</label></div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator"><input type="text"
                                                                                             placeholder=""
                                                                                             value="{{$current_account->Address}}"
                                                                                             name="Address">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Số CMND</label></div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator"><input type="text"
                                                                                             placeholder=""
                                                                                             value="{{$current_account->IDNo}}"
                                                                                             name="IDNo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper birthday-choose">
                                            <div class="input-with-label__label"><label>Ngày sinh</label></div>
                                            <div class="input-with-label__content">
                                                <input id="datepicker" width="50%"
                                                       value="{{date("d/m/Y", strtotime($current_account->DateOfBirth))}}"
                                                       name="DateOfBirth"/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="Slug" value="{{$current_account->Slug}}">
                                    <input type="hidden" name="avatar"
                                           data-cloudinary-public-id="{{$current_account->Avatar}}"
                                           value="{{$current_account->Avatar}}">
                                    <div class="my-account-page__submit">
                                        <button type="submit" class="btn btn-solid-primary btn--m btn--inline"
                                                aria-disabled="false">Lưu
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="my-account-profile__right">
                                <div class="avatar-uploader">
                                    <div class="avatar-uploader__avatar">
                                        <div class="avatar-uploader__avatar-image"
                                             style="background-image: url('{{$current_account->Avatar128x128}}');"></div>
                                    </div>
                                    <input class="avatar-uploader__file-input" type="file" accept=".jpg,.jpeg,.png">
                                    {{-- <button type="button" class="btn btn-light btn--m btn--inline">Chọn ảnh</button> --}}
                                    <button type="button" id="upload_widget" class="btn-primary btn">Chọn ảnh</button>
                                    <div class="avatar" style="display: none"></div>
                                    @if ($errors->has('thumbnails'))
                                        <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                                    @endif
                                    <div class="avatar-uploader__text-container">
                                        <div class="avatar-uploader__text">Dụng lượng file tối đa 1 MB</div>
                                        <div class="avatar-uploader__text">Định dạng:.JPEG, .PNG</div>
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
