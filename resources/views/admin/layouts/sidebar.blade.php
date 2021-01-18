<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li><a href="{{route('home')}}" aria-expanded="false"><span>Trang chính</span></a></li>
                <li>
                    <a href="{{route('admin_home')}}">
                        {{--                        <span class="badge badge-success badge-pill float-right">2</span>--}}
                        <span> Admin-Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#" aria-expanded="false">
                        <i class="mdi mdi-account-group"></i>
                        <span>  Quản lý tài khoản</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_account_list')}}">Danh sách</a></li>
                        <li><a href="{{route('admin_account_create')}}">Thêm tài khoản</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-dog"></i>
                        <span>  Quản lý động vật</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_pet_list')}}">Danh sách</a></li>
                        <li><a href="{{route('admin_pet_create')}}">Thêm mới</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-view-compact"></i>
                        <span>  Quản lý tin tức</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_new_list')}}">Danh sách</a></li>
                        <li><a href="{{route('admin_new_create')}}">Thêm mới</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-chat-alert"></i>
                        <span>Yêu cầu hỗ trợ</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_report_list')}}">Danh sách</a></li>
                        <li><a href="{{route('admin_report_create')}}">Thêm mới</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class=" mdi mdi-reply-all-outline"></i>
                        <span>  Quản lý yêu cầu</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_order_list')}}">Danh sách</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-file-document-box-check-outline"></i>
                        <span>  Quản lý hợp đồng</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_contract_list')}}">Danh sách</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>