<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <form class="d-none d-sm-inline-block" style="background: #faf6ff;border-radius: 7px;">
        @csrf
        @yield('search-bar')
    </form>
    <h5 class="card-title pt-2">   {{ $title ?? ''}}</h5>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                @auth
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('backend/img/avatar.svg') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">
                            {{Auth::user()->name}}
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    {{-- <a href="{{ route('profile') }}" class="dropdown-item">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">&nbsp;Perfil</span>

                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"  onclick="document.getElementById('logoutForm').submit()" >
                        <i class="align-middle" data-feather="power"></i>
                    <span class="align-middle">&nbsp; {{_('Terminar sessão')}}</span></a>
                    <form  action="{{route('logout')}}" method="post" id="logoutForm">
                        @csrf
                    </form>
                </div>
                @endauth
            </li>
        </ul>
    </div>
</nav>

