@extends('user.layouts.master')
@section('title')
    About
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid overlay">
        <div class="jumbo-heading">
            <!-- section-heading -->
            <div class="section-heading" data-aos="zoom-in">
                <h1>About PetsCasa</h1>
            </div>
            <!-- /section-heading -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('about')}}">About PetsCasa</a></li>
                </ol>
            </nav>
        </div>
        <!-- /jumbo-heading -->
    </div>
    <!-- /jumbotron -->
    <div class="page">
        <div class="container block-padding pt-0">
            <div class="row">
                <div class="col-lg-5">
                    <img
                        src=https://res.cloudinary.com/dwarrion/image/upload/v1597834743/PetCasa/AboutPage/about_img_1_dsxwdk.png
                        alt=""
                        class="img-fluid border-irregular2"
                        data-aos="zoom-in">
                </div>
                <!--/col-lg-->
                <div class="col-lg-7 res-margin">
                    <h3>Cam kết của chúng tôi để chấm dứt sự đau khổ của động vật.</h3>
                    <p>PetsCasa được thành lập tại Hà Nội, Việt Nam bởi Avenger Team, những người nhận thấy sự cần thiết về
                        giáo dục động vật trong khu vực. PetsCasa phục vụ cộng đồng bằng cách cung cấp sự an toàn, điều trị
                        y tế và phục hồi chức năng để giúp những bé chó và mèo hoang tìm được những gia đình thực sự .
                        Bên cạnh đó, PetsCasa còn cung cấp dịch vụ, tiện ích cho thú cưng của bạn. Chúng tôi cũng làm việc
                        với các đối tác khác và ngành thú y để cải thiện việc chăm sóc các bé.</p>
                    <p><strong>Create happiness. Save lives.</strong></p>
                </div>
                <!-- /col-lg -->
            </div>
            <!-- /row -->
            <div class="row mt-5">
                <div class="col-lg-7">
                    <h4>Chúng tôi giúp cải thiện chất lượng cuộc sống của động vật</h4>
                    <p>PetsCasa là một tổ chức từ thiện phúc lợi động vật với tầm nhìn về một tương lai nơi mọi
                        vật nuôi đều được an toàn, được tôn trọng và yêu thương.</p>
                    <p>Nhóm của chúng tôi và các tình nguyện viên hiện đang làm việc trong các nhóm chính sau:</p>
                    <ul class="custom pl-0">
                        <li>Cứu hộ</li>
                        <li>Rehome</li>
                        <li>Dịch vụ, tiện ích cho thú cưng</li>
                        <li>Gây quỹ</li>
                        <li>Tài chính và quản lý</li>
                    </ul>
                    <!-- /ul -->
                </div>
                <!-- /col-lg-->
                <div class="col-lg-5 res-margin">
                    <div id="accordion" class="accordion-cards">
                        <!-- card 1 -->
                        <div class="card">
                            <div class="card-header" id="headingOne" role="tablist" data-toggle="collapse"
                                 data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <h6 class="mb-0">
                                    Tầm nhìn và sứ mệnh của chúng tôi
                                </h6>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <p>Chúng tôi có tầm nhìn về một tương lai cho Việt Nam, nơi mọi vật nuôi đều được an
                                        toàn, được tôn trọng và yêu thương. Và để đưa chúng tôi đến đó, chúng tôi đã
                                        phát triển một sứ mệnh nhìn vào bức tranh toàn cảnh hơn, thúc đẩy thay đổi xã
                                        hội và đoàn kết để cứu sống động vật.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- card 2 -->
                        <div class="card">
                            <div class="card-header" id="headingTwo" role="tablist" data-toggle="collapse"
                                 data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h6 class="mb-0">
                                    Đội ngũ của chúng tôi
                                </h6>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <p>Chúng tôi đã tạo ra một môi trường nơi những tài năng tốt nhất trong lĩnh vực
                                        phúc lợi động vật, công nghệ và tiếp thị có thể sử dụng kiến thức và chuyên
                                        môn của họ cho mục đích tốt và chúng tôi vô cùng tự hào về nhóm thúc đẩy sứ mệnh
                                        của chúng tôi ngày hôm nay.
                                        <a href="{{route('team')}}"><u>Tìm hiểu thêm về họ</u></a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- card 3 -->
                        <div class="card">
                            <div class="card-header" id="headingThree" role="tablist" data-toggle="collapse"
                                 data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h6 class="mb-0">
                                    Đối tác và những người ủng hộ của PetsCasa
                                </h6>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        Việc xây dựng mối quan hệ bền vững trong ngành với một số thương hiệu lớn nhất
                                        của Việt Nam đã giúp chúng tôi có thể giúp thú cưng cứu hộ tiếp cận rộng hơn và
                                        mang lại nhiều lợi ích hơn cho các tổ chức cứu hộ cộng đồng cơ sở.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /acordion -->
                </div>
                <!-- /col-lg -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <div id="call-to-action">
            <div class="container block-padding">
                <div class="col-lg-6 offset-lg-6 bg-primary text-light card text-center"
                     style="background-color: unset !important;">
                    <h4>Nhận tin mới nhất từ PetsCasa</h4>
                    <p>Những thông tin mới nhất về chương trình và dịch vụ bên PetsCasa sẽ được cập nhập cho bạn thường
                        xuyên. Cám ơn vì đã tin tưởng PetsCasa &nbsp;<i class="fa fa-heart" aria-hidden="true"
                                                                     style="color: #F9575C"></i></p>
                    <!-- Form -->
                    <div id="mc_embed_signup">
                        <!-- your form address in the line bellow -->
                        <form action="//yourlist.us12.list-manage.com/subscribe/post?u=04e646927a196552aaee78a7b&id=111"
                              method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                              class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                                <div class="mc-field-group">
                                    <div class="input-group">
                                        <input class="form-control input-lg required email" type="email" value=""
                                               name="EMAIL" placeholder="Email của bạn" id="mce-EMAIL">
                                        <span class="input-group-btn">
                                 <button class="btn btn-primary" type="submit" value="Subscribe" name="subscribe"
                                         id="mc-embedded-subscribe">Subscribe</button>
                                 </span>
                                    </div>
                                    <!-- Subscription results -->
                                    <div id="mce-responses" class="mailchimp">
                                        <div class="alert alert-danger response" id="mce-error-response"></div>
                                        <div class="alert alert-success response" id="mce-success-response"></div>
                                    </div>
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
        <div class="container bottom-block-padding">
            <div class="bg-light-custom card">
                <div class="row">
                    <div class="col-xl-6">
                        <h4>Trẻ em có thể thay đổi tương lai cho động vật</h4>
                        <ul class="custom pl-0">
                            <li>PetsCasa chống lại sự tàn ác của động vật thông qua Chương trình Giáo dục
                                Cộng đồng dành cho người học ở mọi lứa tuổi. Chúng tôi tin rằng việc nâng cao nhận thức
                                trong thế hệ trẻ, đồng thời vun đắp mối quan hệ giữa vật nuôi và mọi người, dẫn đến cách
                                đối xử nhân đạo cho tất cả mọi người.
                            </li>
                            <li>Chương trình học tập của chúng tôi tạo điều kiện cho các bài học về lòng trắc ẩn và sự
                                tôn trọng đối với động vật. Các hoạt động và giáo dục được giảng dạy bằng tiếng Anh và
                                tiếng Việt với nhiều chủ đề khác nhau. Nhóm giáo dục của chúng tôi thực hiện các chuyến
                                thăm lớp tại các trường học và cung cấp tùy chọn bài học ngoài địa điểm. Số tiền thu
                                được từ khóa học được sử dụng để làm lợi và cung cấp cho những động vật đang cần.
                            </li>
                        </ul>
                        <!-- /ul -->
                    </div>
                    <!-- /col-md -->
                    <div class="col-xl-6">
                        <!-- embed video -->
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FVwyIfChIdY"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- /col-md -->
                </div>
                <!-- /row -->
            </div>
            <!-- /card -->
        </div>
        <!-- /container -->
    </div>
    <!-- /page -->
@endsection
