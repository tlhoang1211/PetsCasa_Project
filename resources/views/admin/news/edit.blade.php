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
                multiple: false,
                form: '#product_form',
                folder: 'PetCasa/NewThumbnails',
                fieldName: 'thumbnails[]',
                thumbnails: '.thumbnails'
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
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            var imgName = splittedImg[splittedImg.length - 3] + '/' + splittedImg[splittedImg.length - 2] + '/' + splittedImg[splittedImg.length - 1];
            console.log(imgName);
            var publicId = $(this).parent().attr('data-cloudinary');
            $(this).parent().remove();
            $(`input[data-cloudinary-public-id="${imgName}"]`).remove();
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
                    <h4 class="header-title">Chỉnh sửa thông tin bài viết : </h4>
                    <form action="{{route('admin_new_update',$new->id)}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="Title">Tiêu đề<span class="text-danger">*</span></label>
                                    <input type="text" name="Title" parsley-trigger="change" required=""
                                           class="form-control" id="Title" value="{{$new->Title}}">
                                    @if ($errors->has('Title'))
                                        <label class="alert-warning">{{$errors->first('Title')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="userName">Thumnails<span class="text-danger">*</span></label>
                                    <button type="button" id="upload_widget" class="btn-primary btn">Upload</button>
                                    <div class="thumbnails">
                                        <ul class="cloudinary-thumbnails">
                                            @foreach($new->ArrayThumbnails450x450 as $thumbnail)
                                                <li class="cloudinary-thumbnail active"
                                                    data-cloudinary="{{$thumbnail}}">
                                                    <img src="{{$thumbnail}}" style="width: 300px;height: 300px">
                                                    <a href="#" class="cloudinary-delete">x</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @if ($errors->has('thumbnails'))
                                        <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                                    @endif
                                </div>
                                <div class="form-group" style="width: 200%">
                                    <label for="Content">Nội dung<span class="text-danger">*</span></label>
                                    <textarea id="editor" name="Content" class="form-control"
                                              placeholder="">{{$new->Content}}</textarea>
                                    @if ($errors->has('Content'))
                                        <label class="alert-warning">{{$errors->first('Content')}}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Category_id">Chọn chuyên mục<span
                                                        class="text-danger">*</span></label>
                                            <select class="form-control" id="select-7" name="Category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                            @if ($new->Category_id == $category->id) selected @endif>{{$category->Name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Status">Trạng thái bài viết<span
                                                        class="text-danger">*</span></label>
                                            <select class="form-control" id="select-7" name="Status">
                                                <option value="0" @if ($new->Status == 0) selected @endif>Không hoạt
                                                    động
                                                </option>
                                                <option value="1" @if ($new->Status == 1) selected @endif>Hoạt động
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Author">Tác giả<span class="text-danger">*</span></label>
                                    <input type="text" name="Author" parsley-trigger="change" required=""
                                           class="form-control" id="Author" value="{{$new->Author}}">
                                    @if ($errors->has('Author'))
                                        <label class="alert-warning">{{$errors->first('Author')}}</label>
                                    @endif
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="Status">Chọn mã thú nuôi<span class="text-danger">*</span></label>
                                        <select class="form-control selectize-multiple" id="select-7" name="PetIds[]"
                                                multiple>
                                            @foreach($pets as $pet)
                                                <option value="{{$pet->id}}"
                                                        @if (in_array($pet->id,json_decode(json_encode($new_pet_id), true))) selected @endif>{{$pet->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($new->ArrayThumbnails as $thumbnail)
                            <input type="hidden" name="thumbnails[]" data-cloudinary-public-id="{{$thumbnail}}"
                                   value="{{$thumbnail}}">
                        @endforeach
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                Cập nhật
                            </button>
                            <a class="btn btn-secondary waves-effect waves-light" href="{{route('admin_new_list')}}">
                                Trở lại danh sách
                            </a>
                        </div>
                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection