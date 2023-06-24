@extends('website.layouts.layout')
@section('header')
    <x-website-header solidBg="true"  />
@endsection

@section('hero')
<x-website-hero styling="h-8" />
@endsection
@section('content')
<div id="imoveis"></div>
@endsection
@push('js')
@vite(['resources/js/website/vue/posts/app.ts'])
@endpush
