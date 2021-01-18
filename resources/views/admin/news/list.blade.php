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
                    var check = confirm("Are you sure you want to deactive this new?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: '{{route('admin_new_deactive_multi')}}',
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
                                    window.location = '{{route('admin_new_list')}}';
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
                            url: '{{route('admin_new_active_multi')}}',
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
                                    window.location = '{{route('admin_new_list')}}';
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
                            <li class="breadcrumb-item active">Quản lý tin tức</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý tin tức</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-3">
                            <h4 class="header-title">Danh sách tin tức</h4>
                            <p class="sub-header">
                                <code></code>
                            </p>
                        </div>
                        <div class="col-9">
                            <form action="{{route('admin_new_list')}}" method="GET" style="display: flex">
                                <div class="form-filter">
                                    Lọc theo ngày tạo
                                    <select class="form-control select-form-control" name="orderBy">
                                        <option value="ASC">Tăng dần</option>
                                        <option value="DESC">Giảm dần</option>
                                    </select>
                                </div>
                                <div class="form-filter">
                                    Lọc theo danh mục
                                    <select class="form-control select-form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->Name}}</option>
                                        @endforeach
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
                                    <form class="app-search" action="{{route('admin_new_list')}}">
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
                                    <a class="btn btn-primary" href="{{route('admin_new_list')}}">
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
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Trạng thái</th>
                                        <th colspan="3" style="text-align: center">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @csrf
                                    {{--                            {{dd($news)}}--}}
                                    @foreach($news as $new)
                                        {{--                                {{dd($new)}}--}}
                                        <tr>
                                            <td colspan="" style="vertical-align: middle;">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="checkbox_list" id="" type="checkbox"
                                                           style="opacity: 1" name="ids[]" value="{{$new->id}}">
                                                </div>
                                            </td>
                                            <td>{{$new->id}}</td>
                                            <td>
                                                <div class="ellipsis">{{$new->Title}}</div>
                                            </td>
                                            <td>
                                                <div class="ellipsis"
                                                     style="overflow: hidden;white-space: pre-wrap;word-break: break-word;">
                                                    {!! Str::words($new->Content, $words = 30, $end = '...') !!}
                                                </div>
                                            </td>
                                            @if ($new->Status == 0)
                                                <td style="color: gray">Không hoạt động</td>
                                            @elseif ($new->Status == 1)
                                                <td style="color: mediumspringgreen"> Đang hoạt động</td>
                                            @else
                                                <td style="color: red"> Unknown Status</td>
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('admin_new_edit',$new->id)}}"
                                                       class="btn btn-primary"
                                                       style="float:right">Sửa</a>
                                                </div>
                                            </td>
                                            @if ($new->Status == 0)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{route('admin_new_active',$new->id)}}"
                                                              method="POST">
                                                            @csrf @method('PUT')
                                                            <button class="btn btn-primary btn-table">Kích hoạt</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @elseif ($new->Status == 1)
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{route('admin_new_deactive',$new->id)}}"
                                                              method="POST">
                                                            @csrf @method('PUT')
                                                            <button class="btn btn-primary btn-table">Hủy</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a type="button"
                                                       class="btn btn-primary btn-table"
                                                       data-toggle="modal"
                                                       data-target="#task-detail-modal-{{$new->id}}"
                                                       style="float:right;color: black">Chi tiết</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 1%">
                                <div class="row">
                                    <div class="col-5"> {{ $news->links() }}</div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" style="float: right;margin-left: 5%;"
                                                id="deactive_all"> Deactive All
                                        </button>
                                        <button class="btn btn-primary" style="float: right" id="active_all"> Active All
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
    @foreach($news as $new)
        <div id="task-detail-modal-{{$new->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
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
                                    <h5 class="media-heading mb-1 mt-0">Tiêu dề
                                        : <h5 class="custom-detail-title">{{$new->Title}}</h5>
                                    </h5>

                                </div>
                            </div>

                            <h4 class="mb-4">Tác giả : {{$new->Author}}</h4>

                            <p class="text-muted">
                            <h4 class="mb-4">Nội dung vài viết
                                : </h4> {!! Str::words($new->Content, $words = 100, $end = '...') !!}
                            </p>

                            <h4 class="mb-4">Chuyên mục: {{$new->Category->Name}}</h4>
                            <ul class="list-inline task-dates mb-0 mt-4">
                                <li>
                                    <h5 class="mb-1">Ngày tạo</h5>
                                    <p> {{$new->created_at}} <small class="text-muted"></small></p>
                                </li>

                                <li>
                                    <h5 class="mb-1">Ngày thay đổi mới nhất</h5>
                                    <p> {{$new->updated_at}} <small class="text-muted"></small></p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="attached-files mt-4">
                                        <h5 class="">Ảnh liên quan </h5>
                                        <div class="files-list">
                                            @foreach ($new->ArrayThumbnails450x450 as $thumbnail)
                                                <div class="file-box">
                                                    <a href=""><img src="{{$thumbnail}}"
                                                                    class="img-fluid img-thumbnail" alt="attached-img"></a>
                                                    <p class="font-13 mb-1 text-muted"><small></small></p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="">Thú nuôi liên quan </h5>
                                    @foreach($new->Pets as $pet)
                                        <div class="text-muted">
                                            <a href="{{route('admin_pet_edit',$pet->Slug)}}">{{$pet->Name}}</a>
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

@endsection