<header class="header_area" style="background: white;">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{ url('/') }}">
                <img src="{{ asset('frontend/home/image/Logo.png') }}" alt="" style="height:  30px !important">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item @if (Route::is('welcome')) active @endif">
                        <a class="nav-link" href="{{ route('welcome') }}">Início</a>
                    </li>

                    @if (Route::is('imovel.search'))
                        <li class="nav-item  active ">
                            <a class="nav-link" href="#">Procurar imóveis</a>
                        </li>
                    @endif

                    @if (Route::is('imo.show'))
                        <li class="nav-item  active ">
                            <a class="nav-link" href="">Imóvel</a>
                        </li>
                    @endif
                    <li class="nav-item @if (Route::is('imo.index') || Request::is('imovel/*')) active @endif">
                        <a class="nav-link" href="{{ route('imo.index') }}">Ver todos imóveis</a>
                    </li>
                    <li class="nav-item @if (Route::is('about')) active @endif">
                        <a class="nav-link" href="{{ route('about') }}">Sobre nós</a>
                    </li>
                    <li class="nav-item @if (Route::is('contact')) active @endif">
                        <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
