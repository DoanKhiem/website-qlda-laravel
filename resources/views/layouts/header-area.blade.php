<div class="mainheader-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('assets/images/icon/logo-home.svg')}}" alt="logo"></a>
                </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-9 clearfix text-right">
                <div class="clearfix d-md-inline-block d-block">
                    <div class="user-profile m-0">
                        <img class="avatar user-thumb" src="{{asset('assets/images/author/avatar.png')}}" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <i
                                class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
{{--                            <a class="dropdown-item" href="#">Message</a>--}}
{{--                            <a class="dropdown-item" href="#">Settings</a>--}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <button type="submit" class="dropdown-item" >Log Out</button>
                                </form>
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
                            <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                                <a href="{{route('dashboard')}}"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            <li class="{{ Str::startsWith(Route::currentRouteName(), ['users']) ? 'active' : '' }}">
                                <a href="javascript:void(0)"><i class="fa fa-group"></i><span>Nhân viên</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('users.index')}}">Danh sách nhân viên</a></li>
                                    <li><a href="{{route('users.create')}}">Thêm nhân viên</a></li>
                                </ul>
                            </li>
                            <li class="{{ Str::startsWith(Route::currentRouteName(), ['projects']) ? 'active' : '' }}">
                                <a href="javascript:void(0)"><i class="fa fa-archive"></i><span>Dự án</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('projects.index')}}">Danh sách dự án</a></li>
                                    <li><a href="{{route('projects.create')}}">Thêm dự án</a></li>
                                </ul>
                            </li>
                            <li class="{{ Str::startsWith(Route::currentRouteName(), ['works']) ? 'active' : '' }}">
                                <a href="javascript:void(0)"><i class="fa fa-briefcase"></i><span>Công việc</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('works.index')}}">Danh sách công việc</a></li>
                                    <li><a href="{{route('works.create')}}">Thêm công việc</a></li>
                                </ul>
                            </li>
                            <li class="{{ Str::startsWith(Route::currentRouteName(), ['issues']) ? 'active' : '' }}">
                                <a href="javascript:void(0)"><i class="ti-pie-chart"></i><span>Vấn đề</span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('issues.index')}}">Danh sách vấn đề</a></li>
                                    <li><a href="{{route('issues.create')}}">Thêm vấn đề</a></li>
                                </ul>
                            </li>
                            <li class="{{ Str::startsWith(Route::currentRouteName(), ['risks']) ? 'active' : '' }}">
                                <a href="javascript:void(0)"><i class="fa fa-warning"></i><span>Rủi ro</span></a>
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
