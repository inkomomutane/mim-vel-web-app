<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import Dropdown from "primevue/dropdown";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import { PropType } from "vue";
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination } from "swiper";
import 'swiper/css';

import 'swiper/css/pagination';



const props = defineProps({
    imovel: {
        type: Object,
        required: false,
    },
    globals:Object as PropType<App.Data.PageData>
});

const selectedCity = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);

</script>
<template>
    <GuestLayout>
        <Head title="Mimóvel" />

        <PageHeader />
        <div class="relative">
            <ResponsiveImage class-name="absolute object-cover inset-0 w-full h-full"  v-if="$page.props.globals != null" :responsive="$page.props.globals.homeMedia ?? undefined" />
            <div class="relative bg-slate-950 bg-opacity-40 h-full pt-20">
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                <div class="flex flex-col items-center justify-between xl:flex-row">
                    <div
                            class=" px-4 mx-auto max-w-screen-xl text-center  lg:px-12"
                        >
                            <h1
                                class="text-2xl font-extrabold tracking-tight leading-none text-white md:text-3xl dark:text-white"
                            >
                                <img
                                    src="@/images/logo/logo.png"
                                    class="mx-auto mt-10  sm:m-auto w-60"
                                    alt="Logo"
                                />
                            </h1>
                            <p
                                class="my-8 text-xs font-normal text-white lg:text-sm sm:px-16 xl:px-48 dark:text-gray-400"
                            >
                            <div class="bg-slate-50 p-8 ">
                                    <Dropdown v-model="selectedCity"
                                    :options="cities" optionLabel="name"
                                    placeholder="Select a City" class=""
                                    />
                                    <Dropdown v-model="selectedCity"
                                    :options="cities" optionLabel="name"
                                    placeholder="Select a City" class="  border border-slate-600 p-2 px-6 text-slate-400 bg-white"
                                    />

                                    <Dropdown v-model="selectedCity"
                                    :options="cities" optionLabel="name"
                                    placeholder="Select a City" class=" mx-5 border border-slate-600 p-2 px-6 text-slate-400 bg-white"
                                    />

                                </div>
                            </p>
                        </div>
                </div>
            </div>
            </div>
        </div>
        <section class="py-16 px-8  sm:px-6 lg:px-24 bg-white font-['Open_Sans']">
            <h2 class="font-semibold text-2xl text-slate-700 mx-6" >Imóveis mais destacados</h2>
            <p class="mx-6 mt-2">Imóveis mais visitados e visualizados no website.</p>
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">
                    <li v-for="i in 6" :key="i" class="p-5">
                            <div class="w-full  dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <ResponsiveImage class-name="w-full object-cover h-56"
                                      v-if="$page.props.globals.homeMedia != null" :responsive="$page.props.globals.contactMedia ?? undefined" />
                                </a>
                                <div class="p-1">
                                    <p class=" font-normal text-base text-gray-900 dark:text-gray-400 tracking-wide">Vende-se Casa Em Chamissava/Katembe.</p>

                                    <a href="#">
                                        <h5 class="mb-1 text-xl font-semibold  space-x-2 tracking-wide text-gray-600 dark:text-white">
                                            <span class="text-sm">(MZN)</span> 3,900,000.00
                                        </h5>
                                    </a>
                                    <p class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400">Here are the biggest.</p>
                                </div>
                            </div>

                    </li>
                </ul>
                <div class="flex">
                    <a href="" class="w-screen text-white bg-orange-400 hover:bg-orange-500
                    focus:ring-4 focus:ring-orange-300 font-bold  text-sm py-2.5 mr-2 mb-2
                     dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none
                    dark:focus:ring-slate-800 rounded text-center">Ver todos imóveis</a>
                </div>
        </section>
        <section class="pt-16 px-8  sm:px-6 lg:px-24 bg-gray-50 font-['Open_Sans']">
            <h2 class="font-semibold text-2xl text-slate-700 mx-6" >Anúncios destacados</h2>
            <p class="mx-6 mt-2">Imóveis mais visitados e visualizados no website.</p>
            <div class="flex p-5 pb-0">

                <Swiper :pagination="{
                    clickable: true,
                    }"    :loop="true" :grabCursor="true"  :autoplay="{
                    delay: 2500,
                    disableOnInteraction: false,
                    }"
                    :modules="[Pagination]"
                     class="mySwiper">


                    <swiper-slide>
                        <ResponsiveImage class-name="w-full object-cover h-72"
                                      v-if="$page.props.globals.homeMedia != null" :responsive="$page.props.globals.contactMedia ?? undefined" />
                    </swiper-slide>
                    <swiper-slide>
                        <ResponsiveImage class-name="w-full object-cover h-72"
                                      v-if="$page.props.globals.homeMedia != null" :responsive="$page.props.globals.contactMedia ?? undefined" />
                    </swiper-slide>
                </Swiper>


    </div>
        </section>
        <section class="py-16 px-8  sm:px-6 lg:px-24 bg-white font-['Open_Sans']">
            <h2 class="font-semibold text-2xl text-slate-700 mx-6" >Imóveis publicados recentemente</h2>
            <p class="mx-6 mt-2">Imóveis adicionados recentimente no website.</p>
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">
                    <li v-for="i in 6" :key="i" class="p-5">
                            <div class="w-full  dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <ResponsiveImage class-name="w-full object-cover h-56"
                                      v-if="$page.props.globals.homeMedia != null" :responsive="$page.props.globals.contactMedia ?? undefined" />
                                </a>
                                <div class="p-1">
                                    <p class=" font-normal text-base text-gray-900 dark:text-gray-400 tracking-wide">Vende-se Casa Em Chamissava/Katembe.</p>

                                    <a href="#">
                                        <h5 class="mb-1 text-xl font-semibold  space-x-2 tracking-wide text-gray-600 dark:text-white">
                                            <span class="text-sm">(MZN)</span> 3,900,000.00
                                        </h5>
                                    </a>
                                    <p class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400">Here are the biggest.</p>
                                </div>
                            </div>

                    </li>
                </ul>
                <div class="flex">
                    <a href="" class="w-screen text-white bg-orange-400 hover:bg-orange-500
                    focus:ring-4 focus:ring-orange-300 font-bold  text-sm py-2.5 mr-2 mb-2
                     dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none
                    dark:focus:ring-slate-800 rounded text-center">Ver todos imóveis</a>
                </div>
        </section>
        <section class="py-16 px-8  sm:px-6 lg:px-24 bg-gray-50 font-['Open_Sans']">
            <h2 class="font-semibold text-2xl text-slate-700 mx-6 mb-2" >No Mimóvel vai encontrar</h2>
            <div class="flex p-5">
                <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full justify-between">
                    <li v-for="i in 16" :key="i">
                        <article class="text-center bg-white w-fit mx-auto p-8 rounded-2xl shadow-md border-gray-500 border-2 ">
                            <svg class="w-16 h-16 mx-auto text-slate-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 7v11m0 -4h18m0 4v-8a2 2 0 0 0 -2 -2h-8v6"></path>
                                <circle cx="7" cy="10" r="1"></circle>
                                </svg>
                        </article>
                        <p class="text-center my-4 text-xl  font-medium  text-gray-700">Quartos</p>
                    </li>
                </ul>
            </div>
        </section>
    </GuestLayout>
</template>


