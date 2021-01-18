@extends('user.layouts.master')
@section('title')
    Home
@endsection
@section('specific_js')
    <!-- Open Street maps -->
    <script src={{asset('assets/user/js/map.js')}}></script>
    <!-- Mailchimp script -->
    <script src={{asset('assets/user/js/mailchimp.js')}}></script>
    <!-- Contact Form script -->
    <script src={{asset('assets/user/js/contact.js')}}></script>
    <!-- Number counter script -->
    <script src={{asset('assets/user/js/counter.js')}}></script>
@endsection
@section('content')
    <!-- ==== Slider ==== -->
    <div id="slider" style="width:1200px;height:800px;margin:0 auto;margin-bottom: 0px;">
        <!-- Slide 1 -->
        @for ($i = 0; $i < sizeof($newest_report); $i++)

            {{--        @foreach($newest_report as $new)--}}
            <div class="ls-slide"
                 data-ls="duration:4000; transition2d:7; kenburnszoom:out; kenburnsrotate:-5; kenburnsscale:1.2;">
                <!-- bg image  -->
                @if ($i == 0)
                    <img
                            src=https://res.cloudinary.com/dwarrion/image/upload/v1599295580/PetCasa/HomePage/homesl_1_gso6gw.jpg
                            class="ls-bg" alt=""/>
                @elseif ($i == 1)
                    <img
                            src=https://res.cloudinary.com/dwarrion/image/upload/v1599295579/PetCasa/HomePage/homesl_2_wukawq.jpg
                            class="ls-bg" alt=""/>
                @elseif ($i == 2)
                    <img
                            src=https://res.cloudinary.com/dwarrion/image/upload/v1599295581/PetCasa/HomePage/homesl_5_nxzgc7.jpg
                            class="ls-bg" alt=""/>
                @elseif ($i == 3)
                    <img
                            src=https://res.cloudinary.com/dwarrion/image/upload/v1599295580/PetCasa/HomePage/homesl_4_r6c5hc.jpg
                            class="ls-bg" alt=""/>
            @endif
            <!-- text  -->
                <div class="ls-l header-wrapper"
                     data-ls="offsetyin:150; durationin:700; delayin:200; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400; parallaxlevel:0;">
                    <div class="header-text dog-elements">
                        {{--                        {{dd($newest_report[$i])}}--}}
                        <h1>{{$newest_report[$i]->Title}}</h1>
                        <!--the div below is hidden on small screens  -->
                        <div class="d-none d-sm-block">
                            <p class="header-p">{!! Str::words($newest_report[$i]->Content, $words = 20, $end = '...') !!}</p>
                            <a class="btn btn-primary " href="{{route('single_new',$newest_report[$i]->Slug)}}">Xem
                                ngay</a>
                        </div>
                        <!--/d-none  -->
                    </div>
                    <!-- header-text  -->
                </div>
                <!-- ls-l  -->
            </div>
        @endfor
    </div>
    <!-- /slider -->
    <!-- ==== Page Content ==== -->
    <!-- Section services -->
    <section id="services" class="cat-bg3">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Dịch vụ của PetsCasa</h2>
            </div>
            <!-- /Section-heading -->
            <div class="container block-padding pt-0">
                <div class="row">
                    <div class="col-xl-6">
                        <h3>Điều tốt nhất dành cho các bạn chó, mèo!</h3>
                        <p>PetsCasa là một tổ chức từ thiện phúc lợi động vật với tầm nhìn về một tương lai nơi mọi vật
                            nuôi đều được an toàn, được tôn trọng và yêu thương.</p>
                        <p><strong>Nhóm của chúng tôi và các tình nguyện viên hiện đang làm việc trong các nhóm chính
                                sau:</strong></p>
                        <!-- ul custom-->
                        <ul class="custom pl-0">
                            <li><a href="{{route('rescue_form')}}">Cứu hộ chó mèo</a></li>
                            <li><a href="{{route('pet_list_adoption')}}">Nhận nuôi thú cưng</a></li>
                            <li><a href="{{route('concession_form')}}">Nhượng nuôi thú cưng</a></li>
                        </ul>
                    </div>
                    <!-- /col-xl-->
                    <div class="col-xl-6">
                        <img
                                src=https://res.cloudinary.com/dwarrion/image/upload/c_scale,w_800/v1599127104/PetCasa/HomePage/home_3_iiohrf.jpg
                                alt="" data-aos="fade-down"
                                data-aos-duration="1500"
                                class="img-fluid border-irregular1 border-double">
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
            <!-- services carousel -->
        {{--            <div class="bg-light-custom block-padding border-irregular1">--}}
        {{--                <div id="owl-services" class="container owl-carousel owl-theme">--}}
        {{--                    <!-- service 1  -->--}}
        {{--                    <div class="col-md-12">--}}
        {{--                        <div class="serviceBox">--}}
        {{--                            <!-- service icon -->--}}
        {{--                            <div class="service-icon">--}}
        {{--                                <i class="flaticon-people-1"></i>--}}
        {{--                            </div>--}}
        {{--                            <!-- service content -->--}}
        {{--                            <div class="service-content">--}}
        {{--                                <h6>Fun Activities</h6>--}}
        {{--                                <p>--}}
        {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum malesuada.--}}
        {{--                                </p>--}}
        {{--                                <a class="btn btn-primary" href="services-single.html">read more</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- service 2  -->--}}
        {{--                    <div class="col-md-12">--}}
        {{--                        <div class="serviceBox">--}}
        {{--                            <!-- service icon -->--}}
        {{--                            <div class="service-icon">--}}
        {{--                                <i class="flaticon-pet-shelter"></i>--}}
        {{--                            </div>--}}
        {{--                            <!-- service content -->--}}
        {{--                            <div class="service-content">--}}
        {{--                                <h6>Pet Hotel</h6>--}}
        {{--                                <p>--}}
        {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum malesuada.--}}
        {{--                                </p>--}}
        {{--                                <a class="btn btn-primary" href="services-single.html">read more</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- service 3  -->--}}
        {{--                    <div class="col-md-12">--}}
        {{--                        <div class="serviceBox">--}}
        {{--                            <!-- service icon -->--}}
        {{--                            <div class="service-icon">--}}
        {{--                                <i class="flaticon-animals-2"></i>--}}
        {{--                            </div>--}}
        {{--                            <!-- service content -->--}}
        {{--                            <div class="service-content">--}}
        {{--                                <h6>Grooming Services</h6>--}}
        {{--                                <p>--}}
        {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum malesuada.--}}
        {{--                                </p>--}}
        {{--                                <a class="btn btn-primary" href="services-single.html">read more</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- service 4 -->--}}
        {{--                    <div class="col-md-12">--}}
        {{--                        <div class="serviceBox">--}}
        {{--                            <!-- service icon -->--}}
        {{--                            <div class="service-icon">--}}
        {{--                                <i class="flaticon-dog-with-first-aid-kit-bag"></i>--}}
        {{--                            </div>--}}
        {{--                            <!-- service content -->--}}
        {{--                            <div class="service-content">--}}
        {{--                                <h6>Veterinary 24/7</h6>--}}
        {{--                                <p>--}}
        {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum malesuada.--}}
        {{--                                </p>--}}
        {{--                                <a class="btn btn-primary" href="services-single.html">read more</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- service 5 -->--}}
        {{--                    <div class="col-md-12">--}}
        {{--                        <div class="serviceBox">--}}
        {{--                            <!-- service icon -->--}}
        {{--                            <div class="service-icon">--}}
        {{--                                <i class="flaticon-syringe"></i>--}}
        {{--                            </div>--}}
        {{--                            <!-- service content -->--}}
        {{--                            <div class="service-content">--}}
        {{--                                <h6>Vaccines</h6>--}}
        {{--                                <p>--}}
        {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum malesuada.--}}
        {{--                                </p>--}}
        {{--                                <a class="btn btn-primary" href="services-single.html">read more</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- service 6 -->--}}
        {{--                    <div class="col-md-12">--}}
        {{--                        <div class="serviceBox">--}}
        {{--                            <!-- service icon -->--}}
        {{--                            <div class="service-icon">--}}
        {{--                                <i class="flaticon-dog-training-3"></i>--}}
        {{--                            </div>--}}
        {{--                            <!-- service content -->--}}
        {{--                            <div class="service-content">--}}
        {{--                                <h6>Huấn luyện</h6>--}}
        {{--                                <p>--}}
        {{--                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum malesuada.--}}
        {{--                                </p>--}}
        {{--                                <a class="btn btn-primary" href="services-single.html">read more</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!--col-md-12  -->--}}
        {{--                </div>--}}
        {{--                <!-- /owl-services -->--}}
        {{--            </div>--}}
        <!-- /bg-light-custom -->
        </div>
        <!-- /container -->
    </section>
    <!-- / Section Ends -->
    <!-- Section Blurb -->
    <section id="blurb" class="bg-primary text-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <!-- image  -->
                    <img
                            src="https://res.cloudinary.com/dwarrion/image/upload/v1599126130/PetCasa/HomePage/home_2_vryttr.jpg"
                            class="img-fluid blurb-img" alt=""/>
                </div>
                <div class="col-xl-4" data-aos="fade-down">
                    <h2 class="res-margin">Tham gia với chúng tôi</h2>
                    <p class="featured-text">Sự hợp tác của bạn có thể là món quà hoàn hảo cho các bé thú cưng
                        của chúng tôi và cộng đồng địa phương. Chúng tôi là một nhóm các cá nhân với nhiều kỹ năng và
                        kinh nghiệm. Nhân viên của chúng tôi làm việc toàn thời gian và dành thời gian rảnh rỗi để giải
                        cứu và phục hồi nhiều bé chó, mèo nhất có thể. Điều này bao gồm việc họ cần phải làm những công
                        việc gây bẩn tay hàng ngày và còn cả các quản trị viên, tài chính và tiếp thị. Chúng tôi đã có
                        rất nhiều các loại tổ chức hợp tác với chúng tôi, cung cấp cho chúng tôi kinh phí, nhân lực,
                        đồ tiếp tế cho động vật và tổ chức các sự kiện nhân danh chúng tôi!
                    </p>
                    <!-- button -->
                    <a href="{{route('contact')}}" class="btn btn-primary">Liên hệ với PetsCasa</a>
                </div>
                <!-- /col-lg -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>
    <!-- SVG effect -->
    <svg id="bigTriangleColor" class="d-none d-sm-block" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%"
         height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
        <path d="M0 0 L50 100 L100 0 Z"/>
    </svg>
    <!-- / Section Ends -->
    <!-- Section About Us -->
    <section id="about" class="dog-bg2">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Về PetsCasa</h2>
            </div>
            <!-- /Section-heading -->
        </div>
        <!-- /container -->
        <div class="container block-padding pt-0">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Chăm sóc thú cưng</h3>
                    <p>Cam kết của chúng tôi để chấm dứt sự đau khổ của động vật.</p>
                    <p>PetsCasa được thành lập tại Hà Nội, Việt Nam bởi Avenger Team, những người nhận thấy sự cần thiết
                        về giáo dục động vật trong khu vực. PetsCasa phục vụ cộng đồng bằng cách cung cấp sự an toàn,
                        điều trị y tế và phục hồi chức năng để giúp những bé chó và mèo hoang tìm được những gia đình
                        thực sự. Bên cạnh đó, PetsCasa còn cung cấp dịch vụ, tiện ích cho thú cưng của bạn. Chúng tôi
                        cũng làm việc với các đối tác khác và ngành thú y để cải thiện việc chăm sóc các bé.</p>
                    <!-- /ul -->
                </div>
                <!-- image -->
                <div class="col-lg-6">
                    <img
                            src=https://res.cloudinary.com/dwarrion/image/upload/v1599126137/PetCasa/HomePage/home_1_ls9cmm.jpg
                            alt=""
                            class="img-fluid border-irregular1"
                            data-aos="zoom-in">
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <div class="bg-light-custom block-padding">
            <div class="container">
                <div id="counter" class="row">
                    <!-- Counter -->
                    <div class="col-xl-3 col-md-6">
                        <div class="counter">
                            <i class="counter-icon fa fa-users"></i>
                            <!-- insert your final value on data-count= -->
                            <div class="counter-value" data-count="100">0</div>
                            <h3 class="title">Khách hàng vui vẻ</h3>
                        </div>
                        <!-- /counter -->
                    </div>
                    <!-- /col-lg -->
                    <!-- Counter -->
                    <div class="col-xl-3 col-md-6">
                        <div class="counter">
                            <i class="counter-icon flaticon-dog-in-front-of-a-man"></i>
                            <!-- insert your final value on data-count= -->
                            <div class="counter-value" data-count="14">0</div>
                            <h3 class="title">Tình nguyên viên</h3>
                        </div>
                        <!-- /counter -->
                    </div>
                    <!-- /col-lg -->
                    <!-- Counter -->
                    <div class="col-xl-3 col-md-6">
                        <div class="counter">
                            <i class="counter-icon flaticon-dog-2"></i>
                            <!-- insert your final value on data-count= -->
                            <div class="counter-value" data-count="40">0</div>
                            <h3 class="title">Chó được giúp đỡ</h3>
                        </div>
                        <!-- /counter -->
                    </div>
                    <!-- /col-lg -->
                    <!-- Counter -->
                    <div class="col-xl-3 col-md-6">
                        <div class="counter">
                            <i class="counter-icon flaticon-prize-badge-with-paw-print"></i>
                            <!-- insert your final value on data-count= -->
                            <div class="counter-value" data-count="5">0</div>
                            <h3 class="title">Giấy chứng nhận</h3>
                        </div>
                        <!-- /counter -->
                    </div>
                    <!-- /col-lg -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /block-padding -->
        <div class="container bottom-block-padding">
            <h3 class="text-center">Nhận xét của khách hàng</h3>
            <div class="col-md-12">
                <div id="owl-testimonial" class="owl-carousel owl-theme">
                    <!-- testimonial -->
                    <div class="testimonial">
                        <div class="content">
                            <p class="description">
                                Mình đã tìm được một người bạn tri kỉ thông qua trang , giờ đây sau những giờ tập luyện
                                căng thẳng mình đã có thể thư giãn với bé
                            </p>
                        </div>
                        <!-- /content -->
                        <div class="testimonial-pic">
                            <img
                                    src=https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_300,w_300/v1599144330/PetCasa/HomePage/dvh_htnold.png
                                    class="img-fluid" alt="">
                        </div>
                        <!-- /testimonial-pic -->
                        <div class="testimonial-review">
                            <h5 class="testimonial-title">Đoàn Văn Hậu</h5>
                            <span>Cầu thủ bóng đá</span>
                        </div>
                        <!-- /testimonial-review -->
                    </div>
                    <!-- /testimonial -->
                    <!-- testimonial -->
                    <div class="testimonial">
                        <div class="content">
                            <p class="description">
                                Mình rất vui và hài lòng với cách thức hoạt động của nhóm . Mong các bạn có thêm các
                                hoạt động tổ chức donate
                            </p>
                        </div>
                        <!-- /content -->
                        <div class="testimonial-pic">
                            <img
                                    src=https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_300,w_300/v1599144230/PetCasa/HomePage/bp_woxzrr.jpg
                                    class="img-fluid" alt="">
                        </div>
                        <!-- /testimonial-pic -->
                        <div class="testimonial-review">
                            <h5 class="testimonial-title">Nguyễn Thị Bích Diệp</h5>
                            <span>Ca sĩ</span>
                        </div>
                        <!-- /testimonial-review -->
                    </div>
                    <!-- /testimonial -->
                    <!-- testimonial -->
                    <div class="testimonial">
                        <div class="content">
                            <p class="description">
                                Bé Bư nhà mình đã có một người bạn :3 giờ mình và vợ đã có nhiều thời gian hơn.
                            </p>
                        </div>
                        <!-- /content -->
                        <div class="testimonial-pic">
                            <img
                                    src=https://res.cloudinary.com/dwarrion/image/upload/v1599480105/PetCasa/HomePage/rhym_syy7vb.jpg
                                    class="img-fluid" alt="">
                        </div>
                        <!-- /testimonial-pic -->
                        <div class="testimonial-review">
                            <h5 class="testimonial-title">Rhymnastic</h5>
                            <span>Rapper</span>
                        </div>
                        <!-- /testimonial-review -->
                    </div>
                    <!-- /testimonial -->
                </div>
                <!-- /owl-testimonial -->
            </div>
            <!-- /col-md-12 -->
        </div>
        <!-- /container -->
    </section>
    <!-- / Section Ends -->
    <!-- Section: Gallery -->
    <section id="gallery" class="dog-bg1 bg-light pb-0">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Thành Viên PetsCasa</h2>
            </div>
            <!-- /Section-heading -->
        </div>
        <!-- /container -->
        <!-- centered Gallery navigation -->
        <ul class="nav nav-pills cat center-nav">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-toggle="tab" data-filter="*">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="tab" data-filter=".Chó">Chó</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="tab" data-filter=".Mèo">Mèo</a>
            </li>
        </ul>
        <!-- /ul -->
        <!-- Gallery -->
        <div id="gallery-isotope" class="mt-5">
        @foreach($pets as $pet)
            <!-- Image -->
                <div class="{{$pet->Species}} col-lg-3 col-sm-6 col-md-6">
                    <div class="isotope-ietm">
                        <div class="gallery-thumb">
                            <img class="img-fluid" src="{{$pet->FirstThumbnail}}" alt="">
                            <a href="{{$pet->FirstThumbnail}}"
                               title="{{$pet->name}}">
                                <span class="overlay-mask"></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /gallery-isotope-->
    </section>
    <!-- / Section Ends -->

    <!-- Section Call to action -->
    <div id="call-to-action">
        <div class="container block-padding">
            <div class="col-lg-6 offset-lg-6 text-light card text-center" style="background-color: unset">
                <h4>Nhận tin mới nhất từ PetsCasa</h4>
                <!-- Form -->
                <div id="mc_embed_signup">
                    <!-- your form address in the line bellow -->
                    <form action="{{route('mail_customer')}}"
                          method="POST" id="contact_form" class="validate">
                        @csrf
                        <div id="mc_embed_signup_scroll">
                            <div class="mc-field-group">
                                <div class="input-group">
                                    <input class="form-control input-lg required email" type="email" value=""
                                           name="Email" placeholder="Email của bạn" id="mce-EMAIL" required="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" name="subscribe"
                                                id="mc-embedded-subscribe">Đăng ký</button>
                              </span>
                                </div>
                                <!-- Subscription results -->
                                {{--                                <div id="mce-responses" class="mailchimp">--}}
                                {{--                                    <div class="alert alert-danger response" id="mce-error-response"></div>--}}
                                {{--                                    <div class="alert alert-success response" id="mce-success-response"></div>--}}
                                {{--                                </div>--}}
                            </div>
                            <!-- /mc-fiel-group -->
                        </div>
                        <!-- /mc_embed_signup_scroll -->
                    </form>
                    <!-- /form ends -->
                </div>
                <!-- /mc_embed_signup -->
            </div>
            <!-- /col-md-12 -->
        </div>
        <!--/row -->
    </div>
    <!--/call-to-action -->
    <!-- Section Adopt -->
    <section id="adopt" class="paws-house-bg1 bg-light">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Nhận Nuôi</h2>
            </div>
            <!-- /Section-heading -->
            <div class="col-lg-10 offset-lg-1 text-center">
                <h3>Tìm một người bạn mới</h3>
                <p>Bạn đã sẵn sàng?</p>
            </div>
            <!-- First row: Adopt a pet -->
            <div class="row mt-5">
                <!-- Pet  -->
                @foreach($pet_4 as $pet)
                    <div class="adopt-card col-md-6 col-xl-3 res-margin">
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
                                        <li><strong>Giới tính: </strong> {{$pet->Sex}}</li>
                                        <li><strong>Triệt sản: </strong> @if ($pet->Neutered == "Có") Đã triệt
                                            sản @elseif ($pet->Neutered == "Không") Chưa triệt sản @endif</li>
                                        <li><?php $current_Time = Carbon\Carbon::now(); ?>
                                            <strong>Tuổi: </strong> @if ($current_Time->addDays(-180) <  $pet->Age)
                                                Dưới 6 tháng
                                            @elseif ($current_Time->addDays(-720) <  $pet->Age)
                                                Từ 6 tháng đến 2 năm
                                            @elseif ($current_Time->addDays(-720) >  $pet->Age)
                                                Từ 2 năm trở lên
                                            @endif</li>
                                    </ul>
                                    <!-- Buttons -->
                                    <div class="text-center">
                                        <a href="{{route('adoption_detail',$pet->Slug)}}" class="btn btn-primary">Chi
                                            tiết</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /thumbnail -->
                        </div>
                        <!-- /card -->
                    </div>
                @endforeach
            </div>
            <!-- /row -->
            <div class="text-center mt-5">
                <a href="{{route('pet_list_adoption')}}" class="btn btn-secondary btn-lg">Xem thêm</a>
            </div>
        </div>
        <!-- /container -->
    </section>
    <!-- Section Contact -->
    <section id="contact" class="dog-bg3">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Liên Hệ</h2>
            </div>
            <!-- /Section-heading -->
        </div>
        <!-- /container -->
        <div class="container">
            <div class="row">
                <!-- contact info -->
                <div class="contact-info col-lg-5 card bg-light-custom">
                    <h4>Feedback</h4>
                    <!-- Form Starts -->
                    <form action="{{route('send_contact_mail')}}" id="contact_form" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tên<span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control input-field" required=""
                                           autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control input-field" required=""
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Chủ đề</label>
                                    <input type="text" name="subject" class="form-control input-field"
                                           autocomplete="off">
                                </div>
                                <div class="col-md-12">
                                    <label>Feedback<span class="required">*</span></label>
                                    <textarea name="contact_message" id="message" class="textarea-field form-control"
                                              rows="5"
                                              required=""></textarea>
                                </div>
                            </div>
                            <button type="submit" id="submit_btn" value="Submit" class="btn btn-primary">Gửi
                            </button>
                        </div>
                        <!-- Contact results -->
                        <div id="contact_results"></div>
                    </form>
                </div>
                <div class="col-lg-7">
                    <!-- map-->
                    <div id="map-canvas" class="mt-3 border-irregular1"></div>
                </div>
                <!-- /col-lg-->
            </div>
            <!-- /row-->
            <div class="row res-margin mt-5">
                <div class="col-lg-6 mt-5">
                    <div class="contact-icon">
                        <!---icon-->
                        <i class="fa fa-envelope top-icon"></i>
                        <!-- contact-icon info-->
                        <div class="contact-icon-info">
                            <h5>Gửi thư cho chúng tôi</h5>
                            <p class="h7"><a href="mailto:email@yoursite.com">t1908e@gmail.com</a></p>
                        </div>
                    </div>
                </div>
                <!-- /contact-icon-->
                <div class="col-lg-6 mt-5">
                    <div class="contact-icon">
                        <!---icon-->
                        <i class="fa fa-map-marker top-icon"></i>
                        <!-- contact-icon info-->
                        <div class="contact-icon-info">
                            <h5>Ghé thăm chúng tôi</h5>
                            <p class="h7">8 Tôn Thất Thuyết - Hà Nội</p>
                        </div>
                    </div>
                </div>
                <!-- /contact-icon-->
                <div class="col-lg-6 mt-5">
                    <div class="contact-icon">
                        <!---icon-->
                        <i class="fa fa-phone top-icon"></i>
                        <!-- contact-icon info-->
                        <div class="contact-icon-info">
                            <h5>Gọi cho chúng tôi ngay hôm nay</h5>
                            <p class="h7">(123) 456-789</p>
                        </div>
                    </div>
                </div>
                <!-- /contact-icon-->
                <div class="col-lg-6 mt-5">
                    <div class="contact-icon">
                        <!---icon-->
                        <i class="fa fa-heart top-icon"></i>
                        <!-- contact-icon info-->
                        <div class="contact-icon-info">
                            <h5>Theo dõi chúng tôi trên MXH</h5>
                            <ul class="social-media">
                                <li><a href="https://www.facebook.com/Pet-Casa-107245207763414"><i
                                                class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /contact-icon-->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>
    <!-- /Section ends -->
    <!-- /page -->
@endsection
