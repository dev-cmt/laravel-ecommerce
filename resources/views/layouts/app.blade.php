<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/backend')}}/images/favicon.ico">

    <!-- Stylesheet css -->
    <link href="{{asset('public/backend')}}/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend')}}/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
    <script src="{{asset('public/backend')}}/js/layout.js"></script>
    <link href="{{asset('public/backend')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend')}}/css/custom.min.css" rel="stylesheet" type="text/css" />

    
    @stack('style')
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.partial.dashboard-header')
        @include('layouts.partial.dashboard-sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
            <!-- End Page-content -->
            @include('layouts.partial.dashboard-footer')
            
        </div>
        <!-- End main content-->

    </div>
    <!-- END layout-wrapper -->
    @include('layouts.partial.dashboard-theme-settings')


    <!-- JAVASCRIPT -->
    <script src="{{asset('public/backend')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/feather-icons/feather.min.js"></script>
    <script src="{{asset('public/backend')}}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="{{asset('public/backend')}}/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="{{asset('public/backend')}}/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="{{asset('public/backend')}}/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="{{asset('public/backend')}}/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="{{asset('public/backend')}}/js/app.js"></script>


    @stack('scripts')
</body>
</html>

