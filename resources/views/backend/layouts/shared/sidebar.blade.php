<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
            <span class="align-middle">{{ config('app.name', 'laravel') }}</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Dashboard
            </li>
            @include('backend.layouts.shared.links')
        </ul>
    </div>
</nav>
