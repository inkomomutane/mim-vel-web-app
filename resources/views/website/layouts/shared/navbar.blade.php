        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="{{ route('welcome') }}">
                    <span class="logo-light-mode">
                        <img src="{{ asset('website/images/logo-dark.png') }}" class="l-dark" height="35"
                            alt="">
                        <img src="{{ asset('website/images/logo-light.png') }}" class="l-light" height="35"
                            alt="">
                    </span>
                    <img src="{{ asset('website/images/logo-light.png') }}" height="35" class="logo-dark-mode" alt="">
                </a>
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul
                        class="navigation-menu
                    @if (request()->routeIs('contacto')) nav-dark
                    @else  nav-light @endif

                    ">
                        <li  @if (request()->routeIs('welcome')) class="active" @endif> <a href="{{ route('welcome') }}">Início</a></li>
                        <li  @if (request()->routeIs('posts.*') || request()->routeIs('imovel.*')) class="active" @endif><a href="{{ route('posts') }}">Todos imóveis</a></li>
                        <li  @if (request()->routeIs('sobre')) class="active" @endif><a href="{{ route('sobre') }}">Sobre nós</a></li>
                        <li  @if (request()->routeIs('contacto')) class="active" @endif><a href="{{ route('contacto') }}">Contactos</a></li>
                        <li><a href="{{ route('welcome') }}">Termos e Condições</a></li>

                    </ul>

                    <!--end navigation menu-->
                </div>
                <!--end navigation-->
            </div>
            <!--end container-->
        </header>
        <!--end header-->
        <!-- Navbar End -->
