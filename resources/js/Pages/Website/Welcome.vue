<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import Dropdown from "primevue/dropdown";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import { PropType } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination } from "swiper";
import "swiper/css";
import "swiper/css/pagination";

const props = defineProps({
    imovel: {
        type: Object,
        required: false,
    },
    globals: Object as PropType<App.Data.PageData>,
});

const selectedItem = ref();
const items = ref([]);
</script>

<template>
    <GuestLayout>
        <Head title="Mimóvel" />

        <PageHeader />
        <section class="relative">
            <ResponsiveImage
                class-name="absolute object-cover inset-0 w-full h-full"
                v-if="$page.props.globals != null"
                :responsive="$page.props.globals.homeMedia ?? undefined"
            />
            <div class="relative bg-slate-950 bg-opacity-40 h-full pt-20">
                <div
                    class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20"
                >
                    <div
                        class="flex flex-col items-center justify-between xl:flex-row"
                    >
                        <div class="px-2 text-center w-full md:px-16">
                            <h1
                                class="text-2xl font-extrabold tracking-tight leading-none text-white md:text-3xl dark:text-white"
                            >
                                <img
                                    src="@/images/logo/logo.png"
                                    class="mx-auto mt-10 sm:m-auto w-60"
                                    alt="Mimóvel"
                                />
                            </h1>
                            <div
                                class="my-8 rounded-sm text-xs font-normal text-white lg:text-sm dark:text-gray-400 bg-gray-50 p-8 grid font-['Open_Sans']"
                            >
                                <div class="grid grid-cols-1 md:grid-cols-4">
                                    <div
                                        class="grid grid-cols-1 md:grid-cols-3 col-span-3"
                                    >
                                        <Dropdown
                                            v-model="selectedItem"
                                            :options="items"
                                            optionLabel="name"
                                            placeholder="Tipo de imóvel"
                                            class="border border-gray-400 p-2 px-4 text-gray-600 bg-white hover:bg-gray-100 focus:bg-gray-200 hover:text-gray-600 mx-2 h-fit rounded-sm my-1"
                                        >
                                            <template #value="slotProps">
                                                <div v-if="slotProps.value">
                                                    <div
                                                        class="focus-visible:ring-0 focus-visible:border-none"
                                                    >
                                                        {{
                                                            slotProps.value.name
                                                        }}
                                                    </div>
                                                </div>
                                                <span v-else class="">
                                                    {{ slotProps.placeholder }}
                                                </span>
                                            </template>
                                            <template #option="slotProps">
                                                <div
                                                    class="p-2 hover:bg-gray-200 my-1 hover:rounded-sm"
                                                    :class="
                                                        slotProps.option ==
                                                        selectedItem
                                                            ? 'bg-gray-300 rounded-sm hover:rounded-sm text-slate-950 hover:bg-gray-300'
                                                            : ''
                                                    "
                                                >
                                                    <div class="mx-2">
                                                        {{
                                                            slotProps.option
                                                                .name
                                                        }}
                                                    </div>
                                                </div>
                                            </template>
                                        </Dropdown>
                                        <Dropdown
                                            v-model="selectedItem"
                                            :options="items"
                                            optionLabel="name"
                                            placeholder="Condição do imóvel"
                                            class="border border-gray-400 p-2 px-4 text-gray-600 bg-white hover:bg-gray-100 focus:bg-gray-200 hover:text-gray-600 mx-2 h-fit rounded-sm my-1"
                                        >
                                            <template #value="slotProps">
                                                <div v-if="slotProps.value">
                                                    <div
                                                        class="focus-visible:ring-0 focus-visible:border-none"
                                                    >
                                                        {{
                                                            slotProps.value.name
                                                        }}
                                                    </div>
                                                </div>
                                                <span v-else class="">
                                                    {{ slotProps.placeholder }}
                                                </span>
                                            </template>
                                            <template #option="slotProps">
                                                <div
                                                    class="p-2 hover:bg-gray-200 my-1 hover:rounded-sm"
                                                    :class="
                                                        slotProps.option ==
                                                        selectedItem
                                                            ? 'bg-gray-300 rounded-sm hover:rounded-sm text-slate-950 hover:bg-gray-300'
                                                            : ''
                                                    "
                                                >
                                                    <div class="mx-2">
                                                        {{
                                                            slotProps.option
                                                                .name
                                                        }}
                                                    </div>
                                                </div>
                                            </template>
                                        </Dropdown>
                                        <Dropdown
                                            v-model="selectedItem"
                                            :options="items"
                                            optionLabel="name"
                                            placeholder="Estado do imóvel"
                                            class="border border-gray-400 p-2 px-4 text-gray-600 bg-white hover:bg-gray-100 focus:bg-gray-200 hover:text-gray-600 mx-2 h-fit rounded-sm my-1"
                                        >
                                            <template #value="slotProps">
                                                <div v-if="slotProps.value">
                                                    <div
                                                        class="focus-visible:ring-0 focus-visible:border-none"
                                                    >
                                                        {{
                                                            slotProps.value.name
                                                        }}
                                                    </div>
                                                </div>
                                                <span v-else class="">
                                                    {{ slotProps.placeholder }}
                                                </span>
                                            </template>
                                            <template #option="slotProps">
                                                <div
                                                    class="p-2 hover:bg-gray-200 my-1 hover:rounded-sm"
                                                    :class="
                                                        slotProps.option ==
                                                        selectedItem
                                                            ? 'bg-gray-300 rounded-sm hover:rounded-sm text-slate-950 hover:bg-gray-300'
                                                            : ''
                                                    "
                                                >
                                                    <div class="mx-2">
                                                        {{
                                                            slotProps.option
                                                                .name
                                                        }}
                                                    </div>
                                                </div>
                                            </template>
                                        </Dropdown>
                                    </div>
                                    <div class="grid">
                                        <button
                                            type="button"
                                            class="text-white bg-orange-500 hover:bg-orange-400 font-semibold text-sm px-5 py-2 text-center inline-flex mx-2 items-center dark:focus:ring-orange-500 my-1"
                                        >
                                            <svg
                                                class="w-4 h-4 mr-2 -ml-1"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z"
                                                    fill="currentColor"
                                                ></path>
                                            </svg>
                                            Pesquisar
                                        </button>
                                    </div>
                                </div>
                                <div
                                    class="hidden lg:visible lg:grid grid-cols-4 mt-2"
                                >
                                    <Dropdown
                                        v-model="selectedItem"
                                        :options="items"
                                        optionLabel="name"
                                        placeholder="Localização do imóvel"
                                        class="border border-gray-400 p-2 px-4 text-gray-600 bg-white hover:bg-gray-100 focus:bg-gray-200 hover:text-gray-600 mx-2 h-fit rounded-sm col-span-2"
                                    >
                                        <template #value="slotProps">
                                            <div v-if="slotProps.value">
                                                <div
                                                    class="focus-visible:ring-0 focus-visible:border-none"
                                                >
                                                    {{ slotProps.value.name }}
                                                </div>
                                            </div>
                                            <span v-else class="">
                                                {{ slotProps.placeholder }}
                                            </span>
                                        </template>
                                        <template #option="slotProps">
                                            <div
                                                class="p-2 hover:bg-gray-200 my-1 hover:rounded-sm"
                                                :class="
                                                    slotProps.option ==
                                                    selectedItem
                                                        ? 'bg-gray-300 rounded-sm hover:rounded-sm text-slate-950 hover:bg-gray-300'
                                                        : ''
                                                "
                                            >
                                                <div class="mx-2">
                                                    {{ slotProps.option.name }}
                                                </div>
                                            </div>
                                        </template>
                                    </Dropdown>
                                    <Dropdown
                                        v-model="selectedItem"
                                        :options="items"
                                        optionLabel="name"
                                        placeholder="Tipo de imóvel"
                                        class="border border-gray-400 p-2 px-4 text-gray-600 bg-white hover:bg-gray-100 focus:bg-gray-200 hover:text-gray-600 mx-2 h-fit rounded-sm col-span-2"
                                    >
                                        <template #value="slotProps">
                                            <div v-if="slotProps.value">
                                                <div
                                                    class="focus-visible:ring-0 focus-visible:border-none"
                                                >
                                                    {{ slotProps.value.name }}
                                                </div>
                                            </div>
                                            <span v-else class="">
                                                {{ slotProps.placeholder }}
                                            </span>
                                        </template>
                                        <template #option="slotProps">
                                            <div
                                                class="p-2 hover:bg-gray-200 my-1 hover:rounded-sm"
                                                :class="
                                                    slotProps.option ==
                                                    selectedItem
                                                        ? 'bg-gray-300 rounded-sm hover:rounded-sm text-slate-950 hover:bg-gray-300'
                                                        : ''
                                                "
                                            >
                                                <div class="mx-2">
                                                    {{ slotProps.option.name }}
                                                </div>
                                            </div>
                                        </template>
                                    </Dropdown>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section
            class="py-16 px-8 sm:px-6 lg:px-24 bg-white font-['Open_Sans']"
        >
            <h2 class="font-semibold text-2xl text-slate-700 mx-6">
                Imóveis mais destacados
            </h2>
            <p class="mx-6 mt-2">
                Imóveis mais visitados e visualizados no website.
            </p>
            <ul
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between"
            >
                <li v-for="i in 6" :key="i" class="p-5">
                    <div class="w-full dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <ResponsiveImage
                                class-name="w-full object-cover h-56"
                                v-if="$page.props.globals.homeMedia != null"
                                :responsive="
                                    $page.props.globals.contactMedia ??
                                    undefined
                                "
                            />
                        </a>
                        <div class="p-1">
                            <p
                                class="font-normal text-base text-gray-900 dark:text-gray-400 tracking-wide"
                            >
                                Vende-se Casa Em Chamissava/Katembe.
                            </p>

                            <a href="#">
                                <h5
                                    class="mb-1 text-xl font-semibold space-x-2 tracking-wide text-gray-600 dark:text-white"
                                >
                                    <span class="text-sm">(MZN)</span>
                                    3,900,000.00
                                </h5>
                            </a>
                            <p
                                class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400"
                            >
                                Here are the biggest.
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="flex">
                <a
                    href=""
                    class="w-screen text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 rounded text-center"
                    >Ver todos imóveis</a
                >
            </div>
        </section>
        <section
            class="pt-16 px-8 sm:px-6 lg:px-24 bg-gray-50 font-['Open_Sans']"
        >
            <h2 class="font-semibold text-2xl text-slate-700 mx-6">
                Anúncios destacados
            </h2>
            <p class="mx-6 mt-2">
                Imóveis mais visitados e visualizados no website.
            </p>
            <div class="flex p-5 pb-0">
                <Swiper
                    :pagination="{
                        clickable: true,
                    }"
                    :loop="true"
                    :grabCursor="true"
                    :autoplay="{
                        delay: 2500,
                        disableOnInteraction: false,
                    }"
                    :modules="[Pagination]"
                    class="mySwiper"
                >
                    <swiper-slide>
                        <ResponsiveImage
                            class-name="w-full object-cover h-72"
                            v-if="$page.props.globals.homeMedia != null"
                            :responsive="
                                $page.props.globals.contactMedia ?? undefined
                            "
                        />
                    </swiper-slide>
                    <swiper-slide>
                        <ResponsiveImage
                            class-name="w-full object-cover h-72"
                            v-if="$page.props.globals.homeMedia != null"
                            :responsive="
                                $page.props.globals.contactMedia ?? undefined
                            "
                        />
                    </swiper-slide>
                </Swiper>
            </div>
        </section>
        <section
            class="py-16 px-8 sm:px-6 lg:px-24 bg-white font-['Open_Sans']"
        >
            <h2 class="font-semibold text-2xl text-slate-700 mx-6">
                Imóveis publicados recentemente
            </h2>
            <p class="mx-6 mt-2">
                Imóveis adicionados recentimente no website.
            </p>
            <ul
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between"
            >
                <li v-for="i in 6" :key="i" class="p-5">
                    <div class="w-full dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <ResponsiveImage
                                class-name="w-full object-cover h-56"
                                v-if="$page.props.globals.homeMedia != null"
                                :responsive="
                                    $page.props.globals.contactMedia ??
                                    undefined
                                "
                            />
                        </a>
                        <div class="p-1">
                            <p
                                class="font-normal text-base text-gray-900 dark:text-gray-400 tracking-wide"
                            >
                                Vende-se Casa Em Chamissava/Katembe.
                            </p>

                            <a href="#">
                                <h5
                                    class="mb-1 text-xl font-semibold space-x-2 tracking-wide text-gray-600 dark:text-white"
                                >
                                    <span class="text-sm">(MZN)</span>
                                    3,900,000.00
                                </h5>
                            </a>
                            <p
                                class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400"
                            >
                                Here are the biggest.
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="flex">
                <a
                    href=""
                    class="w-screen text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-bold text-sm py-2.5 mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800 rounded text-center"
                    >Ver todos imóveis</a
                >
            </div>
        </section>
        <section
            class="py-16 px-8 sm:px-6 lg:px-24 bg-gray-50 font-['Open_Sans']"
        >
            <h2 class="font-semibold text-2xl text-slate-700 mx-6 mb-2">
                No Mimóvel vai encontrar
            </h2>
            <div class="flex p-5">
                <ul
                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full justify-between"
                >
                    <li v-for="i in 16" :key="i">
                        <article
                            class="text-center bg-white w-fit mx-auto p-8 rounded-2xl shadow-md border-gray-500 border-2"
                        >
                            <svg
                                class="w-16 h-16 mx-auto text-slate-500"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    d="M3 7v11m0 -4h18m0 4v-8a2 2 0 0 0 -2 -2h-8v6"
                                ></path>
                                <circle cx="7" cy="10" r="1"></circle>
                            </svg>
                        </article>
                        <p
                            class="text-center my-4 text-xl font-medium text-gray-700"
                        >
                            Quartos
                        </p>
                    </li>
                </ul>
            </div>
        </section>
    </GuestLayout>
</template>
<style>
.p-dropdown-items-wrapper {
    @apply shadow-2xl rounded-sm p-3 bg-white z-30;
}
.p-dropdown-label p-inputtext :focus-visible {
    @apply border-none;
}
</style>
