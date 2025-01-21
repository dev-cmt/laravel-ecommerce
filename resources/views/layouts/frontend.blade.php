<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-layout-style="default" data-layout-position="fixed" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-width="fluid">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="ecommerce">

    @props(['title' => config('app.name', 'Ecommerce')])
    <title>{{ $title }}</title>

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend')}}/img/logo/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/swiper-bundle.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/font-awesome-pro.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/flaticon_shofy.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/spacing.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/main.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/custom.css">

    @stack('style')
</head>
<body wclass="sg-active">
    @include('layouts.partial.frontend-theme-settings')
    @include('layouts.partial.frontend-header')

    @if (Route::currentRouteName() == '/')
        @include('layouts.partial.frontend-slider')
    @endif

    <main>
        {{ $slot }}
    </main>

    @include('layouts.partial.frontend-footer')

    <!-- JS here -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('public/frontend')}}/js/vendor/jquery.js"></script>
    <script src="{{asset('public/frontend')}}/js/vendor/waypoints.js"></script>
    <script src="{{asset('public/frontend')}}/js/bootstrap-bundle.js"></script>
    <script src="{{asset('public/frontend')}}/js/meanmenu.js"></script>
    <script src="{{asset('public/frontend')}}/js/swiper-bundle.js"></script>
    <script src="{{asset('public/frontend')}}/js/slick.js"></script>
    <script src="{{asset('public/frontend')}}/js/range-slider.js"></script>
    <script src="{{asset('public/frontend')}}/js/magnific-popup.js"></script>
    <script src="{{asset('public/frontend')}}/js/nice-select.js"></script>
    <script src="{{asset('public/frontend')}}/js/purecounter.js"></script>
    <script src="{{asset('public/frontend')}}/js/countdown.js"></script>
    <script src="{{asset('public/frontend')}}/js/wow.js"></script>
    <script src="{{asset('public/frontend')}}/js/isotope-pkgd.js"></script>
    <script src="{{asset('public/frontend')}}/js/imagesloaded-pkgd.js"></script>
    <script src="{{asset('public/frontend')}}/js/main.js"></script>
    
    @stack('scripts')


    <script>
        var itemActionStoreUrl = '{{ route('item-action.store') }}';
        var itemActionRemoveUrl = '{{ route('item-action.remove') }}';
        var csrfToken = '{{ csrf_token() }}';
        var loginUrl = '{{ route('login') }}';
    </script>
    <script src="{{ asset('public/frontend/js/ajax.min.js') }}"></script>
    
</body>
</html>

