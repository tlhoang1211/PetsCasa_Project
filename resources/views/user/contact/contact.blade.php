@extends('user.layouts.master')
@section('title')
    Contact
@endsection
@section('specific_css')
    <link href="{{asset('assets/user/css/custom.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <!-- Open Map -->
    <script src="{{asset('assets/user/js/map.js')}}"></script>
    <!-- Contact Form Script -->
    <script src="{{asset('assets/user/js/contact.js')}}"></script>
    <!-- Send Mail -->
    <script src="{{asset('assets/user/php/sendmail.php')}}"></script>
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
    <!-- /nav --><!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid overlay">
        <div class="jumbo-heading">
            <!-- section-heading -->
            <div class="section-heading" data-aos="zoom-in">
                <h1>Liên Hệ</h1>
            </div>
            <!-- /section-heading -->
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                </ol>
            </nav>
        </div>
        <!-- /jumbo-heading -->
    </div>
    <!-- /jumbotron -->
    <div class="page pb-0">
        <div class="container">
            <h4>Gửi thư cho PetsCasa</h4>
            <div class="row">

                <!-- contact-info-->
                <div class="contact-info col-lg-5" style="max-height: 650px">
                    <!-- Form Starts -->
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSem9SJuzxZtdvmk_JHPIyaltpVc2DkhwYtUOotB7fh9ikWpxQ/viewform?embedded=true"
                            width="640" height="1092" frameborder="0" marginheight="0" marginwidth="0">Loading…
                    </iframe>
                    <!-- /contact)form-->
                </div>
                <!-- /contact-info-->
                <div class="col-lg-6 offset-lg-1 h-50 card bg-secondary res-margin ">
                    <div class="contact-info text-light ">
                        <!-- contact-info-->
                        <div class="text-light">
                            <h5>Thông tin liên lạc khác</h5>
                            <p>Nếu bạn có bất kỳ vấn đề gì cần trao đổi hãy liên hệ với chúng tôi qua email và sđt hay
                                cần trao đổi trực tiếp thì theo địa chỉ dưới đây.
                            </p>
                            <!-- contact icons-->
                            <ul class="list-unstyled mt-5 list-contact">
                                <li class="h7"><i class="fa fa-envelope margin-icon"></i><a
                                            href="mailto:t1908e@gmail.com">t1908e@gmail.com</a></li>
                                <li class="h7"><i class="fa fa-phone margin-icon"></i>(123) 456-789</li>
                                <li class="h7"><i class="fa fa-map-marker margin-icon"></i>8 Tôn Thất Thuyết - Hà Nội
                                </li>
                            </ul>
                            <!-- /list-->
                        </div>
                        <!-- /text-light -->
                    </div>
                    <!-- /contact-info-->
                </div>
                <!-- /col-lg-->
            </div>
            <!-- /row-->
        </div>
        <!-- /container -->
        <!-- map-->
        <div id="map-canvas" class="mt-5" data-aos="fade-down"></div>
    </div>
    <!-- /page -->
@endsection
