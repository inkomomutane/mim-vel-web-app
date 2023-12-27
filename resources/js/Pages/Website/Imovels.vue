<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Imovels } from "@/types";
import { ref, PropType, onMounted } from "vue";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import { Link, Head, useForm } from "@inertiajs/vue3";
import MultiSelect from "primevue/multiselect";

const props = defineProps({
    imovels: {
        type: Object as PropType<Imovels>,
        required: true,
    },
    imovelTypes: {
        type: Array<App.Data.ImovelTypeData>,
    },
    bairros: {
        type: Array<App.Data.BairroData>,
    },

    filters: Object as PropType<App.Data.RequestFiltersData>,
});

const links = ref(props.imovels.links);

const form = useForm({
    imovel_types: props.filters?.imovelTypes,
    bairros: props.filters?.bairros,
    title: props.filters?.title ?? "",
});

const filterImovels = () =>
    form.get(route("imoveis"), {
        preserveState: false,
    });
</script>

<template>
    <Head title="Todos imoveis" />
    <GuestLayout :show-footer="true">
        <section
            class="border-t sticky top-0 z-30 bg-white dark:bg-gray-900 selection:bg-primary-500 selection:text-white"
        >
            <div
                class="w-full hidden md:flex md:grid-cols-6 pb-4 px-4 sm:px-6 lg:px-16 pt-4 mx-auto max-w-screen-xl gap-3"
            >
                <input
                    id="title"
                    v-model="form.title"
                    type="text"
                    placeholder="Pesquisar imóvel"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    autocomplete="title"
                />
                <MultiSelect
                    v-model="form.imovel_types"
                    :options="imovelTypes"
                    filter
                    optionLabel="name"
                    optionValue="id"
                    placeholder="Tipo de imóvel"
                    :maxSelectedLabels="3"
                    :pt="{
                    root:{ class :'flex w-fit cursor-pointer  border bg-gray-50  border-gray-300 dark:bg-gray-600 dark:border-gray-500 rounded-sm focus:ring-slate-500 focus:border-slate-500 p-2.5'},
                    panel:{ class: 'bg-white shadow-lg border border-1  p-2 overflow-auto'},
                    trigger: {class: 'pl-4 pr-2 mx-3'},
                    closeButton : {
                        class: 'px-3 '
                    },
                    header: {
                        class : 'py-2'
                    },
                    closeIcon : {
                        class: 'mx-2'
                    },
                    filterIcon: {
                        class : '-ml-6'
                    },
                    filterContainer :{
                        class : 'mx-0 border rounded-sm bg-gray-50 border-gray-400 focus:border-gray-400 focus:ring-0 focus:ring-gray-400'
                    },
                    filterInput : {
                    class: 'border-none ring-0 focus:ring-0 focus:border-none bg-transparent'
                  },
                item: ({ props, state, context } :any) => ({
                class: context.selected ? 'p-1 bg-gray-100 text-gray-900 font-medium p-1 px-4'
                : 'p-1 px-4 hover:bg-gray-50 cursor-pointer'
            }),
                    headerCheckboxContainer:
                        {class:'mx-2 ml-3'},
                    }"
                >
                    <template #itemcheckboxicon="slotProps" @click.native.stop>
                        <div v-if="slotProps.selected" :class="slotProps.class">
                            <div class="inline-block relative mr-1">
                                <div
                                    class="w-5 h-5 border-2 focus:ring-2 focus:ring-orange-500 bg-orange-400 text-white border-orange-400 rounded flex justify-center items-center"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        viewBox="0 0 48 48"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            width="48"
                                            height="48"
                                            fill="white"
                                            fill-opacity="0.01"
                                        ></rect>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M4 24L9 19L19 29L39 9L44 14L19 39L4 24Z"
                                            fill="currentColor"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div class="inline-block relative mr-1">
                                <div
                                    class="w-5 h-5 border focus:ring-2 focus:ring-gray-500 bg-gray-100 text-transparent border-gray-400 rounded flex justify-center items-center"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        viewBox="0 0 48 48"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            width="48"
                                            height="48"
                                            fill="white"
                                            fill-opacity="0.01"
                                        ></rect>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M4 24L9 19L19 29L39 9L44 14L19 39L4 24Z"
                                            fill="currentColor"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template #headercheckboxicon="slotProps">
                        <div v-if="slotProps.allSelected">
                            <div class="inline-block relative mr-1">
                                <div
                                    class="w-5 h-5 border-2 focus:ring-2 focus:ring-orange-500 bg-orange-400 text-white border-orange-400 rounded flex justify-center items-center"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        viewBox="0 0 48 48"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            width="48"
                                            height="48"
                                            fill="white"
                                            fill-opacity="0.01"
                                        ></rect>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M4 24L9 19L19 29L39 9L44 14L19 39L4 24Z"
                                            fill="currentColor"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div class="inline-block relative mr-1">
                                <div
                                    class="w-5 h-5 border focus:ring-2 focus:ring-gray-500 bg-gray-100 text-transparent border-gray-400 rounded flex justify-center items-center"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        viewBox="0 0 48 48"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            width="48"
                                            height="48"
                                            fill="white"
                                            fill-opacity="0.01"
                                        ></rect>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M4 24L9 19L19 29L39 9L44 14L19 39L4 24Z"
                                            fill="currentColor"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </template>
                </MultiSelect>

                <MultiSelect
                    v-model="form.bairros"
                    :options="bairros"
                    filter
                    optionLabel="nome"
                    optionValue="id"
                    placeholder="Bairros"
                    :maxSelectedLabels="3"
                    :pt="{
                    root:{ class :'flex w-fit cursor-pointer  border bg-gray-50  border-gray-300 dark:bg-gray-600 dark:border-gray-500 rounded-sm focus:ring-slate-500 focus:border-slate-500 p-2.5'},
                    panel:{ class: 'bg-white shadow-lg border border-1  p-2 overflow-auto'},
                    trigger: {class: 'pl-4 pr-2 mx-3'},
                    closeButton : {
                        class: 'px-3 '
                    },
                    header: {
                        class : 'py-2'
                    },
                    closeIcon : {
                        class: 'mx-2'
                    },
                    filterIcon: {
                        class : '-ml-6'
                    },
                    filterContainer :{
                        class : 'mx-0 border rounded-sm bg-gray-50 border-gray-400 focus:border-gray-400 focus:ring-0 focus:ring-gray-400'
                    },
                    filterInput : {
                    class: 'border-none ring-0 focus:ring-0 focus:border-none bg-transparent'
                  },
                item: ({ props, state, context } :any) => ({
                class: context.selected ? 'p-1 bg-gray-100 text-gray-900 font-medium p-1 px-4'
                : 'p-1 px-4 hover:bg-gray-50 cursor-pointer'
            }),
                    headerCheckboxContainer:
                        {class:'mx-2 ml-3'},
                    }"
                >
                    <template #itemcheckboxicon="slotProps" @click.native.stop>
                        <div v-if="slotProps.selected" :class="slotProps.class">
                            <div class="inline-block relative mr-1">
                                <div
                                    class="w-5 h-5 border-2 focus:ring-2 focus:ring-orange-500 bg-orange-400 text-white border-orange-400 rounded flex justify-center items-center"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        viewBox="0 0 48 48"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            width="48"
                                            height="48"
                                            fill="white"
                                            fill-opacity="0.01"
                                        ></rect>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M4 24L9 19L19 29L39 9L44 14L19 39L4 24Z"
                                            fill="currentColor"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div class="inline-block relative mr-1">
                                <div
                                    class="w-5 h-5 border focus:ring-2 focus:ring-gray-500 bg-gray-100 text-transparent border-gray-400 rounded flex justify-center items-center"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        viewBox="0 0 48 48"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            width="48"
                                            height="48"
                                            fill="white"
                                            fill-opacity="0.01"
                                        ></rect>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M4 24L9 19L19 29L39 9L44 14L19 39L4 24Z"
                                            fill="currentColor"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template #headercheckboxicon="slotProps">
                        <div v-if="slotProps.allSelected">
                            <div class="inline-block relative mr-1">
                                <div
                                    class="w-5 h-5 border-2 focus:ring-2 focus:ring-orange-500 bg-orange-400 text-white border-orange-400 rounded flex justify-center items-center"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        viewBox="0 0 48 48"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            width="48"
                                            height="48"
                                            fill="white"
                                            fill-opacity="0.01"
                                        ></rect>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M4 24L9 19L19 29L39 9L44 14L19 39L4 24Z"
                                            fill="currentColor"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div class="inline-block relative mr-1">
                                <div
                                    class="w-5 h-5 border focus:ring-2 focus:ring-gray-500 bg-gray-100 text-transparent border-gray-400 rounded flex justify-center items-center"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        viewBox="0 0 48 48"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect
                                            width="48"
                                            height="48"
                                            fill="white"
                                            fill-opacity="0.01"
                                        ></rect>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M4 24L9 19L19 29L39 9L44 14L19 39L4 24Z"
                                            fill="currentColor"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </template>
                </MultiSelect>

                <button
                    type="button"
                    @click="filterImovels"
                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm p-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                >
                    <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        enable-background="new 0 0 24 24"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <g>
                            <path d="M0,0h24 M24,24H0" fill="none"></path>
                            <path
                                d="M7,6h10l-5.01,6.3L7,6z M4.25,5.61C6.27,8.2,10,13,10,13v6c0,0.55,0.45,1,1,1h2c0.55,0,1-0.45,1-1v-6 c0,0,3.72-4.8,5.74-7.39C20.25,4.95,19.78,4,18.95,4H5.04C4.21,4,3.74,4.95,4.25,5.61z"
                            ></path>
                            <path d="M0,0h24v24H0V0z" fill="none"></path>
                        </g>
                    </svg>
                    <span class="sr-only">Filtrar</span>
                </button>
                <Link
                    :href="route('imoveis')"
                    type="button"
                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm p-2.5 text-center inline-flex items-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-green-800"
                >
                    <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        enable-background="new 0 0 24 24"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <g><rect fill="none" height="24" width="24"></rect></g>
                        <g>
                            <g>
                                <path
                                    d="M16.95,6l-3.57,4.55l1.43,1.43c1.03-1.31,4.98-6.37,4.98-6.37C20.3,4.95,19.83,4,19,4H6.83l2,2H16.95z"
                                ></path>
                                <path
                                    d="M2.81,2.81L1.39,4.22L10,13v6c0,0.55,0.45,1,1,1h2c0.55,0,1-0.45,1-1v-2.17l5.78,5.78l1.41-1.41L2.81,2.81z"
                                ></path>
                            </g>
                        </g>
                    </svg>
                    <span class="sr-only">Limpar Filtros</span>
                </Link>
            </div>
        </section>

        <section
            class="py-16 px-1 sm:px-2 lg:px-24 bg-zinc-100 dark:bg-gray-700 font-['Open_Sans']"
            itemscope
            itemtype="http://schema.org/ItemList"
        >
            <ul class="grid grid-cols-1 sm:grid-cols-2 justify-between">
                <li
                    class="p-5 group"
                    v-for="(imovel, index) in imovels?.data"
                    itemprop="itemListElement"
                    itemscope
                    itemtype="http://schema.org/ListItem"
                    data-aos-offset="50"
                    data-aos="fade-up"
                    :data-aos-duration="200 + index * 100"
                >
                    <a
                        :href="
                            route('post.imovel.show', { imovel: imovel.slug })
                        "
                    >
                        <article
                            class="w-full bg-white dark:bg-gray-700 dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-2xl hover:shadow-gray-200 hover:rounded"
                        >
                            <header>
                                <a
                                    :href="
                                        route('post.imovel.show', {
                                            imovel: imovel.slug,
                                        })
                                    "
                                    itemprop="url"
                                >
                                    <ResponsiveImage
                                        :alt="imovel.titulo"
                                        :responsive="imovel.media ?? undefined"
                                        class-name="col-span-1 sm:col-span-3
                                w-full h-72 sm:h-40 md:h-64 xl:h-40 object-cover
                                rounded-t "
                                    />
                                </a>
                            </header>
                            <div
                                class="w-full p-4 pb-6 font-['Jost'] text-gray-500 grid justify-items-stretch col-span-3"
                            >
                                <div class="grid justify-between">
                                    <div
                                        class="w-full inline-flex items-baseline h-fit"
                                    >
                                        <div
                                            class="bg-green-400 font-medium mx-1 py-0 m-0 rounded text-white px-2 text-sm w-fit"
                                        >
                                            {{ imovel.tipo_de_imovel.name }}
                                        </div>

                                        <div
                                            class="bg-green-400 font-medium mx-1 py-0 m-0 rounded text-white px-2 text-sm w-fit"
                                        >
                                            {{ imovel.condicao?.nome }}
                                        </div>

                                        <div
                                            class="bg-green-400 font-medium mx-1 py-0 m-0 rounded text-white px-2 text-sm w-fit"
                                        >
                                            {{ imovel.bairro?.nome }}
                                        </div>
                                        <div
                                            class="bg-green-400 font-medium mx-1 py-0 m-0 rounded text-white px-2 text-sm w-fit"
                                        >
                                            {{ imovel.bairro?.city?.nome }}
                                        </div>

                                        <div
                                            class="bg-green-400 font-medium mx-1 py-0 m-0 rounded text-white px-2 text-sm w-fit"
                                        >
                                            {{
                                                imovel.bairro?.city?.province
                                                    ?.name
                                            }}
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <h1
                                            class="w-full text-lg font-semibold line-clamp-1 normal-case py-1"
                                        >
                                            {{
                                                (imovel.imovel_for?.slug_text ??
                                                    "") +
                                                    " " +
                                                    imovel.titulo ?? ""
                                            }}
                                        </h1>
                                    </div>
                                </div>
                                <div
                                    class="my-2 flex text-gray-500 line-clamp-1"
                                >
                                    <strong>{{ imovel.price }}</strong>
                                </div>

                                <button
                                    class="text-center rounded-sm text-orange-400 py-1 font-medium text-sm transition-transform duration-300 transform-gpu hover:z-10 hover:text-orange-500 first-letter:uppercase"
                                >
                                    Ver mais
                                </button>
                            </div>
                        </article>
                    </a>
                </li>
            </ul>
            <div
                class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6"
            >
                <div class="flex flex-1 justify-between md:hidden">
                    <Link
                        v-if="links[0].active"
                        href=""
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        >Anterior
                    </Link>
                    <Link
                        v-else
                        :href="links[0].url ?? ''"
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        >Anterior</Link
                    >

                    <span
                        v-if="links.slice(-1)[0].active"
                        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        >Próximo</span
                    >

                    <Link
                        v-else
                        :href="links.slice(-1)[0].url ?? ''"
                        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        >Próximo</Link
                    >
                </div>
                <div
                    class="hidden md:flex sm:flex-1 sm:items-center sm:justify-between"
                >
                    <div>
                        <p class="text-sm text-gray-700">
                            Mostrando
                            <span class="font-medium">{{
                                `${imovels.meta.from ?? 0}-${
                                    imovels.meta.to ?? 0
                                }`
                            }}</span>
                            de
                            <span class="font-medium">{{
                                imovels.meta.total
                            }}</span>
                            resultados
                        </p>
                    </div>
                    <div>
                        <nav
                            class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                            aria-label="Pagination"
                        >
                            <!-- Prev pagination icon -->
                            <Link
                                v-if="links[0].active"
                                href=""
                                class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                            >
                                <span class="sr-only">Anterior</span>
                                <svg
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </Link>
                            <Link
                                v-else
                                class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                                :href="links[0].url ?? ''"
                            >
                                <span class="sr-only">Anterior</span>
                                <svg
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </Link>
                            <div
                                v-for="link in links.slice(1, -1)"
                                :key="link.label"
                            >
                                <Link
                                    v-if="!link.active"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                                    :href="link.url ?? ''"
                                    >{{ link.label }}
                                </Link>

                                <span
                                    v-else
                                    :class="`${
                                        link.active
                                            ? 'relative z-10 inline-flex items-center bg-orange-500 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500'
                                            : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                                    }`"
                                    >{{ link.label }}</span
                                >
                            </div>
                            <!-- Próximo pagination icon -->
                            <span
                                v-if="links.slice(-1)[0].active"
                                class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                            >
                                <span class="sr-only">Próximo</span>
                                <svg
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                            <Link
                                v-else
                                :href="links.slice(-1)[0].url ?? ''"
                                class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                            >
                                <span class="sr-only">Próximo</span>
                                <svg
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </Link>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
