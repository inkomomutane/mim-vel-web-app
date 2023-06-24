
<template>
   <section class="py-16 px-8 sm:px-6 lg:px-24 bg-gray-100 dark:bg-gray-700 font-['Open_Sans'] grid lg:grid-cols-5">
      <div class="md:col-span-3">
         <div v-for="imovel in imovels?.data" class="w-full grid grid-cols-1 sm:grid-cols-5 bg-white rounded justify-items-stretch mb-4
         transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-2xl hover:z-10 hover:shadow-orange-100">
         <ResponsiveImage  :alt="imovel.titulo" :responsive="imovel.media ?? undefined" class-name="col-span-1 sm:col-span-2
         w-full h-72 object-cover
          rounded-3xl p-4 pr-2" />
         <div class="w-full p-4 pb-4 md:py-8 font-['Jost'] grid justify-items-stretch col-span-3" >
            <div class="flex justify-between">
                <h1 class="text-lg font-semibold line-clamp-1">{{ imovel.titulo ?? '' }}</h1>
                <button class="bg-slate-100 p-1 rounded-md w-10 hover:bg-orange-100">&</button>
            </div>

            <h2 class="line-clamp-1 text-xs font-medium">
               Maputo | Katembe | Perto de mafarinha
            </h2>
            <h3 class="bg-orange-100 rounded-sm  px-4 pt-1 m-1 ml-0 text-sm font-semibold w-fit text-center line-clamp-1">
               && 1 | && 4 | && 8 | && 14
            </h3>
            <div>
                <p class="line-clamp-3 text-sm text-justify w-full" v-html="imovel.descricao"/>
            </div>
            <strong class="my-2">Price: {{ imovel.preco }}</strong>
            <button class="bg-orange-400  rounded text-white py-1 font-medium text-sm
            transition-transform duration-300 transform-gpu hover:scale-105 hover:shadow-2xl hover:z-10 hover:bg-orange-500">Ver imovel</button>
         </div>
         </div>
         <nav
                        class="flex flex-col md:flex-row justify-end items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation"
                    >
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li
                                v-if="links!== null ? links[0]?.active : false"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <button
                                    class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    >&laquo;</button
                                >
                            </li>
                            <li v-else>
                                <button
                                    class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"

                                    @click="changeImovels(links[0].url ?? '')"
                                    >&laquo;</button
                                >
                            </li>
                            <li
                                v-for="link in links?.slice(1, -1)"
                                :key="link.label"
                            >
                                <button
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    v-if="!link.active"
                                    @click="changeImovels(link.url ?? '')"
                                    >{{ link.label }}
                                </button>
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
                                v-if="links?.slice(-1)[0].active"
                                class="disabled flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >
                                <span
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    > &raquo;</span
                                >
                            </li>
                            <li
                                v-else
                                 >
                                <button
                                @click="changeImovels(links.slice(-1)[0].url ?? '')"
                                class="flex rounded-r-lg items-center justify-center h-full py-1.5 px-3 ml-0
                                 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100
                                  hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700
                                   dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"

                                    >&raquo;</button
                                >
                            </li>
                        </ul>
                    </nav>
      </div>
      <div class="px-4  col-span-2 hidden lg:grid ">
         Filters
      </div>
   </section>

</template>
<script setup lang="ts">
import ResponsiveImage from '@/Components/ResponsiveImage.vue';
import { Imovels } from '@/types';
import { ref,onBeforeMount,watch } from 'vue';

const imovels = ref<Imovels|null>(null);
const links = ref<[]|null|any>(null);

const changeImovels = async (link:string) => {
    const res = await fetch(link);
   imovels.value = (await res.json()).imovels;
   links.value = imovels.value?.links;
}


onBeforeMount(async () => {
   const res = await fetch(route('imovels.vue.api'));
   imovels.value = (await res.json()).imovels;
   links.value = imovels.value?.links;
})



watch(
    () => links,
    (value) => {
        links.value = value;
    }
);
</script>
