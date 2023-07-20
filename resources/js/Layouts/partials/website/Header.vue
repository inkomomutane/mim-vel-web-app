<script setup lang="ts">
import { changeMenuStatus } from "@/website/header";

const props = defineProps({
    solidBg: {
        type: Boolean,
        default: false,
        required: false,
    },
});

const activeLinkCss =
    "tracking-wide text-orange-500 block text-base font-bold py-2 pr-4 pl-3 rounded lg:bg-transparent lg:text-primary-550 lg:p-0 dark:text-white";
const linkCss = `block  tracking-wide text-base font-medium py-2 pr-4 pl-3 hover:text-primary-400 border-b border-gray-100 hover:bg-gray-50
    lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-550 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white
    dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700`;
</script>
<template>
    <header class="sticky top-0 z-20 w-full">
        <nav
            class="transition delay-150 duration-300 bg-white text-gray-800 text-sm px-8 sm:px-6 lg:px-24 py-3 dark:bg-gray-800 w-full"
            :class="
                solidBg
                    ? ' lg:bg-white lg:text-gray-900 ease-in-out '
                    : ' lg:bg-transparent lg:text-white ease-in-out'
            "
        >
            <div
                class="flex flex-wrap justify-between items-center lg:mx-6 max-w-screen-xl"
            >
                <a :href="route('welcome')" class="flex items-center">
                    <img
                        src="@/images/logo/logo.png"
                        class="mr-3 h-6 sm:h-9"
                        alt="Mimóvel"
                    />
                </a>
                <li class="flex lg:hidden  w-fit justify-center items-center" ><a href="#googtrans/en" >
                            <img src="@/images/en.png" alt="English translation"  class="w-5 h-5">
                        </a></li>
                        <li class="flex lg:hidden  w-fit justify-center items-center" ><a href="#googtrans/fr" >
                            <img src="@/images/fr.png" alt="Francaise translation"  class="w-4 h-4">
                        </a></li>
                        <li class="flex lg:hidden  w-fit justify-center items-center" ><a href="#googtrans/zh-CN" >
                            <img src="@/images/zh.png" alt="Chineses translation"  class="w-5 h-5">
                        </a></li>
                        <li class="flex lg:hidden  w-fit justify-center items-center" ><a href="#googtrans/ur" >
                            <img src="@/images/ur.png" alt="Urdu translation"  class="w-5 h-5">
                        </a></li>
                <section class="flex items-center lg:order-2">

                    <button
                        data-collapse-toggle="mobile-menu-2"
                        @click="changeMenuStatus"
                        type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mobile-menu-2"
                        aria-expanded="false"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <svg
                            class="hidden w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </section>
                <section class="hidden lg:flex menu-traslate-header" id="mobile-menu-2">
                    <ul
                        class="flex flex-col mt-4 lg:flex-row lg:space-x-8 lg:mt-0"
                    >

                    <li class="hidden lg:flex  w-fit justify-center items-center" ><a href="#googtrans/en" >
                            <img src="@/images/en.png" alt="English translation"  class="w-5 h-5">
                        </a></li>
                        <li class="hidden lg:flex  w-fit justify-center items-center" ><a href="#googtrans/fr" >
                            <img src="@/images/fr.png" alt="Francaise translation"  class="w-4 h-4">
                        </a></li>
                        <li class="hidden lg:flex w-fit justify-center items-center" ><a href="#googtrans/zh-CN" >
                            <img src="@/images/zh.png" alt="Chineses translation"  class="w-7 h-5">
                        </a></li>
                        <li class="hidden lg:flex  w-fit justify-center items-center" ><a href="#googtrans/ur" >
                            <img src="@/images/ur.png" alt="Urdu translation"  class="w-7 h-5">
                        </a></li>


                        <li>
                            <a
                                :href="route('welcome')"
                                :class="
                                    route().current('welcome')
                                        ? activeLinkCss
                                        : linkCss
                                "
                            >
                                Início
                            </a>
                        </li>

                        <li>
                            <a
                                v-if="route().current('post.imovel.*')"
                                href=""
                                :class="
                                    route().current('post.imovel.show')
                                        ? activeLinkCss
                                        : linkCss
                                "
                                >Imóvel
                            </a>
                            <a
                                v-else-if="route().current('imoveis')"
                                :href="route('imoveis')"
                                :class="
                                    route().current('imoveis')
                                        ? activeLinkCss
                                        : linkCss
                                "
                            >
                                <span>Todos imoveis</span>
                            </a>
                        </li>
                        <li>
                            <a
                                :href="route('website.about')"
                                :class="
                                    route().current('website.about')
                                        ? activeLinkCss
                                        : linkCss
                                "
                                >Sobre nós</a
                            >
                        </li>
                        <li>
                            <a
                                :href="route('website.contact')"
                                :class="
                                    route().current('website.contact')
                                        ? activeLinkCss
                                        : linkCss
                                "
                                >Contactos</a
                            >
                        </li>

                        <li v-if="route().current('website.terms')">
                            <a
                                :href="route('website.terms')"
                                :class="
                                    route().current('website.terms')
                                        ? activeLinkCss
                                        : linkCss
                                "
                                >Termos e condições</a
                            >
                        </li>
                        <li v-if="route().current('website.policy')">
                            <a
                                href="route('website.policy')"
                                :class="
                                    route().current('website.policy')
                                        ? activeLinkCss
                                        : linkCss
                                "
                                >Politicas de privacidade</a
                            >
                        </li>

                    </ul>
                </section>
            </div>
        </nav>
    </header>
</template>
