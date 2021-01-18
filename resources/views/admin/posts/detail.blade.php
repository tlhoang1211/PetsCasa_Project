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
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.isReadOnly = true;
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
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
                    <h4 class="header-title">Chỉnh sửa thông tin cá nhân : </h4>
                    <div id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Title">Tiêu đề<span class="text-danger">*</span></label>
                            <input disabled type="text" name="Title" parsley-trigger="change" required=""
                                   class="form-control" id="Title" value="{{$post->Title   }}">
                            @if ($errors->has('Title'))
                                <label class="alert-warning">{{$errors->first('Title')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Content">Mô tả<span class="text-danger">*</span></label>
                            <textarea id="editor" name="Content" class="form-control"
                                      placeholder="" disabled>{{$post->Content}}</textarea>
                            @if ($errors->has('Content'))
                                <label class="alert-warning">{{$errors->first('Content')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Account_id">AccountId<span class="text-danger">*</span></label>
                            <input disabled list="account" name="Account_id" value="{{$account->id}}"/>
                            @if ($errors->has('Account_id'))
                                <label class="alert-warning">{{$errors->first('Account_id')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Pet_id">PetID<span class="text-danger">*</span></label>
                            <input disabled list="pet" name="Pet_id" value="{{$pet->id}}"/>
                            @if ($errors->has('Pet_id'))
                                <label class="alert-warning">{{$errors->first('Pet_id')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Status">Status<span class="text-danger">*</span></label>
                            <select class="form-control select-form-control" name="Status" disabled>
                                if($request->Status != "All"){array_push($condition, ['Status', '=', $request->Status]);}
                        </div>
                        <div class="form-group text-right mb-0">
                            <a class="btn btn-primary waves-effect waves-light mr-1" href="{{route('admin_post_edit',$post->id)}}">
                                Sửa
                            </a>
                            <a href="{{route('admin_post_list')}}" class="btn btn-secondary waves-effect waves-light">
                                Trở lại danh sách
                            </a>
                        </div>

                    </div>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection