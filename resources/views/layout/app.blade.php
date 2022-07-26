<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover" data-sidebar-image="none">
 
<head>
    <meta charset="utf-8" />
    <title>@yield('title')| Iprofit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Iprofit" name="description" />
    <meta content="Iprofit" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
    @include('layouts.head-css')
    
</head>


@section('body')
    @include('layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    {{$slot}}
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    @include('layouts.customizer')

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')
</body>
<script src="{{ URL::asset('/assets/js/app2.min.js') }}"></script>
<script>
    window.onload = function () {
        document.getElementById("hamburger-icon").classList.remove('open');
        document.querySelector(".hamburger-icon").classList.remove("open");

    }
    
</script>
</html>
