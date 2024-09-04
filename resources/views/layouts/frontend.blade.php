<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-layout-style="default" data-layout-position="fixed" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-width="fluid">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="ecommerce">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/all.min.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/animate.min.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/slick.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/structure.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/main.css"> 
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/responsive.css">

        <!-- icons -->
        <link rel="icon" href="{{asset('public/frontend')}}/images/ico/favicon.ico"> 
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('public/frontend')}}/images/ico/apple-touch-icon-precomposed.html">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/frontend')}}/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/frontend')}}/images/ico/apple-touch-icon-72-precomposed.html">
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('public/frontend')}}/images/ico/apple-touch-icon-57-precomposed.png">  
        <!-- icons -->
    
        @stack('style')
    </head>
    <body wclass="sg-active">
        @include('layouts.partial.frontend-theme-settings')
        @include('layouts.partial.frontend-header')

        @if (Route::currentRouteName() == '/')
            @include('layouts.partial.frontend-slider')
        @endif


        
        
        {{ $slot }}

        @include('layouts.partial.frontend-footer')

        <!-- JS -->
        <script src="{{asset('public/frontend')}}/js/jquery.min.js"></script>
        <script src="{{asset('public/frontend')}}/js/popper.min.js"></script>
        <script src="{{asset('public/frontend')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('public/frontend')}}/js/jquery.countdown.js"></script> 
        <script src="{{asset('public/frontend')}}/js/slick.min.js"></script>
        <script src="{{asset('public/frontend')}}/js/tinymce.min.js"></script>
        <script src="{{asset('public/frontend')}}/js/jquery.spinner.min.js"></script>
        <script src="{{asset('public/frontend')}}/js/tagsinput.min.js"></script>
        <script src="{{asset('public/frontend')}}/js/validate.js"></script>
        <script src="{{asset('public/frontend')}}/js/main.js"></script>
        
        @stack('scripts')
    </body>
</html>

