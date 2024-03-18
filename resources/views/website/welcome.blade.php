@extends('website.layouts.layout')

@section('seo')
    {!! seo($seoData) !!}
@endsection
@section('header')
    <x-website-header />
@endsection
@section('hero')
    <section class="relative ">
        @if (!is_null($page?->img()))
            {{ $page->img()->attributes(['class' => 'absolute object-cover inset-0 w-full h-full']) }}
        @else
            <img src="{{ Vite::asset('resources/js/images/placeholder.svg') }}" alt="Politicas de privacidade"
                class="absolute object-cover inset-0 w-full h-full">
        @endif
        <div class="relative bg-slate-950 bg-opacity-40 h-full pt-20">
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-36">
                <div class="flex flex-col items-center justify-between xl:flex-row">
                    <div class="px-2 text-center w-full md:px-16">
                        <h1
                            class="text-2xl font-extrabold tracking-tight leading-none   text-white md:text-3xl dark:text-white">
                            @if ($logo)
                                {{ $logo->img()->attributes(['class' => 'mx-auto mt-10 sm:m-auto h-28 w-fit', 'alt' => 'Mimóvel']) }}
                            @else
                                <img src="{{ Vite::asset('resources/js/images/logo/logo.png') }}"
                                    class="mx-auto mt-10 sm:m-auto w-60 h-40" alt="Mimóvel" />
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-200 grid justify-center items-center">
        <div class="p-8 -translate-y-16 bg-white md:first:rounded md:shadow-2xl w-screen md:w-fit mx-1 md:mx-4">
            <form action="{{route('imoveis')}}" method="get">
            <div class="grid md:grid-cols-5 gap-4 ">
                    <div class="md:col-span-4">
                        <label for="name"
                            class="block mb-2 text-xs font-semibold text-gray-500 dark:text-white uppercase">Pesquisar </label>
                        <input id="title" name="title" type="text"
                            placeholder="Tente pesquisar por zona, cidade ou tipo do imóvel"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-gray-500 focus:border-gray-500 block w-full h-[38px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                            autocomplete="title" />
                    </div>
                    <div class="">
                        <label for="name"
                            class="hidden md:block md:invisible  mb-2 text-xs font-semibold text-gray-500 dark:text-white uppercase">Pesquisar
                            imóvel</label>
                        <button type="submit"
                            class="bg-primary-500  text-white font-medium text-sm rounded-sm focus:ring-gray-500 focus:border-gray-500 block w-full h-[38px]">Procurar</button>
                    </div>
            </div>
        </form>
        </div>
    </section>
@endsection

@section('content')
    <!-- Start::Relevant-Imovels -->
    <section class="py-8 px-2 sm:px-6 lg:px-24 bg-gradient-to-b from-gray-200 via-gray-100 to-gray-50 dark:bg-gray-700 font-['Open_Sans'] text-gray-700" itemscope
        itemtype="https://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6" itemprop="name">
            Imóveis destacados
        </h1>
        <p class="mx-6 mt-2 dark:text-white">
            Imóveis mais visitados do site.
        </p>

        <div class="splide" id="relevant-imovels" data-splide='{"type":"loop","autoplay":true}'>
            <!-- Additional required wrapper -->
            <div class="splide__track">
                <!-- Slides -->
                <ul class="splide__list">
                    @foreach ($relevantImovels as $imovel)
                        <li class="splide__slide p-5 group mr-0 grid justify-center items-center" itemprop="itemListElement"
                            itemscope itemtype="https://schema.org/ListItem">
                            <a href="{{ route('post.imovel.show', [
                                'imovel' => $imovel->slug,
                            ]) }}"
                                itemprop="url">
                                <article
                                    class="!w-full bg-white dark:bg-gray-700  dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-none hover:shadow-gray-400 hover:rounded">

                                    <header class="bg-gray-500">
                                        <a href="{{ route('post.imovel.show', [ 'imovel' => $imovel->slug ]) }}">
                                            @if ($imovel->getFirstMedia('posts'))
                                                {{ $imovel->getFirstMedia('posts')
                                                    ?->img()->attributes([
                                                        'class' => 'col-span-1 sm:col-span-3  h-64 w-full xl:h-72 object-cover rounded-t',
                                                        'alt' => $imovel->titulo ?? '',
                                                    ])->lazy() }}
                                            @else
                                                <img class="col-span-1 sm:col-span-3  h-64 xl:h-72 object-cover rounded-t"
                                                     src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                                     alt="{{ $imovel->titulo ?? '' }}">
                                            @endif
                                        </a>
                                    </header>

                                    <div class="w-full p-4 pb-6 font-['Jost'] text-gray-500 grid justify-items-stretch col-span-3">
                                        <div class="flex justify-between">
                                            <a href="{{ route('post.imovel.show', [ 'imovel' => $imovel->slug ]) }}">
                                                <h1 class="text-lg font-semibold line-clamp-1 normal-case py-1 first-letter:uppercase">
                                                    {{ $imovel->imovelFor?->slug_text }} {{ $imovel->titulo }}
                                                </h1>
                                            </a>
                                        </div>

                                        <div class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                                             itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                            <svg class="text-gray-400" width="20" height="20"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor">
                                                <circle cx="12" cy="10" r="3" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                                <path
                                                    d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                            <p class="line-clamp-1">
                                                &nbsp;
                                                {{ ($imovel->bairro?->nome ? $imovel->bairro?->nome . ', ' : '') .
                                                    $imovel->bairro->cidade?->nome .
                                                    ($imovel->endereco ? ', ' . $imovel->endereco : '') }}
                                            </p>

                                        </div>
                                        <div class="grid grid-cols-3 gap-8 mt-2">

                                            <a href="{{ route('post.imovel.show', [ 'imovel' => $imovel->slug ]) }}"
                                               class="flex
                                       bg-orange-950  items-center justify-center
                                       text-center  rounded-sm text-orange-50
                                       py-0 font-medium text-sm transition-transform duration-300 transform-gpu
                                        hover:z-10 hover:text-orange-100 uppercase
                                        col-span-1
                                        ">

                                                Ver mais
                                            </a>
                                            <div class="my-2 flex text-gray-500 col-span-2">
                                                &nbsp; <strong>{{ $imovel->price }}</strong>
                                            </div>
                                        </div>

                                    </div>
                                </article>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="flex mx-5">
            <a href="{{ route('imoveis') }}"
                class="w-screen text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300
                font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none
                 dark:focus:ring-slate-800 rounded text-center first-letter:uppercase">
                Ver todos imóveis ( {{ $imovels_count}} )
            </a>
        </div>
    </section>
    <!-- End::Relevant-Imovels -->

    <!-- Start::Relevant Hotels -->
    <section class="pb-8 pt-8 px-2 sm:px-6 lg:px-24 bg-gradient-to-b from-gray-50 to-gray-100 dark:bg-gray-700 font-['Open_Sans']  " itemscope
             itemtype="https://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6 first-letter:uppercase">
            Hoteis
        </h1>
        <p class="mx-6 mt-2 dark:text-white first-letter:uppercase">
            Quartos e hoteis
        </p>
        <!--- End::Latest-Imovels-Slide-that shown only on small screens -->
        <div class="splide" id="relevantHotels" data-splide='{"type":"loop","autoplay":true}'>
            <!-- Additional required wrapper -->
            <div class="splide__track">
                <!-- Slides -->
                <ul class="splide__list">

                    @foreach ($hotels as $hotelWithRoom)
                        <li class="splide__slide p-5 group mr-0 grid justify-center items-center" itemprop="itemListElement"
                            itemscope itemtype="https://schema.org/ListItem">

                                <article
                                    class="!w-full bg-white dark:bg-gray-700  dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-none hover:shadow-gray-400 hover:rounded">
                                    <header class="bg-gray-500">
                                        <a href="{{ route('post.hotel.show',['hotel' => $hotelWithRoom->slug]) }}">
                                            @if ($hotelWithRoom->getFirstMedia('main_hotels'))
                                                {{ $hotelWithRoom->getFirstMedia('main_hotels')
                                                    ?->img()->attributes([
                                                        'class' => 'col-span-1 sm:col-span-3  w-full h-64 xl:h-72 object-cover rounded-t',
                                                        'alt' => $hotelWithRoom->title ?? '',
                                                    ])->lazy() }}
                                            @else
                                                <img class="col-span-1 sm:col-span-3  h-72 sm:h-40 md:h-64 object-cover rounded-t"
                                                     src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                                     alt="{{ $hotelWithRoom->title ?? '' }}">
                                            @endif
                                        </a>
                                    </header>

                                    <div class="w-full p-4 pb-6 font-['Jost'] text-gray-500 grid justify-items-stretch col-span-3">
                                        <div class="flex justify-between">
                                            <a href="{{ route('post.hotel.show',['hotel' => $hotelWithRoom->slug]) }}" >
                                                <h1 class="text-lg font-semibold line-clamp-1 normal-case py-1 first-letter:uppercase">
                                                    {{$hotelWithRoom->title }}
                                                </h1>
                                            </a>
                                        </div>

                                        <div class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                                             itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                            <svg class="text-gray-400" width="20" height="20"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor">
                                                <circle cx="12" cy="10" r="3" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                                <path
                                                    d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                            <p class="line-clamp-1">
                                                &nbsp;
                                                {{ $hotelWithRoom->address }}
                                            </p>

                                        </div>
                                        <div class="grid grid-cols-3 gap-8 mt-2">

                                            <a href="{{ route('post.hotel.show',['hotel' => $hotelWithRoom->slug]) }}"
                                               class="flex
                                       bg-orange-950  items-center justify-center
                                       text-center  rounded-sm text-orange-50
                                       py-0 font-medium text-sm transition-transform duration-300 transform-gpu
                                        hover:z-10 hover:text-orange-100 uppercase
                                        col-span-1
                                        ">

                                                Ver mais
                                            </a>
                                            <div class="my-2 flex text-gray-500 col-span-2">
                                                &nbsp; <strong>{{ $hotelWithRoom->hotels->first()->preco }}</strong>
                                            </div>
                                        </div>

                                    </div>
                                </article>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- End::Relevant hotels -->

        <div class="flex mx-5 ">
            <a href=""
               class="w-screen text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:ring-orange-300 font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 rounded text-center">
                Ver todos hoteis ({{$hotels_count}})
            </a>
        </div>
    </section>
    <!--- Start::Latest-Imovels-Slide-that shown only on small screens -->

    <!-- Start::Latest-Imovels -->
    <section class="pb-8 pt-8 px-2 sm:px-6 lg:px-24 bg-gradient-to-b from-gray-100 to-gray-50 dark:bg-gray-700 font-['Open_Sans']  " itemscope
             itemtype="https://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6 first-letter:uppercase">
            Novos imóveis
        </h1>
        <p class="mx-6 mt-2 dark:text-white first-letter:uppercase">
            Imóveis publicados recentemente no website.
        </p>
        <!--- End::Latest-Imovels-Slide-that shown only on small screens -->
        <div class="splide" id="new-added-houses" data-splide='{"type":"loop","autoplay":true}'>
            <!-- Additional required wrapper -->
            <div class="splide__track">
                <!-- Slides -->
                <ul class="splide__list">
                    @foreach ($lastestImovels as $imovel)
                        <li class="splide__slide p-5 group mr-0 grid justify-center items-center" itemprop="itemListElement"
                            itemscope itemtype="https://schema.org/ListItem">
                            <a href="{{ route('post.imovel.show', [
                                'imovel' => $imovel->slug,
                            ]) }}"
                               itemprop="url">
                                <article
                                    class="!w-full bg-white dark:bg-gray-700  dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-none hover:shadow-gray-400 hover:rounded">

                                    <header class="bg-gray-500">
                                        <a href="{{ route('post.imovel.show', [ 'imovel' => $imovel->slug ]) }}">
                                            @if ($imovel->getFirstMedia('posts'))
                                                {{ $imovel->getFirstMedia('posts')
                                                    ?->img()->attributes([
                                                        'class' => 'col-span-1 sm:col-span-3 w-full h-64 xl:h-72 object-cover rounded-t',
                                                        'alt' => $imovel->titulo ?? '',
                                                    ])->lazy() }}
                                            @else
                                                <img class="col-span-1 sm:col-span-3  h-72 sm:h-40 md:h-64 object-cover rounded-t"
                                                     src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                                     alt="{{ $imovel->titulo ?? '' }}">
                                            @endif
                                        </a>
                                    </header>

                                    <div class="w-full p-4 pb-6 font-['Jost'] text-gray-500 grid justify-items-stretch col-span-3">
                                        <div class="flex justify-between">
                                            <a href="{{ route('post.imovel.show', [ 'imovel' => $imovel->slug ]) }}">
                                                <h1 class="text-lg font-semibold line-clamp-1 normal-case py-1 first-letter:uppercase">
                                                    {{ $imovel->imovelFor?->slug_text }} {{ $imovel->titulo }}
                                                </h1>
                                            </a>
                                        </div>

                                        <div class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                                             itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                            <svg class="text-gray-400" width="20" height="20"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor">
                                                <circle cx="12" cy="10" r="3" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                                <path
                                                    d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                            <p class="line-clamp-1">
                                                &nbsp;
                                                {{ ($imovel->bairro?->nome ? $imovel->bairro?->nome . ', ' : '') .
                                                    $imovel->bairro->cidade?->nome .
                                                    ($imovel->endereco ? ', ' . $imovel->endereco : '') }}
                                            </p>

                                        </div>
                                        <div class="grid grid-cols-3 gap-8 mt-2">

                                            <a href="{{ route('post.imovel.show', [ 'imovel' => $imovel->slug ]) }}"
                                               class="flex
                                       bg-orange-950  items-center justify-center
                                       text-center  rounded-sm text-orange-50
                                       py-0 font-medium text-sm transition-transform duration-300 transform-gpu
                                        hover:z-10 hover:text-orange-100 uppercase
                                        col-span-1
                                        ">

                                                Ver mais
                                            </a>
                                            <div class="my-2 flex text-gray-500 col-span-2">
                                                &nbsp; <strong>{{ $imovel->price }}</strong>
                                            </div>
                                        </div>

                                    </div>
                                </article>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- End::Latest-Imovels -->

        <div class="flex mx-5 ">
            <a href="{{ route('imoveis') }}"
               class="w-screen text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 rounded text-center">
                Ver todos imóveis ( {{ $imovels_count}} )
            </a>
        </div>
    </section>
    <!--- Start::Latest-Imovels-Slide-that shown only on small screens -->

    <!-- Start::Banner -->
    <section class="py-1 pb-0 px-2 sm:px-6 lg:px-24 bg-gradient-to-b from-gray-50  to-gray-100 dark:bg-gray-700 font-['Open_Sans']">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white my-8 mt-4 first-letter:uppercase">
            Publicidade
        </h1>
        <div class="splide default" data-splide='{"type":"loop","autoplay":true}'>
            <!-- Additional required wrapper -->
            <div class="splide__track">
                <!-- Slides -->
                <ul class="splide__list">
                    @if($banners)
                        @foreach ($banners->getMedia('banners') as $banner)
                            <li class="splide__slide">
                                <!-- Hero -->
                                <div class=""
                                     style="background-image: url('{{ $banner->responsiveImages()->getPlaceholderSvg() }}');background-repeat: no-repeat;  background-size: cover; ">
                                    <div class="bg-gradient-to-b from-violet-600/[.15] via-transparent">
                                        <div
                                            class="max-w-[85rem] mx-auto px-4 h-72 md:h-80 lg:h-96 sm:px-6 lg:px-8 pt-1 grid justify-items-center">
                                            {{ $banner->img()->attributes(['class' => 'h-72 md:h-80 lg:h-96 object-contain w-auto'])->lazy() }}
                                        </div>
                                    </div>
                                </div>
                                <!-- End Hero -->
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </section>
    <!-- End:Banner-->

    <!-- Start::Type-of-Imovels -->
    <section class="py-16 px-2 sm:px-6 lg:px-24 bg-gray-100 font-['Open_Sans']" itemscope
        itemtype="https://schema.org/ItemList">
        <h2 class="font-semibold text-2xl text-slate-700 mx-6 mb-2 first-letter:uppercase" itemprop="name">
            Veja por categorias
        </h2>
        <div class="flex p-5">
            <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 w-full justify-between">

                @foreach ($imovelTypes as $type)
                    <li itemscope itemtype="https://schema.org/ListItem" itemprop="itemListElement">
                        <a href="{{ route('imoveis', ['imovel_types' => [$type->id]]) }}">
                            <article class="text-center bg-white w-fit mx-auto p-4 rounded-2xl">
                                @if ($type->getFirstMedia('icons'))
                                    {{ $type->getFirstMedia('icons')
                                        ?->img()->attributes(['class' => 'object-cover h-24 w-24 rounded-2xl', 'alt' => $type->nome ?? ''])->lazy() }}
                                @else
                                    <img class="object-cover h-24 w-24 rounded-2xl"
                                        src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                        alt="{{ $type->nome ?? '' }}">
                                @endif
                            </article>
                            <p class="text-center my-4 text-xl font-medium text-gray-700 first-letter:uppercase"
                                itemprop="name">
                                <span itemprop="identifier">{{ $type->nome ?? '' }}</span>
                            </p>

                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    <!-- End::Type-of-Imovels -->

@endsection
@push('js')
    @vite(['resources/js/website/vue/welcomeSearch.ts', 'resources/js/website/welcomeBanner.ts'])
@endpush
