@php
use App\Models\WebLink;
$links = WebLink::all();
$role = Auth::user()->roles->first()->name;
@endphp

@switch($role )
    @case('ceo')
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
                    <li class="@if (Route::is('home')) active @endif"><a
                            class="nav-link" href="{{ route('home') }}"><i class="fas fa-chart-line"></i>
                            <span>Estatísticas</span></a></li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="
                        @if (Route::is('imovel.*')) active @endif "><a class=" nav-link" href="{{ route('imovel.index') }}"><i class="fas fa-home"></i>
                        <span>Imóveis</span></a>
                    </li>
                </ul>
                <ul class="sidebar-menu">
                    <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-calendar-minus"></i>
                            <span>Agendas</span></a></li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="@if (Route::is('denuncia.index')) active @endif"><a class="nav-link" href="{{ route('denuncia.index') }}"><i
                                class="fas fa-exclamation-triangle"></i>
                            <span>Denúncias</span></a></li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="@if (Route::is('message.index')) active @endif">
                        <a class="nav-link" href="{{ route('message.index') }}"><i class="fas fa-comments"></i>

                            <span>Mensagens</span>
                            <div class="notification" style="font-weight: 800">
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="@if (Route::is('sobre.index')) active @endif">
                        <a class="nav-link" href="{{ route('sobre.index') }}"><i class="fas fa-info-circle    "></i>

                            <span>Sobre nós</span>
                            <div class="notification" style="font-weight: 800">
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="@if (Route::is('termos.index')) active @endif">
                        <a class="nav-link" href="{{ route('termos.index') }}"><i class="fas fa-book-open    "></i>

                            <span>Termos e condições</span>
                            <div class="notification" style="font-weight: 800">
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="@if (Route::is('parceiro.*')) active @endif">
                        <a class="nav-link" href="{{ route('parceiro.index') }}"><i class="fas fa-handshake    "></i>
                            <span>Parceiros</span>
                        </a>
                    </li>
                </ul>

                <ul class="sidebar-menu">
                    <li class="@if (Route::is('user.index')) active @endif">
                        <a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users-cog"></i>
                            <span>Usuarios</span></a></li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="menu-header">Definições</li>
                    <li class="dropdown @if (Route::is('weblink.*')) active @endif">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Site CMS</span></a>
                        <ul class="dropdown-menu" style="display:

                            @if (Route::is('weblink.*')) block; @else none; @endif ">
                            <li class=" @if (Request::url() == route('weblink.index')) active @endif"><a class="nav-link"
                                href="{{ route('weblink.index') }}"><i class="fas fa-cogs"></i>
                                <span>Links</span></a>
                    </li>

                    @foreach ($links as $link)
                        <li class="@if (Request::url()==route('weblink.edit', $link->id)) active @endif"><a class="nav-link"
                                href="{{ route('weblink.edit', $link->id) }}"><i class="{{ $link->icon }}"></i>
                                <span>{{ $link->url }}</span></a></li>
                    @endforeach
                </ul>
                </li>
                <li class="@if (Route::is('bairro.index')) active @endif"><a
                        class="nav-link" href="{{ route('bairro.index') }}"><i class="fas fa-map-marker-alt"></i>
                        <span>Bairro</span></a></li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="@if (Route::is('cidade.index')) active @endif"><a class="nav-link" href="{{ route('cidade.index') }}"><i class="fas fa-city"></i>
                            <span>Cidade</span></a></li>
                </ul>

                <ul class="sidebar-menu">
                    <li class="@if (Route::is('status.index')) active @endif"><a class="nav-link" href="{{ route('status.index') }}"><i class="fas fa-check-double"></i>
                            <span>Status</span></a></li>
                </ul>

                <ul class="sidebar-menu">
                    <li class="@if (Route::is('condicao.index')) active @endif"><a class="nav-link" href="{{ route('condicao.index') }}"><i class="fas fa-check-double"></i>
                            <span>Condição</span></a></li>
                </ul>

                <ul class="sidebar-menu">
                    <li class="@if (Route::is('tipodeimovel.index')) active @endif"><a class="nav-link" href="{{ route('tipodeimovel.index') }}"><i
                                class="fas fa-tasks"></i>
                            <span>Tipos de
                                imóvel</span></a></li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="@if (Route::is('permissions')) active @endif "><a class=" nav-link" href="{{ route('permissions') }}"><i class="fas fa-user-shield"></i>
                        <span>Permissões</span></a>
                    </li>
                </ul>
            </aside>
        </div>
    @break
    @case('admin')
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
                <li class="@if (Route::is('home')) active @endif"><a
                        class="nav-link" href="{{ route('home') }}"><i class="fas fa-chart-line"></i>
                        <span>Estatísticas</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="
                    @if (Route::is('imovel.*')) active @endif "><a class=" nav-link" href="{{ route('imovel.index') }}"><i class="fas fa-home"></i>
                    <span>Imóveis</span></a>
                </li>
            </ul>
            <ul class="sidebar-menu">
                <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-calendar-minus"></i>
                        <span>Agendas</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('denuncia.index')) active @endif"><a class="nav-link" href="{{ route('denuncia.index') }}"><i
                            class="fas fa-exclamation-triangle"></i>
                        <span>Denúncias</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('message.index')) active @endif">
                    <a class="nav-link" href="{{ route('message.index') }}"><i class="fas fa-comments"></i>

                        <span>Mensagens</span>
                        <div class="notification" style="font-weight: 800">
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('sobre.index')) active @endif">
                    <a class="nav-link" href="{{ route('sobre.index') }}"><i class="fas fa-info-circle    "></i>

                        <span>Sobre nós</span>
                        <div class="notification" style="font-weight: 800">
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('termos.index')) active @endif">
                    <a class="nav-link" href="{{ route('termos.index') }}"><i class="fas fa-book-open    "></i>

                        <span>Termos e condições</span>
                        <div class="notification" style="font-weight: 800">
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('parceiro.*')) active @endif">
                    <a class="nav-link" href="{{ route('parceiro.index') }}"><i class="fas fa-handshake    "></i>
                        <span>Parceiros</span>
                    </a>
                </li>
            </ul>

            <ul class="sidebar-menu">
                <li class="@if (Route::is('user.index')) active @endif">
                    <a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users-cog"></i>
                        <span>Usuarios</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="menu-header">Definições</li>
                <li class="dropdown @if (Route::is('weblink.*')) active @endif">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Site CMS</span></a>
                    <ul class="dropdown-menu" style="display:

                        @if (Route::is('weblink.*')) block; @else none; @endif ">
                        <li class=" @if (Request::url() == route('weblink.index')) active @endif"><a class="nav-link"
                            href="{{ route('weblink.index') }}"><i class="fas fa-cogs"></i>
                            <span>Links</span></a>
                </li>

                @foreach ($links as $link)
                    <li class="@if (Request::url()==route('weblink.edit', $link->id)) active @endif"><a class="nav-link"
                            href="{{ route('weblink.edit', $link->id) }}"><i class="{{ $link->icon }}"></i>
                            <span>{{ $link->url }}</span></a></li>
                @endforeach
            </ul>
            </li>
            <li class="@if (Route::is('bairro.index')) active @endif"><a
                    class="nav-link" href="{{ route('bairro.index') }}"><i class="fas fa-map-marker-alt"></i>
                    <span>Bairro</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('cidade.index')) active @endif"><a class="nav-link" href="{{ route('cidade.index') }}"><i class="fas fa-city"></i>
                        <span>Cidade</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('status.index')) active @endif"><a class="nav-link" href="{{ route('status.index') }}"><i class="fas fa-check-double"></i>
                        <span>Status</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('tipodeimovel.index')) active @endif"><a class="nav-link" href="{{ route('tipodeimovel.index') }}"><i
                            class="fas fa-tasks"></i>
                        <span>Tipos de
                            imóvel</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('permissions')) active @endif "><a class=" nav-link" href="{{ route('permissions') }}"><i class="fas fa-user-shield"></i>
                    <span>Permissões</span></a>
                </li>
            </ul>
        </aside>
    </div>
    @break
    @case('corretor')
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
            </ul>
            <ul class="sidebar-menu">
                <li class="
                    @if (Route::is('imovel.*')) active @endif "><a class=" nav-link" href="{{ route('imovel.index') }}"><i class="fas fa-home"></i>
                    <span>Imóveis</span></a>
                </li>
            </ul>
            <ul class="sidebar-menu">
                <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-calendar-minus"></i>
                        <span>Agendas</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('denuncia.index')) active @endif"><a class="nav-link" href="{{ route('denuncia.index') }}"><i
                            class="fas fa-exclamation-triangle"></i>
                        <span>Denúncias</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('message.index')) active @endif">
                    <a class="nav-link" href="{{ route('message.index') }}"><i class="fas fa-comments"></i>

                        <span>Mensagens</span>
                        <div class="notification" style="font-weight: 800">
                        </div>
                    </a>
                </li>
            </ul>

        </aside>
    </div>
    @break
    @default
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
            </ul>
            <ul class="sidebar-menu">
                <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-calendar-minus"></i>
                        <span>Agendas</span></a></li>
            </ul>
            <ul class="sidebar-menu">
                <li class="@if (Route::is('message.index')) active @endif">
                    <a class="nav-link" href="{{ route('message.index') }}"><i class="fas fa-comments"></i>

                        <span>Mensagens</span>
                        <div class="notification" style="font-weight: 800">
                        </div>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
@endswitch

@push('css')
    <style>
        .notification {
            width: 24px;
            padding: 0px;
            text-align: center;
            border-radius: 20px;
            height: 24px;
            text-align-last: center;
            float: right;
            color: #fff;
            font-size: 12px;
            font-weight: 800;
        }

    </style>
@endpush
