@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Quản lý tài khoản</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý tài khoản</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title">Xem thông tin cá nhân : </h4>
                    <form action="{{route('admin_account_update',$account->Slug)}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="FullName">Họ và tên<span class="text-danger">*</span></label>
                            <input disabled type="text" name="FullName" parsley-trigger="change" required=""
                                   value="{{$account->FullName}}" class="form-control" id="FullName">
                            @if ($errors->has('FullName'))
                                <label class="alert-warning">{{$errors->first('FullName')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Email">Email<span class="text-danger">*</span></label>
                            <input disabled type="text" name="Email" parsley-trigger="change" required=""
                                   value="{{$account->Email}}" class="form-control" id="Email">
                            @if ($errors->has('Email'))
                                <label class="alert-warning">{{$errors->first('Email')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">Avatar<span class="text-danger">*</span></label>
{{--                            <button type="button" id="upload_widget" class="btn-primary btn">Upload </button>--}}
                            <div class="avatar">
                                <ul class="cloudinary-thumbnails">
                                    <li class="cloudinary-thumbnail active" data-cloudinary="">
                                        <img src="{{$account->Avatar600x600}}" style="width: 300px;height: 300px">
                                        <a href="#" class="cloudinary-delete">x</a>
                                    </li>
                                </ul>
                            </div>
                            @if ($errors->has('avatar'))
                                <label class="alert-warning">{{$errors->first('avatar')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="DateOfBirth">Ngày sinh<span class="text-danger">*</span></label>
                            <input disabled type="date" name="DateOfBirth" parsley-trigger="change" required=""
                                   class="form-control" id="DateOfBirth" value="{{$account->DateOfBirth}}">
                            @if ($errors->has('DateOfBirth'))
                                <label class="alert-warning">{{$errors->first('DateOfBirth')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PhoneNumber">Số điện thoại<span class="text-danger">*</span></label>
                            <input disabled type="number" name="PhoneNumber" parsley-trigger="change" required=""
                                    value="{{$account->PhoneNumber}}" class="form-control" id="PhoneNumber">
                            @if ($errors->has('PhoneNumber'))
                                <label class="alert-warning">{{$errors->first('PhoneNumber')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Address">Địa chỉ <span class="text-danger">*</span></label>
                            <input disabled type="text" name="Address" parsley-trigger="change" required=""
                                   value="{{$account->Address}}"class="form-control" id="Address">
                            @if ($errors->has('Address'))
                                <label class="alert-warning">{{$errors->first('Address')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Address">Chứng Minh Thư / Thẻ Căn Cước <span class="text-danger">*</span></label>
                            <input disabled type="number" name="IDNo" parsley-trigger="change" required=""
                                   value="{{$account->IDNo}}" class="form-control" id="IDNo">
                            @if ($errors->has('IDNo'))
                                <label class="alert-warning">{{$errors->first('IDNo')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Role_id">Quyền<span class="text-danger">*</span></label>
                            <select class="form-control select-form-control select-form-control" name="Role_id" disabled>
                                <option value="1" @if ($account->Role_id == 1) checked @endif>User</option>
                                <option value="2" @if ($account->Role_id == 2) checked @endif>Admin</option>
                                @if (session()->get('current_account')->Role_id == 3)
                                    <option value="3" @if ($account->Role_id == 3) checked @endif>SuperAdmin</option>
                                @endif
                            </select>
                            @if ($errors->has('Role_id'))
                                <label class="alert-warning">{{$errors->first('Role_id')}}</label>
                            @endif
                        </div>
                        <input disabled type="hidden" name="Slug" value="{{$account->Slug}}">
                        <input disabled type="hidden" name="avatar" data-cloudinary-public-id="{{$account->Avatar}}" value="{{$account->Avatar}}">
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="button">
                                <a href="{{route('admin_account_edit',$account->Slug)}}" style="color: black">Edit</a>
                            </button>
                        </div>

                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection