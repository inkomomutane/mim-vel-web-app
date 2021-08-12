@php
use App\Models\WebLink;
$links = WebLink::all();
@endphp
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">{{ config('app.name', 'Dashboard') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">M</a>
        </div>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-calendar-minus"></i>
                    <span>Agendas</span></a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="@if (Route::is('message.index')) active @endif">
                <a class="nav-link" href="{{ route('message.index') }}"><i class="fas fa-comments"></i>
                    <span>Mensagens</span></a></li>
        </ul>
    </aside>
</div>
