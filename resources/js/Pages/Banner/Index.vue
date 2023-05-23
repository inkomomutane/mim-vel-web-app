<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Banners } from "@/types";
import SpatieResponsiveImage from "@/Components/ResponsiveImage.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import UploadBanners from "./UploadBanners.vue";
import { PropType, watch } from "vue";
import { ref } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";
import { useConfirm } from "primevue/useconfirm";
import DeleteBanner from "./DeleteBanner.vue";
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
const deletingBannerTrigger = ref(false);
const deletingBanner = ref<App.Data.MediaData | null>(null);
const confirm = useConfirm();

watch(
    () => props.banners?.links,
    (value) => {
        links.value = value;
    }
);

const showTemplate = () => {
    confirm.require({
        group: "templating",
        header: "Terms and Conditions",
        message: "Do you accept that?",
        icon: "pi pi-question-circle",
        acceptIcon: "pi pi-check",
        rejectIcon: "pi pi-times",
        accept: () => {
            alert("acepted");
        },
        reject: () => {
            alert("rejected");
        },
    });
};

function openDeleteBannerModal(banner: App.Data.MediaData) {
    deletingBanner.value = banner;
    deletingBannerTrigger.value = true;
}

function closeDeleteBannerModal() {
    deletingBanner.value = null;
    deletingBannerTrigger.value = false;
}
</script>

<template>
    <Head title="Banners publicitários" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <UploadBanners />

            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 mt-5"
            >
                <div
                    class="mx-4"
                    v-for="media in props.banners?.data"
                    :key="media.id"
                >
                    <button
                        class="relative group hover:ring-2 hover:ring-red-400 rounded-md"
                        @click="openDeleteBannerModal(media)"
                    >
                        <SpatieResponsiveImage
                            class-name="w-screen h-60 object-cover rounded-md hover:bg-slate-900 hover:opacity-90 hover:shadow-lg"
                            :responsive="media"
                            :key="media.id"
                            @click="showTemplate()"
                            label="Confirm"
                            :aria-expanded="true"
                            :aria-controls="true ? 'confirm' : null"
                        />

                        <button
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 bg-red-500 text-white rounded-xl w-10 h-10 flex items-center justify-center transition duration-300 ease-in-out group-hover:opacity-100"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="h-6 w-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                ></path>
                            </svg>
                        </button>
                    </button>
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
                            >&laquo;
                            <strong class="hidden md:inline"
                                >Previous</strong
                            ></Link
                        >
                    </li>
                    <li v-else>
                        <Link
                            class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            :href="links[0].url ?? ''"
                            >&laquo;
                            <strong class="hidden md:inline"
                                >Previous</strong
                            ></Link
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
                            ><strong class="hidden md:inline p-0">Next</strong>
                            &raquo;</strong
                        >
                    </li>
                    <li
                        v-else
                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        <Link :href="links.slice(-1)[0].url ?? ''"
                            ><strong class="hidden md:inline p-0">Next</strong>
                            &raquo;</Link
                        >
                    </li>
                </ul>
            </nav>
            <DeleteBanner
                v-if="deletingBanner"
                :banner="deletingBanner"
                :openModal="deletingBannerTrigger"
                :close="closeDeleteBannerModal"
            />
        </template>
    </AuthenticatedLayout>
</template>
