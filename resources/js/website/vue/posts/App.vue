<template>
    <section
        class="py-16 px-8 sm:px-6 lg:px-24 bg-slate-100 dark:bg-gray-700 font-['Open_Sans']"
        itemscope
        itemtype="http://schema.org/ItemList"
    >
        <ul
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 justify-between"
        >
            <li
                class="p-5 group"
                v-for="imovel in imovels?.data"
                itemprop="itemListElement"
                itemscope
                itemtype="http://schema.org/ListItem"
            >
                <article
                    class="w-full bg-white dark:bg-gray-700 dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-2xl hover:shadow-gray-200 hover:rounded"
                >
                    <header>
                        <a href="#" itemprop="url">
                            <ResponsiveImage
                                :alt="imovel.titulo"
                                :responsive="imovel.media ?? undefined"
                                class-name="col-span-1 sm:col-span-3
                                w-full h-72 sm:h-40 md:h-64 object-cover
                                rounded-t "
                            />
                        </a>
                    </header>
                    <div
                        class="w-full p-4 pb-6 md:py-8 font-['Jost'] grid justify-items-stretch col-span-3"
                    >
                        <div class="flex justify-between">
                            <h1
                                class="text-lg font-semibold line-clamp-1 capitalize"
                            >
                                {{ imovel.titulo ?? "" }}
                            </h1>
                            <button
                                class="bg-slate-100 p-1 rounded-md w-10 hover:bg-orange-100"
                            >
                                &
                            </button>
                        </div>

                        <p
                            class="mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                            itemprop="address"
                            itemscope
                            itemtype="http://schema.org/PostalAddress"
                        >
                            <span itemprop="addressLocality">{{
                                imovel.bairro?.nome
                            }}</span>
                            |
                            <span itemprop="addressRegion">{{
                                imovel.bairro.city.nome
                            }}</span>
                            <span itemprop="streetAddress">{{
                                imovel.endereco ? " | " + imovel.endereco : ""
                            }}</span>
                        </p>
                        <strong class="my-2">Price: {{ imovel.preco }}</strong>
                        <button
                            class="bg-orange-400 rounded text-white py-1 font-medium text-sm transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-2xl hover:z-10 hover:bg-orange-500"
                        >
                            Ver imovel
                        </button>
                    </div>
                </article>
            </li>
        </ul>
        <nav
            class="flex flex-col md:flex-row justify-end items-start md:items-center space-y-3 md:space-y-0 p-4"
            aria-label="Table navigation"
        >
            <ul class="inline-flex items-stretch -space-x-px">
                <li
                    v-if="links !== null ? links[0]?.active : false"
                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    <button
                        class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        &laquo;
                    </button>
                </li>
                <li v-else>
                    <button
                        class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        @click="changeImovels(links[0].url ?? '')"
                    >
                        &laquo;
                    </button>
                </li>
                <li v-for="link in links?.slice(1, -1)" :key="link.label">
                    <button
                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        v-if="!link.active"
                        @click="changeImovels(link.url ?? '')"
                    >
                        {{ link.label }}
                    </button>
                    <span
                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 border border-orange-400 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        v-else
                        :class="`${
                            link.active
                                ? 'bg-orange-500 dark:bg-slate-600 text-white dark:text-slate-100'
                                : ''
                        }`"
                        >{{ link.label }}</span
                    >
                </li>
                <li
                    v-if="links?.slice(-1)[0].active"
                    class="disabled flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-orange-300 hover:bg-orange-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    <span
                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        &raquo;</span
                    >
                </li>
                <li v-else>
                    <button
                        @click="changeImovels(links.slice(-1)[0].url ?? '')"
                        class="flex rounded-r-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        &raquo;
                    </button>
                </li>
            </ul>
        </nav>
    </section>
</template>
<script setup lang="ts">
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import { Imovels } from "@/types";
import { ref, onBeforeMount, watch } from "vue";

const imovels = ref<Imovels | null>(null);
const links = ref<[] | null | any>(null);

const changeImovels = async (link: string) => {
    const res = await fetch(link);
    imovels.value = (await res.json()).imovels;
    links.value = imovels.value?.links;
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
};

onBeforeMount(async () => {
    const res = await fetch(route("imovels.vue.api"));
    imovels.value = (await res.json()).imovels;
    links.value = imovels.value?.links;
});

watch(
    () => links,
    (value) => {
        links.value = value;
    }
);
</script>
