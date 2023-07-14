@extends('website.layouts.layout')
@section('header')
    <x-website-header />
@endsection
@section('hero')
    <section class="relative ">
        {{ $page->img()->attributes(['class' => 'absolute object-cover inset-0 w-full h-full']) }}
        <div class="relative bg-slate-950 bg-opacity-40 h-full pt-20">
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-36">
                <div class="flex flex-col items-center justify-between xl:flex-row">
                    <div class="px-2 text-center w-full md:px-16">
                        <h1
                            class="text-2xl font-extrabold tracking-tight leading-none text-white md:text-3xl dark:text-white">
                            <img src="{{ Vite::asset('resources/js/images/logo/logo.png') }}"
                                class="mx-auto mt-10 sm:m-auto w-60" alt="Mimóvel" />
                        </h1>
                        {{-- <div id="welcome-search">

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Start::Relevant-Imovels -->
    <section class="py-16 px-2 sm:px-6 lg:px-24 bg-gray-100 dark:bg-gray-700 font-['Open_Sans'] text-gray-700" itemscope
        itemtype="http://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6" itemprop="name">
            Imóveis mais destacados
        </h1>
        <p class="mx-6 mt-2 dark:text-white">
            Imóveis mais visitados e visualizados no website.
        </p>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">
            @foreach ($relevantImovels as $imovel)
                <li class="p-5 group mr-0" itemprop="itemListElement" data-aos-offset="20" data-aos="fade-up" data-aos-duration="{{  2000 + ($loop->index * 100 )   }}" itemscope itemtype="http://schema.org/ListItem">
                    <a href="{{ route('post.imovel.show', [
                        'imovel' => $imovel->slug,
                    ]) }}"
                        itemprop="url">
                        <article
                            class="w-full bg-white dark:bg-gray-700 dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-none hover:shadow-gray-400 hover:rounded">
                            <header class="bg-gray-500">
                                @if ($imovel->getFirstMedia('posts'))
                                    {{ $imovel->getFirstMedia('posts')
                                        ?->img()->attributes([
                                            'class' => 'col-span-1 sm:col-span-3 w-full h-72 sm:h-40 md:h-64 object-cover rounded-t',
                                            'alt' => $imovel->titulo ?? '',
                                        ])->lazy() }}
                                @else
                                    <img class="col-span-1 sm:col-span-3 w-full h-72 sm:h-40 md:h-64 object-cover rounded-t"
                                        src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                        alt="{{ $imovel->titulo ?? '' }}">
                                @endif
                            </header>
                            <div class="w-full p-4 pb-6 font-['Jost'] text-gray-500 grid justify-items-stretch col-span-3">
                                <div class="flex justify-between">
                                    <h1 class="text-lg font-semibold line-clamp-1 normal-case py-1">
                                        {{ $imovel->imovelFor?->slug_text }} {{ $imovel->titulo }}
                                    </h1>
                                </div>

                                <div class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                                    itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
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

                                <div class="font-semibold text-sm text-gray-600 grid grid-cols-2">
                                    <p class="bg-orange-100 p-1 px-2 rounded-sm mr-2 line-clamp-1">
                                        {{ $imovel->tipo_de_imovel->nome }}</p>
                                    <p class="bg-orange-100 p-1 px-2 rounded-sm mr-2 line-clamp-1 ">
                                        {{ $imovel->status->nome }}</p>

                                </div>
                                <div class="my-2 flex text-gray-500">
                                    &nbsp; <strong>{{ $imovel->price }}</strong>
                                </div>

                                <a href="{{ route('post.imovel.show', [
                                    'imovel' => $imovel->slug,
                                ]) }}"
                                    class="bg-orange-400 text-center  rounded-sm text-white py-1 font-medium text-sm transition-transform duration-300 transform-gpu hover:shadow-2xl hover:z-10 hover:bg-orange-500">
                                    Ver imovel
                                </a>
                            </div>
                        </article>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="flex mx-5" data-aos-offset="20" data-aos="fade-in" data-aos-duration="1000">
            <a href="{{ route('imoveis') }}"
                class="w-screen text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 rounded text-center">
                Ver todos imóveis
            </a>
        </div>
    </section>
    <!-- End::Relevant-Ads -->
    <section class="py-8 px-2 sm:px-6 lg:px-24 bg-gray-50 dark:bg-gray-700 font-['Open_Sans']">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white my-8 mb-16">
            Anúncios destacados
        </h1>
        <div class="swiper default">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" data-aos-offset="20" data-aos="fade-in" data-aos-duration="1000">
                <!-- Slides -->
                @foreach ($banners->getMedia('banners') as $banner)
                    <div class="swiper-slide">
                        <!-- Hero -->
                        <div class=""
                            style="background-image: url('{{ $banner->responsiveImages()->getPlaceholderSvg() }}');background-repeat: no-repeat;  background-size: cover; ">
                            <div class="bg-gradient-to-b from-violet-600/[.15] via-transparent">
                                <div
                                    class="max-w-[85rem] mx-auto px-4 aspect-[95/70]
                            md:aspect-[95/40] lg:aspect-[95/30] sm:px-6 lg:px-8 pt-1 grid justify-items-center">
                                    {{ $banner->img()->attributes(['class' => 'h-full object-contain w-auto'])->lazy() }}
                                </div>
                            </div>
                        </div>
                        <!-- End Hero -->
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>




    <!-- End:Banner-->

    <!-- Start::Latest-Imovels -->
    <section class="pb-16 pt-8 px-2 sm:px-6 lg:px-24 bg-gray-50 dark:bg-gray-700 font-['Open_Sans']" itemscope
        itemtype="http://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6">
            Novos imóveis
        </h1>
        <p class="mx-6 mt-2 dark:text-white">
            Imóveis publicados recentemente no website.
        </p>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">

            @foreach ($lastestImovels as $imovel)
                <li class="p-5 group mr-0" itemprop="itemListElement"  data-aos-offset="20" data-aos="fade-up" data-aos-duration="{{  2000 + ($loop->index * 100 )   }}"  itemscope itemtype="http://schema.org/ListItem">
                    <a href="{{ route('post.imovel.show', [
                        'imovel' => $imovel->slug,
                    ]) }}"
                        itemprop="url">
                        <article
                            class="w-full bg-white dark:bg-gray-700 dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-none hover:shadow-gray-400 hover:rounded">
                            <header class="bg-gray-500">
                                @if ($imovel->getFirstMedia('posts'))
                                    {{ $imovel->getFirstMedia('posts')
                                        ?->img()->attributes([
                                            'class' => 'col-span-1 sm:col-span-3 w-full h-72 sm:h-40 md:h-64 object-cover rounded-t',
                                            'alt' => $imovel->titulo ?? '',
                                        ])->lazy() }}
                                @else
                                    <img class="col-span-1 sm:col-span-3 w-full h-72 sm:h-40 md:h-64 object-cover rounded-t"
                                        src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                        alt="{{ $imovel->titulo ?? '' }}">
                                @endif
                            </header>
                            <div class="w-full p-4 pb-6 font-['Jost'] text-gray-500 grid justify-items-stretch col-span-3">
                                <div class="flex justify-between">
                                    <h1 class="text-lg font-semibold line-clamp-1 normal-case py-1">
                                        {{ $imovel->imovelFor?->slug_text }} {{ $imovel->titulo }}
                                    </h1>
                                </div>

                                <div class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                                    itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
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

                                <div class="font-semibold text-sm text-gray-600 grid grid-cols-2">
                                    <p class="bg-orange-100 p-1 px-2 rounded-sm mr-2 line-clamp-1">
                                        {{ $imovel->tipo_de_imovel->nome }}</p>
                                    <p class="bg-orange-100 p-1 px-2 rounded-sm mr-2 line-clamp-1 ">
                                        {{ $imovel->status->nome }}</p>

                                </div>
                                <div class="my-2 flex text-gray-500">
                                    &nbsp; <strong>{{ $imovel->price }}</strong>
                                </div>

                                <a href="{{ route('post.imovel.show', [
                                    'imovel' => $imovel->slug,
                                ]) }}"
                                    class="bg-orange-400 text-center  rounded-sm text-white py-1 font-medium text-sm transition-transform duration-300 transform-gpu hover:shadow-2xl hover:z-10 hover:bg-orange-500">
                                    Ver imovel
                                </a>
                            </div>
                        </article>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="flex mx-5" data-aos-offset="20" data-aos="fade-in" data-aos-duration="1000" >
            <a href="{{ route('imoveis') }}"
                class="w-screen text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 rounded text-center">
                Ver todos imóveis
            </a>
        </div>
    </section>
    <!-- End::Latest-Imovels -->

    <!-- Start::Type-of-Imovels -->
    <section  class="py-16 px-2 sm:px-6 lg:px-24 bg-gray-100 font-['Open_Sans']" itemscope
        itemtype="http://schema.org/ItemList">
        <h2 class="font-semibold text-2xl text-slate-700 mx-6 mb-2" itemprop="name" data-aos-offset="1" data-aos="zoom-in" data-aos-duration="5000">
            No Mimóvel vai encontrar
        </h2>
        <div class="flex p-5" data-aos-offset="50" data-aos="zoom-in" data-aos-duration="5000">
            <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 w-full justify-between">

                @foreach ($imovelTypes as $type)
                    <li itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
                    <a href="{{ route('imoveis',['imovel_types' => [$type->id] ])}}">
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
                        <p class="text-center my-4 text-xl font-medium text-gray-700 " itemprop="name">
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
    @vite(['resources/js/website/vue/welcomeSearch.ts', 'resources/js/website/welcomeBanner.js'])
@endpush
