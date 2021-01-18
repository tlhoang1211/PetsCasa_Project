@extends('user.layouts.master')
@section('title')
    Timeline Update
@endsection
@section('specific_css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>s
    <link href="{{asset('assets/user/css/timeline.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/personal_info.css')}}" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <style>
        #upload_widget {
            margin: unset;
        }

        :not(svg) {
            transform-origin: unset;
        }

        .pattern3 {
            background-image: url(https://res.cloudinary.com/dwarrion/image/upload/v1599840532/PetCasa/pattern3_j3hofh.png);
            background-position: center bottom;
            background-repeat: repeat-x;
        }
    </style>
@endsection
@section('specific_js')
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <!-- Boostrap Datepicker -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy'
        });
    </script>
    <!-- Timeline show/hide -->
    <script>
        $('select').change(function () {
            if (this.value === 'Null') {
                $('.tl').hide();
            } else {
                $('.tl').hide();
                var id = this.value;
                $(`#${id}`).show();
            }
        });
    </script>
    <!-- Toast Message -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

                toastr["success"]("Gửi thành công!")
            })
        </script>
    @endif
    <!-- Widget Cloudinary -->
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'rdjyel16',
                multiple: false,
                form: '#update_timeline_form',
                folder: 'PetCasa/Timeline',
                fieldName: 'thumbnails',
                thumbnails: '.thumbnails'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var ThumnailInputs = document.querySelector('input[name="thumbnails"]')
                        ThumnailInputs.value = ThumnailInputs.getAttribute('data-cloudinary-public-id');
                    console.log(arrayThumnailInputs)
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
    <script>
        $(function () {
            $('ol li:first-child').addClass('selected');
            $('ol li:first-child a').addClass('selected');
        });
    </script>
    <script src="{{asset('assets/user/js/timeline.js')}}"></script>
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
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
                                <div class="userpage-sidebar-menu-entry__text" style="color: black">
                                    Tài khoản của tôi
                                </div>
                            </a>
                        </div>
                        <div class="userpage-sidebar-menu">
                            <a class="userpage-sidebar-menu-entry"
                               href="{{route('user_account_change_password', $account->Slug)}}">
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
                               href="{{route('user_account_update_timeline', $account->Slug)}}">
                                <div class="userpage-sidebar-menu-entry__icon" style="background-color: #48A06A">
                                    <i class="fa fa-clock"></i>
                                </div>
                                <div class="userpage-sidebar-menu-entry__text" style="color: #48A06A">
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
                                    Cập nhập timeline thú cưng được nhận nuôi
                                </div>
                            </div>
                        </div>
                        <div class="my-account-profile">
                            <div class="my-account-profile__left">
                                <form id="update_timeline_form"
                                      action="{{route('user_update_timeline',$account->Slug)}}" method="POST"
                                      style="width: 100%">
                                    @csrf
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Tên Pet</label></div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <select name="PetID" id="" class="input-with-validator"
                                                            style="width: 100%">
                                                        <option value="Null"></option>
                                                        @foreach($pets as $pet)
                                                            <option value="{{$pet->id}}">{{$pet->Name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label"><label>Nội dung</label></div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <textarea class="input-with-validator" name="Content"
                                                              rows="5" style="width: 100%; height: unset"
                                                              placeholder="Sức khoẻ bé như nào? Hành động của bé trong ảnh là gì? ..."></textarea>
                                                    @if ($errors->has('Content'))
                                                        <label
                                                            class="alert-warning">{{$errors->first('Content')}}</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper birthday-choose">
                                            <div class="input-with-label__label"><label>Ngày đăng</label></div>
                                            <div class="input-with-label__content">
                                                <input id="datepicker" width="50%"
                                                       placeholder="d/m/Y"
                                                       name="Date"
                                                       autocomplete="off"/>
                                                @if ($errors->has('Date'))
                                                    <label
                                                        class="alert-warning">{{$errors->first('Date')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper birthday-choose">
                                            <div class="input-with-label__label"><label>Ảnh</label></div>
                                            <div class="input-with-label__content">
                                                <button type="button" id="upload_widget" class="btn-primary btn">
                                                    Tải lên
                                                </button>
                                                <div class="thumbnails"></div>
                                                @if ($errors->has('thumbnails'))
                                                    <label
                                                        class="alert-warning">{{$errors->first('thumbnails')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="Slug" value="{{$account->Slug}}">
                                    <div class="my-account-page__submit">
                                        <button type="submit" class="btn btn-solid-primary btn--m btn--inline"
                                                aria-disabled="false">Lưu
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- timeline start -->
                        @foreach($pets as $pet)
                            <section class="cd-horizontal-timeline tl pattern3"
                                     style="background-color: #f8f8f8; display: none"
                                     id="{{$pet->id}}">
                                <div class="timeline">
                                    <div class="events-wrapper">
                                        <div class="events">
                                            <ol>
                                                @foreach($pet->timelines as $timeline)
                                                    <li>
                                                        <a href="#"
                                                           data-date="{{\Carbon\Carbon::parse($timeline->Date)->format('d/m/Y')}}">{{\Carbon\Carbon::parse($timeline->Date)->isoFormat('DD MMM')}}</a>
                                                    </li>
                                                @endforeach
                                            </ol>
                                            <span class="filling-line" aria-hidden="true"></span>
                                        </div> <!-- .events -->
                                    </div> <!-- .events-wrapper -->

                                    <ul class="cd-timeline-navigation">
                                        <li><a href="#" class="prev inactive">Prev</a></li>
                                        <li><a href="#" class="next">Next</a></li>
                                    </ul> <!-- .cd-timeline-navigation -->
                                </div> <!-- .timeline -->
                                <div class="events-content">
                                    <ol>
                                        @foreach($pet->timelines as $timeline)
                                            <li data-date="{{\Carbon\Carbon::parse($timeline->Date)->format('d/m/Y')}}">
                                                <h5 style="color: #808080">Cuộc sống của {{$pet->Name}}</h5>
                                                <em>{{\Carbon\Carbon::parse($timeline->Date)->format('d/m/Y')}}</em>
                                                <div class="row">
                                                    <img
                                                        src="{{$timeline->FirstThumbnail}}"
                                                        class="col-lg-5"
                                                        alt="">
                                                    <p class="col-lg-7">{{$timeline->Content}}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div> <!-- .events-content -->
                            </section>
                    @endforeach
                    <!-- timeline end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page -->
@endsection
