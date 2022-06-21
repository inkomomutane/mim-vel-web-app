
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
<li class="sidebar-item @if (request()->routeIs('media.*')) active @endif">
    <a class="sidebar-link " href="{{ route('media.index') }}">
        @svg('fluentui-image-multiple-28-o' ,'feather align-middle')<span class="align-middle">Media</span>
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
<li class="sidebar-item @if (request()->routeIs('agenda.*')) active @endif">
    <a class="sidebar-link " href="{{ route('agenda.index') }}">
        @svg('fluentui-calendar-clock-24-o' ,'feather align-middle')<span class="align-middle">Agendas</span>
    </a>
</li>
<li class="sidebar-item  @if (request()->routeIs('termos.index')) active @endif">
    <a class="sidebar-link" href="{{ route('termos.index') }}">
        @svg('fluentui-document-lock-16-o' ,'feather align-middle')<span class="align-middle">Termos de condições</span>
    </a>
</li>

<li class="sidebar-item  @if (request()->routeIs('politicas.index')) active @endif">
    <a class="sidebar-link" href="{{ route('politicas.index') }}">
        @svg('fluentui-shield-lock-48-o' ,'feather align-middle')<span class="align-middle">Politicas de privacidade</span>
    </a>
</li>
<li class="sidebar-item  @if (request()->is('backup')) active @endif">
    <a class="sidebar-link" href="{{ url('/backup') }}">
        @svg('fluentui-history-16' ,'feather align-middle')<span class="align-middle">Backup's</span>
    </a>
</li>
