<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Mimóvel') }}</title>
    <!-- Css libraries-->
    @include('layouts.frontend.libs.libs-css')
</head>
<body class="layout-3">

    <div id="app" style="background-color: #eaecec47">
        <!-- #header -->
        @include('layouts.frontend.navbar.navbar')
        <!-- start banner Area -->
        @include('layouts.frontend.banner.banner')
        <!-- content area -->
        @yield('content')
    </div>
    <!-- start footer Area -->
    @include('layouts.frontend.footer.footer')
    <!-- End footer Area -->
    @include('layouts.frontend.libs.libs')
</body>
</html>

