@extends('admin.layouts.master')
@section('specific_css')
    <style>
        input,
        select {
            max-width: 300px;
        }
    </style>
@endsection
@section('specific_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'rdjyel16',
                multiple: false,
                form: '#product_form',
                folder: 'PetCasa/UserAvatar',
                fieldName: 'avatar',
                thumbnails: '.avatar'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var thumbnailInput = document.querySelectorAll('input[name="avatar"]');
                    thumbnailInput.value = thumbnailInput.getAttribute('data-cloudinary-public-id');
                    console.log(thumbnailInput)
                }
            }
        );
        $('#upload_widget').click(function () {
            myWidget.open();
        })

        // xử lý js trên dynamic content.
        $('body').on('click', '.cloudinary-delete', function () {
            // var splittedImg = $(this).parent().find('img').attr('src').split('/');
            // var imgName = splittedImg[splittedImg.length - 1];
            // imgName = imgName.split('.');
            // $(this).parent().remove();
            // console.log($(this).parent());
            // var imgName = splittedImg[splittedImg.length - 3] +'/'+ splittedImg[splittedImg.length - 2] +'/'+ splittedImg[splittedImg.length - 1];
            // console.log('input[data-cloudinary-public-id="' + imgName + '"]')
            // $('input[data-cloudinary-public-id="' + imgName + '"]').remove();
            // var input = document.querySelector('[data-cloudinary-public-id="' + splittedImg[splittedImg.length - 3] +'/'+ splittedImg[splittedImg.length - 2] +'/'+ splittedImg[splittedImg.length - 1] +'"]');
            // console.log(input);
            // input.remove()
            // console.log(input);
            // console.log("Remove image : " + "sucessful");
            let publicId = JSON.parse($(this).parent().attr('data-cloudinary')).public_id;
            $(`input[data-cloudinary-public-id="${publicId}"]`).remove();
        });
    </script>
    {{--    <script>--}}
    {{--        ClassicEditor--}}
    {{--            .create(document.querySelector('#editor'))--}}
    {{--            .then(editor => {--}}
    {{--                console.log(editor);--}}
    {{--            })--}}
    {{--            .catch(error => {--}}
    {{--                console.error(error);--}}
    {{--            });--}}
    {{--    </script>--}}
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Quản lý tài khoản</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý tài khoản</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">Thêm mới tài khoản : </h4>
                    <form action="{{route('admin_account_store')}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="FullName">Họ và tên<span class="text-danger">*</span></label>
                                <input type="text" name="FullName" parsley-trigger="change" required=""
                                       class="form-control" id="FullName" value="{{old('FullName')}}">
                                @if ($errors->has('FullName'))
                                    <label class="alert-warning">{{$errors->first('FullName')}}</label>
                                @endif
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="Password">Mật khẩu<span class="text-danger">*</span></label>
                                <input type="password" name="Password" parsley-trigger="change" required=""
                                       class="form-control" id="Password" value="{{old('Password')}}">
                                @if ($errors->has('Password'))
                                    <label class="alert-warning">{{$errors->first('Password')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="Email">Email<span class="text-danger">*</span></label>
                                <input type="text" name="Email" parsley-trigger="change" required=""
                                       class="form-control" id="Email" value="{{old('Email')}}">
                                @if ($errors->has('Email'))
                                    <label class="alert-warning">{{$errors->first('Email')}}</label>
                                @endif
                            </div>
                            <div class="form-group col-lg-6" style="padding-top: 15px;">
                                <label for="userName">Hình Đại Diện<span class="text-danger">*</span></label>
                                &nbsp;&nbsp;&nbsp;<button type="button" id="upload_widget" class="btn-primary btn">
                                    Upload
                                </button>
                                <div class="avatar"></div>
                                @if ($errors->has('avatar'))
                                    <label class="alert-warning">{{$errors->first('avatar')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="DateOfBirth">Ngày sinh<span class="text-danger">*</span></label>
                                <input type="date" name="DateOfBirth" parsley-trigger="change" required=""
                                       class="form-control" id="DateOfBirth" value="{{old('DateOfBirth')}}">
                                @if ($errors->has('DateOfBirth'))
                                    <label class="alert-warning">{{$errors->first('DateOfBirth')}}</label>
                                @endif
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="PhoneNumber">Số điện thoại<span class="text-danger">*</span></label>
                                <input type="number" name="PhoneNumber" parsley-trigger="change" required=""
                                       class="form-control" id="PhoneNumber" value="{{old('PhoneNumber')}}">
                                @if ($errors->has('PhoneNumber'))
                                    <label class="alert-warning">{{$errors->first('PhoneNumber')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="Address">Địa chỉ <span class="text-danger">*</span></label>
                                <input type="text" name="Address" parsley-trigger="change" required=""
                                       class="form-control" id="Address" value="{{old('Address')}}">
                                @if ($errors->has('Address'))
                                    <label class="alert-warning">{{$errors->first('Address')}}</label>
                                @endif
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="IDNo">Chứng Minh Thư / Thẻ Căn Cước <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="IDNo" parsley-trigger="change" required=""
                                       class="form-control" id="IDNo" value="{{old('IDNo')}}">
                                @if ($errors->has('IDNo'))
                                    <label class="alert-warning">{{$errors->first('IDNo')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-lg-6" style="padding-left: unset">
                            <label for="Role_id">Quyền<span class="text-danger">*</span></label>
                            <select class="form-control select-form-control" name="Role_id">
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                                @if (session()->get('current_account')->Role_id == 'superadmin')
                                    <option value="3">SuperAdmin</option>
                                @endif
                            </select>
                            @if ($errors->has('Role_id'))
                                <label class="alert-warning">{{$errors->first('Role_id')}}</label>
                            @endif
                        </div>
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                Cancel
                            </button>
                        </div>

                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection
