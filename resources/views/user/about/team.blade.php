@extends('user.layouts.master')
@section('title')
    Team
@endsection
@section('specific_css')
    {{--    <link href="{{asset()}}" rel="stylesheet">--}}
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid overlay">
        <div class="jumbo-heading">
            <!-- section-heading -->
            <div class="section-heading" data-aos="zoom-in">
                <h1>PetsCasa Team</h1>
            </div>
            <!-- /section-heading -->
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Team</li>
                </ol>
            </nav>
        </div>
        <!-- /jumbo-heading -->
    </div>
    <!-- /jumbotron -->
    <!-- ==== Page Content ==== -->
    <div class="bg-light-custom block-padding">
        <!-- Team style 2 -->
        <h3 class="text-center">Thành Viên</h3>
        <div class="container">
            <div id="owl-team2" class="owl-carousel owl-theme mt-5">
                <!-- Team member -->
                <figure class="col-lg-12 team-style2">
                    <!-- image -->
                    <img
                        src="https://res.cloudinary.com/dwarrion/image/upload/v1597768112/PetCasa/TeamPage/4_ebsvyh.jpg"
                        alt="" class="img-fluid"/>
                    <figcaption>
                        <!-- social icons -->
                        <div class="icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </figcaption>
                    <!-- name -->
                    <div class="name">
                        <h4>Hưng Nguyễn</h4>
                        <h6>Trainer</h6>
                    </div>
                    <!-- /name -->
                </figure>
                <!-- /figure- -->
                <!-- Team member -->
                <figure class="col-lg-12 team-style2">
                    <!-- image -->
                    <img
                        src="https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_2015,w_1511/v1597768714/PetCasa/TeamPage/5_yvbsvu.jpg"
                        alt="" class="img-fluid"/>
                    <figcaption>
                        <!-- social icons -->
                        <div class="icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </figcaption>
                    <!-- name -->
                    <div class="name">
                        <h4>Hoàng Trần</h4>
                        <h6>Pet Expert</h6>
                    </div>
                    <!-- /name -->
                </figure>
                <!-- /figure- -->
                <!-- Team member -->
                <figure class="col-lg-12 team-style2">
                    <!-- image -->
                    <img
                        src="https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_2015,w_1511/v1597768557/PetCasa/TeamPage/1_txbfni.jpg"
                        alt="" class="img-fluid"/>
                    <figcaption>
                        <!-- social icons -->
                        <div class="icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </figcaption>
                    <!-- name -->
                    <div class="name">
                        <h4>Dương Nguyễn</h4>
                        <h6>Veterinarian</h6>
                    </div>
                    <!-- /name -->
                </figure>
                <!-- /figure- -->
                <!-- Team member -->
                <figure class="col-lg-12 team-style2">
                    <!-- image -->
                    <img
                        src="https://res.cloudinary.com/dwarrion/image/upload/v1597768113/PetCasa/TeamPage/2_frbpn1.jpg"
                        alt="" class="img-fluid"/>
                    <figcaption>
                        <!-- social icons -->
                        <div class="icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </figcaption>
                    <!-- name -->
                    <div class="name">
                        <h4>Khánh Đỗ</h4>
                        <h6>Veterinarian</h6>
                    </div>
                    <!-- /name -->
                </figure>
                <!-- /figure- -->
                <!-- Team member -->
                <figure class="col-lg-12 team-style2">
                    <!-- image -->
                    <img
                        src="https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_2015,w_1511/v1597768112/PetCasa/TeamPage/3_rzxzu7.jpg"
                        alt="" class="img-fluid"/>
                    <figcaption>
                        <!-- social icons -->
                        <div class="icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </figcaption>
                    <!-- name -->
                    <div class="name">
                        <h4>Linh Tạ</h4>
                        <h6>Animal Caretaker</h6>
                    </div>
                    <!-- /name -->
                </figure>
                <!-- /figure- -->
            </div>
            <!-- /owl-team2 -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg-light-custom -->

    <!-- Section Call to action -->
    <div id="call-to-action"
         style="background: url('https://res.cloudinary.com/dwarrion/image/upload/v1597767578/PetCasa/TeamPage/team_cover_xf0zyq.jpg')">
        <div class="container" style="padding: 100px 0 50px 0">
            <div class="row" style="color: white">
                <div class="col-md" style="padding: 0 50px 0 50px">
                    <h6 style="color: white">Nhiệm vụ của chúng tôi</h6>
                    <p style="line-height: 2">Sứ mệnh của chúng tôi là cải thiện phúc lợi của động vật bằng cách chống
                        lại sự tàn ác đối
                        với
                        động vật và tình trạng quá tải về vật nuôi thông qua giáo dục. Chúng tôi cố gắng truyền cảm
                        hứng
                        về sự đồng cảm và trách nhiệm đối với vật nuôi. Lý tưởng nhất là cả cộng đồng và các nhóm sẽ
                        đứng lên, lên tiếng và hành động để cải thiện quyền động vật. Trao quyền cho giới trẻ để tạo
                        ra
                        sự khác biệt làm tăng tiềm năng tạo ra một thế giới thêm sự quan tâm và nhiều tình yêu
                        thương
                        hơn.</p>
                </div>
                <div class="col-md" style="padding: 0 30px 0 50px">
                    <h6 style="color: white">Mục tiêu của chúng tôi</h6>
                    <p style="line-height: 2">Mục tiêu của chúng tôi là ngăn chặn hành vi tàn ác đối với động vật, cải
                        thiện phúc lợi của
                        các
                        loài động vật và mang lại sự thay đổi rất cần thiết, lâu dài: từ nạn nhân trở thành
                        thành viên có giá trị của cộng đồng. PetsCasa tin rằng con người phải lên tiếng bảo
                        vệ những loài động vật này và hành động để tuyên truyền cách để đối xử với những người bạn
                        bốn
                        chân của chúng ta.</p>
                </div>
                <div class="col-md" style="padding: 0 50px 0 30px">
                    <h6 style="color: white">Bạn có thể giúp chúng tôi</h6>
                    <p>
                    <ul style="line-height: 2">
                        <li>Tăng tốc thời gian phục hồi và sức khỏe tinh thần của các bé bằng cách trở thành một nhà
                            nuôi dưỡng.
                        </li>
                        <li>Nhận thức được về những đau khổ khủng khiếp hàng ngày xảy ra trong việc buôn bán thịt
                            chó và
                            mèo ở chợ.
                        </li>
                        <li>Tình nguyện dành thời gian của bạn.</li>
                        <li>Đóng góp tài chính.</li>
                    </ul>
                    </p>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!--/call-to-action -->
@endsection
