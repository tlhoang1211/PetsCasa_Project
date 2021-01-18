@extends('user.layouts.master')
@section('title')
    404 Error
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
    <div class="page pb-0 mt-5 paws-house-bg1">
        <div class="container">
            <div class="row mt-5 block-padding">
                <div class="col-md-4 offset-md-1">
                    <img
                        src=https://res.cloudinary.com/dwarrion/image/upload/v1597933759/PetCasa/Error_Page/dog_cat_v3glzx.png
                        alt="" class="center-block img-fluid float-right">
                </div>
                <div class="col-md-5 h-50 border-irregular1  bg-light-custom text-center">
                    <h1 class="mt-4">404!!!</h1>
                    <h4>Không tìm thấy trang</h4>
                    <a href="/" class="btn btn-primary mb-5">Quay trở về trang chủ</a>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /page -->
@endsection
