<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">{{ config('app.name', 'Dashboard') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">M</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Painel Administrativo</li>
            <li class="@if (Route::is('home')) active @endif"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-th-large"></i>
                    <span>Dashboard</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>
                    <span>Imóveis</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-calendar-minus"></i>
                    <span>Agendas</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-exclamation-triangle"></i>
                    <span>Denúncias</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-comments"></i>
                    <span>Mensagens</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-chart-line"></i>
                    <span>Estatísticas</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-users"></i>
                    <span>Usuarios</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Definições</li>
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-map-marker-alt"></i>
                    <span>Bairro</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-city"></i>
                    <span>Cidade</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-check-double"></i>
                    <span>Status</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-tasks"></i> <span>Tipos de
                        imóvel</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="@if (Route::is('permissions')) active @endif "><a class=" nav-link" href="{{ route('permissions') }}"><i class="fas fa-user-shield"></i>
                <span>Permissões</span></a></li>
        </ul>
    </aside>
</div>
