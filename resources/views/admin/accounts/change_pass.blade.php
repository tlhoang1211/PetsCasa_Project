@extends('admin.layouts.master')
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
                    var thumbnailInput = document.querySelector('input[name="avatar"]');
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
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            // var imgName = splittedImg[splittedImg.length - 1];
            // imgName = imgName.split('.');

            // console.log($(this).parent());
            var imgName = splittedImg[splittedImg.length - 3] +'/'+ splittedImg[splittedImg.length - 2] +'/'+ splittedImg[splittedImg.length - 1];
            // console.log('input[data-cloudinary-public-id="' + imgName + '"]')
            // $('input[data-cloudinary-public-id="' + imgName + '"]').remove();
            // var input = document.querySelector('[data-cloudinary-public-id="' + splittedImg[splittedImg.length - 3] +'/'+ splittedImg[splittedImg.length - 2] +'/'+ splittedImg[splittedImg.length - 1] +'"]');
            // console.log(input);
            // input.remove()
            // console.log(input);
            // console.log("Remove image : " + "sucessful");
            // let publicId = JSON.parse($(this).parent().attr('data-cloudinary')).public_id;
            $(this).parent().remove();
            console.log($(this).parent())
            $(`input[data-cloudinary-public-id="${imgName}"]`).remove();
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pet Casa</a></li>
                            <li class="breadcrumb-item active">Quản lý tài khoản</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý tài khoản</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title">Thay đổi mật khẩu : </h4>
                    <form action="{{route('admin_change_password',$account->Slug)}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')
{{--                        <div class="form-group">--}}
{{--                            <label for="oldPassword">Mật khẩu cũ<span class="text-danger">*</span></label>--}}
{{--                            <input type="password" name="oldPassword" parsley-trigger="change" required=""--}}
{{--                                   value="{{$account->oldPassword}}" class="form-control" id="oldPassword">--}}
{{--                            @if ($errors->has('oldPassword'))--}}
{{--                                <label class="alert-warning">{{$errors->first('oldPassword')}}</label>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="newPassword">Mật khẩu mới<span class="text-danger">*</span></label>
                            <input type="password" name="newPassword" parsley-trigger="change" required=""
                                   value="{{$account->newPassword}}" class="form-control" id="newPassword" style="width: 30%">
                            @if ($errors->has('newPassword'))
                                <label class="alert-warning">{{$errors->first('newPassword')}}</label>
                            @endif
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="newPassword">Nhập lại mật khẩu mới<span class="text-danger">*</span></label>--}}
{{--                            <input type="password" name="newPassword2" parsley-trigger="change" required=""--}}
{{--                                   value="{{$account->newPassword2}}" class="form-control" id="newPassword2">--}}
{{--                            @if ($errors->has('newPassword2'))--}}
{{--                                <label class="alert-warning">{{$errors->first('newPassword2')}}</label>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                        <input type="hidden" name="Slug" value="{{$account->Slug}}">
{{--                        <input type="hidden" name="avatar" data-cloudinary-public-id="{{$account->Avatar}}" value="{{$account->Avatar}}">--}}
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                Cập nhật
                            </button>
                            <a class="btn btn-secondary waves-effect waves-light mr-1" href="{{route('admin_account_list')}}" style="color: yellow">Trở lại danh sách</a>
                        </div>

                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection