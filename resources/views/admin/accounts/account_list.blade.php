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
    <script>
        $(document).ready(function () {
            $("#deactive_all").on('click', function (e) {
                console.log('123');
                var allVals = [];
                $(".checkbox_list:checked").each(function () {
                    allVals.push($(this).val());
                    console.log(allVals);
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to deactive this account?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: '{{route('admin_account_deactive_multi')}}',
                            type: 'PUT',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function () {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                    // alert("Accounts Deleted Success");
                                    window.location = '{{route('admin_account_list')}}';
                                } else if (data['error']) {
                                    console.log(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });
                        $.each(allVals, function (index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#active_all").on('click', function (e) {
                console.log('123');
                var allVals = [];
                $(".checkbox_list:checked").each(function () {
                    allVals.push($(this).val());
                    console.log(allVals);
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to active this row?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: '{{route('admin_account_active_multi')}}',
                            type: 'PUT',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function () {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                    // alert("Accounts Deleted Success");
                                    window.location = '{{route('admin_account_list')}}';
                                } else if (data['error']) {
                                    console.log(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });
                        $.each(allVals, function (index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            })
        });
    </script>
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
                            <li class="breadcrumb-item active">Quản lý tài khoản</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý tài khoản</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-3">
                            <h4 class="header-title">Danh sách tài khoản</h4>
                            <p class="sub-header">
                                <code></code>
                            </p>
                        </div>
                        <div class="col-9">
                            <form action="{{route('admin_account_list')}}" method="GET" style="display: flex">
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
                                    <form class="app-search" action="{{route('admin_account_list')}}">
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
                                <div class="col-1">
                                    <a class="btn btn-primary" href="{{route('admin_report_list')}}">
                                            Reset
                                        </a>
                                </div>
                            </div>
                            <div class="">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="2" style="width: 24.8px;"
                                            aria-label="ID: activate to sort column ascending">
                                            Email
                                        </th>
                                        <th>Tên tài khoản</th>
                                        <th>Trạng thái</th>
                                        <th colspan="4" style="text-align: center">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @csrf
                                    {{--                            {{dd($accounts)}}--}}
                                    @foreach($accounts as $account)
                                        {{--                                {{dd($account)}}--}}
                                        <tr>
                                            <td colspan="1" style="vertical-align: middle;">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="checkbox_list" id="" type="checkbox"
                                                           style="opacity: 1" name="ids[]" value="{{$account->id}}">
                                                </div>
                                            </td>
                                            <td>{{$account->Email}}</td>
                                            <td></td>
                                            <td>{{$account->FullName}}</td>
                                            <td>
                                                @if ($account->Status == 1)
                                                    Hoạt động
                                                @elseif ($account->Status == 0)
                                                    Không hoạt động
                                                @else
                                                    Không rõ
                                                @endif</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('admin_account_edit',$account->Slug)}}"
                                                       class="btn btn-primary"
                                                       style="float:right">Sửa</a>
                                                </div>
                                            </td>
                                            @if ($account->Status == 1)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{route('admin_account_deactive',$account->id)}}"
                                                              method="POST">
                                                            @csrf @method('PUT')
                                                            <button class="btn btn-primary btn-table">Chặn</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @elseif ($account->Status == 0)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{route('admin_account_active',$account->id)}}"
                                                              method="POST">
                                                            @csrf @method('PUT')
                                                            <button class="btn btn-primary btn-table"> Kích hoạt</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('admin_account_detail',$account->Slug)}}"
                                                       class="btn btn-primary"
                                                       style="float:right">Chi tiết</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('admin_account_change_password',$account->Slug)}}"
                                                       class="btn btn-primary"
                                                       style="float:right">Đổi mật khẩu</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 1%">
                                <div class="row">
                                    <div class="col-5"> {{ $accounts->links() }}</div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" style="float: right;margin-left: 5%;"
                                                id="deactive_all"> Chặn tất cả
                                        </button>
                                        <button class="btn btn-primary" style="float: right" id="active_all"> Kích hoạt tất cả
                                        </button>
                                    </div>
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
