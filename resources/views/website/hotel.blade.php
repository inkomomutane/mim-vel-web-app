@extends('website.layouts.layout')
@section('header')
    <x-website-header solidBg="true" />
@endsection
@section('hero')
    <x-website-hero>
        <x-slot:coverImage>
            @if (!is_null($hotel->hotels->first()->getFirstMedia('hotels')))
                {{ $hotel->hotels->first()->getFirstMedia('hotels')->img()->attributes(['class' => 'absolute object-cover inset-0 w-full h-full']) }}
            @else
                <img src="{{Vite::asset('resources/js/images/placeholder.svg')}}"
                     alt="{{ $hotel->title }}"  class="absolute object-cover inset-0 w-full h-full">
            @endif
        </x-slot:coverImage>
        <x-slot:content>
            <div
                class="px-4 align-middle max-w-screen-xl text-center lg:py-16 lg:px-12"
            >
                <div
                    class="pt-32 text-left m-auto font-extrabold text-4xl text-white md:text-5xl sm:px-16 xl:px-48 dark:text-gray-400"
                >
                    {{$hotel->title}}
                </div>
                <div
                    class="flex  items-center . p-2 text-left m-auto text-lg text-white md:text-xl sm:px-16 xl:px-48 dark:text-gray-400"
                >
                    <svg  width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                        <path d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>  {{$hotel->address}}

            </div>
            </div>
        </x-slot:content>
    </x-website-hero>
@endsection
@section('content')
    <section class="py-8 px-2 sm:px-6 lg:px-24 bg-gradient-to-b  from-gray-200 to-slate-100  grid grid-cols-12 gap-8 text-gray-700">
        <div class=" col-span-12 md:col-span-8 relative h-fit " >
            <div class="bg-white rounded-sm p-4 px-8 mb-2 w-full" >
                <h1 class="text-2xl font-semibold py-2 first-letter:uppercase lowercase">
                    {{ $hotel->title }}
                </h1>
                <div class="flex flex-col mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1" itemprop="address"
                     itemscope itemtype="http://schema.org/PostalAddress">
                   <div class="flex align-middle">
                       <svg class="text-gray-400" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor">
                           <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"
                                   stroke-linecap="round" stroke-linejoin="round"></circle>
                           <path
                               d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                       </svg>
                       <p class="flex font-medium">
                           &nbsp;{{ $hotel->address }}
                       </p>
                   </div>
                    <div class="flex font-medium">
                        {!! $hotel->description !!}
                    </div>

                </div>
            </div>
            <!-- Start::Relevant Hotels -->
            <ul class="grid md:grid-cols-2 gap-10 py-8">
                @foreach ($hotel->hotels as $hotelWithRoom)
                    <li class="splide__slide  group mr-0 grid " itemprop="itemListElement"
                        itemscope itemtype="https://schema.org/ListItem">
                        <article
                            class="!w-full bg-white dark:bg-gray-700  dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-95 hover:shadow-none hover:shadow-gray-400 hover:rounded">
                            <header class="bg-gray-500">
                                @if ($hotelWithRoom->getFirstMedia('hotels'))
                                    {{ $hotelWithRoom->getFirstMedia('hotels')
                                        ?->img()->attributes([
                                            'class' => 'col-span-1 sm:col-span-3  h-64 xl:h-72 w-full object-cover rounded-t',
                                            'alt' => $hotel->title ?? '',
                                        ])->lazy() }}
                                @else
                                    <img class="col-span-1 sm:col-span-3  h-72 sm:h-40 md:h-64 object-cover rounded-t"
                                         src="{{ Vite::asset('resources/js/images/placeholder.svg') }}"
                                         alt="{{ $hotel->title ?? '' }}">
                                @endif

                            </header>

                            <div class="w-full p-4 pb-6 font-['Jost'] text-gray-500 grid justify-items-stretch col-span-3">
                                <div class="flex justify-between">
                                    <h1 class="text-lg font-semibold line-clamp-1 normal-case py-1 first-letter:uppercase">
                                        {{$hotel->title }}
                                    </h1>
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
                                        {{ $hotel->address }}
                                    </p>

                                </div>
                                <div class="grid grid-cols-3 gap-8 mt-2">

                                    <div class="my-2 flex text-gray-500 col-span-2">
                                        &nbsp; <strong>{{ $hotelWithRoom->preco }}</strong>
                                    </div>
                                </div>

                            </div>
                        </article>

                    </li>
                @endforeach
            </ul>
            <!--- Start::Latest-Imovels-Slide-that shown only on small screens -->
        </div>
        <div class=" col-span-12 md:col-span-4 h-fit md:sticky md:top-20  ">
            <div class=" bg-white p-4 px-4 lg:p-8  lg:py-2 w-full grid  ">
                <h1 class="text-base font-semibold  text-orange-500">Partilhar o hotel</h1>
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
            <div class=" bg-white p-4 px-4 lg:p-8 lg:py-2 my-2 w-full  hidden md:grid" >
                <h1 class="text-base font-semibold  text-orange-500">Contacte</h1>
                <div class="py-2 grid grid-cols-1 lg:grid-cols-2">
                    <a href="tel:"
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
                        Mensagem
                    </button>
                </div>
            </div>
        </div>
    </section>
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
                        <form action="" method="post">
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
@push('bottom-butons')
    <div class="sticky  bottom-0  inset-x-0 grid md:hidden grid-cols-2 justify-center z-50">
        <a href="tel:+258849500900"
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
            Mensagem
        </button>
    </div>
@endpush

@push('js')
    @vite(['resources/js/website/welcomeBanner.ts',
    'resources/js/website/gallery.js','resources/js/website/imovel.ts'])
@endpush
