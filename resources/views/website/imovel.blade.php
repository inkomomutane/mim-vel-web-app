@extends('website.layouts.layout')

@section('seo')
    {!! seo()->for($imovel) !!}
@endsection
@section('header')
    <x-website-header solidBg="true" />
@endsection
@section('hero')
    <section class="relative bg-gray-950 pt-14 px-0  ">
        <div class="splide default " data-splide='{"type":"loop","autoplay":true,"pagination":false}'>
            <div class="splide__track w-full">
                <ul class="splide__list">
                @foreach ($imovel->getMedia('posts') as $banner)
                    <li class="splide__slide !w-screen" data-splide-interval="3000">
                        <!-- Hero -->
                        <div class="w-full" style="background-image: url('{{ $banner->responsiveImages()->getPlaceholderSvg() }}')
                        ;background-repeat: no-repeat;  background-size: cover; ">
                            <div class="bg-gradient-to-b from-violet-600/[.15] via-transparent ">
                                <div
                                    class="!w-screen mx-auto h-72 md:h-80 lg:h-96 sm:px-6 lg:px-8  grid justify-items-center">
                                    {{ $banner->img()->attributes(['class' => 'h-72 md:h-80 lg:h-96 object-contain w-auto'])->lazy() }}
                                </div>
                            </div>
                        </div>
                        <!-- End Hero -->
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </section>
    <section class="!max-h-16">
        <div    id="thumbnail-slide"    class="relative splide "
        aria-label="Carousel thumbs"
        >
        <div class="splide__track !h-16 w-full">
                <ul class="splide__list  justify-center items-center">
                    @foreach ($imovel->getMedia('posts') as $thumb)
                    <li class="splide__slide w-28 h-12 my-auto ">
                        {{ $thumb->img()->attributes(['class' => 'h-full w-full   object-fill '])->lazy() }}
                    </li>
                    @endforeach
                </ul>
        </div>
    </div>
    </section>

@endsection

