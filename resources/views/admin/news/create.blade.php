@extends('admin.layouts.master')
@section('specific_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/selectize.js')}}"></script>
    <script>
        $('.selectize-multiple').selectize({
            delimiter: ',',
            persist: false,
            create: function (input) {
                return {value: input, text: input};
            }
        });
    </script>
    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'rdjyel16',
                multiple: true,
                form: '#product_form',
                folder: 'PetCasa/NewThumbnails',
                fieldName: 'thumbnails[]',
                thumbnails: '.thumbnails'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var arrayThumnailInputs = document.querySelectorAll('input[name="thumbnails[]"]');
                    for (let i = 0; i < arrayThumnailInputs.length; i++) {
                        arrayThumnailInputs[i].value = arrayThumnailInputs[i].getAttribute('data-cloudinary-public-id');
                    }
                    console.log(arrayThumnailInputs)
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
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
@section('specific_css')
    <link rel="stylesheet" href="{{asset('assets/admin/css/selectize.bootstrap4.css')}}">
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
                            <li class="breadcrumb-item active">Quản lý tin tức</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý tin tức</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">Thêm mới tin tức : </h4>
                    <form action="{{route('admin_new_store')}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="Title">Tiêu đề<span class="text-danger">*</span></label>
                            <input type="text" name="Title" parsley-trigger="change" required=""
                                   class="form-control" id="Title" value="{{old('Title')}}">
                            @if ($errors->has('Title'))
                                <label class="alert-warning">{{$errors->first('Title')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Content">Nội dung bài viết :<span class="text-danger">*</span></label>
                            <textarea id="editor" name="Content" class="form-control"
                                      placeholder="">{{old('Content')}}</textarea>
                            @if ($errors->has('Content'))
                                <label class="alert-warning">{{$errors->first('Content')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Author">Tác giả<span class="text-danger">*</span></label>
                            <input type="text" name="Author" parsley-trigger="change" required=""
                                   class="form-control" id="Author" value="{{old('Author')}}">
                            @if ($errors->has('Author'))
                                <label class="alert-warning">{{$errors->first('Author')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">Ảnh<span class="text-danger">*</span></label>
                            <button type="button" id="upload_widget" class="btn-primary btn">Upload</button>
                            <div class="thumbnails"></div>
                            @if ($errors->has('thumbnails'))
                                <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Category_id">Chọn chuyên mục<span class="text-danger">*</span></label>
                            <select class="form-control" id="select-7" name="Category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->Name}}</option>
                                @endforeach
                            </select>
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