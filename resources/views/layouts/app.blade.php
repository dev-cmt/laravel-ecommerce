<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="enable" data-theme="material" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @props(['title' => config('app.name', 'Ecommerce')])
    <title>{{ $title }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public')}}/images/favicon.png">
    
    <!-- nouisliderribute css (product.index)-->
    <link rel="stylesheet" href="{{asset('public/backend')}}/libs/nouislider/nouislider.min.css">
    <!-- gridjs css (product.index)-->
    <link rel="stylesheet" href="{{asset('public/backend')}}/libs/gridjs/theme/mermaid.min.css">
    <!-- Sweet Alert css-->
    <link rel="stylesheet" href="{{asset('public/backend')}}/libs/sweetalert2/sweetalert2.min.css"/>

    <!-- Layout config Js -->
    <script src="{{asset('public/backend')}}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('public/backend')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('public/backend')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('public/backend')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('public/backend')}}/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend')}}/css/toastr.min.css" rel="stylesheet" type="text/css" />

    @stack('style')
</head>
<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.partial.dashboard-header')

        <!-- Remove Notification Modal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        @include('layouts.partial.dashboard-sidebar')
        
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    {{-- <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Starter</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title --> --}}

                    {{ $slot }}

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layouts.partial.dashboard-footer')
        </div>

    </div>
    <!-- END layout-wrapper -->



    <!-- Theme Settings -->
    @include('layouts.partial.dashboard-theme-settings')
    

    <!-- JAVASCRIPT -->
    <script src="{{asset('public/backend')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/feather-icons/feather.min.js"></script>
    <script src="{{asset('public/backend')}}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins.js"></script>

    
    <!-- Sweet Alerts js -->
    <script src="{{asset('public/backend')}}/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{asset('public/backend')}}/js/pages/sweetalerts.init.js"></script>

    <!-- App js -->
    <script src="{{asset('public/backend')}}/js/app.js"></script>
    <script src="{{asset('public/backend')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('public/backend')}}/js/toastr.min.js"></script>

    @stack('scripts')
</body>
</html>