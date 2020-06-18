<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('templates.partials.kasir._head')
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

@include('templates.partials.kasir._navbar')

<!-- BEGIN: Main Menu-->
@include('templates.partials.kasir._sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- END: Content-->

<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Apotek Cemara<a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank"></a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More themes</a></li>
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank"> Support</a></li>
        </ul>
    </div>
</footer>
<!-- END: Footer-->

@include('templates.partials.kasir._script')
</body>
<!-- END: Body-->
</html>
