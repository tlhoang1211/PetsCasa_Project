@extends('user.layouts.master')
@section('title')
    Contact
@endsection
@section('specific_js')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
@section('content')
    <!-- ==== Page Content ==== -->
    <div class="page pb-0 mt-5">
        <div class="container">
            <div class="row mt-5 block-padding">
                <div class="col-md-4 offset-md-1" style="padding-right: unset">
                    <img
                            src=https://res.cloudinary.com/dwarrion/image/upload/v1598029249/PetCasa/SuccessPage/dog_cat_hoprkm.jpg
                            alt="" class="center-block img-fluid float-right">
                </div>
                <div class="col-md-5 h-50 border-irregular1  bg-light-custom text-center">
                    <h1 class="mt-4">Success!</h1>
                    <h5>Cám ơn bạn đã tin tưởng và lựa chọn PetCasa. Chúng tôi sẽ liên lạc lại với bạn sớm
                        nhất có thể.</h5>
                    <a class="btn btn-primary mb-5" href="{{route('home')}}">Quay trang chủ</a>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /page -->
@endsection
