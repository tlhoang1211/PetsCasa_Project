@extends('user.layouts.master')
@section('title')
    Single News
@endsection
@section('content')
    <!-- Jumbotron -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=322810592178754&autoLogAppEvents=1"
            nonce="BlkDPPpx"></script>
    <div class="jumbotron jumbotron-fluid overlay">
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
                    <li class="breadcrumb-item"><a href="{{route('news')}}">Tin tức</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$single_new->Title}}
                    </li>
                </ol>
            </nav>
        </div>
        <!-- /jumbo-heading -->
    </div>
    <!-- /jumbotron -->
    <!-- ==== Page Content ==== -->
    <div class="page">
        <div class="container">
            <div class="row">
                <!-- Post Content Column -->
                <div class="col-lg-8 card blog-card">
                    <div class="card-body">
                        <h3 class="card-title">{{$single_new->Title}}</h3>
                        <!-- Post info-->
                        <div class="post-info border-irregular2 text-muted">
                            {{date("d/m/Y", strtotime($single_new->created_at))}} bởi
                            <a href="#">{{$single_new->Author}}</a>
                        </div>
                        <hr>
                        <!-- Preview Image -->
                        <img src="{{$single_new->FirstThumbnail}}" class="img-fluid" alt="">
                        <hr>
                        <!-- Post Content -->
                        <p>{!! $single_new->Content !!}</p>
                        @if ($include_pet != null && sizeof($include_pet) > 0)
                            {{--                            <div class="card">--}}
                            <h5 class="card-header">Thú nuôi liên quan :</h5>
                            <div class="card-body">
                                @foreach($include_pet as $pet)
                                    <a href="{{route('adoption_detail',$pet->Slug)}}"
                                       class="badge badge-pill badge-default">{{$pet->Name}}</a>
                                @endforeach
                            </div>
                        {{--                            </div>--}}
                    @endif
                    <!-- Comments Form -->
                        <!-- Comment -->
                        <div class="fb-comments"
                             data-href="{{URL::current()}}"
                             data-numposts="5" data-width=""></div>
                    {{--                        <div class="comment row">--}}
                    {{--                            <div class="col-md-3 col-xs-12 comment-img text-center float-left">--}}
                    {{--                                <img class="rounded-circle img-fluid m-x-auto" src="img/team/team2.jpg" alt="">--}}
                    {{--                            </div>--}}
                    {{--                            <!-- /col-md -->--}}
                    {{--                            <div class="col-md-9 col-xs-12 float-right">--}}
                    {{--                                <h6 class="mt-2"><a href="">John Doe</a> <small>says:</small></h6>--}}
                    {{--                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante--}}
                    {{--                                    sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.--}}
                    {{--                                    Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in--}}
                    {{--                                    faucibus.</p>--}}
                    {{--                                <button type="submit" class="btn btn-primary btn-sm float-right">Reply</button>--}}
                    {{--                            </div>--}}
                    {{--                            <!--/media-body -->--}}
                    {{--                        </div>--}}
                    {{--                        <!--/Comment -->--}}
                    {{--                        <!-- Single Comment -->--}}
                    {{--                        <div class="comment row">--}}
                    {{--                            <div class="col-md-3 col-xs-12 comment-img text-center float-left">--}}
                    {{--                                <img class="rounded-circle img-fluid m-x-auto" src="img/team/team3.jpg" alt="">--}}
                    {{--                            </div>--}}
                    {{--                            <!-- /col-md -->--}}
                    {{--                            <div class="col-md-9 col-xs-12 float-right">--}}
                    {{--                                <h6 class="mt-2"><a href="">Mia Kelly</a> <small>says:</small></h6>--}}
                    {{--                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante--}}
                    {{--                                    sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.--}}
                    {{--                                    Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in--}}
                    {{--                                    faucibus.</p>--}}
                    {{--                                <button type="submit" class="btn btn-primary btn-sm float-right">Reply</button>--}}
                    {{--                            </div>--}}
                    {{--                            <!--/media-body -->--}}
                    {{--                        </div>--}}
                    <!--/Comment -->
                    </div>
                    <!--/Card-body -->
                </div>
                <!-- /col-lg -->
                <!-- Sidebar Widgets Column -->
                <div class="blog-sidebar bg-light-custom  h-50 border-irregular1 col-lg-4" id="sidebar">
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
                {{--                    <div class="card">--}}
                {{--                        <h5 class="card-header">Video nổi bật</h5>--}}
                {{--                        <div class="card-body">--}}
                {{--                            <div class="embed-responsive embed-responsive-4by3">--}}
                {{--                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FVwyIfChIdY"--}}
                {{--                                        allowfullscreen></iframe>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
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
    </div>
    <!-- /page -->
@endsection
