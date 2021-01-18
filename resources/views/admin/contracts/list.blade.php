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
    {{--                    var check = confirm("Are you sure you want to deactive this contract?");--}}
    {{--                    if (check == true) {--}}
    {{--                        var join_selected_values = allVals.join(",");--}}
    {{--                        $.ajax({--}}
    {{--                            url: '{{route('admin_contract_deactive_multi')}}',--}}
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
    {{--                                    window.location = '{{route('admin_contract_list')}}';--}}
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
    {{--                            url: '{{route('admin_contract_active_multi')}}',--}}
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
    {{--                                    window.location = '{{route('admin_contract_list')}}';--}}
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
                            <li class="breadcrumb-item active">Quản lý hợp đồng</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý hợp đồng</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-3">
                            <h4 class="header-title">Danh sách hợp dồng</h4>
                            <p class="sub-header">
                                <code></code>
                            </p>
                        </div>
                        <div class="col-9">
                            <form action="{{route('admin_contract_list')}}" method="GET" style="display: flex">
                                <div class="form-filter">
                                    Lọc theo ngày tạo
                                    <select class="form-control select-form-control" name="orderBy">
                                        <option value="ASC">Tăng dần</option>
                                        <option value="DESC">Giảm dần</option>
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
                                                @endif>Hoạt động
                                        </option>
                                        <option value="0"
                                                @if (Request::get('Status') == "0")
                                                selected
                                                @endif>Không hoạt động
                                        </option>
                                    </select>
                                </div>
                                <div class="form-filter" style="width:250px;">
                                    <div id="reportrange"
                                         style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%"
                                         name="Date">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                    <input type="hidden" name="start">
                                    <input type="hidden" name="end">
                                </div>
                                <button class="btn btn-secondary btn-custom"> Lọc</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <div class="row">
                                <div class="offset-8 col-3">
                                    <form class="app-search" action="{{route('admin_contract_list')}}">
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
                                        <th>OrderID</th>
                                        <th>DateStart</th>
                                        <th>DateEnd</th>
                                        <th>Status</th>
                                        <th colspan="3" style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @csrf
                                    {{--                            {{dd($contracts)}}--}}
                                    @foreach($contracts as $contract)
                                        {{--                                {{dd($contract)}}--}}
                                        <tr>
                                            <td colspan="" style="vertical-align: middle;">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="checkbox_list" id="" type="checkbox"
                                                           style="opacity: 1" name="ids[]" value="{{$contract->id}}">
                                                </div>
                                            </td>
                                            <td>{{$contract->Order_id}}</td>
                                            <td>{{$contract->ContractDateStart}}</td>
                                            <td>{{$contract->ContractDateEnd}}</td>
                                            @if ($contract->Status == 0)
                                                <td style="color: gold"> Chưa bắt đầu</td>
                                            @elseif ($contract->Status == 1)
                                                <td style="color: gray"> Đang hoạt động</td>
                                            @elseif ($contract->Status == 2)
                                                <td style="color: mediumspringgreen"> Kết thúc</td>
                                            @else
                                                <td style="color: red"> Unknown Status</td>
                                            @endif
                                            {{--                                            <td>--}}
                                            {{--                                                <div class="d-flex justify-content-center">--}}
                                            {{--                                                    <a href="{{route('admin_contract_edit',$contract->id)}}"--}}
                                            {{--                                                       class="btn btn-primary"--}}
                                            {{--                                                       style="float:right">Edit</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </td>--}}
                                            @if ($contract->Status == 1)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{route('admin_contract_end',$contract->id)}}"
                                                              method="POST">
                                                            @csrf @method('PUT')
                                                            <button class="btn btn-primary btn-table"> End</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @elseif ($contract->Status == 0)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{route('admin_contract_start',$contract->id)}}"
                                                              method="POST">
                                                            @csrf @method('PUT')
                                                            <button class="btn btn-primary btn-table">Start</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @elseif ($contract->Status == 2)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a action="#"
                                                           method="POST">
                                                            @csrf @method('PUT')
                                                            <button disabled class="btn btn-primary btn-table">End
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('admin_contract_detail',$contract->id)}}"
                                                       class="btn btn-primary"
                                                       style="float:right">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 1%">
                                <div class="row">
                                    <div class="col-5"> {{ $contracts->links() }}</div>
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


@endsection