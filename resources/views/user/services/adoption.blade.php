Hoang, 8:10 PM
@extends('user.layouts.master')
@section('title')
    Adoption
@endsection
@section('specific_css')
    <style>
        #call-to-action {
            background-image: url(https://res.cloudinary.com/dwarrion/image/upload/v1598031376/PetCasa/DonateGuidePage/dog_xwspka.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed !important;
            background-size: cover !important;
        }

        .page-item.active .page-link {
            background-color: #48A06A !important;
        }

        .page {
            padding-bottom: unset;
            padding-top: 40px;
        }
    </style>
@endsection
@section('specific_js')
    <script>
        $("ul.pagination").addClass('float-right');
    </script>
@endsection
@section('content')
    <!-- /Navigation -->
    <input type="hidden" id="languageValue" name="languageValue" value="vi"/>

    <!-- ==== Page Content ==== -->
    <div class="section-heading-1 text-center mt-5">
        <h2 style="margin-bottom: unset; margin-top: 170px">
            Nhận Nuôi Thú Cưng
        </h2>
    </div>

    <ul class="nav nav-pills category-isotope center-nav" data-aos="zoom-in">
        <li class="nav-item">
            <a class="nav-link all @if (Request::get('Species') == "All")active @endif"
               href="{{route('pet_list_adoption',["Species" => "All"])}}"
               aria-label="Tất cả" aria-labelledby="Tất cả">Tất cả</a>
        </li>
        <li class="nav-item">
            <a class="nav-link dog @if (Request::get('Species') == "Chó") active @endif"
               href="{{route('pet_list_adoption',["Species" => "Chó"])}}"
               aria-label="Chó" aria-labelledby="Chó">Chó</a>
        </li>
        <li class="nav-item">
            <a class="nav-link cat @if (Request::get('Species') == "Mèo") active @endif"
               href="{{route('pet_list_adoption',["Species" => "Mèo"])}}"
               aria-label="Mèo" aria-labelledby="Mèo">Mèo</a>
        </li>
    </ul>

    <section class="container" style="padding-top: unset">
        <div class="row">
            <div class="aos-init aos-animate col-sm-2 col-md-2 col-lg-2" data-aos="zoom-in">
                <form action="{{route('pet_list_adoption')}}" class="pt-4" style="margin-top: 40px">
                    <h3>Bộ Lọc</h3>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select name="Sex" id="gender" class="form-control">
                            <option value="All">Tất cả</option>
                            <option value="Đực">Đực</option>
                            <option value="Cái">Cái</option>
                        </select>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label>Độ tuổi</label>
                            <?php $current_Time = Carbon\Carbon::now(); ?>
                            <select name="Age" id="age" class="form-control">
                                <option value="All">Tất cả</option>
                                <option value="Young">Trẻ</option>
                                <option value="Mature">Trưởng thành</option>
                                <option value="Old">Già</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="Species" value="{{request()->Species}}">
                    <div class="">
                        <div class="form-group">
                            <label>Tên</label>
                            <input name="Name" type="text" id="name" class="form-control">
                        </div>
                    </div>
                    <div class=" justify-content-center align-self-center text-center">
                        <div class="form-group mb-0 pt-lg-2">
                            <button id="btnSearch" onclick="" class="btn btn-secondary aos-init aos-animate"
                                    aria-label="Tìm kiếm" aria-labelledby="Tìm kiếm">Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="page col-sm-10 col-md-10 col-lg-10" data-aos="zoom-in">
                <div class="pt-0 aos-init aos-animate">
                    <!-- First row: Adopt a pet -->
                    <div class="row">
                        <!-- Pet  -->
                        @foreach($pets as $pet)
                            <div class="{{$pet->Species}} col-md-6 col-xl-4 isotope-item" style="margin-top: 10px">
                                <div class="isotope-item">
                                    <div class="adopt-card res-margin">
                                        <div class="card bg-light-custom">
                                            <div class="thumbnail text-center">
                                                <!-- Image -->
                                                <img src="{{$pet->FirstThumbnail}}"
                                                     class="border-irregular1 img-fluid" alt="">
                                                <!-- Name -->
                                                <div class="caption-adoption">
                                                    <h6 class="adoption-header">{{$pet->Name}}</h6>
                                                    <!-- List -->
                                                    <ul class="list-unstyled">
                                                        <li><strong>Giống: </strong>{{$pet->Breed}}</li>
                                                        <li><strong>Giới tính: </strong>{{$pet->Sex}}</li>
                                                        <li><strong>Tuổi: </strong>
                                                            <?php $current_Time = Carbon\Carbon::now(); ?>
                                                            @if ($current_Time->addDays(-180) <  $pet->Age)
                                                                Dưới 6 tháng
                                                            @elseif ($current_Time->addDays(-720) <  $pet->Age)
                                                                Từ 6 tháng đến 2 năm
                                                            @elseif ($current_Time->addDays(-720) >  $pet->Age)
                                                                Từ 2 năm trở lên
                                                            @endif
                                                        </li>
                                                    </ul>
                                                    <!-- Buttons -->
                                                    <div class="text-center">
                                                        <a href="{{route('adoption_detail',$pet->Slug)}}"
                                                           class="btn btn-primary">Thêm
                                                            thông
                                                            tin</a>
                                                    </div>
                                                    <!-- /thumbnail -->
                                                </div>
                                                <!-- /card -->
                                            </div>
                                            <!-- /adopt-card -->
                                            <!-- /pet -->
                                        </div>
                                        <!-- /row -->
                                    </div>
                                </div>
                                <!-- /isotope-item-->
                            </div>
                            <!-- /col-md -->
                        @endforeach
                        <div class="col-md-12 mt-5">
                            <!-- pagination -->
                            {{$pets->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-light">
        <section class="container aos-init aos-animate bg-light" data-aos="zoom-in">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <h3 class="text-capitalize">quy trình nhận nuôi</h3>
                    <hr class="small-divider left">
                    <p class="mt-4 text-justify">
                        Trước khi quyết định nhận nuôi bé chó hay mèo nào, bạn hãy tự hỏi bản thân rằng mình đã
                        sẵn
                        sàng
                        để chịu trách nhiệm cả đời cho bé chưa, cả về tài chính, nơi ở cũng như tinh thần. Việc
                        nhận
                        nuôi cần được sự đồng thuận lớn từ bản thân bạn cũng như gia đình và những người liên
                        quan.
                        Xin
                        cân nhắc kỹ trước khi liên hệ với PetsCasa về việc nhận nuôi.<br><br>Bạn đã sẵn sàng?
                        Hãy
                        thực
                        hiện các bước sau đây nhé:<br><br>1️⃣ Tìm hiểu về thú cưng bạn muốn nhận nuôi trên trang
                        web
                        của
                        PetsCasa.<br>2️⃣ Cập nhập đẩy đủ thông tin trên hồ sơ cá nhân.<br>3️⃣ Chuẩn bị cơ sở vật
                        chất và
                        đóng tiền vía để đón bé về. <br>4️⃣ Cập nhập thông tin (có ảnh) của bé 2 tháng 1 lần
                        trong 1
                        năm
                        sau khi nhận bé về.<br>5️⃣ Khi có sự cố cần liên hệ ngay để được tư vấn kịp
                        thời.<br><br>❗
                        Lưu
                        ý:<br>- Tiền vía mỗi bé sẽ khác nhau tùy thuộc vào tình trạng của bé khi cứu cũng như
                        các
                        dịch
                        vụ y tế (tiêm phòng, triệt sản) đã thực hiện. <br>- Tiền vía dùng để trả các khoản chi
                        về y
                        tế
                        trước đây cho bé, cũng như để hỗ trợ chi phí chăm sóc, nuôi dưỡng các bé khác tại nhà
                        chung.<br>-
                        Trường hợp không nuôi được tiếp cần trả lại cho Nhóm, không tự ý đem cho người khác.<br><br>🐕&zwj;🦺
                        Nếu bạn chỉ có thể chăm sóc tạm thời (foster), tham khảo thông tin tại mục Tình
                        nguyện.<br><br>🐈
                        Tìm hiểu thêm về chương trình Nhận nuôi Ảo ở banner cuối trang này.
                    </p>

                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="card bg-soft-blue">
                        <h5 class="text-capitalize" style="color: #808080">điều kiện nhận nuôi</h5>
                        <ul class="custom pl-0 font-weight-bold">
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10">
                                    <span>Tài chính tự chủ và ổn định.</span>
                                </div>
                            </li>
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10">
                                    <span>Chỗ ở cố định, ưu tiên tại Hà Nội</span>
                                </div>
                            </li>
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10">
                                    <span>Cam kết tiêm phòng và triệt sản .</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /page -->
    <section class="container-fluid adoption-online-bg overlay">
        <div class="container">
            <div class="col-lg-7 text-light text-center">
                <h4 data-aos="zoom-out" class="text-capitalize aos-init aos-animate">Bạn Chưa Đủ Điều Kiện Mang
                    Boss Về Nhà? Tham gia chương trình Nhận nuôi Ảo nhé.</h4>
                <a href="{{route('foster')}}"
                   class="btn btn-secondary aos-init aos-animate" data-aos="zoom-out" aria-label="Tìm hiểu ngay"
                   aria-labelledby="Tìm hiểu ngay">Tìm hiểu ngay</a>
            </div>
        </div>
    </section>
@endsection