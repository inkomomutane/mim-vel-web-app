@extends('website.layouts.layout')
@section('header')
    <x-website-header />
@endsection
@section('hero')
    <section class="relative">
        {{ $page->img()->attributes(['class' => 'absolute object-cover inset-0 w-full h-full']) }}
        <div class="relative bg-slate-950 bg-opacity-40 h-full pt-20">
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                <div class="flex flex-col items-center justify-between xl:flex-row">
                    <div class="px-2 text-center w-full md:px-16">
                        <h1
                            class="text-2xl font-extrabold tracking-tight leading-none text-white md:text-3xl dark:text-white">
                            <img src="{{ Vite::asset('resources/js/images/logo/logo.png') }}"
                                class="mx-auto mt-10 sm:m-auto w-60" alt="Mimóvel" />
                        </h1>
                        <div
                            class="my-8 rounded-sm text-xs font-normal text-white lg:text-sm dark:text-gray-400 bg-gray-50 dark:bg-gray-700 p-8 grid font-['Open_Sans']">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Start::Relevant-Imovels -->
    <section class="py-16 px-8 sm:px-6 lg:px-24 bg-gray-100 dark:bg-gray-700 font-['Open_Sans']" itemscope
        itemtype="http://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6" itemprop="name">
            Imóveis mais destacados
        </h1>
        <p class="mx-6 mt-2 dark:text-white">
            Imóveis mais visitados e visualizados no website.
        </p>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">

            @foreach ($relevantImovels as $imovel)
                <li class="p-5 group" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <article
                        class="w-full dark:bg-gray-700 dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-110">
                        <header>
                            <a href="#" itemprop="url">
                                @if ($imovel->getFirstMedia('posts'))
                                    {{ $imovel->getFirstMedia('posts')
                                        ?->img()->attributes(['class' => 'w-full object-cover h-56', 'alt' => $imovel->titulo ?? ''])->lazy() }}
                                @else
                                    <img class="w-full object-cover h-56"
                                        src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                        alt="{{ $imovel->titulo ?? '' }}">
                                @endif
                            </a>
                        </header>
                        <div class="p-1">
                            <p class="font-normal text-base text-gray-900 dark:text-gray-100 tracking-wide line-clamp-1 group-hover:text-orange-500"
                                itemprop="name">
                                {{ Str::ucfirst($imovel->imovelFor?->slug_text) }} - {{ Str::ucfirst($imovel->titulo) }}
                            </p>

                            <a href="#" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <h1
                                    class="mb-1 text-xl font-semibold space-x-2 tracking-wide text-gray-600 dark:text-white group-hover:text-orange-500">
                                    <span itemprop="priceCurrency" content="MZN" />
                                    {{ $imovel->preco }}
                                </h1>
                            </a>
                            <p class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400 line-clamp-1 group-hover:text-orange-400"
                                itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <span itemprop="addressLocality">{{ Str::ucfirst($imovel->bairro?->nome) }}</span> |
                                <span itemprop="addressRegion">{{ Str::ucfirst($imovel->bairro?->cidade?->nome) }}</span>
                                <span
                                    itemprop="streetAddress">{{ Str::ucfirst($imovel->endereco ? '| ' . $imovel->endereco : '') }}</span>
                            </p>
                        </div>
                        <meta itemprop="position" content="{{ $loop->iteration }}" />
                        <meta itemprop="item" content="{{ url('/') }}" />
                    </article>
                </li>
            @endforeach
        </ul>
        <div class="flex">
            <a href="{{ url('/') }}"
                class="w-screen text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 rounded text-center">
                Ver todos imóveis
            </a>
        </div>
    </section>
    <!-- End::Relevant-Imovels -->

    <!-- Start::Latest-Imovels -->
    <section class="py-16 px-8 sm:px-6 lg:px-24 bg-gray-50 dark:bg-gray-700 font-['Open_Sans']" itemscope
        itemtype="http://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6">
            Novos imóveis
        </h1>
        <p class="mx-6 mt-2 dark:text-white">
            Imóveis publicados recentemente no website.
        </p>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">

            @foreach ($lastestImovels as $imovel)
                <li class="p-5 group" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <article
                        class="w-full dark:bg-gray-700 dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-110">
                        <header>
                            <a href="#" itemprop="url">
                                @if ($imovel->getFirstMedia('posts'))
                                    {{ $imovel->getFirstMedia('posts')
                                        ?->img()->attributes(['class' => 'w-full object-cover h-56', 'alt' => $imovel->titulo ?? ''])->lazy() }}
                                @else
                                    <img class="w-full object-cover h-56"
                                        src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                        alt="{{ $imovel->titulo ?? '' }}">
                                @endif

                            </a>
                        </header>
                        <div class="p-1">
                            <p class="font-normal text-base text-gray-900 dark:text-gray-100 tracking-wide line-clamp-1 group-hover:text-orange-500"
                                itemprop="name">
                                {{ Str::ucfirst($imovel->imovelFor?->slug_text) }} - {{ Str::ucfirst($imovel->titulo) }}
                            </p>

                            <a href="#" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <h5
                                    class="mb-1 text-xl font-semibold space-x-2 tracking-wide text-gray-600 dark:text-white group-hover:text-orange-500">
                                    <span itemprop="priceCurrency" content="MZN" />
                                    {{ $imovel->preco }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400 line-clamp-1 group-hover:text-orange-400"
                                itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <span itemprop="addressLocality">{{ Str::ucfirst($imovel->bairro?->nome) }}</span> |
                                <span itemprop="addressRegion">{{ Str::ucfirst($imovel->bairro?->cidade?->nome) }}</span>
                                <span
                                    itemprop="streetAddress">{{ Str::ucfirst($imovel->endereco ? '| ' . $imovel->endereco : '') }}</span>
                            </p>
                        </div>
                        <meta itemprop="position" content="{{ $loop->iteration }}" />
                        <meta itemprop="item" content="{{ url('/') }}" />
                    </article>
                </li>
            @endforeach
        </ul>
        <div class="flex">
            <a href="{{ url('/') }}"
                class="w-screen text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 rounded text-center">
                Ver todos imóveis
            </a>
        </div>
    </section>
    <!-- End::Latest-Imovels -->

    <!-- Start::Type-of-Imovels -->
    <section class="py-16 px-8 sm:px-6 lg:px-24 bg-gray-100 font-['Open_Sans']" itemscope itemtype="http://schema.org/ItemList">
        <h2 class="font-semibold text-2xl text-slate-700 mx-6 mb-2" itemprop="name">
          No Mimóvel vai encontrar
        </h2>
        <div class="flex p-5">
          <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full justify-between">

            @foreach ($imovelTypes as $type)
            <li itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
                <article class="text-center bg-white w-fit mx-auto p-4 rounded-2xl">
                    @if ($type->getFirstMedia('icons'))
                    {{ $type->getFirstMedia('icons')
                        ?->img()->attributes(['class' => 'object-cover h-24 w-24 rounded-2xl', 'alt' =>  $type->nome ?? ''])->lazy() }}
                @else
                    <img class="object-cover h-24 w-24 rounded-2xl"
                        src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                        alt="{{ $type->nome ?? '' }}">
                @endif
                </article>
                <p class="text-center my-4 text-xl font-medium text-gray-700 " itemprop="name">
                    <span itemprop="identifier">{{ $type->nome ?? '' }}</span>
                  </p>
              </li>
            @endforeach

          </ul>
        </div>
      </section>

    <!-- End::Type-of-Imovels -->
@endsection
