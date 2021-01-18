@extends('admin.layouts.master')
@section('specific_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'rdjyel16',
                multiple: true,
                form: '#product_form',
                folder: 'PetCasa/PetThumbnails',
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
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            // var imgName = splittedImg[splittedImg.length - 1];
            // imgName = imgName.split('.');
            // $(this).parent().remove();
            // console.log($(this).parent());
            var imgName = splittedImg[splittedImg.length - 3] + '/' + splittedImg[splittedImg.length - 2] + '/' + splittedImg[splittedImg.length - 1];
            // console.log('input[data-cloudinary-public-id="' + imgName + '"]')
            // $('input[data-cloudinary-public-id="' + imgName + '"]').remove();
            // var input = document.querySelector('[data-cloudinary-public-id="' + splittedImg[splittedImg.length - 3] +'/'+ splittedImg[splittedImg.length - 2] +'/'+ splittedImg[splittedImg.length - 1] +'"]');
            // console.log(input);
            // input.remove()
            // console.log(input);
            // console.log("Remove image : " + "sucessful");
            console.log(imgName)
            // console.log($(this).parent().attr('data-cloudinary'))
            var publicId = $(this).parent().attr('data-cloudinary');
            $(this).parent().remove();
            // let publicId = JSON.parse($(this).parent().attr('data-cloudinary')).public_id;
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
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pet Casa</a></li>
                            <li class="breadcrumb-item active">Quản lý báo cáo</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý báo cáo</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">Chỉnh sửa thông tin báo cáo : </h4>
                    <form action="{{route('admin_report_update',$report->id)}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="FullName">Họ và tên<span class="text-danger">*</span></label>
                            <input type="text" name="FullName" parsley-trigger="change" required=""
                                   class="form-control" id="FullName" value="{{$report->FullName}}" style="width: 30%;">
                            @if ($errors->has('FullName'))
                                <label class="alert-warning">{{$errors->first('FullName')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Address">Địa chỉ <span class="text-danger">*</span></label>
                            <input type="text" name="Address" parsley-trigger="change" required=""
                                   class="form-control" id="Address" value="{{$report->Address}}" style="width: 45%;">
                            @if ($errors->has('Address'))
                                <label class="alert-warning">{{$errors->first('Address')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PhoneNumber">Số điện thoại<span class="text-danger">*</span></label>
                            <input type="text" name="PhoneNumber" parsley-trigger="change" required=""
                                   class="form-control" id="PhoneNumber" value="{{$report->PhoneNumber}}"
                                   style="width: 10%;">
                            @if ($errors->has('PhoneNumber'))
                                <label class="alert-warning">{{$errors->first('PhoneNumber')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Content">Nội dung<span class="text-danger">*</span></label>
                            <textarea id="editor" name="Content" class="form-control"
                                      placeholder="">{{$report->Content}}</textarea>
                            @if ($errors->has('Content'))
                                <label class="alert-warning">{{$errors->first('Content')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">Thumnails<span class="text-danger">*</span></label>
                            <button disabled type="button" id="upload_widget" class="btn-primary btn">Upload</button>
                            <div class="thumbnails">
                                <ul class="cloudinary-thumbnails">
                                    @foreach($report->ArrayThumbnails450x450 as $thumbnail)
                                        <li class="cloudinary-thumbnail active" data-cloudinary="{{$thumbnail}}">
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
                        <div class="form-group" style="width:10%;">
                            <label for="Status">Trạng thái<span class="text-danger">*</span></label>
                            <select name="Status" class="form-control select-form-control"
                                    @if ($report->Status == 2 ) disabled @endif>
                                <option value="0" @if ( $report->Status == 0 ) selected
                                        @endif @if ( $report->Status != 0 ) disabled @endif > Chưa xử lý
                                </option>
                                <option value="1" @if ( $report->Status == 1 ) selected @endif > Đang xử lý</option>
                                <option value="2" @if ( $report->Status == 2 ) selected @endif > Đã xử lý</option>
                                <option value="3" @if ( $report->Status == 3 ) selected @endif > Từ chối</option>
                            </select>
                            @if ($errors->has('thumbnails'))
                                <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                            @endif
                        </div>
                        @foreach($report->ArrayThumbnails as $thumbnail)
                            <input type="hidden" name="thumbnails[]" data-cloudinary-public-id="{{$thumbnail}}"
                                   value="{{$thumbnail}}">
                        @endforeach
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1">
                                Cập nhật
                            </button>
                            <a class="btn btn-secondary waves-effect waves-light" href="{{route('admin_report_list')}}">
                                Hủy
                            </a>
                        </div>

                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>

@endsection