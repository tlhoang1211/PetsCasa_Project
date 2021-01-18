@extends('admin.layouts.master')
@section('title','Admin Dashboard')

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Error 404</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Error 404</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <div class="text-center pt-2">
                                        <h1 class="text-error mt-4">404</h1>
                                        <h3 class="text-uppercase text-danger mt-3">Page Not Found</h3>
                                        <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it
                                            happens to the best of us. You might want to check your internet connection. Here's a
                                            little tip that might help you get back on track.</p>
    
                                        <a class="btn btn-md btn-primary waves-effect waves-light mt-2" href="{{route('admin_home')}}"> Return Home</a>
                                    </div>
    
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
@endsection