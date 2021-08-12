@php
$role = Auth::user()->roles->first()->name;
@endphp

@switch($role )
    @case('ceo')
    @include('layouts.backend.sidebar.ceo.sidebar')
    @break
    @case('admin')
    @include('layouts.backend.sidebar.admin.sidebar')
    @break
    @case('corretor')
    @include('layouts.backend.sidebar.corretor.sidebar')
    @break
    @default
    @include('layouts.backend.sidebar.client.sidebar')
@endswitch
