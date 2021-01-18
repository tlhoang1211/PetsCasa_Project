@extends('admin.layouts.master')
@section('specific_css')

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom_admin.css')}}">
@endsection
@section('specific_js')
    <script src="{{asset('assets/admin/js/vendor.min.js')}}"></script>

    <!-- third party js -->
    {{--    <script src="{{asset('assets/admin/libs/datatables/jquery.dataTables.min.js')}}"></script>--}}
    {{--    <script src="{{asset('assets/admin/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>--}}
    {{--    <script src="{{asset('assets/admin/libs/datatables/dataTables.responsive.min.js')}}"></script>--}}

    <!-- Tickets js -->
    {{--    <script src="{{asset('assets/admin/js/pages/tickets.init.js')}}"></script>--}}

    <!-- App js -->
    {{--    <script src="{{asset('assets/admin/js/app.min.js')}}"></script>--}}

    {{--    <script src="{{asset('assets/admin/libs/parsleyjs/parsley.min.js')}}"></script>--}}
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $(".parsley-examples").parsley()--}}
    {{--        });--}}
    {{--    </script>--}}
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $("#deactive_all").on('click', function (e) {--}}
    {{--                console.log('123');--}}
    {{--                var allVals = [];--}}
    {{--                $(".checkbox_list:checked").each(function () {--}}
    {{--                    allVals.push($(this).val());--}}
    {{--                    console.log(allVals);--}}
    {{--                });--}}
    {{--                if (allVals.length <= 0) {--}}
    {{--                    alert("Please select row.");--}}
    {{--                } else {--}}
    {{--                    var check = confirm("Are you sure you want to deactive this order?");--}}
    {{--                    if (check == true) {--}}
    {{--                        var join_selected_values = allVals.join(",");--}}
    {{--                        $.ajax({--}}
    {{--                            url: '{{route('admin_order_deactive_multi')}}',--}}
    {{--                            type: 'PUT',--}}
    {{--                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
    {{--                            data: 'ids=' + join_selected_values,--}}
    {{--                            success: function (data) {--}}
    {{--                                if (data['success']) {--}}
    {{--                                    $(".sub_chk:checked").each(function () {--}}
    {{--                                        $(this).parents("tr").remove();--}}
    {{--                                    });--}}
    {{--                                    alert(data['success']);--}}
    {{--                                    // alert("Accounts Deleted Success");--}}
    {{--                                    window.location = '{{route('admin_order_list')}}';--}}
    {{--                                } else if (data['error']) {--}}
    {{--                                    console.log(data['error']);--}}
    {{--                                } else {--}}
    {{--                                    alert('Whoops Something went wrong!!');--}}
    {{--                                }--}}
    {{--                            },--}}
    {{--                            error: function (data) {--}}
    {{--                                alert(data.responseText);--}}
    {{--                            }--}}
    {{--                        });--}}
    {{--                        $.each(allVals, function (index, value) {--}}
    {{--                            $('table tr').filter("[data-row-id='" + value + "']").remove();--}}
    {{--                        });--}}
    {{--                    }--}}
    {{--                }--}}
    {{--            })--}}
    {{--        });--}}
    {{--    </script>--}}
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $("#active_all").on('click', function (e) {--}}
    {{--                console.log('123');--}}
    {{--                var allVals = [];--}}
    {{--                $(".checkbox_list:checked").each(function () {--}}
    {{--                    allVals.push($(this).val());--}}
    {{--                    console.log(allVals);--}}
    {{--                });--}}
    {{--                if (allVals.length <= 0) {--}}
    {{--                    alert("Please select row.");--}}
    {{--                } else {--}}
    {{--                    var check = confirm("Are you sure you want to active this row?");--}}
    {{--                    if (check == true) {--}}
    {{--                        var join_selected_values = allVals.join(",");--}}
    {{--                        $.ajax({--}}
    {{--                            url: '{{route('admin_order_active_multi')}}',--}}
    {{--                            type: 'PUT',--}}
    {{--                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
    {{--                            data: 'ids=' + join_selected_values,--}}
    {{--                            success: function (data) {--}}
    {{--                                if (data['success']) {--}}
    {{--                                    $(".sub_chk:checked").each(function () {--}}
    {{--                                        $(this).parents("tr").remove();--}}
    {{--                                    });--}}
    {{--                                    alert(data['success']);--}}
    {{--                                    // alert("Accounts Deleted Success");--}}
    {{--                                    window.location = '{{route('admin_order_list')}}';--}}
    {{--                                } else if (data['error']) {--}}
    {{--                                    console.log(data['error']);--}}
    {{--                                } else {--}}
    {{--                                    alert('Whoops Something went wrong!!');--}}
    {{--                                }--}}
    {{--                            },--}}
    {{--                            error: function (data) {--}}
    {{--                                alert(data.responseText);--}}
    {{--                            }--}}
    {{--                        });--}}
    {{--                        $.each(allVals, function (index, value) {--}}
    {{--                            $('table tr').filter("[data-row-id='" + value + "']").remove();--}}
    {{--                        });--}}
    {{--                    }--}}
    {{--                }--}}
    {{--            })--}}
    {{--        });--}}
    {{--    </script>--}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var start = moment().subtract(29, 'days');
            var end = moment();
            $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            $('input[name="start"]').val(start.format('YYYY-MM-DD'));
            $('input[name="end"]').val(end.format('YYYY-MM-DD'));

            function cb(start, end) {
                $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
                $('input[name="start"]').val(start.format('YYYY-MM-DD'));
                $('input[name="end"]').val(end.format('YYYY-MM-DD'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
        });
    </script>
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pet Casa</a></li>
                            <li class="breadcrumb-item active">Quản lý yêu cầu</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý yêu cầu</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-3">
                            <h4 class="header-title">Quản lý yêu cầu</h4>
                            <p class="sub-header">
                                <code></code>
                            </p>
                        </div>
                        {{--                        {{dd( Request::get('Status'))}}--}}
                        <div class="col-9">
                            <form action="{{route('admin_order_list')}}" method="GET" style="float:right;display: flex">
                                <div class="form-filter">
                                    Lọc theo ngày tạo
                                    <select class="form-control select-form-control" name="orderBy">
                                        <option value="ASC"
                                                @if (Request::get('orderBy') == "ASC")
                                                selected
                                                @endif>Tăng dần
                                        </option>
                                        <option value="DESC"
                                                @if (Request::get('orderBy') == "DESC")
                                                selected
                                                @endif>Giảm dần
                                        </option>
                                    </select>
                                </div>
                                <div class="form-filter">
                                    Lọc theo trạng thái
                                    <select class="form-control select-form-control" name="Status">
                                        <option value="All"
                                                @if (Request::get('Status') == "All")
                                                selected
                                                @endif>All
                                        </option>
                                        <option value="1"
                                                @if (Request::get('Status') == "1")
                                                selected
                                                @endif>Từ chối
                                        </option>
                                        <option value="0"
                                                @if (Request::get('Status') == "0")
                                                selected
                                                @endif>Chưa xử lý
                                        </option>
                                        <option value="2"
                                                @if (Request::get('Status') == "2")
                                                selected
                                                @endif>
                                            Chấp thuận
                                        </option>
                                    </select>
                                </div>
                                <div class="form-filter" style="width:250px;">
                                    Trong khoảng :
                                    <div id="reportrange"
                                         style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%"
                                         name="Date">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                    <input type="hidden" name="start">
                                    <input type="hidden" name="end">
                                </div>
                                <div class="form-filter">
                                    <br>
                                    <button class="btn btn-secondary btn-custom"> Lọc</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row card-box">
                                <div class="offset-8 col-3">
                                    <form class="app-search" action="{{route('admin_order_list')}}">
                                        <div class="app-search-box">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="keyword"
                                                       placeholder="Search...">
                                                <div class="input-group-append">
                                                    <button class="btn" type="submit">
                                                        <i class="fe-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            style="width: 24.8px;"
                                            aria-label="ID: activate to sort column ascending">
                                            Email
                                        </th>
                                        <th>OrderID</th>
                                        <th>OrderType</th>
                                        <th>Name</th>
                                        <th>PetID</th>
                                        <th>Status</th>
                                        <th>Ngày gửi</th>
                                        <th>Ngày xử lý</th>
                                        <th colspan="4" style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @csrf
                                    {{--                            {{dd($orders)}}--}}
                                    @foreach($orders as $order)
                                        {{--                                {{dd($order)}}--}}
                                        <tr>
                                            <td colspan="1" style="vertical-align: middle;">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="checkbox_list" id="" type="checkbox"
                                                           style="opacity: 1" name="ids[]" value="{{$order->id}}">
                                                </div>
                                            </td>
                                            <td>{{$order->Email}}</td>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->OrderType}}</td>
                                            <td>{{$order->FullName}}</td>
                                            <td>{{$order->PetId}}</td>
                                            @if ($order->Status == 0)
                                                <td style="color: #ff0000"> Chưa xử lý</td>
                                            @elseif ($order->Status == 1)
                                                <td style="color: gray"> Từ chối</td>
                                            @elseif ($order->Status == 2)
                                                <td style="color: mediumspringgreen"> Chấp thuận</td>
                                            @else
                                                <td style="color: red"> Unknown</td>
                                            @endif
                                            <td>
                                                {{$order->created_at}}
                                            </td>
                                            <td>
                                                @if ($order->updated_at == $order->created_at)
                                                    Chưa có thay đổi
                                                @else
                                                    {{$order->updated_at}}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="box">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{route('admin_order_edit',$order->id)}}"
                                                           class="btn btn-primary"
                                                           style="float:right">Sửa</a>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="d-flex justify-content-center">
                                                            <a type="button"
                                                               class="btn btn-primary btn-table"
                                                               data-toggle="modal"
                                                               data-target="#task-detail-modal-{{$order->id}}"
                                                               style="float:right;color: black">Chi tiết</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{--                                            @if ($order->Status == 1)--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="d-flex justify-content-center">--}}
                                            {{--                                                        <form action="{{route('admin_order_deactive',$order->id)}}"--}}
                                            {{--                                                              method="POST">--}}
                                            {{--                                                            @csrf @method('PUT')--}}
                                            {{--                                                            <button class="btn btn-primary btn-table"> Deactive</button>--}}
                                            {{--                                                        </form>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            @elseif ($order->Status == 0)--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="d-flex justify-content-center">--}}
                                            {{--                                                        <form action="{{route('admin_order_active',$order->id)}}"--}}
                                            {{--                                                              method="POST">--}}
                                            {{--                                                            @csrf @method('PUT')--}}
                                            {{--                                                            <button class="btn btn-primary btn-table"> Active</button>--}}
                                            {{--                                                        </form>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            @endif--}}
                                            {{--                                            <td>--}}
                                            {{--                                                <div class="d-flex justify-content-center">--}}
                                            {{--                                                    <form action="{{route('admin_order_active',$order->id)}}"--}}
                                            {{--                                                          method="POST">--}}
                                            {{--                                                        @csrf @method('PUT')--}}
                                            {{--                                                        <button class="btn btn-primary btn-table"> Acept</button>--}}
                                            {{--                                                    </form>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </td>--}}
                                            {{--                                            <td>--}}
                                            {{--                                                <div class="d-flex justify-content-center">--}}
                                            {{--                                                    <a href="{{route('admin_order_detail',$order->id)}}"--}}
                                            {{--                                                       class="btn btn-primary"--}}
                                            {{--                                                       style="float:right">Detail</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 1%">
                                <div class="row">
                                    <div class="col-5"> {{ $orders->links() }}</div>
                                    {{--                                    <div class="col-6">--}}
                                    {{--                                        <button class="btn btn-primary" style="float: right;margin-left: 5%;"--}}
                                    {{--                                                id="deactive_all"> Deactive All--}}
                                    {{--                                        </button>--}}
                                    {{--                                        <button class="btn btn-primary" style="float: right" id="active_all"> Active All--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->

    @foreach($orders as $order)
        <?php
        $pet = \App\Pet::find($order->PetId);
        ?>
        <div id="task-detail-modal-{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 p-0">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">

                        <div class="p-2 task-detail">
                            <div class="media mb-3">
                                <div class="media-body">
                                    <h5 class="media-heading mb-1 mt-0">Loại đơn
                                        : <h5 class="custom-detail-title">{{$order->OrderType}}</h5>
                                    </h5>

                                </div>
                            </div>

                            <h4 class="mb-4">Người làm đơn : {{$order->FullName}}</h4>
                            <h4 class="mb-4">Số điện thoại : {{$order->PhoneNumber}}</h4>
                            <h4 class="mb-4">Email : {{$order->Email}}</h4>

                            <p class="text-muted">
                            <h4 class="mb-4">Chi tiết thú nuôi : </h4>

                            <div>
                                <div style="display: inline-flex" class="mb-4">
                                    <h4>Tên bé : </h4>
                                    <a href="{{route('admin_pet_detail',$pet->Slug)}}"
                                       style="margin-top: 7px;font-size: 15px;"> {{$pet->Name}}</a>
                                </div>
                                <h4>Giấy tờ khai sinh : </h4>{{$pet->CertifiedPedigree}}
                                <h4>Mô tả : </h4>{{$pet->Description}}
                                <h4>Loài : </h4>{{$pet->Species}}
                                <h4>Giống : </h4>{{$pet->Breed}}
                                <h4>Tuổi : </h4>{{$pet->Age}}
                                <h4>Giới tính : </h4>{{$pet->Sex}}
                                <h4>Tiêm phòng : </h4>{{$pet->Vaccinated}}
                                <h4>Triệt sản : </h4>{{$pet->Neutered}}
                            </div>
                            <ul class="list-inline task-dates mb-0 mt-4">
                                <li>
                                    <h5 class="mb-1">Ngày tạo</h5>
                                    <p> {{$order->created_at}} <small class="text-muted"></small></p>
                                </li>

                                <li>
                                    <h5 class="mb-1">Ngày thay đổi mới nhất</h5>
                                    <p> {{$order->updated_at}} <small class="text-muted"></small></p>
                                </li>
                            </ul>
                            @if ($order->Status == 0)
                                <div class="text-right mb-0 mt-4" style="display: inline-flex">
                                    <form action="{{route('admin_order_acept',$order->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary waves-effect waves-light mr-1"
                                                href="{{route('admin_order_acept',$order->id)}}">
                                            Chấp nhận
                                        </button>
                                    </form>
                                    <form action="{{route('admin_order_decline',$order->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-secondary waves-effect waves-light"
                                                href="{{route('admin_order_decline',$order->id)}}">
                                            Từ chối
                                        </button>
                                    </form>
                                </div>
                            @endif

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach

@endsection