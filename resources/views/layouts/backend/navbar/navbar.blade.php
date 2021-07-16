<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="mr-auto form-inline">
        <ul class="mr-3 navbar-nav">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('backend/images/avatar.png') }}" class="mr-1 rounded-circle">

        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title text-success">Online</div>
            <a href="{{ route('user.show', ['user'=> Auth::user()->id ]) }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> {{ Auth::user()->name }}
            </a>
            <div class="dropdown-divider"></div>
            <a  href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
                 class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i>  {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    @endguest

    </ul>
</nav>
