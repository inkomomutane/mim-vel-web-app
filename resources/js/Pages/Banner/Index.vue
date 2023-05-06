<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Banners } from "@/types";
import SpatieResponsiveImage from "@/Components/ResponsiveImage.vue";
import { Head, Link } from "@inertiajs/vue3";
import UploadBanners from "./UploadBanners.vue";
import { PropType, watch } from "vue";
import { ref } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";

const props = defineProps({
    banners: Object as PropType<Banners>,
        messages: Object as PropType<FlasherResponse>,
});


watch(
    () => props.messages,
    (value) => {
        value?.envelopes.forEach((element) => {
            Flasher.flash(
                element.notification.type,
                element.notification.message
            );
        });
    }
);

const links = ref(props.banners?.links);

watch(
    () => props.banners?.links,
    (value) => {
        links.value = value;
    }
);

</script>
<template>
    <Head title="Banners publicitários" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <UploadBanners />
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                <div
                    class="mx-4"
                    v-for="media in props.banners?.data"
                    :key="media.id"
                >
                    <SpatieResponsiveImage
                        class="w-full h-60 object-cover m-5 rounded-md"
                        :responsive="media"
                        :key="media.id"
                    />
                </div>
            </div>
            <nav
                class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                aria-label="Table navigation"
            >
                <span
                    class="text-sm font-normal text-gray-500 dark:text-gray-400"
                >
                    Showing
                    <span class="font-semibold text-gray-900 dark:text-white">{{
                        `${banners?.meta.from ?? 0}-${banners?.meta.to ?? 0}`
                    }}</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ banners?.meta.total }}</span
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
                            >&laquo; <strong class="hidden md:inline ">Previous</strong></Link
                        >
                    </li>
                    <li v-else>
                        <Link
                            class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            :href="links[0].url ?? ''"
                            >&laquo; <strong class="hidden md:inline ">Previous</strong></Link
                        >
                    </li>
                    <li v-for="link in links.slice(1, -1)" :key="link.label">
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
                        <strong
                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            ><strong class="hidden md:inline p-0">Next</strong> &raquo;</strong
                        >
                    </li>
                    <li
                        v-else
                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        <Link :href="links.slice(-1)[0].url ?? ''"
                            ><strong class="hidden md:inline p-0">Next</strong> &raquo;</Link
                        >
                    </li>
                </ul>
            </nav>
        </template>
    </AuthenticatedLayout>
</template>
