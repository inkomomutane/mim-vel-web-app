<header id="header">
    <div class="container main-menu col-sm-12">
        <div class="row align-items-center justify-content-start d-flex">
          <div id="logo">
            <a href="{{ route('welcome') }}"><img src="img/logo.png" alt="" title="" />Mimóvel</a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="{{ route('welcome') }}" class="@if (Route::is('welcome')) menu-active @endif">Início</a></li>
                <li><a href="#">Imóveis</a></li>
                <li><a href="#">Corretores</a></li>
                <li><a  href="{{ route('about') }}" class="@if (Route::is('about')) menu-active @endif">Sobre nós</a></li>
                <li><a href="{{ route('contact') }}" class="@if (Route::is('contact')) menu-active @endif">Contacto</a></li>
                <li><a href="{{ route('complaint') }}" class="@if (Route::is('complaint')) menu-active @endif">Denûncias</a></li>
                <li><a href="
                    @guest {{ route('login') }} @else
                        {{ route('home') }}
                    @endguest
                    ">Meu perfil</a></li>


            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->
