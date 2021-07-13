        <!-- Start app top navbar -->
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="container col-sm-12">
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <ul class="navbar-nav navbar-rigth">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i
                                    class="far fa-user"></i><span  class="p-2">{{ __('login') }}</span></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i
                                        class="far fa-edit"></i><span class="p-2">{{ __('register') }}</span></a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <img alt="image" src="{{ asset('backend/images/avatar.png') }}"
                                    class="mr-1 rounded-circle">

                            </a>
                            <div class="dropdown-menu dropdown-menu-right">

                                <div class="dropdown-title text-success">Online</div>
                                <a href="#" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <a href="{{ route('home') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-fire"></i> Dashboard
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Start top menu -->
        <nav class="navbar navbar-secondary navbar-expand-lg">
            <div class="container " style="width: 100%">
                <ul class="navbar-nav">
                    <li class="nav-item
                    @if (\Route::current()->getName() ==  'welcome' )
                            {{ __('active') }}
                    @endif
                    ">
                        <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-home"></i><span>Inicio</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="fas fa-info"></i><span>Sobre Nós</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Nossos Projectos</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="fas fa-phone"></i><span>Contactar</span></a>
                    </li>
                    <li class="nav-item ">

                        <a href="#" class="nav-link"><i class="fas fa-money-bill"></i><span>Doar</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-rigth" id="navbar-rigth-welcome">
                    @guest
                        <li class="nav-item @if (\Route::current()->getName() ==  'login' )
                            {{ __('active') }}
                    @endif">
                            <a class="nav-link" href="{{ route('login') }}"><i
                                    class="far fa-user"></i><span>{{ __('login') }}</span></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item @if (\Route::current()->getName() ==  'register' )
                                {{ __('active') }}
                        @endif">
                                <a class="nav-link" href="{{ route('register') }}"><i
                                        class="far fa-edit"></i><span>{{ __('register') }}</span></a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <img alt="image" src="{{ asset('backend/images/avatar.png') }}"
                                    class="mr-1 rounded-circle">

                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title text-success">Online</div>
                                <a href="#" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <a href="{{ route('home') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-fire"></i> Dashboard
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </nav>
