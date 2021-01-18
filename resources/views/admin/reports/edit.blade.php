@extends('admin.layouts.master')
@section('specific_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
        var myWidget2 = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'rdjyel16',
                multiple: true,
                form: '#add_pet_form',
                folder: 'PetCasa/PetThumbnails',
                fieldName: 'petthumbnails[]',
                thumbnails: ".uploaded",
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var arrayThumnailInputs = document.querySelectorAll('input[name="petthumbnails[]"]');
                    $(".cloudinary-thumbnails").removeClass("cloudinary-thumbnails");
                    for (let i = 0; i < arrayThumnailInputs.length; i++) {
                        arrayThumnailInputs[i].value = arrayThumnailInputs[i].getAttribute('data-cloudinary-public-id');
                    }
                    console.log(arrayThumnailInputs)
                }
            }
        );
        $('#upload_widget2').click(function () {
            myWidget2.open();
        })
        $('body').on('click', '.cloudinary-delete', function () {
            console.log('start delete')
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            var imgName = splittedImg[splittedImg.length - 3] + '/' + splittedImg[splittedImg.length - 2] + '/' + splittedImg[splittedImg.length - 1];
            var publicId = $(this).parent().attr('data-cloudinary');
            $(this).parent().remove();
            console.log($(`input[data-cloudinary-public-id="${imgName}"]`));
            $(`input[data-cloudinary-public-id="${imgName}"]`).remove();
            console.log('end delete');
        });
    </script>
    <script type="text/javascript">
        var myWidget3 = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'rdjyel16',
                multiple: true,
                form: '#new_form',
                folder: 'PetCasa/NewThumbnails',
                fieldName: 'thumbnails[]',
                thumbnails: '.other-thumbnails'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var arrayThumnailInputs = document.querySelectorAll('input[name="thumbnails[]"]');
                    $(".cloudinary-thumbnails").removeClass("cloudinary-thumbnails");
                    for (let i = 0; i < arrayThumnailInputs.length; i++) {
                        arrayThumnailInputs[i].value = arrayThumnailInputs[i].getAttribute('data-cloudinary-public-id');
                    }
                    $('#new_form').find('img[src$="https://res.cloudinary.com/dwarrion/image/upload/PetCasa/noimages_aaqvrt_opnyoy.png"]').parent().remove();
                    $('#new_form').find('input[data-cloudinary-public-id="PetCasa/noimages_aaqvrt_opnyoy.png"]').remove();
                    console.log(arrayThumnailInputs)
                }
            }
        );
        $('#upload_widget3').click(function () {
            myWidget3.open();
        })
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
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function () {
            $('.toast').toast('show');
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
                            <li class="breadcrumb-item active">Quản lý báo cáo</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý báo cáo</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-7">
                <div class="card-box">
                    <h4 class="header-title"><i class=" mdi mdi-information-outline" data-toggle="tooltip"
                                                data-placement="top" title=" Tin người dùng đăng : Là những bài báo cáo được người gửi lên có nội dung yêu cầu hỗ trợ thú
                        nuôi tại khu vực nào đó
                        Mỗi báo cáo bao gồm : Họ và tên ;
                        Địa chỉ :
                        Số điện thoại :
                        Nội dung :
                        Ảnh :
                        Và trạng thái bài viết !
                        Bài viết có thể có tới 5 trạng thái :
                        Chưa xử lý , Đang xử lý , Đã xử lý , Từ chối và Ẩn
                        Chưa xử lý : Báo cáo chưa được admin xử lý , tiếp nhận yêu cầu .
                        Đang xử lý : Báo cáo đẫ được admin xử lý , đội cứu hộ thú nuôi đã xuất phát .
                        Đã xử lý : Vấn đề báo cáo đã được xử lý , đội cứu hộ thú nuôi đã hoàn thành nhiệm vụ trở về .
                        Từ chối : Báo cáo bị từ chối hỗ trợ , không tiếp nhận ."
                        ></i> Tin người dùng đăng : </h4>
                    <form action="{{route('admin_report_update',$report->id)}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="FullName">Họ và tên<span class="text-danger">*</span></label>
                            <input readonly="true" type="text" name="FullName" parsley-trigger="change" required=""
                                   class="form-control" id="FullName" value="{{$report->FullName}}" style="width: 30%;">
                            @if ($errors->has('FullName'))
                                <label class="alert-warning">{{$errors->first('FullName')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Address">Địa chỉ <span class="text-danger">*</span></label>
                            <input readonly="true" type="text" name="Address" parsley-trigger="change" required=""
                                   class="form-control" id="Address" value="{{$report->Address}}" style="width: 45%;">
                            @if ($errors->has('Address'))
                                <label class="alert-warning">{{$errors->first('Address')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PhoneNumber">Số điện thoại<span class="text-danger">*</span></label>
                            <input readonly="true" type="text" name="PhoneNumber" parsley-trigger="change" required=""
                                   class="form-control" id="PhoneNumber" value="{{$report->PhoneNumber}}"
                                   style="width: 15%;">
                            @if ($errors->has('PhoneNumber'))
                                <label class="alert-warning">{{$errors->first('PhoneNumber')}}</label>
                            @endif
                        </div>
                        <div class="form-group" style="width: 200%">
                            <label for="Content">Nội dung<span class="text-danger">*</span></label>
                            <textarea id="editor" name="Content" class="form-control"
                                      placeholder="">{{$report->Content}}</textarea>
                            @if ($errors->has('Content'))
                                <label class="alert-warning">{{$errors->first('Content')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">Thumnails<span class="text-danger">*</span></label>
                            <button disabled type="button" id="upload_widget" class="btn-primary btn">Upload
                            </button>
                            <div>
                                <ul>
                                    @foreach($report->ArrayThumbnails450x450 as $thumbnail)
                                        <li class="cloudinary-thumbnail active" data-cloudinary="{{$thumbnail}}">
                                            <img src="{{$thumbnail}}" style="width: 300px;height: 300px">
                                            {{--                                            <a href="#" class="cloudinary-delete">x</a>--}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if ($errors->has('thumbnails'))
                                <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                            @endif
                        </div>
                        <div class="form-group" style="width:20%;">
                            <label for="Status">Trạng thái<span class="text-danger">*</span></label>
                            <select name="Status" class="form-control select-form-control">
                                <option value="0" @if ( $report->Status == 0 ) selected @endif
                                @if ( $report->Status != 0 ) disabled @endif> Chưa xử lý
                                </option>
                                <option value="1" @if ( $report->Status == 1 ) selected
                                        @endif @if ($report->Status == 2 || $report->Status == 4) disabled @endif> Đang
                                    xử lý
                                </option>
                                <option value="2" @if ( $report->Status == 2) selected
                                        @endif @if ($report->Status == 2 ) disabled @endif> Đã xử lý
                                </option>
                                <option value="3" @if ( $report->Status == 3) selected
                                        @endif @if ($report->Status != 0 ) disabled @endif> Từ
                                    chối
                                </option>
                                <option value="4" @if ( $report->Status == 4 ) selected @endif> Ẩn
                                </option>
                            </select>
                            @if ($errors->has('thumbnails'))
                                <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                            @endif
                        </div>
                        @foreach($report->ArrayThumbnails as $thumbnail)
                            <input readonly="true" type="hidden" name="thumbnails[]"
                                   data-cloudinary-public-id="{{$thumbnail}}"
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
            <div class="col-lg-5">
                <form action="{{route('create_admin_report_new')}}" id="new_form" method="POST"
                      class="parsley-examples" novalidate="">
                    @csrf
                    <div class="card-box">
                        <div style="display:inline-flex">
                            <h4 class="header-title">
                                <i class=" mdi mdi-information-outline" data-toggle="tooltip" data-placement="bottom"
                                   title="Thú nuôi liên quan tới bài viết!"></i> Thú nuôi liên quan :
                            </h4>
                        </div>
                        <div style="float: right">
                            <button type="button"
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#task-add-pet">
                                Thêm mới thú nuôi +
                            </button>
                        </div>
                        <div>
                            {{--                        {{dd($report_pet_id)}}--}}
                            <div class="form-group">
                                <label for="Status">Chọn mã thú nuôi<span class="text-danger">*</span></label>
                                <select class="form-control selectize-multiple" id="select-7" name="PetIds[]"
                                        multiple>
                                    @foreach($pets as $pet)
                                        <option value="{{$pet->id}}"
                                                @if (in_array($pet->id,json_decode(json_encode($report_pet_id), true))) selected @endif>{{$pet->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                    <div class="card-box">
                        <h4 class="header-title"><i class=" mdi mdi-information-outline" data-toggle="tooltip"
                                                    data-placement="bottom"
                                                    title="Admin đăng bài sau khi cập nhật trạng thái của báo cáo"></i>
                            Bài viết admin : </h4>
                        <div id="product_form" class="parsley-examples">
                            {{--                        {{dd($report_pet_id)}}--}}
                            <div class="form-group">
                                <label for="Status">Tiêu đề<span class="text-danger">*</span></label>
                                <input type="text" name="Title" parsley-trigger="change" required=""
                                       class="form-control" id="Title"
                                       value="{{$report->FullName." ".$report->Address}}"
                                       style="width: 100%;">
                                @if ($errors->has('Title'))
                                    <label class="alert-warning">{{$errors->first('Title')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Author">Tác giả<span class="text-danger">*</span></label>
                                <input type="text" name="Author" parsley-trigger="change" required=""
                                       class="form-control" id="Author" value="{{$report->FullName}}"
                                       style="width: 30%;">
                                @if ($errors->has('Author'))
                                    <label class="alert-warning">{{$errors->first('Author')}}</label>
                                @endif
                            </div>
                            <div class="form-group" style="width: 200%">
                                <label for="Content">Nội dung<span class="text-danger">*</span></label>
                                <textarea id="editor2" name="Content" class="form-control"
                                          placeholder="">{{$report->Content}}</textarea>
                                @if ($errors->has('Content'))
                                    <label class="alert-warning">{{$errors->first('Content')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="userName">Thumnails<span class="text-danger">*</span></label>
                                <button type="button" id="upload_widget3" class="btn-primary btn">Upload
                                </button>
                                <div class="other-thumbnails">
                                    <ul>
                                        @foreach($report->ArrayThumbnails450x450 as $thumbnail)
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
                            {{--                            {{dd($report->ArrayThumbnails)}}--}}
                            @foreach($report->ArrayThumbnails as $thumbnail)
                                <input type="hidden" name="thumbnails[]" data-cloudinary-public-id="{{$thumbnail}}"
                                       value="{{$thumbnail}}">
                            @endforeach
                            <input type="hidden" name="Report_id" value="{{$report->id}}">
                            <div class="form-group">
                                <label for="Category_id">Chọn chuyên mục<span class="text-danger">*</span></label>
                                <select class="form-control" id="select-7" name="Category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->Name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($report->NewStatus == 0)
                                <div class="form-group text-right mb-0">
                                    <button class="btn btn-primary waves-effect waves-light mr-1">
                                        Đăng
                                    </button>
                                    <a class="btn btn-secondary waves-effect waves-light"
                                       href="{{route('admin_report_list')}}">
                                        Hủy
                                    </a>
                                </div>
                            @else
                                <div class="form-group text-right mb-0">
                                    <div class="btn btn-primary waves-effect waves-light mr-1">
                                        Bài viết đã tồn tại
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div> <!-- end card-box -->
                </form>
            </div>
            <!-- end row -->
        </div>


        {{--            <div class="modal-dialog modal-lg">--}}
        {{--                <div class="modal-content">--}}
        {{--                    <div class="modal-header border-bottom-0 p-0">--}}
        {{--                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
        {{--                    </div>--}}
        {{--                    <div class="modal-body">--}}
        {{--                        Xin chao bài viết của admin--}}
        {{--                    </div>--}}
        {{--                </div><!-- /.modal-content -->--}}
        {{--            </div><!-- /.modal-dialog -->--}}
        {{--        </div><!-- /.modal -->--}}
        {{--        <div id="relation-pet-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"--}}
        {{--             style="display: none;">--}}
        {{--            <div class="modal-dialog modal-lg">--}}
        {{--                <div class="modal-content">--}}
        {{--                    <div class="modal-header border-bottom-0 p-0">--}}
        {{--                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
        {{--                    </div>--}}
        {{--                    <div class="modal-body">--}}
        {{--                        Xin chao Thông tin pet liên quan--}}
        {{--                    </div>--}}
        {{--                </div><!-- /.modal-content -->--}}
        {{--            </div><!-- /.modal-dialog -->--}}
        {{--        </div><!-- /.modal -->--}}

        {{--  modal add pet --}}
        <div id="task-add-pet" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="container card-box">
                        <form action="{{route('admin_report_pet_store')}}" id="add_pet_form" method="POST"
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
                            <div class="form-group" style="width: 50%">
                                <label for="Age">Tuổi<span class="text-danger">*</span></label>
                                <?php $current_time = Carbon\Carbon::now() ?>
                                <select class="form-control" name="Age" id="Age">
                                    <option value="{{$current_time->addDays(-150)}}">Dưới 6 tháng</option>
                                    <option value="{{$current_time->addDays(-150)}}">Từ 6 tháng đến 2 năm</option>
                                    <option value="{{$current_time->addDays(-150)}}">Trên 2 năm</option>
                                </select>
                                @if ($errors->has('Age'))
                                    <label class="alert-warning">{{$errors->first('Age')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="userName">Thumnails<span class="text-danger">*</span></label>
                                <button type="button" id="upload_widget2" class="btn-primary btn">Upload</button>
                                <div class="uploaded" id="petthumbnails"></div>
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
                                <button class="btn btn-primary waves-effect waves-light mr-1" id="#add_new_pet"
                                        type="submit">
                                    Thêm
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @if (Session::get('created_pet') != null)
            <div class="alert alert-info casa-alert">
                Chú mừng đã thêm mới thú nuôi <strong> thành công</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
            </div>
        @endif
    </div>
@endsection

