<div class="mainheader-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo2.png" alt="logo"></a>
                </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-9 clearfix text-right">
                <div class="clearfix d-md-inline-block d-block">
                    <div class="user-profile m-0">
                        <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <i
                                class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Message</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="#">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main header area end -->
<!-- header area start -->
<div class="header-area header-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                            <li>
                                <a href="{{route('dashboard')}}"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="ti-layout-sidebar-left"></i><span>Nhân viên</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('user.index')}}">Danh sách nhân viên</a></li>
                                    <li><a href="{{route('user.create')}}">Thêm nhân viên</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="ti-pie-chart"></i><span>Dự án</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('projects.index')}}">Danh sách dự án</a></li>
                                    <li><a href="{{route('projects.create')}}">Thêm dự án</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="ti-pie-chart"></i><span>Công việc</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('works.index')}}">Danh sách công việc</a></li>
                                    <li><a href="{{route('works.create')}}">Thêm công việc</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="ti-pie-chart"></i><span>Vấn đề</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('issues.index')}}">Danh sách vấn đề</a></li>
                                    <li><a href="{{route('issues.create')}}">Thêm vấn đề</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="ti-pie-chart"></i><span>Rủi ro</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('risks.index')}}">Danh sách rủi ro</a></li>
                                    <li><a href="{{route('risks.create')}}">Thêm rủi ro</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- mobile_menu -->
            <div class="col-12 d-block d-lg-none">
                <div id="mobile_menu"></div>
            </div>
        </div>
    </div>
</div>
