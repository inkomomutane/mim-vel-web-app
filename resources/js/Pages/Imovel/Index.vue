<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";

import { Imovels } from "@/types/index";
import { ref, watch, PropType } from "vue";
import Flasher from "@/helprs";
import { FlasherResponse } from "@flasher/flasher";
import EditImovel from "./EditImovel.vue";
import DeleteImovel from "./DeleteImovel.vue";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import Avatar from "primevue/avatar";

const props = defineProps({
    imovels: {
        type: Object as PropType<Imovels>,
        required: true,
    },
    search: String,
    messages: Object as PropType<FlasherResponse>,
});

const links = ref(props.imovels.links);

const editingImovelTrigger = ref(false);
const editingImovel = ref<App.Data.ImovelData | null>(null);

const deletingImovelTrigger = ref(false);
const deletingImovel = ref<App.Data.ImovelData | null>(null);

const searchTerm = ref("");

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

watch(
    () => props.imovels.links,
    (value) => {
        links.value = value;
    }
);

watch(searchTerm, (value) => {
    router.visit(
        route("imovel.all", {
            search: value ?? "",
        }),
        {
            only: ["imovels"],
            replace: false,
            preserveState: true,
        }
    );
});

function openEditImovelModal(imovel: App.Data.ImovelData) {
    editingImovel.value = imovel;
    editingImovelTrigger.value = true;
}

function closeEditImovelModal() {
    editingImovel.value = null;
    editingImovelTrigger.value = false;
}

function openDeleteImovelModal(imovel: App.Data.ImovelData) {
    deletingImovel.value = imovel;
    deletingImovelTrigger.value = true;
}

function closeDeleteImovelModal() {
    deletingImovel.value = null;
    deletingImovelTrigger.value = false;
}
</script>

<template>
    <Head title="Imóveis" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="mx-auto max-w-screen-xl">
                <!-- Start coding here -->
                <div
                    class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded overflow-hidden"
                >
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4"
                    >
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only"
                                    >Pesquisar</label
                                >
                                <div class="relative w-full">
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                    >
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor"
                                            viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        id="simple-search"
                                        v-model="searchTerm"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                                        placeholder="Pesquisar..."
                                    />
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0"
                        >
                        <Link :href="route('imovel.create')"

        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
    <svg width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M15,12h-2v-2h2V12z" fill="currentColor" />
                                        <path d="M19,12h-2v-2h2V12z" fill="currentColor" />
                                        <path d="M5,6H3V4h2V6z" opacity=".35" fill="currentColor" />
                                        <path d="M20,7V5c0-1.105-0.895-2-2-2h-8C9.262,3,8.624,3.405,8.277,4H7v2h1v1C6.895,7,6,7.895,6,9v12 c0,1.105,0.895,2,2,2h12c1.105,0,2-0.895,2-2V9C22,7.895,21.105,7,20,7z" opacity=".35" fill="currentColor" />
                                        <rect width="2" height="2" x="3" y="8" opacity=".35" fill="currentColor" />
                                        <path d="M15,23h-2v-5h2V23z" fill="currentColor" />
                                        <path d="M13,7h-2V5h2V7z" fill="currentColor" />
                                        <path d="M17,7h-2V5h2V7z" fill="currentColor" />
                                        <path d="M11,12H9v-2h2V12z" fill="currentColor" />
                                        <path d="M11,16H9v-2h2V16z" fill="currentColor" />
                                        <path d="M15,16h-2v-2h2V16z" fill="currentColor" />
                                        <path d="M19,16h-2v-2h2V16z" fill="currentColor" />
                                        <path d="M19,20h-2v-2h2V20z" fill="currentColor" />
                                        <path d="M11,20H9v-2h2V20z" fill="currentColor" />
                                        <g>
                                            <path d="M8,7V6H7V4h1.277C8.624,3.405,9.262,3,10,3h1c0-1.105-0.895-2-2-2H3C1.895,1,1,1.895,1,3v8c0,1.105,0.895,2,2,2h3V9 C6,7.895,6.895,7,8,7z M5,10H3V8h2V10z M5,6H3V4h2V6z" fill="currentColor" />
                                        </g>
                                        </svg>
        <span class="mx-4">Novo imóvel</span>
    </Link>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <div class="flex items-center">Image</div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <div class="flex items-center">
                                            Titulo
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Editar
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Excluir
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="border-b dark:border-gray-700"
                                    v-for="imovel in imovels.data"
                                    :key="(imovel.id as number)"
                                >
                                    <th
                                        scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    >

                                    <ResponsiveImage v-if="imovel.media" :responsive="imovel.media" class-name="h-8 w-16 rounded-sm object-cover" />
                                    <Avatar v-else label="M"  class="bg-slate-200" />
                                    </th>

                                    <td class="px-4 py-3">
                                        {{ imovel.titulo }}
                                    </td>
                                    <td class="px-4 py-3 w-32">
                                        <button
                                            type="button"
                                            @click="
                                                openEditImovelModal(imovel)
                                            "
                                            class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                            >
                                                <path
                                                    class="fill-current text-gray-100"
                                                    opacity="0.3"
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                    fill="black"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                                    fill="black"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                                    fill="black"
                                                />
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="px-4 py-3 justify-end w-32">
                                        <button
                                            type="button"
                                            @click="
                                                openDeleteImovelModal(
                                                    imovel
                                                )
                                            "
                                            class="flex items-center justify-center text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                            >
                                                <path
                                                    class="fill-current text-gray-100"
                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    opacity="0.5"
                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    opacity="0.5"
                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                </div>
            </div>
            <EditImovel
                v-if="editingImovel"
                :imovel="editingImovel"
                :openModal="editingImovelTrigger"
                :close="closeEditImovelModal"
            />
            <DeleteImovel
                v-if="deletingImovel"
                :imovel="deletingImovel"
                :openModal="deletingImovelTrigger"
                :close="closeDeleteImovelModal"
            />
        </template>
    </AuthenticatedLayout>
</template>
