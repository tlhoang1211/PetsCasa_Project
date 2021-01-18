@extends('user.layouts.master')
@section('title')
    Donate Guide
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
    </style>
@endsection
@section('specific_js')
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })
    </script>
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid overlay">
        <div class="jumbo-heading">
            <!-- section-heading -->
            <div class="section-heading" data-aos="zoom-in">
                <h1>Nhận Nuôi Ảo</h1>
            </div>
            <!-- /section-heading -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nhận nuôi ảo</li>
                </ol>
            </nav>
        </div>
        <!-- /jumbo-heading -->
    </div>
    <!-- /jumbotron -->

    <div class="bg-light">
        <section class="container aos-init aos-animate bg-light" data-aos="zoom-in">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="card bg-white">
                        <h5 style="color: #808080">Các bước Nhận nuôi Ảo</h5>
                        <ul class="custom pl-0 font-weight-bold">
                            <li>Nghiên cứu danh sách các bé của nhóm
                            </li>
                            <li>Bấm nút Nhận đỡ đầu trên trang thông tin của bé và điền form
                            </li>
                            <li>Chờ xác nhận từ PetsCasa</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <h3 class="text-capitalize">quy trình nhận nuôi ảo</h3>
                    <hr class="small-divider left">
                    <p class="mt-4 text-justify">
                        Nếu bạn là người yêu động vật nhưng chưa đủ điều kiện nhận một bé về nuôi, bạn có thể giúp các
                        bé
                        bằng cách tham gia chương trình Nhận nuôi Ảo. Thay vì nhận một bé về nhà chăm, bạn có thể chọn
                        một
                        bé để tài trợ tiền nuôi dưỡng bé.<br><br>Chương trình này xuất phát từ thực tế là dù Nhóm đã nỗ
                        lực
                        tìm chủ, có nhiều bé đã ở Nhà chung với PetsCasa nhiều năm nay và khó có khả năng tìm được mái
                        ấm
                        yêu
                        thương. Các bé cần được tiêm phòng hàng năm, tiền thức ăn, bỉm cát, chưa kể chi phí chữa bệnh
                        nếu
                        phát sinh. Chi phí trung bình hàng năm cho một bé mèo hay chó khoảng 7 triệu đồng. Bằng cách làm
                        Ba
                        Mẹ đỡ đầu, bạn đã giúp bé cũng như chúng tôi trang trải chi phí chăm sóc bé. <br><br>Bạn có thể
                        lựa
                        chọn hình thức ủng hộ 1 lần cho cả năm hoặc ủng hộ định kỳ hàng tháng. <br><br>Với những Mạnh
                        Thường
                        Quân ủng hộ 1 lần cả năm hoặc 12 tháng liên tục, HanoiPetsCasa xin gửi một phần quà nhỏ
                        nhằm
                        ghi nhận những nỗ lực của bạn trong việc chung tay cứu giúp chó mèo, thú cưng bị bỏ rơi. Bạn có
                        thể
                        lựa chọn một trong hai hình thức nhận quà sau:<br><br>📧 Bản điện tử có thể in được:<br><br>Đây
                        là
                        phương án tri ân dễ dàng nhất đối với những Mạnh Thường Quân ở xa hoặc không có điều kiện nhận
                        quà
                        trực tiếp. Bạn có thể tự in các giấy tờ chứng nhận làm kỷ niệm. Đồng thời, cách này cũng giúp
                        chúng
                        tôi tiết kiệm chi phí để dành cho việc chăm sóc các bé.<br>- Giấy chứng nhận tham gia chương
                        trình
                        Nhận nuôi Ảo (bản PDF)<br>- Cập nhật tình hình cũng như các khoản thu chi của bé qua
                        email.<br><br>📦
                        Bản cứng qua bưu điện hoặc dịch vụ giao nhận:<br><br>Phần quà của bạn sẽ được gửi tới địa chỉ
                        riêng
                        qua bưu điện hoặc dịch vụ giao nhận. <br>- Giấy chứng nhận tham gia chương trình Nhận nuôi
                        Ảo<br>-
                        Quà lưu niệm từ nhà tài trợ (nếu có)<br>- Cập nhật tình hình cũng như các khoản thu chi của bé
                        qua
                        email.<br><br>Nếu bạn có câu hỏi cụ thể về thông tin các bé, vui lòng nhắn tin cho Tình nguyện
                        viên
                        phụ trách (có tên trong danh sách phỏng vấn trên trang thông tin về bé). Nếu có câu hỏi về
                        chương
                        trình, liên hệ với chúng tôi qua t1908e@gmail.com, với tiêu đề thư có từ khóa "Nhận
                        nuôi
                        Ảo".<br><br>Lưu ý: Trường hợp bé được nhận nuôi, phần tiền quyên góp còn lại của bé sẽ được
                        chuyển
                        vào quỹ chung để lo cho các bé khác.
                    </p>

                </div>
            </div>
        </section>
        <!-- endsection -->

        <!-- Section Call To Action -->
        <div id="call-to-action">
            <div class="container block-padding">
                <div
                        class="col-12 col-sm-8 col-md-8 col-lg-8 justify-content-center align-self-center text-center text-sm-left text-md-left text-lg-left">
                    <h4 style="color: white">Bạn đã sẵn sàng để hỗ trợ?</h4>
                </div>
                <div
                        class="col-12 col-sm-4 col-md-4 col-lg-4 justify-content-center align-self-center text-center">
                    <a href="/get_involed" class="btn btn-primary"
                       aria-label="Ủng hộ ngay" aria-labelledby="Ủng hộ ngay">Ủng hộ ngay</a>
                </div>
            </div>
            <!--/row -->
        </div>
        <!--/call-to-action -->

        <!-- News -->
        <section id="news-home">
            <div class="container">
                <div class="section-heading text-center">
                    <h2 data-aos="fade-up" class="aos-init aos-animate">Tin tức</h2>
                </div>
                <div class="col-12 carousel-3items owl-carousel owl-theme owl-loaded owl-drag">
                    {{--                    {{dd($news)}}--}}
                    @foreach($news as $new)
                        <div class="owl-stage-outer" style="background: url("{{$new->FirstThumbnail}}")">
                        {{$new->Title}}
                </div>
                @endforeach
                {{--                    <div class="owl-nav">--}}
                {{--                        <div class="owl-prev disabled"><i class="fa fa-chevron-left"></i></div>--}}
                {{--                        <div class="owl-next"><i class="fa fa-chevron-right"></i></div>--}}
                {{--                    </div>--}}
                {{--                    <div class="owl-dots">--}}
                {{--                        <div class="owl-dot active"><span></span></div>--}}
                {{--                        <div class="owl-dot"><span></span></div>--}}
                {{--                                    </div>--}}
            </div>
            <div class="col-12 text-center">
                <a href="https://www.hanoipetadoption.com/vi/tin-tuc"
                   class="btn btn-primary mt-3 text-uppercase" aria-label="Đọc thêm"
                   aria-labelledby="Đọc thêm">Đọc thêm</a>
            </div>
    </div>
    </section>
    <!-- endsection -->
    </div>
    <!-- End Page -->
@endsection
