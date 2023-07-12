<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Dropdown from "primevue/dropdown";
import { Imovels } from "@/types";
import { ref, PropType,onBeforeMount, watch } from "vue";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import {Link} from "@inertiajs/vue3"
const props = defineProps({
    imovels: {
        type:  Object as PropType<Imovels>,
        required: true,
    },
    filters: String,
});

const links = ref(props.imovels.links);
const selectedCity = ref();
const cities = ref([
    { name: "New York", code: "NY" },
    { name: "Rome", code: "RM" },
    { name: "London", code: "LDN" },
    { name: "Paris", code: "PRS" },
]);
</script>
<template>
    <GuestLayout :show-footer="true">
        <section
            class=" border-t bg-white dark:bg-gray-900 selection:bg-primary-500 selection:text-white"
        >
        <div class="w-full pb-6 sm:px-6 lg:px-16   pt-4 mx-auto max-w-screen-xl ">

            <Dropdown
                v-model="selectedCity"
                :options="cities"
                optionLabel="name"
                :showClear="true"
                filter
                placeholder="Selecione o tipo de imóvel"
                unstyled
                :pt="{
                root:{ class :'flex w-fit cursor-pointer  border bg-gray-50  border-gray-300 dark:bg-gray-600 dark:border-gray-500 rounded-sm focus:ring-slate-500 focus:border-slate-500 p-2.5'},
                panel:{ class: 'bg-white shadow-lg border border-1  p-2 overflow-auto'},
                trigger: {class: 'pl-4 pr-2'},
                clearIcon: {class: 'ml-2 my-auto text-gray-600 hover:text-red-800'},
                filterIcon : { class : 'mx-2'},
                input:{
                    class : 'text-gray-900 text-sm dark:placeholder-gray-400 dark:text-white'
                },
                filterInput : {
                    class: 'rounded-sm bg-gray-50 focus:border-gray-400 focus:ring-0 focus:ring-gray-400 mb-2'
                  },
                item: ({ props, state, context } :any) => ({
                class: context.selected ? 'p-1 bg-gray-100 text-gray-900 font-medium p-1 px-4'
                : 'p-1 px-4 hover:bg-gray-50 cursor-pointer'
            })
            }"
            ></Dropdown>
        </div>
        </section>

        <section
        class="py-16 px-1 sm:px-2 lg:px-24 bg-zinc-50 dark:bg-gray-700 font-['Open_Sans']"
        itemscope
        itemtype="http://schema.org/ItemList"
    >
        <ul
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-between"
        >
            <li
                class="p-5 group"
                v-for="(imovel ,index) in imovels?.data"
                itemprop="itemListElement"
                itemscope
                itemtype="http://schema.org/ListItem"

                data-aos-offset="50" data-aos="fade-up" :data-aos-duration="(200 + index * 100 ) "
            >
                <a :href="route('post.imovel.show',{imovel : imovel.slug})">
                <article
                    class="w-full bg-white dark:bg-gray-700 dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-2xl hover:shadow-gray-200 hover:rounded"
                >
                    <header>
                        <a :href="route('post.imovel.show',{imovel : imovel.slug})" itemprop="url">
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
                        <div class="flex justify-between">
                            <h1
                                class="text-lg font-semibold line-clamp-1 normal-case py-1"
                            >
                                {{  (imovel.imovel_for?.slug_text ?? '') + ' ' + imovel.titulo ?? "" }}
                            </h1>
                            <button
                                class="bg-orange-50 p-2 rounded-md hover:bg-orange-200 group"
                            >
                                <svg
                                    class="fill-orange-300 group-hover:fill-orange-400"
                                    width="20"
                                    height="20"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                >
                                    <g>
                                        <path
                                            fill="none"
                                            d="M0 0h24v24H0z"
                                        ></path>
                                        <path
                                            d="M13.12 17.023l-4.199-2.29a4 4 0 1 1 0-5.465l4.2-2.29a4 4 0 1 1 .959 1.755l-4.2 2.29a4.008 4.008 0 0 1 0 1.954l4.199 2.29a4 4 0 1 1-.959 1.755zM6 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm11-6a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 12a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                        ></path>
                                    </g>
                                </svg>
                            </button>
                        </div>

                        <div
                            class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                            itemprop="address"
                            itemscope
                            itemtype="http://schema.org/PostalAddress"
                        >
                            <svg
                                class="text-gray-400"
                                width="20"
                                height="20"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                            >
                                <circle
                                    cx="12"
                                    cy="10"
                                    r="3"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></circle>
                                <path
                                    d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                            <p class="line-clamp-1">
                                &nbsp;
                                {{
                                    (imovel.bairro?.nome
                                        ? imovel.bairro?.nome + ", "
                                        : "") +
                                    imovel.bairro.city.nome +
                                    (imovel.endereco
                                        ? ", " + imovel.endereco
                                        : "")
                                }}
                            </p>

                        </div>

                        <div class="font-semibold text-sm text-gray-600 flex line-clamp-1">
                            <p class="bg-orange-100 p-1 px-2 rounded-sm mr-2 line-clamp-1 text-ellipsis">{{ imovel.regra_de_negocio?.name }}</p>
                        </div>
                        <div class="my-2 flex text-gray-500 line-clamp-1">
                            <svg
                                class="text-orange-500"
                                width="20"
                                height="20"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"
                                ></path>
                            </svg>
                            &nbsp;4.7,&nbsp; <strong>{{ imovel.price }}</strong>
                        </div>

                        <button
                            class="bg-orange-400 rounded-sm text-white py-1 font-medium text-sm transition-transform duration-300 transform-gpu hover:shadow-2xl hover:z-10 hover:bg-orange-500"
                        >
                            Ver imovel
                        </button>
                    </div>
                </article>
                </a>
            </li>

        </ul>

        <nav
                        class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation"
                    >
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400"
                        >
                            Showing
                            <span
                                class="font-semibold text-gray-900 dark:text-white"
                                >{{
                                    `${imovels.meta.from ?? 0}-${
                                        imovels.meta.to ?? 0
                                    }`
                                }}</span
                            >
                            of
                            <span
                                class="font-semibold text-gray-900 dark:text-white"
                            >
                                {{ imovels.meta.total }}</span
                            >
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li
                                v-if="links[0].active"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <Link
                                    href=""
                                    class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    >&laquo; Previous</Link
                                >
                            </li>
                            <li v-else>
                                <Link
                                    class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    :href="links[0].url ?? ''"
                                    >&laquo; Previous</Link
                                >
                            </li>
                            <li
                                v-for="link in links.slice(1, -1)"
                                :key="link.label"
                            >
                                <Link
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    v-if="!link.active"
                                    :href="link.url ?? ''"
                                    >{{ link.label }}
                                </Link>
                                <span
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    v-else
                                    :class="`${
                                        link.active
                                            ? 'bg-gray-700 dark:bg-slate-600 text-white dark:text-slate-100'
                                            : ''
                                    }`"
                                    >{{ link.label }}</span
                                >
                            </li>
                            <li
                                v-if="links.slice(-1)[0].active"
                                class="disabled flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <span
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    >Next &raquo;</span
                                >
                            </li>
                            <li
                                v-else
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <Link :href="links.slice(-1)[0].url ?? ''"
                                    >Next &raquo;</Link
                                >
                            </li>
                        </ul>
                    </nav>
         </section>
    </GuestLayout>
</template>
