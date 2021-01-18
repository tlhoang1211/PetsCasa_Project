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
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title">Chi tiết yêu cầu : </h4>
                    <div id="product_form" method="POST"
                         class="parsley-examples" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label>Loại yêu cầu<span class="text-danger">*</span></label>
                            <input disabled type="radio" name="OrderType" parsley-trigger="change" required=""
                                   id="OrderTypeYes" value="Nhận nuôi" @if ($order->OrderType == "Nhận nuôi")
                                   checked
                                    @endif><label for="OrderTypeYes">Nhận nuôi</label>
                            <input disabled type="radio" name="OrderType" parsley-trigger="change" required=""
                                   id="OrderTypeNo" value="Gửi nuôi" @if ($order->OrderType == "Gửi nuôi")
                                   checked
                                    @endif><label
                                    for="OrderTypeNo">Gửi nuôi</label>
                            @if ($errors->has('OrderType'))
                                <label class="alert-warning">{{$errors->first('OrderType')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="FullName">Họ và tên<span class="text-danger">*</span></label>
                            <input disabled type="text" name="FullName" parsley-trigger="change" required=""
                                   value="{{$order->FullName}}" class="form-control" id="FullName">
                            @if ($errors->has('FullName'))
                                <label class="alert-warning">{{$errors->first('FullName')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PhoneNumber">Số điện thoại<span class="text-danger">*</span></label>
                            <input disabled type="number" name="PhoneNumber" parsley-trigger="change" required=""
                                   value="{{$order->PhoneNumber}}" class="form-control" id="PhoneNumber">
                            @if ($errors->has('PhoneNumber'))
                                <label class="alert-warning">{{$errors->first('PhoneNumber')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Email">Email<span class="text-danger">*</span></label>
                            <input disabled type="text" name="Email" parsley-trigger="change" required=""
                                   value="{{$order->Email}}" class="form-control" id="Email">
                            @if ($errors->has('Email'))
                                <label class="alert-warning">{{$errors->first('Email')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PetId">Loài<span class="text-danger">*</span></label>
                            <select class="form-control select-form-control" disabled name="PetId" class="form-control" id="PetId" required="">
                                <option value="{{$pet->id}}" @if ($order->PetId == $pet->id)
                                        selected
                                    @endif>{{$pet->Name}} | Id : {{$pet->Slug}}</option>
                            </select>
                            @if ($errors->has('PetId'))
                                <label class="alert-warning">{{$errors->first('PetId')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="IDNo">Chứng minh nhân dân / Thẻ căn cước<span
                                        class="text-danger">*</span></label>
                            <input disabled type="text" name="IDNo" parsley-trigger="change" required=""
                                   value="{{$order->IDNo}}" class="form-control" id="IDNo">
                            @if ($errors->has('IDNo'))
                                <label class="alert-warning">{{$errors->first('IDNo')}}</label>
                            @endif
                        </div>
                        @if ($order->Status == 0)
                            <div class="form-group text-right mb-0">
                                <div class="form-group" style="display: flex">
                                    <form action="{{route('admin_order_acept',$order->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary waves-effect waves-light mr-1"
                                                href="{{route('admin_order_acept',$order->id)}}">
                                            Chấp nhận
                                        </button>
                                    </form>

                                    <form action="{{route('admin_order_decline',$order->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-secondary waves-effect waves-light"
                                                href="{{route('admin_order_decline',$order->id)}}">
                                            Từ chối
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                                <a class="btn btn-primary waves-effect waves-light mr-1"
                                        href="{{route('admin_order_list')}}">
                                    Trở lại danh sách
                                </a>
                        @endif
                    </div>

                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection