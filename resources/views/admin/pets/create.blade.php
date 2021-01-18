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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pet Casa</a></li>
                            <li class="breadcrumb-item active">Quản lý thú nuôi</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý thú nuôi</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">Thêm mới thú nuôi : </h4>
                    <form action="{{route('admin_pet_store')}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="FullName">Tên<span class="text-danger">*</span></label>
                            <input type="text" name="Name" parsley-trigger="change" required=""
                                   class="form-control" id="Name" value="{{old('Name')}}" style="width: 20%">
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
                            <label for="Species">Loài<span class="text-danger">*</span></label>
                            <select class="form-control select-form-control" name="Species" class="form-control"
                                    id="Species" required="" style="width: 10%">
                                <option value="Chó">Chó</option>
                                <option value="Mèo">Mèo</option>
                                <option value="Vịt">Vịt</option>
                            </select>
                            @if ($errors->has('Species'))
                                <label class="alert-warning">{{$errors->first('Species')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Breed">Giống<span class="text-danger">*</span></label>
                            <input type="text" name="Breed" parsley-trigger="change" required=""
                                   class="form-control" id="Breed" value="{{old('Breed')}}" style="width: 20%">
                            @if ($errors->has('Breed'))
                                <label class="alert-warning">{{$errors->first('Breed')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Age">Tuổi<span class="text-danger">*</span></label>
                            <select class="form-control select-form-control" name="Age" class="form-control"
                                    id="Species" required="" style="width: 15%">
                                <option value="{{\Carbon\Carbon::now()->addDays(-150)}}"> Dưới 6 tháng</option>
                                <option value="{{\Carbon\Carbon::now()->addDays(-540)}}"> Từ 6 tháng đến 2 năm</option>
                                <option value="{{\Carbon\Carbon::now()->addDays(-780)}}"> Trên 2 năm</option>
                            </select>
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
                        <div class="form-group">
                            <label>Tiêm phòng<span class="text-danger">*</span></label>
                            <input type="radio" name="Vaccinated" parsley-trigger="change" required=""
                                   id="VaccinatedYes" value="Có"><label for="VaccinatedYes">Có</label>
                            <input type="radio" name="Vaccinated" parsley-trigger="change" required=""
                                   id="VaccinatedNo" value="Không"><label for="VaccinatedNo">Không</label>
                            @if ($errors->has('Vaccinated'))
                                <label class="alert-warning">{{$errors->first('Vaccinated')}}</label>
                            @endif
                        </div>
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                Thêm
                            </button>
                            <a href="{{route('admin_pet_list')}}" class="btn btn-secondary waves-effect waves-light">
                                Trở lại danh sách
                            </a>
                        </div>

                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection