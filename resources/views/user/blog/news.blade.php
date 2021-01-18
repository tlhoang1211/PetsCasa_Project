@extends('user.layouts.master')
@section('title')
    News
@endsection
@section('specific_css')
    <link rel="stylesheet" href="{{asset('assets/user/css/news.css')}}">
@endsection
@section('specific_js')
    <script>
        $("ul.pagination").addClass('float-right');
        {{--        $(function () {--}}

        {{--            var $sidebar = $("#sidebar"),--}}
        {{--                $window = $(window),--}}
        {{--                offset = $sidebar.offset(),--}}
        {{--                topPadding = 120;--}}

        {{--            $window.scroll(function () {--}}
        {{--                if ($window.scrollTop() > offset.top) {--}}
        {{--                    $sidebar.stop().animate({--}}
        {{--                        marginTop: $window.scrollTop() - offset.top + topPadding--}}
        {{--                    });--}}
        {{--                } else {--}}
        {{--                    $sidebar.stop().animate({--}}
        {{--                        marginTop: 0--}}
        {{--                    });--}}
        {{--                }--}}
        {{--            });--}}

        {{--        });--}}
    </script>
@endsection
@section('content')
    <!-- Jumbotron -->
    <div class=" jumbotron jumbotron-fluid overlay">
        <div class="jumbo-heading">
            <!-- section-heading -->
            <div class="section-heading" data-aos="zoom-in">
                <h1>Tin Tức</h1>
            </div>
            <!-- /section-heading -->
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                </ol>
            </nav>
        </div>
        <!-- /jumbo-heading -->
    </div>
    <!-- /jumbotron -->
    <!-- ==== Page Content ==== -->
    <div id="blog-home" class="page">
        <div class="container">
            <div class="row" style="padding-bottom: 15px">
                <!-- Blog Entries Column -->
                <div class="col-lg-8">
                    <h2>Tin tức</h2>
                    <!-- Blog Post -->
                    <div class="row">
                        @foreach ($news as $new)
                            <div class="col-sm-6 col-md-6 col-lg-6 mb-5 blog-box"
                                 style="padding-top: unset;">
                                <a href="{{route('single_new',$new->Slug)}}">
                                    <!-- image -->
                                    <div class="img-hover-zoom">
                                        <img class="card-img-top img-fluid"
                                             src="@if ($new->Category_id == 1) {{$new->LastThumbnail}}@else{{$new->FirstThumbnail}}@endif"
                                             alt=""
                                             style="height: 250px">
                                    </div>
                                </a>
                                <div class="card blog-card">
                                    <!-- Post info-->
                                    <a href="{{route('single_new',$new->Slug)}}">
                                        <h6 class="card-title overflow-ellipsis"
                                            style="height: 52px; @if ($new->Category_id == 1) color:#ff8500;@endif">{{$new->Title}}</h6>
                                    </a>
                                    <div class="card-body">
                                        <!-- excerpt -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="post-info border-irregular2 text-muted">
                                                    Đăng {{date("d/m/Y", strtotime($new->created_at))}} bởi
                                                    <span style="color: #48A06A">{{$new->Author}}</span>
                                                </div>
                                                {{--                                <p class="card-text mt-3">{{$new->Content}}</p>--}}
                                                <div>
                                                    <a href="{{route('single_new',$new->Slug)}}" class="btn btn-primary"
                                                       style="text-align: center; display: block">Chi tiết
                                                        &rarr;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--card-footer -->
                            </div>
                        @endforeach
                    </div>
                    <!-- /card blog-card -->
                    <div class="col-md-12 mt-5">
                        <!-- pagination -->
                        <nav aria-label="pagination">
                            {{--                            <ul class="pagination float-right">--}}
                            {{--                                <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                            {{--                            </ul>--}}
                            {{$news->links()}}
                        </nav>
                        <!-- /nav -->
                    </div>
                    <!-- /col-md -->
                </div>
                <!-- Sidebar Widgets Column -->
                <div class="blog-sidebar bg-light-custom  h-50 border-irregular1 col-lg-4 pattern3 h-100" id="sidebar">
                    <!-- Search Widget -->
                    <div class="card">
                        <h5 class="card-header">Tìm kiếm</h5>
                        <div class="card-body">
                            <form action="{{route('news')}}" method="GET">
                                {{--                                @csrf--}}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="Keyword" placeholder="...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit">Tìm!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Categories Widget -->
                    <div class="card">
                        <h5 class="card-header">Chuyên mục</h5>
                        <div class="card-body">
                            <div class="list-group">
                                <a href="{{route('news',["Category" => "1"])}}"
                                   class="list-group-item list-group-item-action">
                                    Quá trình cứu hộ
                                </a>
                                <a href="{{route('news',["Category" => "2"])}}"
                                   class="list-group-item list-group-item-action">
                                    Tin tức và sự kiện</a>
                                <a href="{{route('news',["Category" => "3"])}}"
                                   class="list-group-item list-group-item-action">
                                    Kiến thức nuôi boss</a>
                            </div>
                        </div>
                    </div>
                    <!-- Side Widget -->
                    <div class="card" style="padding-bottom: 100px">
                        <h5 class="card-header">Video nổi bật</h5>
                        <div class="card-body">
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FVwyIfChIdY"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- Side Widget -->
                    {{--                    <div class="card">--}}
                    {{--                        <h5 class="card-header">Tags</h5>--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <a href="#" class="badge badge-pill badge-default">Dogs</a>--}}
                    {{--                            <a href="#" class="badge badge-pill badge-default">Cats</a>--}}
                    {{--                            <a href="#" class="badge badge-pill badge-default">Nutrition</a>--}}
                    {{--                            <a href="#" class="badge badge-pill badge-default">Events</a>--}}
                    {{--                            <a href="#" class="badge badge-pill badge-default">Exotic pets</a>--}}
                    {{--                            <a href="#" class="badge badge-pill badge-default">Adoption</a>--}}
                    {{--                            <a href="#" class="badge badge-pill badge-default">Pet Insurance</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- Section Call To Action -->
        <div id="call-to-action"
             style="background-image: url(https://res.cloudinary.com/dwarrion/image/upload/v1598789854/PetCasa/AdoptionPage/cat_fkhckl.jpg)">
            <div class="container block-padding">
                <div
                    class="col-12 col-sm-8 col-md-8 col-lg-8 justify-content-center align-self-center text-center text-sm-left text-md-left text-lg-left">
                    <h4 style="color: white">Bạn đã sẵn sàng để hỗ trợ?</h4>
                </div>
                <div
                    class="col-12 col-sm-4 col-md-4 col-lg-4 justify-content-center align-self-center text-center">
                    <a href="#" class="btn btn-primary"
                       aria-label="Ủng hộ ngay" aria-labelledby="Ủng hộ ngay">Ủng hộ ngay</a>
                </div>
            </div>
            <!--/row -->
        </div>
        <!--/call-to-action -->
    </div>
    <!-- /page -->
@endsection
