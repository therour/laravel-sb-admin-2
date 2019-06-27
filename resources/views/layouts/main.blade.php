<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('sb-admin-2/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    <!-- Plugin Styles -->
    @stack('css-plugin')

    <!-- Page Styles -->
    @stack('css')
</head>
<body id="{!! $bodyId ?? 'page-top' !!}" class="{{ $class ?? '' }}">
    
    @yield('content')
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modals Sections -->
    @stack('modals')

    <!-- Main Scripts -->
    <script src="{{ asset('sb-admin-2/js/sb-admin-2.js') }}"></script>

    <!-- Plugin Scripts -->
    @stack('js-plugin')

    <!-- Page Scripts -->
    @stack('script')
</body>
</html>
