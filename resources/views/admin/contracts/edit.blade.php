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
                {{--editor.setData('{{$pet->Description}}', function () {--}}
                {{--    this.checkDirty();  // true--}}
                {{--});--}}
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $( "#btn-deactive" ).click(function() {
              $( "#deactive_form" ).submit();
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
                    <form action="{{route('admin_pet_update',$pet->Slug)}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="FullName">Tên<span class="text-danger">*</span></label>
                            <input type="text" name="Name" parsley-trigger="change" required=""
                                   value="{{$pet->Name}}" class="form-control" id="Name">
                            @if ($errors->has('Name'))
                                <label class="alert-warning">{{$errors->first('Name')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Giấy tờ khai sinh<span class="text-danger">*</span></label>
                            <input type="radio" name="CertifiedPedigree" parsley-trigger="change" required=""
                                   id="CertifiedPedigreeYes" value="Có"
                                   @if ($pet->CertifiedPedigree == "Có") checked @endif><label
                                    for="CertifiedPedigreeYes">Có</label>
                            <input type="radio" name="CertifiedPedigree" parsley-trigger="change" required=""
                                   id="CertifiedPedigreeNo" value="Không"
                                   @if ($pet->CertifiedPedigree == "Không") checked @endif><label
                                    for="CertifiedPedigreeNo">Không</label>
                            @if ($errors->has('CertifiedPedigree'))
                                <label class="alert-warning">{{$errors->first('CertifiedPedigree')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Description">Mô tả<span class="text-danger">*</span></label>
                            <textarea id="editor" name="Description" class="form-control"
                                      value="{{$pet->Description}}" placeholder="">{{$pet->Description}}</textarea>
                            @if ($errors->has('Description'))
                                <label class="alert-warning">{{$errors->first('Description')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="SpeciesSort">Loài<span class="text-danger">*</span></label>
                            <select class="form-control select-form-control" name="SpeciesSort" class="form-control" id="SpeciesSort" required="">
                                <option value="Chó" @if ($pet->SpeciesSort == "Chó") selected @endif>Chó</option>
                                <option value="Mèo" @if ($pet->SpeciesSort == "Mèo") selected @endif>Mèo</option>
                                <option value="Vịt" @if ($pet->SpeciesSort == "Vịt") selected @endif>Vịt</option>
                            </select>
                            @if ($errors->has('SpeciesSort'))
                                <label class="alert-warning">{{$errors->first('SpeciesSort')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Species">Giống<span class="text-danger">*</span></label>
                            <input type="text" name="Species" parsley-trigger="change" required=""
                                   class="form-control" id="Species" value="{{$pet->Species}}">
                            @if ($errors->has('Species'))
                                <label class="alert-warning">{{$errors->first('Species')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Age">Tuổi<span class="text-danger">*</span></label>
                            <input type="text" name="Age" parsley-trigger="change" required=""
                                   class="form-control" id="Age" value="{{$pet->Age}}">
                            @if ($errors->has('Age'))
                                <label class="alert-warning">{{$errors->first('Age')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">Thumnails<span class="text-danger">*</span></label>
                            <button type="button" id="upload_widget" class="btn-primary btn">Upload</button>
                            <div class="thumbnails">
                                <ul class="cloudinary-thumbnails">
                                    @foreach($pet->ArrayThumbnails450x450 as $thumbnail)
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
                        <div class="form-group">
                            <label>Giới tính<span class="text-danger">*</span></label>
                            <input type="radio" name="Sex" parsley-trigger="change" required=""
                                   id="SexMale" value="Đực" @if ($pet->Sex == "Đực") checked @endif><label
                                    for="SexMale">Đực</label>
                            <input type="radio" name="Sex" parsley-trigger="change" required=""
                                   id="SexFemale" value="Cái" @if ($pet->Sex == "Cái") checked @endif><label
                                    for="SexFemale">Cái</label>
                            @if ($errors->has('Sex'))
                                <label class="alert-warning">{{$errors->first('Sex')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Triệt sản<span class="text-danger">*</span></label>
                            <input type="radio" name="Neutered" parsley-trigger="change" required=""
                                   id="NeuteredYes" value="Yes" @if ($pet->Neutered == "Yes") checked @endif><label
                                    for="NeuteredYes">Đã triệt sản</label>
                            <input type="radio" name="Neutered" parsley-trigger="change" required=""
                                   id="NeuteredNo" value="No" @if ($pet->Neutered == "No") checked @endif><label
                                    for="NeuteredNo">Chưa triệt sản</label>
                            @if ($errors->has('Neutered'))
                                <label class="alert-warning">{{$errors->first('Neutered')}}</label>
                            @endif
                        </div>
                        @foreach($pet->ArrayThumbnails as $thumbnail)
                            <input type="hidden" name="avatar" data-cloudinary-public-id="{{$thumbnail}}" value="{{$thumbnail}}">
                        @endforeach
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                Submit
                            </button>
                            <button class="btn btn-secondary btn-table" id="btn-deactive"> Deactive</button>
                        </div>
                    </form>
                <form id="deactive_form" action="{{route('admin_pet_deactive',$pet->id)}}"method="POST">
                                @csrf @method('PUT')
                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection