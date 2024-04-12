<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Quản lý</title>
    @include('layouts.head')
</head>

<body class="body-bg">
<!-- preloader area start -->

<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="horizontal-main-wrapper">
    <!-- main header area start -->
    @include('layouts.header-area')
    <!-- header area end -->
    <!-- page title area end -->
    @yield('content')
    <!-- main content area end -->
    <!-- footer area start-->
    @include('layouts.footer-area')
    <!-- footer area end-->
</div>
<!-- page container area end -->

@include('layouts.footer')
@yield('script')
</body>

</html>
