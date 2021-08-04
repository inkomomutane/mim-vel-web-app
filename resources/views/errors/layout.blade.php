<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.min.css') }}">


</head>
<style>
    @font-face {
        font-family: 'Ubuntu';
        src: url("{{ asset('frontend/errors/fonts/ubuntu.ttf') }}") format('truetype'), ;
        font-weight: normal;
        font-style: normal;
    }

    body {
        background-color: #f9f9f9;
        font-family: 'Ubuntu';
        color: #3f3d56;
    }

    section {
        width: 400px;
        margin: auto;
        margin-top: auto;
        margin-top: 70px;
    }

    section img {
        width: 100%;
    }

    .message {
        width: 100%;
        display: flex;
        margin: 10px;
    }

    .message h1 {
        align-self: auto;
        margin: auto;
    }

    section .home {
        box-sizing: border-box;
        display: flex;
        margin: 25px;
           }

    section .home a {
        box-sizing: border-box;
        font-family: 'Ubuntu';

        border-radius: 4px;
        color: #fff;
        overflow: hidden;
        text-decoration: none;
        background-color: #2d3748;
        border-bottom: 8px solid #2d3748;
        border-left: 18px solid #2d3748;
        border-right: 18px solid #2d3748;
        border-top: 8px solid #2d3748;
        align-self: auto;
        margin: auto;
        padding: 3px;
        font-weight: 600;
    }

</style>

<body>

    <section>
        <img src="{{ asset('frontend/errors/svgs') }}/@yield('image')" alt="" srcset="">
        <div class="message">
            <h1> Erro @yield('code') | @yield('message')</h1>
        </div>
        <div class="home">
            <a href="{{ URL::previous()}}">
                <i class="fas fa-arrow-left"></i>
                Voltar</a>
        </div>

    </section>
</body>

</html>
