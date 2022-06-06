
<li class="sidebar-item @if (request()->routeIs('dashboard')) active @endif">
    <a class="sidebar-link " href="{{ route('dashboard') }}">
        @svg('radix-dashboard' ,'feather align-middle')<span class="align-middle">Dashboard</span>
    </a>
</li>
<li class="sidebar-item @if (request()->routeIs('imovel.*')) active @endif">
    <a class="sidebar-link " href="{{ route('imovel.index') }}">
        @svg('fluentui-tasks-app-20-o' ,'feather align-middle')<span class="align-middle">Imóveis</span>
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
<li class="sidebar-item @if (request()->routeIs('condicao.*')) active @endif">
    <a class="sidebar-link " href="{{ route('condicao.index') }}">
        @svg('fluentui-real-estate-20-o' ,'feather align-middle')<span class="align-middle">Condição da casa</span>
    </a>
</li>
<li class="sidebar-item @if (request()->routeIs('status.*')) active @endif">
    <a class="sidebar-link " href="{{ route('status.index') }}">
        @svg('fluentui-status-20-o' ,'feather align-middle')<span class="align-middle">Status</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('tipo_de_imovel.*')) active @endif">
    <a class="sidebar-link " href="{{ route('tipo_de_imovel.index') }}">
        @svg('fluentui-tasks-app-20-o' ,'feather align-middle')<span class="align-middle">Tipo de Imóvel</span>
    </a>
</li>
<li class="sidebar-item ">
    <a class="sidebar-link " href="">
        @svg('fluentui-calendar-clock-24-o' ,'feather align-middle')<span class="align-middle">Agendas</span>
    </a>
</li>
<li class="sidebar-item  @if (request()->is('backup')) active @endif">
    <a class="sidebar-link" href="{{ url('/backup') }}">
        @svg('fluentui-history-16' ,'feather align-middle')<span class="align-middle">Backup's</span>
    </a>
</li>
