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
            $("#acept_all").on('click', function (e) {
                console.log('123');
                var allVals = [];
                $(".checkbox_list:checked").each(function () {
                    allVals.push($(this).val());
                    console.log(allVals);
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to deactive this report?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: '{{route('admin_report_acept_multi')}}',
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
                                    window.location = '{{route('admin_report_list')}}';
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
            $("#done_all").on('click', function (e) {
                console.log('123');
                var allVals = [];
                $(".checkbox_list:checked").each(function () {
                    allVals.push($(this).val());
                    console.log(allVals);
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to deactive this report?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: '{{route('admin_report_done_multi')}}',
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
                                    window.location = '{{route('admin_report_list')}}';
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
            $("#decline_all").on('click', function (e) {
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
                            url: '{{route('admin_report_decline_multi')}}',
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
                                    window.location = '{{route('admin_report_list')}}';
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
                            <li class="breadcrumb-item active">Quản lý báo cáo</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý báo cáo</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-3">
                            <h4 class="header-title">Danh sách báo cáo</h4>
                            <p class="sub-header">
                                <code></code>
                            </p>
                        </div>
                        <div class="col-9">
                            <form action="{{route('admin_report_list')}}" method="GET"
                                  style="display: flex;float: right">
                                <div class="form-filter">
                                    Sắp xếp theo :
                                    <select class="form-control select-form-control" class="form-control"
                                            name="orderBy">
                                        <option value="ASC">Tăng dần</option>
                                        <option value="DESC">Giảm dần</option>
                                    </select>
                                </div>
                                <div class="form-filter">
                                    Lọc theo trạng thái :
                                    <select class="form-control select-form-control" class="form-control" name="Status">
                                        <option value="All"
                                                @if (Request::get('Status') == "All")
                                                selected
                                                @endif>All
                                        </option>
                                        <option value="0"
                                                @if (Request::get('Status') == "0")
                                                selected
                                                @endif>Chưa xử lý
                                        </option>
                                        <option value="2"
                                                @if (Request::get('Status') == "2")
                                                selected
                                                @endif>Hoàn thành
                                        </option>
                                        <option value="3"
                                                @if (Request::get('Status') == "3")
                                                selected
                                                @endif>Từ chối
                                        </option>
                                        <option value="4"
                                                @if (Request::get('Status') == "3")
                                                selected
                                                @endif>Bài viết ẩn
                                        </option>
                                    </select>
                                </div>
                                <div class="form-filter" style="width:250px;">
                                    Trong khoảng :
                                    <div id="reportrange" class="form-control"
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
                                    <form class="app-search" action="{{route('admin_report_list')}}">
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
                                        <th>ID</th>
                                        <th>Họ và Tên</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Nội dung</th>
                                        <th>Trạng thái</th>
                                        <th colspan="3" style="text-align: center">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @csrf
                                    {{--                            {{dd($reports)}}--}}
                                    @foreach($reports as $report)
                                        {{--                                {{dd($report)}}--}}
                                        <tr>
                                            <td colspan="" style="vertical-align: middle;">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="checkbox_list" id="" type="checkbox"
                                                           style="opacity: 1" name="ids[]" value="{{$report->id}}">
                                                </div>
                                            </td>
                                            <td>{{$report->id}}</td>
                                            <td>{{$report->FullName}}</td>
                                            <td>
                                                <div style="width: 150px">
                                                    {!! Illuminate\Support\Str::limit($report->Address,100) !!}
                                                </div>
                                            </td>
                                            <td>{{$report->PhoneNumber}}</td>
                                            <td>
                                                <div style="width: 250px">
                                                    {!! Illuminate\Support\Str::limit($report->Content,150) !!}
                                                </div>
                                            </td>
                                            @if ($report->Status == 0)
                                                <td style="color: blueviolet">Chưa xử lý</td>
                                            @elseif ($report->Status == 1)
                                                <td style="color: darkblue"> Đang xử lý</td>
                                            @elseif ($report->Status == 2)
                                                <td style="color: mediumspringgreen"> Đã xử lý</td>
                                            @elseif ($report->Status == 3)
                                                <td style="color: #a01522"> Từ chối</td>
                                            @elseif ($report->Status == 4)
                                                <td style="color: #f84552"> Ẩn</td>
                                            @else
                                                <td style="color: red"> Unknown Status</td>
                                            @endif
                                            @if ($report->Status != 1)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{route('admin_report_edit',$report->id)}}"
                                                           class="btn btn-primary"
                                                           style="float:right">Sửa</a>
                                                    </div>
                                                </td>
                                            @endif
                                            @if ($report->Status == 0)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{route('admin_report_handle',$report->id)}}"
                                                              method="POST">
                                                            @csrf @method('PUT')
                                                            <button class="btn btn-primary btn-table">Nhận</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @elseif ($report->Status == 1)
                                                <td colspan=2>
                                                    <div class="d-flex justify-content-center">
                                                        @csrf @method('PUT')
                                                        <a class="btn btn-primary"
                                                           href="{{route('admin_report_edit',$report->id)}}">
                                                            Kết thúc và thêm
                                                            mã thú nuôi
                                                        </a>
                                                    </div>
                                                </td>
                                            @elseif ($report->Status == 2)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn btn-primary btn-table" disabled
                                                                style="color: yellow">Đã xong
                                                        </button>
                                                    </div>
                                                </td>
                                            @elseif ($report->Status == 3)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{route('admin_report_handle',$report->id)}}"
                                                              method="POST">
                                                            @csrf @method('PUT')
                                                            <button class="btn btn-primary btn-table"
                                                                    style="color: yellow">Đã từ chối
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn btn-primary btn-table" disabled
                                                                style="color: yellow">Unknown
                                                        </button>
                                                    </div>
                                                </td>
                                            @endif
                                            <td>
                                                <button type="button"
                                                        class="btn btn-primary btn-table"
                                                        data-toggle="modal"
                                                        data-target="#task-detail-modal-{{$report->id}}">
                                                    Chi tiết
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 1%">
                                <div class="row">
                                    <div class="col-5"> {{ $reports->links() }}</div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" style="float: right;margin-left: 3%;"
                                                id="acept_all"> Chấp nhận
                                        </button>
                                        {{--                                        <button class="btn btn-primary" style="float: right;margin-left: 3%;"--}}
                                        {{--                                                id="done_all"> Hoàn thành--}}
                                        {{--                                        </button>--}}
                                        <button class="btn btn-primary" style="float: right" id="decline_all"> Từ chối
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end container-fluid -->
    @foreach($reports as $report)
        <div id="task-detail-modal-{{$report->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
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
                                    <h5 class="media-heading mb-1 mt-0">Họ và tên :</h5>
                                    <span class="badge badge-danger">{{$report->FullName}}</span>
                                </div>
                            </div>

                            <h4 class="mb-4">Địa chỉ : {{$report->Address}}</h4>

                            <p class="text-muted">
                                {{$report->Content}}
                            </p>

                            <ul class="list-inline task-dates mb-0 mt-4">
                                <li>
                                    <h5 class="mb-1">Ngày tạo</h5>
                                    <p> {{$report->created_at}} <small class="text-muted"></small></p>
                                </li>

                                <li>
                                    <h5 class="mb-1">Ngày thay đổi mới nhất</h5>
                                    <p> {{$report->updated_at}} <small class="text-muted"></small></p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="attached-files mt-4">
                                <h5 class="">Ảnh liên quan </h5>
                                <div class="files-list">
                                    @foreach ($report->ArrayThumbnails450x450 as $thumbnail)
                                        <div class="file-box">
                                            <a href=""><img src="{{$thumbnail}}"
                                                            class="img-fluid img-thumbnail" alt="attached-img"></a>
                                            <p class="font-13 mb-1 text-muted"><small></small></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach
    {{--    @foreach($reports as $report)--}}
    {{--        <div id="task-finish-modal-{{$report->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"--}}
    {{--             style="display: none;">--}}
    {{--            <div class="modal-dialog modal-lg">--}}
    {{--                <div class="modal-content">--}}
    {{--                    <div class="modal-header border-bottom-0 p-0">--}}
    {{--                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-body">--}}
    {{--                        <form class="p-2 task-detail">--}}
    {{--                            @csrf--}}
    {{--                            <h4 class="mb-4">Địa chỉ : {{$report->Address}}</h4>--}}
    {{--                            <p class="text-muted">--}}
    {{--                                {{$report->Content}}--}}
    {{--                            </p>--}}
    {{--                            <h4 class="header-title">Thú nuôi liên quan : </h4>--}}
    {{--                            <div>--}}
    {{--                                @php--}}
    {{--                                    $report_pet_id = collect($report->Pets)->map(function ($item) {--}}
    {{--                return $item->id;--}}
    {{--            });--}}
    {{--                                @endphp--}}
    {{--                                --}}{{--                        {{dd($report_pet_id)}}--}}
    {{--                                <div class="form-group">--}}
    {{--                                    <label for="Status">Chọn mã thú nuôi<span class="text-danger">*</span></label>--}}
    {{--                                    <select class="form-control selectize-multiple" id="select-7" name="PetIds[]"--}}
    {{--                                            multiple>--}}

    {{--                                        @foreach($pets as $pet)--}}
    {{--                                            <option value="{{$pet->id}}"--}}
    {{--                                                    @if (in_array($pet->id,json_decode(json_encode($report_pet_id), true))) selected @endif>{{$pet->Name}}</option>--}}
    {{--                                        @endforeach--}}
    {{--                                    </select>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="clearfix"></div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div><!-- /.modal-content -->--}}
    {{--            </div><!-- /.modal-dialog -->--}}
    {{--        </div><!-- /.modal -->--}}
    {{--    @endforeach--}}
@endsection