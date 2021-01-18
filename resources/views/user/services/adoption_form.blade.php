@extends('user.layouts.master')
@section('title')
    Adoption Form
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
            color: #48A06A;
            background-color: white;
            text-align: center;
        }

        h4 {
            color: #48A06A;
            text-align: center;
        }

        .submit-btn {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
    <div class="page">
        <div class="container custom-1">
            <h2>Đơn xin nhận nuôi</h2>
            <div class="container bg-light-custom border-irregular1 block-padding">
                <form class="form-group" method="POST" action="{{route('adoption_form_send', $pet_info->Slug)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6" style="display: none">
                            <label>Loại đơn<span class="require"></span></label>
                            <input type="hidden" name="OrderType" class="form-control input-field" value="Nhận nuôi"
                                   autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label>Họ và tên<span class="require"></span></label>
                            <input type="text" name="FullName" class="form-control input-field" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label>SĐT<span class="required"></span></label>
                            <input type="text" name="PhoneNumber" class="form-control input-field" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label>Email<span class="required"></span></label>
                            <input type="email" name="Email" class="form-control input-field" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label>Số CMND<span class="required"></span></label>
                            <input type="text" name="IDNo" class="form-control input-field" autocomplete="off">
                        </div>
                        <div class="col-md-12">
                            <label>Thông tin mô tả thêm<span class="required"></span></label>
                            <textarea name="Message" id="message" class="textarea-field form-control"
                                      rows="3"
                                      placeholder=""></textarea>
                        </div>
                    </div>
                    <hr>
                    <h4>Thông tin vật nuôi</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tên bé : <span class="text-form"> {{$pet_info->Name}}</span></label>
                            <input type="hidden" name="name" class="form-control input-field" autocomplete="off"
                                   value="{{$pet_info->Name}}">
                        </div>
                        <div class="col-md-6">
                            <label>Giống loài : <span class="text-form"> {{$pet_info->Breed}}</span></label>
                            <input type="hidden" name="species" class="form-control input-field" autocomplete="off"
                                   value="{{$pet_info->Breed}}">
                        </div>
                        <div class="col-md-6">
                            <label>Tuổi : <span class="text-form"><?php $current_Time = Carbon\Carbon::now(); ?>
                                    @if ($current_Time->addDays(-180) <  $pet_info->Age)
                                        Dưới 6 tháng
                                    @elseif ($current_Time->addDays(-720) <  $pet_info->Age)
                                        Từ 6 tháng đến 2 năm
                                    @elseif ($current_Time->addDays(-720) >  $pet_info->Age)
                                        Từ 2 năm trở lên
                                    @endif</span></label>
                            <input type="hidden" name="age" class="form-control input-field" autocomplete="off"
                                   value="{{$pet_info->Age}}">
                        </div>
                        <div class="col-md-6">
                            <label>Giới tính : <span class="text-form"> {{$pet_info->Sex}}</span></label>
                            <input type="hidden" name="sex" class="form-control input-field" autocomplete="off"
                                   value="{{$pet_info->Sex}}">
                        </div>
                        <div class="col-md-6">
                            <label>Giấy khai sinh : <span
                                        class="text-form"> {{$pet_info->CertifiedPedigree}}</span></label>
                            <input type="hidden" name="certifiedpedigree" class="form-control input-field"
                                   autocomplete="off"
                                   value="{{$pet_info->CertifiedPedigree}}">
                        </div>
                        <div class="col-md-6">
                            <label>Tiêm phòng : <span class="text-form"> {{$pet_info->Vaccinated}}</span></label>
                            <input type="hidden" name="vaccinated" class="form-control input-field"
                                   autocomplete="off"
                                   value="{{$pet_info->Vaccinated}}">
                        </div>
                        <div class="col-md-12">
                            <label>Triệt sản : <span class="text-form"> {{$pet_info->Neutered}}</span></label>
                            <input type="hidden" name="neutered" class="form-control input-field"
                                   autocomplete="off"
                                   value="{{$pet_info->Neutered}}">
                        </div>
                        <div class="col-md-6">
                            <label>Ảnh bé {{$pet_info->Name}}</label>
                            <br>
                            <div class="form-group">
                                @foreach($pet_info->ArrayThumbnails450x450 as $thumbnail)
                                    <img src="{{$thumbnail}}" style="width: 300px;height: 300px">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Thông tin mô tả thêm<span class="required"></span></label>
                            <p class="textarea-field">{{$pet_info->Description}}</p>
                        </div>
                        <input type="hidden" name="PetId" class="form-control input-field" autocomplete="off"
                               value="{{$pet_info->id}}">
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