@section('content')


    <section class="px-4 md:px-24 bg-slate-100 p-16 grid grid-cols-12 gap-8 text-gray-700">
        <div class=" col-span-12 md:col-span-8 relative h-fit " >
            <div class="relative h-fit">
                @if(session('success'))
                <div id="alert-border-3" class="flex p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                </div>
            @elseif(session('error'))
            <div id="alert-border-2" class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="ml-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
            </div>
            @endif

            @if ($errors->any())
            <div id="alert-border-2" class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="ml-3 text-sm font-medium">
                    <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
            </div>
            <div class="bg-white rounded-sm p-8 mb-2 w-full" data-aos-offset="10" data-aos="fade-in" data-aos-duration="4000>
                <h1 class="text-2xl font-semibold py-2 first-letter:uppercase lowercase">
                    {{ $imovel->imovelFor->slug_text . ' ' . $imovel->titulo }}</h1>
                <div class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1" itemprop="address"
                    itemscope itemtype="http://schema.org/PostalAddress">
                    <svg class="text-gray-400" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"></circle>
                        <path
                            d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
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
                <div>
                    <span
                        class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900
                    dark:text-yellow-300 uppercase">
                        {{ $imovel->regraDeNegocio->name ?? '' }}
                    </span>

                    <span
                        class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900
                     dark:text-yellow-300 uppercase">
                        {{ $imovel->intermediationRule->code ?? '' }}
                    </span> &nbsp;

                </div>
            </div>
            <div class="bg-white rounded-sm p-8 mb-4 w-full grid grid-cols-3 gap-4" data-aos-offset="50" data-aos="fade-right" data-aos-duration="1000">
                @if ($imovel->tipo_de_imovel)
                    <div class="text-sm py-1">
                        Tipo: <strong>&nbsp; {{ $imovel->tipo_de_imovel->nome }}</strong>
                    </div>
                @endif

                @if ($imovel->condicao)
                    <div class="text-sm  py-1">
                        Condição : <strong>&nbsp; {{ $imovel->condicao->nome }}</strong>
                    </div>
                @endif


                @if ($imovel->ano)
                    <div class="text-sm py-1">
                        Ano de construção : <strong>&nbsp; {{ $imovel->ano }}</strong>
                    </div>
                @endif

                @if ($imovel->area)
                    <div class="text-sm py-1">
                        Área (m²) : <strong>&nbsp; {{ $imovel->area }}</strong>
                    </div>
                @endif

                @if ($imovel->andares)
                    <div class="text-sm py-1">
                        Andares : <strong>&nbsp; {{ $imovel->andares }}</strong>
                    </div>
                @endif

                @if ($imovel->quartos)
                    <div class="text-sm py-1">
                        Quartos : <strong>&nbsp; {{ $imovel->quartos }}</strong>
                    </div>
                @endif

                @if ($imovel->suites)
                    <div class="text-sm py-1">
                        Suites : <strong>&nbsp; {{ $imovel->suites }}</strong>
                    </div>
                @endif

                @if ($imovel->banheiros)
                    <div class="text-sm py-1">
                        Banheiros : <strong>&nbsp; {{ $imovel->banheiros }}</strong>
                    </div>
                @endif

                @if ($imovel->piscinas)
                    <div class="text-sm py-1">
                        Piscinas : <strong>&nbsp; {{ $imovel->piscinas }}</strong>
                    </div>
                @endif

                @if ($imovel->garagens)
                    <div class="text-sm py-1">
                        Garagens : <strong>&nbsp; {{ $imovel->garagens }}</strong>
                    </div>
                @endif
            </div>
            <div class="bg-white rounded-sm p-8 mb-4 w-full" data-aos="fade-left" data-aos-offset="50" data-aos-duration="1000">
                <h1 class="text-xl font-semibold py-2 text-orange-500">Descrição</h1>
                {!! $imovel->descricao !!}
            </div>
            <div class="bg-white rounded-sm p-8 mb-4 w-full" data-aos="fade-right"  data-aos-offset="50" data-aos-duration="1000">
                <h1 class="text-xl font-semibold py-2 text-orange-500">Galeria</h1>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 justify-center justify-items-center gap-4 ">
                    @foreach ($imovel->getMedia('posts') as $image)
                        <a data-fslightbox href="{{ $image->getUrl() }}" class="aspect-square">
                            {{ $image->img()->attributes(['class' => 'h-32  object-contain   p-0 m-0 transition-transform duration-300 transform-gpu hover:scale-110'])->lazy() }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="bg-white rounded-sm p-8 mb-4 w-full" id="comments" data-aos-offset="50" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="text-xl font-semibold py-2 text-orange-500">Comentários</h1>

                <div>
                    @if (session('success'))
                        <div id="alert-border-3"
                            class="flex p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                            role="alert">
                            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                        </div>
                    @elseif(session('error'))
                        <div id="alert-border-2"
                            class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                            role="alert">
                            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('post.imovel.comment', ['imovel' => $imovel->slug]) }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <input type="text" name="nome" id="nome"
                                class="bg-gray-50 border border-gray-300 text-gray-900
                           text-sm rounded-sm focus:ring-gray-400 focus:border-gray-500 block
                           w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                placeholder="Teu nome">
                            @error('nome')
                                <span class="text-red-500 text-sm font-semibold ">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-6">
                            <textarea id="comentario" name="comentario"
                                class="bg-gray-50 border border-gray-300 text-gray-900
                            text-sm rounded-sm focus:ring-gray-400 focus:border-gray-500 block
                            w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                             dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                placeholder="comentario"></textarea>
                            @error('nome')
                                <span class="text-red-500 text-sm font-semibold ">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="flex-1 text-white bg-gray-500 hover:bg-gray-800/90
                        focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-sm
                        text-sm px-5 py-2.5 text-center inline-flex items-center
                        dark:focus:ring-gray-800 mr-2 mb-2">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z">
                                </path>
                            </svg>
                            Comentar</button>
                    </form>
                </div>
                @if ($imovel->comentarios->isNotEmpty())
                    @foreach ($imovel->comentarios->sortByDesc('created_at') as $comment)
                        <div class="flex-col w-full py-1 mx-auto mt-3 bg-gray-50 sm:px-4  md:px-4  mb-2 ">
                            <div class="flex flex-row md-10 my-3 ">
                                <svg class="w-12 h-12 fill-gray-400 " xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 32 32">
                                    <defs></defs>
                                    <path d="M16,8a5,5,0,1,0,5,5A5,5,0,0,0,16,8Z" transform="translate(0 0)"></path>
                                    <path
                                        d="M16,2A14,14,0,1,0,30,16,14.0158,14.0158,0,0,0,16,2Zm7.9925,22.9258A5.0016,5.0016,0,0,0,19,20H13a5.0016,5.0016,0,0,0-4.9925,4.9258,12,12,0,1,1,15.985,0Z"
                                        transform="translate(0 0)"></path>
                                    <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1"
                                        width="32" height="32" style="fill: none"></rect>
                                </svg>
                                <div class="flex-col mt-1">
                                    <div class="flex items-center flex-1 px-4 font-bold leading-tight">
                                        {{ $comment->nome ?? 'Anónimo' }}
                                        <span
                                            class="ml-2 text-xs font-normal text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">
                                        {{ $comment->comentario }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class=" col-span-12 md:col-span-4 h-fit md:sticky md:top-20  ">
            <div class=" bg-white px-4 lg:p-8  py-4 w-full grid  ">
                <h1 class="text-base font-semibold  text-orange-500">Partilhar o imóvel</h1>
                <div class="py-2 grid grid-cols-1 lg:grid-cols-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"
                        class=" text-white bg-[#3b5998] hover:bg-blue-900
                    focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-sm
                    text-sm px-5 py-2.5 text-center inline-flex items-center
                    dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd"
                                d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                clip-rule="evenodd" />
                        </svg>
                        Facebook
                    </a>
                    <a href="https://wa.me/?text={{ Request::url() }}" target="_blank"
                        class=" text-white bg-[#25d366] hover:bg-green-600
                  focus:ring-4 focus:outline-none focus:ring-[#25d366]/50 font-medium rounded-sm
                  text-sm px-5 py-2.5 text-center inline-flex items-center
                  dark:focus:ring-[#25d366]/55 mr-2 mb-2">
                        <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                            </path>
                        </svg>
                        Whatsaap
                    </a>
                </div>
            </div>
            <div class=" bg-white px-4 lg:p-8 py-2 my-2 w-full  hidden md:grid" data-aos-offset="10" data-aos="fade-up" data-aos-duration="4000>
                <h1 class="text-base font-semibold  text-orange-500">Contactar o corretor</h1>
                <div class="py-2 grid grid-cols-1 lg:grid-cols-2">
                    <a href="tel:{{ $imovel->corretor->contacto }}"
                        class=" text-white bg-gray-500 hover:bg-gray-800/90
                focus:ring-0 focus:outline-none focus:ring-gray-800 font-medium rounded-sm
                text-sm px-5 py-2.5 text-center inline-flex items-center
                dark:focus:ring-gray-800 mr-2 mb-2">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.5 4.842C15.976 4.337 14.146 4 12 4c-2.145 0-3.976.337-5.5.842m11 0c3.021 1 4.835 2.66 5.5 3.658L20.5 11l-3-2V4.842zm-11 0c-3.021 1-4.835 2.66-5.5 3.658L3.5 11l3-2V4.842zM10 7v3m0 0-5.414 5.414A2 2 0 0 0 4 16.828V18a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1.172a2 2 0 0 0-.586-1.414L14 10m-4 0h4m0 0V7">
                            </path>
                            <circle cx="12" cy="15" r="2" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                        </svg>
                        Ligar
                    </a>
                    <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="text-white bg-gray-500 hover:bg-gray-800/90
                focus:ring-0 focus:outline-none focus:ring-gray-800 font-medium rounded-sm
                text-sm px-5 py-2.5 text-center inline-flex items-center
                dark:focus:ring-gray-800 mr-2 mb-2">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--! Font Awesome Free 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z">
                            </path>
                        </svg>
                        Mensangem
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Start::Relevant-Imovels -->
    <section   class="py-16 px-2 sm:px-6 lg:px-24 bg-gray-50 dark:bg-gray-700 font-['Open_Sans'] text-gray-700" itemscope
        itemtype="http://schema.org/ItemList">
        <h1 class="font-semibold text-2xl text-slate-700 dark:text-white mx-6" itemprop="name">
            Imóveis relacionados
        </h1>
        <p class="mx-6 mt-2 dark:text-white">
            Imóveis relacionados ao visitado
        </p>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">
            @foreach ($imovel->relectedImovels() as $imovel)
                <li class="p-5 group mr-0" data-aos="fade-up" data-aos-duration="{{  200 + ($loop->index * 100 )   }}" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
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

    <div class="fixed inset-x-0 bottom-0 grid md:hidden grid-cols-2 justify-center z-50">
        <a href="tel:{{ $imovel->corretor->contacto }}"
            class="flex bg-orange-500 hover:bg-orange-400 text-white border-r border-white text-lg font-semibold text-center py-4 px-4 ">
            <svg class="w-5 h-5 mr-2 mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.5 4.842C15.976 4.337 14.146 4 12 4c-2.145 0-3.976.337-5.5.842m11 0c3.021 1 4.835 2.66 5.5 3.658L20.5 11l-3-2V4.842zm-11 0c-3.021 1-4.835 2.66-5.5 3.658L3.5 11l3-2V4.842zM10 7v3m0 0-5.414 5.414A2 2 0 0 0 4 16.828V18a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1.172a2 2 0 0 0-.586-1.414L14 10m-4 0h4m0 0V7">
                </path>
                <circle cx="12" cy="15" r="2" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"></circle>
            </svg>
            Ligar

        </a>
        <button type="button"  data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="flex bg-orange-500 hover:bg-orange-400 text-white py-4 px-4 text-lg font-semibold text-center">
            <svg class="w-5 h-5 mr-2 mt-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path
                    d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z">
                </path>
            </svg>
            Mensangem
        </button>
    </div>

    <section>
  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative transition duration-150 ease-in-out bg-white rounded-sm shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                <form action="{{ route('post.imovel.message',[
                    'imovel' =>$imovel->slug
                ])}}" method="post">
                    @csrf
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-2 justify-items-stretch">
                    <div class="mb-2">
                      <label for="nome_do_cliente">Teu nome <strong class="-order-2 text-red-500">*</strong></label>
                      <input type="text" name="nome_do_cliente" id="nome_do_cliente" class="h-10 border mt-1 focus:ring-1
                       focus:ring-gray-500 border-gray-500 focus:border-gray-500 rounded p-6
                       px-4 w-full " value="" placeholder="Teu nome" />
                       @error('nome_do_cliente')
                       <span class="text-red-500 text-sm font-semibold ">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-2">
                      <label for="email">Teu email</label>
                      <input type="text" name="email" id="email" class="h-10 border mt-1
                       rounded p-6 px-4 w-full  focus:ring-1
                      focus:ring-gray-500 border-gray-500 focus:border-gray-500" value="" placeholder="Exemplo@mimovel.com" />
                      @error('email')
                       <span class="text-red-500 text-sm font-semibold ">{{ $message }}</span>
                      @enderror

                    </div>
                    <div class="md:col-span-2 mb-2">
                      <label for="contacto">Contacto</label>
                      <input type="text" name="contacto" id="contacto" class="h-10 border mt-1 rounded p-6 px-4 w-full
                        focus:ring-1 border-gray-500
                       focus:ring-gray-400 focus:border-gray-500" value="" placeholder="Contacto" />
                       @error('contacto')
                       <span class="text-red-500 text-sm font-semibold ">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="md:col-span-2 mb-2">
                      <label for="mensagem">Mensagem</label>
                      <div class=" flex  items-center mt-1">
                          <textarea name="mensagem" id="mensagem" cols="10" rows="5" class=" px-4 appearance-none outline-none
                          text-gray-800 w-full bg-transparent focus:ring-1 border-gray-500
                          focus:ring-gray-500 focus:border-gray-500 rounded" placeholder="Mensagem..." ></textarea>
                      </div>
                      @error('mensagem')
                      <span class="text-red-500 text-sm font-semibold ">{{ $message }}</span>
                     @enderror
                    </div>
                    <div class="md:col-span-2 text-right mb-2">
                      <div class="">
                        <button type="submit" class="bg-orange-400 hover:ring-1 hover:ring-orange-500 text-white font-bold py-3 px-4 rounded-sm w-full">Enviar mensagem</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>

    </section>
@endsection
@push('js')
    @vite(['resources/js/website/welcomeBanner.ts',
    'resources/js/website/gallery.js','resources/js/website/imovel.ts'])

@endpush
