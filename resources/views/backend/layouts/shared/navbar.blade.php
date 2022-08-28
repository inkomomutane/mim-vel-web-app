<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <form class="d-none d-sm-inline-block" style="background: #faf6ff;border-radius: 7px;">
        @csrf
        @yield('search-bar')
    </form>
    <h5 class="card-title pt-2"> {{ $title ?? '' }}</h5>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item px-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="megaDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dashboard mega-menu
                </a>
                <div class="dropdown-menu dropdown-menu-start dropdown-mega p-3 shadow-lg border-0"
                    aria-labelledby="megaDropdown">
                    <div class="d-md-flex align-items-start justify-content-start">
                        <div class="dropdown-mega-list mx-4 p-2">
                            <div class="dropdown-header rounded-3 fw-600 p-2">Imóveis e configurações</div>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('dashboard')) active @endif"
                                href="{{ route('dashboard') }}">
                                @svg('radix-dashboard', 'feather align-middle')<span class="align-middle mx-2">Dashboard</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('imovel.*')) active @endif"
                                href="{{ route('imovel.index') }}">
                                @svg('fluentui-tasks-app-20-o', 'feather align-middle')<span class="align-middle mx-2">Imóveis</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('media.*')) active @endif"
                                href="{{ route('media.index') }}">
                                @svg('fluentui-image-multiple-28-o', 'feather align-middle')<span class="align-middle mx-2">Multimedia</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('banner.*')) active @endif"
                                href="{{ route('banner.index') }}">
                                @svg('fluentui-image-multiple-28', 'feather align-middle')<span class="align-middle mx-2">Banner de publicidade</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('regra_de_negocio.*')) active @endif"
                                href="{{ route('regra_de_negocio.index') }}">
                                @svg('fluentui-handshake-20-o', 'feather align-middle')<span class="align-middle mx-2">Regras de negociação</span>
                            </a>



                        </div>
                        <div class="dropdown-mega-list mx-4 p-2">
                            <div class="dropdown-header rounded-3 fw-600 p-2">Imóveis e configurações</div>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('cidade.*')) active @endif"
                                href="{{ route('cidade.index') }}">
                                @svg('fluentui-city-16-o', 'feather align-middle')<span class="align-middle mx-2">Cidade</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('bairro.*')) active @endif"
                                href="{{ route('bairro.index') }}">
                                @svg('fluentui-building-16-o', 'feather align-middle')<span class="align-middle mx-2">Bairro</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('tipo_de_imovel.*')) active @endif"
                                href="{{ route('tipo_de_imovel.index') }}">
                                @svg('fluentui-tasks-app-20-o', 'feather align-middle')<span class="align-middle mx-2">Tipo de Imóvel</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('condicao.*')) active @endif"
                                href="{{ route('condicao.index') }}">
                                @svg('fluentui-real-estate-20-o', 'feather align-middle')<span class="align-middle mx-2">Condição da casa</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('status.*')) active @endif"
                                href="{{ route('status.index') }}">
                                @svg('fluentui-status-20-o', 'feather align-middle')<span class="align-middle mx-2">Status</span>
                            </a>

                        </div>
                        <div class="dropdown-mega-list mx-4 p-2">
                            <div class="dropdown-header rounded-3 fw-600 p-2">Administração</div>

                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('agenda.*')) active @endif"
                                href="{{ route('agenda.index') }}">
                                @svg('fluentui-calendar-clock-24-o', 'feather align-middle')<span class="align-middle mx-2">Mensagens</span>
                            </a>

                            <a class="dropdown-item  rounded-3 fw-600 p-2  @if (request()->routeIs('user.*')) active @endif"
                                href="{{ route('user.index') }}">
                                <i class="far fa-users align-middle" data-feather="users"></i>
                                <span class="align-middle mx-2">Usuários</span>
                            </a>


                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('termos.index')) active @endif"
                                href="{{ route('termos.index') }}">
                                @svg('fluentui-document-lock-16-o', 'feather align-middle')<span class="align-middle mx-2">Termos de condições</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->routeIs('politicas.index')) active @endif"
                                href="{{ route('politicas.index') }}">
                                @svg('fluentui-shield-lock-48-o', 'feather align-middle')<span class="align-middle mx-2">Politicas de privacidade</span>
                            </a>
                            <a class="dropdown-item  rounded-3 fw-600 p-2 @if (request()->is('backup')) active @endif"
                                href="{{ url('/backup') }}">
                                @svg('fluentui-history-16', 'feather align-middle')<span class="align-middle mx-2">Backup's</span>
                            </a>
                        </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                @auth
                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('backend/img/avatar.svg') }}" class="avatar img-fluid rounded me-1"
                            alt="Charles Hall" /> <span class="text-dark">
                            {{ Auth::user()->name }}
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end rounded-3 p-2 shadow-lg">
                        <a class="dropdown-item" onclick="document.getElementById('logoutForm').submit()">
                            <i class="align-middle" data-feather="power"></i>
                            <span class="align-middle ">&nbsp; {{ _('Terminar sessão') }}</span></a>
                        <form action="{{ route('logout') }}" method="post" id="logoutForm">
                            @csrf
                        </form>
                    </div>
                @endauth
            </li>
        </ul>
    </div>
</nav>
