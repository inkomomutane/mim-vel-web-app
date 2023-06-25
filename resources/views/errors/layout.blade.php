<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/js/errors.js','resources/css/website.css'])
</head>
<body class="font-sans  antialiased scroll-smooth selection:bg-orange-400 selection:text-white md:selection:text-orange-400 md:selection:bg-white">
    <article class="grid grid-cols-1 md:grid-cols-2 bg-orange-100 min-h-screen">
        <img id="error" src="" data-image="@yield('image')" alt="@yield('message')"
        class="h-72 self-center mx-auto">
        <div class="md:bg-orange-500 text-orange-50 grid justify-items-center">
            <div class="self-center grid justify-center px-8">
                <h1 class="text-center self-center text-3xl text-orange-500 md:text-white font-extrabold md:py-8"> Error @yield('code') | @yield('message')</h1>
                <a href="{{ URL::previous() }}" class="text-center w-fit h-fit bg-orange-500 md:bg-orange-50 py-2 px-8
                my-4 md:text-orange-500 mx-auto rounded text-lg font-bold">Return</a>
            </div>
            </div>

    </article>
</body>
</html>
