@extends('admin.layouts.master')
@section('title','Admin Dashboard')
@section('specific_js')
    {{--    <script src={{asset('assets/admin/')."/js/pages/dashboard-2.init.js"}}></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('PetChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: ["Hoạt dộng", "Không hoạt động", "Đã được nhận nuôi"],
                datasets: [
                    {
                        label: "My First dataset",
                        backgroundColor: ['#48A06A', '#aa551e', 'blue'],
                        borderColor: '#fff',
                        data: [{{count($data['active_pets'])}},{{count($data['deactive_pets'])}},{{count($data['adopted_pets'])}}],
                    }]
            },
            // Configuration options go here
            options: {}
        });
        chart.canvas.parentNode.style.height = '95%';
        chart.canvas.parentNode.style.width = '500px';
    </script>
    <script>
        var ctx = document.getElementById('NewChart').getContext('2d');
        var chart2 = new Chart(ctx, {
            // The type of chart2 we want to create
            type: 'doughnut',
            // The data for our dataset
            data: {
                labels: ["Tin tức hoạt đôn", "Không hoạt động"],
                datasets: [
                    {
                        label: "My First dataset",
                        backgroundColor: ['#08ff00', '#ff0000', 'blue'],
                        borderColor: '#fff',
                        data: [{{count($data['active_news'])}},{{count($data['deactive_news'])}}],
                    }]
            },
            // Configuration options go here
            options: {}
        });
        chart2.canvas.parentNode.style.height = '95%';
        chart2.canvas.parentNode.style.width = '500px';
    </script>
    {{--    <script>--}}
    {{--        var ctx = document.getElementById('myChartOrigin').getContext('2d');--}}
    {{--        var chart3 = new Chart(ctx, {--}}
    {{--            // The type of chart we want to create--}}
    {{--            type: 'doughnut',--}}
    {{--            // The data for our dataset--}}
    {{--            data: {--}}
    {{--                labels: [@foreach($brands as $brand) "{{$brand->brand_name}}",@endforeach],--}}
    {{--                datasets: [--}}
    {{--                    {--}}
    {{--                        label: "My First dataset",--}}
    {{--                        backgroundColor: ['purple', 'orange', 'red', 'green', 'blue', 'purple', 'indigo','black','cyan'],--}}
    {{--                        borderColor: '#fff',--}}
    {{--                        data: [@foreach($brands as $brand) "{{count($brand->products)}}",@endforeach],--}}
    {{--                    }]--}}
    {{--            },--}}
    {{--            // Configuration options go here--}}
    {{--            options: {}--}}
    {{--        });--}}
    {{--        chart3.canvas.parentNode.style.height = '95%';--}}
    {{--        chart3.canvas.parentNode.style.width = '500px';--}}
    {{--    </script>--}}
@endsection
@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Tổng
                                    số thành viên</p>
                                <h3 class="font-weight-medium my-2"><span
                                            data-plugin="counterup">{{count($data['account_number'])}}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-dog-side avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Tổng
                                    số thú nuôi</p>
                                <h3 class="font-weight-medium my-2"><span
                                            data-plugin="counterup">{{count($data['pets'])}}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-crown avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Số
                                    tình nguyện viên</p>
                                <h3 class="font-weight-medium my-2"><span data-plugin="counterup">158</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-auto-fix  avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">
                                    Tổng số yêu cầu</p>
                                <h3 class="font-weight-medium my-2"><span
                                            data-plugin="counterup">{{count($data["report"])}}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">
                        <div class="card-box" style="min-height: 95%">
                            <canvas id="PetChart"></canvas>
                            <div style="text-align: center;margin-top: 5%;">Biểu đồ thú nuôi</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card-box">
                        <div class="card-box" style="min-height: 95%">
                            <canvas id="NewChart"></canvas>
                            <div style="text-align: center;margin-top: 5%;">Biểu đồ tin tức</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div> <!-- end container-fluid -->

    </div> <!-- end content -->



    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    2017 - 2019 © Adminox theme by <a href="">Coderthemes</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
@endsection