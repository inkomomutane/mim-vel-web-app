<header id="header">
    <div class="container main-menu col-sm-12">
        <div class="row align-items-center justify-content-start d-flex">
          <div id="logo" class="py-2">
            <a href="{{ route('welcome') }}"><img src="{{ asset('frontend/img') }}/mimovel.png" alt="Mimóvel" title="" style="width: 150px" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="{{ route('welcome') }}"  class = "@if (Route::is('welcome') || Route::is('welcome')) menu-active @endif">Início</a></li>
                <li><a href="{{ route('imo.index') }}" class = "@if (Route::is('imo.index') || Route::is('imo.*')) menu-active @endif">Ver todos Imóveis</a></li>
                <li><a  href="{{ route('about') }}" class="@if (Route::is('about')) menu-active @endif">Sobre nós</a></li>
                <li><a href="{{ route('contact') }}" class="@if (Route::is('contact')) menu-active @endif">Contacto</a></li>
                <li>
                    <form action="{{ route('imovel.search') }}" method="get">
                        @csrf
                        <input type="text" name="query" id="query" placeholder="Pesquisar Imóvel" class="">
                    </form>
                </li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->
