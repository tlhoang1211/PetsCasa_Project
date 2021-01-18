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
            var imgName = splittedImg[splittedImg.length - 3] +'/'+ splittedImg[splittedImg.length - 2] +'/'+ splittedImg[splittedImg.length - 1];
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
                editor.isReadOnly = true;
                {{--editor.setData('{{$contract->Description}}', function () {--}}
                {{--    this.checkDirty();  // true--}}
                {{--});--}}
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
                    <h4 class="header-title">Xem thông tin cá nhân : </h4>
                    <form action="#" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="FullName">Mã Order<span class="text-danger">*</span></label>
                            <input disabled type="text" name="Name" parsley-trigger="change" required=""
                                   value="{{$contract->Order_id}}" class="form-control" id="Name">
                            @if ($errors->has('Order_id'))
                                <label class="alert-warning">{{$errors->first('Order_id')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Description">Mô tả<span class="text-danger">*</span></label>
                            <textarea id="editor" name="Description" class="form-control"
                                      value="{{$contract->Content}}" placeholder="">{{$contract->Content}}</textarea>
                            @if ($errors->has('Description'))
                                <label class="alert-warning">{{$errors->first('Description')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ContractDateStart">Ngày bắt đầu<span class="text-danger">*</span></label>
                            <input disabled type="date" value="{{$contract->ContractDateStart}}">
                            @if ($errors->has('ContractDateStart'))
                                <label class="alert-warning">{{$errors->first('ContractDateStart')}}</label>
                            @endif
                            <label for="ContractDateEnd">Ngày kết thúc<span class="text-danger">*</span></label>
                            <input disabled type="date" value="{{$contract->ContractDateEnd}}">
                            @if ($errors->has('ContractDateEnd'))
                                <label class="alert-warning">{{$errors->first('ContractDateEnd')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Species">Trạng thái<span class="text-danger">*</span></label>
                            <div>
                                @if ($contract->Status == 0)
                                    <h5 style="color: gold">Chưa bắt đầu</h5>
                                @elseif ($contract->Status == 1)
                                    <h5 style="color: mediumspringgreen">Đang thực hiện</h5>
                                @elseif ($contract->Status == 2)
                                    <h5 style="color: gray">Kết thúc</h5>
                                @else
                                    <h5 style="color: red"> Unknown Status</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-right mb-0">
                            <a type="reset" class="btn btn-secondary waves-effect waves-light" href="{{route('admin_contract_list')}}">
                                Trở lại danh sách
                            </a>
                        </div>

                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection