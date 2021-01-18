@extends('user.layouts.master')
@section('title')
    Concession Form
@endsection
@section('specific_css')
    <style>
        .page {
            background-image: url("https://res.cloudinary.com/dwarrion/image/upload/v1598281159/PetCasa/cover_j9s2nh.jpg");
            padding-bottom: 50px;
        }

        .custom-1 {
            padding-top: 80px;
            align-content: center;
        }

        .row {
            margin: unset;
        }

        h2 {
            background-color: white;
        }

        h2, h4 {
            color: #48A06A;
            text-align: center;
        }

        .submit-btn {
            text-align: center;
        }

        .cus-file-input::before {
            margin: 0;
            padding: 2rem 1.5rem;
            font: 1rem/1.5 "PT Sans", Arial, sans-serif;
            color: #5a5a5a;
        }
    </style>
@endsection
@section('specific_js')
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'rdjyel16',
                multiple: true,
                form: '#concession-form',
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
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
    <div class="page">
        <div class="container custom-1">
            <h2>Đơn nhượng nuôi</h2>
            <div class="container bg-light-custom border-irregular1 block-padding">
                <form class="form-group" method="POST" action="{{route('concession_formP')}}" id="concession-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <p style="color: darkred">*PetsCasa sẽ giúp tìm một tổ ấm mới cho bé nhà bạn. Hãy điền
                                đầy
                                đủ thông tin trong
                                form dưới đây. Sau khi hoàn thành ấn gửi sẽ có nhân viên của PetsCasa gọi điện xác nhận
                                vã hỗ trợ bạn.</p>
                        </div>
                        <div class="col-md-6" style="display: none">
                            <label>Loại đơn<span class="require"></span></label>
                            <input type="text" name="OrderType" class="form-control input-field" value="Gửi nuôi"
                                   readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Họ và tên<span class="require"></span></label>
                            <input type="text" name="FullName" class="form-control input-field" autocomplete="off"
                                   value="{{old('FullName')}}">
                        </div>
                        <div class="col-md-6">
                            <label>SĐT<span class="required"></span></label>
                            <input value="{{old('PhoneNumber')}}" type="text" name="PhoneNumber"
                                   class="form-control input-field" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label>Email<span class="required"></span></label>
                            <input value="{{old('Email')}}" type="email" name="Email" class="form-control input-field"
                                   autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label>Số CMND<span class="required"></span></label>
                            <input value="{{old('IDNo')}}" type="number" name="IDNo" class="form-control input-field"
                                   autocomplete="off">
                        </div>
                    </div>
                    <hr>
                    <h4>Thông tin vật nuôi</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tên bé<span class="required"></span></label>
                            <input value="{{old('Name')}}" type="text" name="Name" class="form-control input-field"
                                   autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label>Giống loài<span class="required"></span></label>
                            <input value="{{old('Species')}}" type="text" name="Species"
                                   class="form-control input-field" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label>Tuổi<span class="required"></span></label>
                            <?php $current_time = \Carbon\Carbon::now() ?>
                            <select class="form-control" name="Age">
                                <option value="{{$current_time->addDays(150)}}">Dưới 6 tháng</option>
                                <option value="{{$current_time->addDays(540)}}">Từ 6 tháng đến 2 năm</option>
                                <option value="{{$current_time->addDays(780)}}">2 năm</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Loại<span class="required"></span></label>
                            <select class="form-control" name="Breed">
                                <option value="Chó">Chó</option>
                                <option value="Mèo">Mèo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Giới tính<span class="required"></span></label>
                            <select class="form-control" name="Sex">
                                <option value="Đực">Đực</option>
                                <option value="Cái">Cái</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Giấy khai sinh<span class="required"></span></label>
                            <select class="form-control" name="CertifiedPedigree">
                                <option value="Có">Có</option>
                                <option value="Không">Không</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Tiêm phòng<span class="required"></span></label>
                            <select class="form-control" name="Vaccinated">
                                <option value="Có">Rồi</option>
                                <option value="Không">Chưa</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Triệt sản<span class="required"></span></label>
                            <select class="form-control" name="Neutered">
                                <option value="Có">Rồi</option>
                                <option value="Không">Chưa</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Ảnh mô tả - Phiền bạn chụp ảnh thật rõ, ảnh rộng và thẳng mặt vật nuôi nhà
                                mình</label>
                            <br>
                            <div class="form-group">
                                <button type="button" id="upload_widget" class="btn-primary btn">Upload</button>
                                <div class="thumbnails"></div>
                                @if ($errors->has('thumbnails'))
                                    <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Thông tin mô tả thêm<span class="required"></span></label>
                            <textarea name="Description" id="message" class="textarea-field form-control"
                                      rows="5"
                                      required=""
                                      placeholder="Tình trạng sức khoẻ (quá khứ đã từng bị bệnh gì?, dị ứng gì?...) - Thích ăn gì? - Nhạy cảm với gì?"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label>Vài lời nhắn nhủ :<span class="required"></span></label>
                            <textarea name="Message" id="message" class="textarea-field form-control"
                                      rows="5"
                                      placeholder="Ghi chú : "></textarea>
                        </div>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" id="submit_btn" value="Submit" class="btn btn-primary">Gửi
                        </button>
                    </div>
                </form>
                <!-- /form-group-->
            </div>
        </div>
    </div>
    <!-- /container -->
    <!-- /page -->
@endsection
