<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('seo')
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('website/images/favicon.ico') }}">
    <!-- Bootstrap -->

    <link rel="stylesheet" href="{{ asset('website/css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('website/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
       @stack('css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    <!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1133822068011030');
  fbq('track', 'PageView');
</script>
<script>
    fbq('trackCustom', 'Viu a pániga {{ View::hasSection('title') ? View::getSection('title') : '' }}', {
        dominio: '{{ URL::full() }}',
        pagina: '{{ View::getSection('title') }}', fonte: 'Meta'}
     );
  </script>
</head>
<body>
            <!-- Loader -->
        <div id="preloader">
            <div id="status" >
                <div class="spinner ">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
    @include('website.layouts.shared.navbar')
    <main>
        @yield('content')
    </main>

    @include('website.layouts.shared.footer')

    @include('website.layouts.shared.chatplugin')
    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-warning back-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-arrow-up icons">
            <line x1="12" y1="19" x2="12" y2="5"></line>
            <polyline points="5 12 12 5 19 12"></polyline>
        </svg>
    </a>
    <!-- Back to top -->



    <!-- javascript -->
    <script src="{{ asset('website/js/bootstrap.js') }}"></script>

    <!-- Main Js -->
    @stack('js')
    <!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

    @livewireScripts
</body>

</html>
