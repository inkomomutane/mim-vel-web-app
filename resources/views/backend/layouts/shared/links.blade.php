<li class="sidebar-item @if (request()->routeIs('dashboard')) active @endif">
    <a class="sidebar-link " href="{{ route('dashboard') }}">
        @svg('radix-dashboard' ,'feather align-middle')<span class="align-middle">Administração</span>
    </a>
</li>
<li class="sidebar-item @if (request()->routeIs('user.*')) active @endif">
    <a class="sidebar-link " href="{{ route('user.index') }}">
        <i class="far fa-users align-middle" data-feather="users"></i>
        <span class="align-middle">Usuários</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('cidade.*')) active @endif">
    <a class="sidebar-link " href="{{ route('cidade.index') }}">
        @svg('fluentui-city-16-o' ,'feather align-middle')<span class="align-middle">Cidade</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('bairro.*')) active @endif">
    <a class="sidebar-link " href="{{ route('bairro.index') }}">
        @svg('fluentui-building-16-o' ,'feather align-middle')<span class="align-middle">Bairro</span>
    </a>
</li>
