@extends('website.layouts.layout')
@section('header')
    <x-website-header solidBg="true" />
@endsection
@section('seo')
  {!! seo($seoData)!!}
@endsection

@section('hero')
<x-website-hero>
    <x-slot:coverImage>
        @if (!is_null($page?->img()))
        {{ $page->img()->attributes(['class' => 'absolute object-cover inset-0 w-full h-full']) }}
        @else
            <img src="{{Vite::asset('resources/js/images/placeholder.svg')}}"
            alt="Politicas de privacidade"  class="absolute object-cover inset-0 w-full h-full">
        @endif
    </x-slot:coverImage>
    <x-slot:content>
        <div
            class="px-4 align-middle max-w-screen-xl text-center lg:pt-16 lg:px-12"
        >
            <div
                class="p-32 text-center m-auto font-extrabold text-4xl text-white md:text-5xl sm:px-16 xl:px-48 dark:text-gray-400"
            >
                Sobre nós
            </div>
        </div>
    </x-slot:content>
    </x-website-hero>
@endsection
@section('content')
@endsection

