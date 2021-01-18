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
                    <form action="{{route('admin_pet_store')}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="FullName">Tên<span class="text-danger">*</span></label>
                            <input type="text" name="Name" parsley-trigger="change" required=""
                                   class="form-control" id="Name" value="{{old('Name')}}">
                            @if ($errors->has('Name'))
                                <label class="alert-warning">{{$errors->first('Name')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Giấy tờ khai sinh<span class="text-danger">*</span></label>
                            <input type="radio" name="CertifiedPedigree" parsley-trigger="change" required=""
                                   id="CertifiedPedigreeYes" value="Có"><label for="CertifiedPedigreeYes">Có</label>
                            <input type="radio" name="CertifiedPedigree" parsley-trigger="change" required=""
                                   id="CertifiedPedigreeNo" value="Không" checked><label
                                    for="CertifiedPedigreeNo">Không</label>
                            @if ($errors->has('CertifiedPedigree'))
                                <label class="alert-warning">{{$errors->first('CertifiedPedigree')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Description">Mô tả<span class="text-danger">*</span></label>
                            <textarea id="editor" name="Description" class="form-control"
                                              placeholder=""></textarea>
                            @if ($errors->has('Description'))
                                <label class="alert-warning">{{$errors->first('Description')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="SpeciesSort">Loài<span class="text-danger">*</span></label>
                            <select class="form-control select-form-control" name="SpeciesSort" class="form-control" id="SpeciesSort" required="">
                                <option value="Chó">Chó</option>
                                <option value="Mèo">Mèo</option>
                                <option value="Vịt">Vịt</option>
                            </select>
                            @if ($errors->has('SpeciesSort'))
                                <label class="alert-warning">{{$errors->first('SpeciesSort')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Species">Giống<span class="text-danger">*</span></label>
                            <input type="text" name="Species" parsley-trigger="change" required=""
                                   class="form-control" id="Species" value="{{old('Species')}}">
                            @if ($errors->has('Species'))
                                <label class="alert-warning">{{$errors->first('Species')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Age">Tuổi<span class="text-danger">*</span></label>
                            <input type="text" name="Age" parsley-trigger="change" required=""
                                   class="form-control" id="Age" value="{{old('Age')}}">
                            @if ($errors->has('Age'))
                                <label class="alert-warning">{{$errors->first('Age')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">Thumnails<span class="text-danger">*</span></label>
                            <button type="button" id="upload_widget" class="btn-primary btn">Upload</button>
                            <div class="thumbnails"></div>
                            @if ($errors->has('thumbnails'))
                                <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Giới tính<span class="text-danger">*</span></label>
                            <input type="radio" name="Sex" parsley-trigger="change" required=""
                                   id="SexMale" value="Đực"><label for="SexMale">Đực</label>
                            <input type="radio" name="Sex" parsley-trigger="change" required=""
                                   id="SexFemale" value="Cái"><label for="SexFemale">Cái</label>
                            @if ($errors->has('Sex'))
                                <label class="alert-warning">{{$errors->first('Sex')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Triệt sản<span class="text-danger">*</span></label>
                            <input type="radio" name="Neutered" parsley-trigger="change" required=""
                                   id="NeuteredYes" value="Yes"><label for="NeuteredYes">Có</label>
                            <input type="radio" name="Neutered" parsley-trigger="change" required=""
                                   id="NeuteredNo" value="No"><label for="NeuteredNo">Không</label>
                            @if ($errors->has('Neutered'))
                                <label class="alert-warning">{{$errors->first('Neutered')}}</label>
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