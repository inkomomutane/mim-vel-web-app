@extends('website.layouts.layout')
@section('header')
    <x-website-header solidBg="true" />
@endsection
@section('hero')
<section class="relative bg-gray-950 pt-14 px-0  ">
    <div class="swiper default ">
        <div class="swiper-wrapper w-full">
            @foreach ($imovel->getMedia('posts') as $banner)
                <div class="swiper-slide !w-screen">
                    <!-- Hero -->
                    <div class="w-full"
                        style="background-image: url('{{ $banner->responsiveImages()->getPlaceholderSvg() }}')
                        ;background-repeat: no-repeat;  background-size: cover; ">
                        <div class="bg-gradient-to-b from-violet-600/[.15] via-transparent ">
                            <div class="!w-screen mx-auto aspect-[95/70] md:aspect-[95/40] lg:aspect-[95/30] sm:px-6 lg:px-8  grid justify-items-center">
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
@endsection

@section('content')
    <section class="px-4 md:px-24 bg-slate-100 p-16 grid grid-cols-12 gap-8 text-gray-700">
        <div class="bg-white rounded-sm p-8 col-span-12 md:col-span-8 relative">
            <h1 class="text-2xl font-semibold py-2 first-letter:uppercase lowercase">{{ $imovel->imovelFor->slug_text . ' '. $imovel->titulo }}</h1>
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
            <p class="flex font-medium">
                &nbsp;
                {{ ($imovel->bairro?->nome ? $imovel->bairro?->nome . ', ' : '') .
                    $imovel->bairro->cidade?->nome .
                    ($imovel->endereco ? ', ' . $imovel->endereco : '') }}
            </p>

        </div>
        <div class="mt-2 flex ">
            &nbsp; <strong class="text-2xl font-bold text-green-400">{{ $imovel->price }}</strong>
        </div>
        </div>
        <div class=" col-span-12 md:col-span-4 bg-white p-8 w-full md:sticky md:top-20  h-fit">
        </div>
        <div class="bg-white rounded-sm p-8 col-span-12 md:col-span-8">
            <h1 class="text-xl font-semibold py-2 text-orange-500">Descrição</h1>
            {!! $imovel->descricao !!}
        </div>
        <div class="bg-white rounded-sm p-8 col-span-12 md:col-span-8">
            <h1 class="text-xl font-semibold py-2 text-orange-500">Galeria</h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 justify-center justify-items-center gap-4 ">
                @foreach ($imovel->getMedia('posts') as $image)
                <a data-fslightbox href="{{ $image->getUrl() }}" class="aspect-square">
                    {{ $image->img()->attributes(['class' => 'h-32  object-contain   p-0 m-0 transition-transform duration-300 transform-gpu hover:scale-110'])->lazy() }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
        <!-- Start::Relevant-Imovels -->
        <section class="py-16 px-2 sm:px-6 lg:px-24 bg-gray-50 dark:bg-gray-700 font-['Open_Sans'] text-gray-700" itemscope
        itemtype="http://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6" itemprop="name">
            Imóveis relacionados
        </h1>
        <p class="mx-6 mt-2 dark:text-white">
            Imóveis relacionados ao visitado
        </p>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">
            @foreach ($imovel->relectedImovels() as $imovel)
                <li class="p-5 group mr-0" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
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
    </section>
    <!-- End::Relevant-Ads -->
@endsection

@push('js')
@vite(['resources/js/website/welcomeBanner.js','resources/js/website/gallery.js'])
@endpush
