<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SpatieResponsiveImage from "@/Components/ResponsiveImage.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { PropType, watch } from "vue";
import { ref } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher, { tooltip } from "@/helprs";
import { ImovelTypes } from "@/types/index";
import UploadImovelType from "./UploadImovelType.vue";
import DeleteImovelType from "./DeleteImovelType.vue";
import EditImovelType from "./EditImovelType.vue";
const props = defineProps({
    imovelTypes: Object as PropType<ImovelTypes>,
    messages: Object as PropType<FlasherResponse>,
    search: String,
});

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

const links = ref(props.imovelTypes?.links);

watch(
    () => props.imovelTypes?.links,
    (value) => {
        links.value = value;
    }
);

watch(searchTerm, (value) => {
    router.visit(
        route("imovel_type.all", {
            search: value ?? "",
        }),
        {
            only: ["imovelTypes"],
            replace: false,
            preserveState: true,
        }
    );
});

const editingImovelTypeTrigger = ref(false);
const editingImovelType = ref<App.Data.ImovelTypeData | null>(null);

const deletingImovelTypeTrigger = ref(false);
const deletingImovelType = ref<App.Data.ImovelTypeData | null>(null);

function openEditImovelTypeModal(imovel_type: App.Data.ImovelTypeData) {
    editingImovelType.value = imovel_type;
    editingImovelTypeTrigger.value = true;
}

function closeEditImovelTypeModal() {
    editingImovelType.value = null;
    editingImovelTypeTrigger.value = false;
}

function openDeleteImovelTypeModal(city: App.Data.ImovelTypeData) {
    deletingImovelType.value = city;
    deletingImovelTypeTrigger.value = true;
}

function closeDeleteImovelTypeModal() {
    deletingImovelType.value = null;
    deletingImovelTypeTrigger.value = false;
}
</script>

<template>
    <Head title="Banners publicitários" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <!--UploadBanners /-->
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
                        <UploadImovelType />
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
                                    <div class="flex items-center">Imagem</div>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <div class="flex items-center">Nome</div>
                                </th>
                                <th scope="col" class="px-4 py-3">Editar</th>
                                <th scope="col" class="px-4 py-3">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="border-b dark:border-gray-700"
                                v-for="imovel_type in imovelTypes?.data"
                                :key="(imovel_type.id as number)"
                            >
                                <th
                                    scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    <SpatieResponsiveImage
                                        :responsive="imovel_type.icon"
                                        class-name="w-10"
                                    />
                                </th>
                                <td class="px-4 py-3">
                                    {{ imovel_type.name }}
                                </td>
                                <td class="px-4 py-3 w-32">
                                    <button
                                        type="button"
                                        @click="
                                            openEditImovelTypeModal(imovel_type)
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
                                            openDeleteImovelTypeModal(
                                                imovel_type
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
                        `${imovelTypes?.meta.from ?? 0}-${
                            imovelTypes?.meta.to ?? 0
                        }`
                    }}</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ imovelTypes?.meta.total }}</span
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
            <DeleteImovelType
                v-if="deletingImovelType"
                :imovel-type="deletingImovelType"
                :openModal="deletingImovelTypeTrigger"
                :close="closeDeleteImovelTypeModal"
            />

            <EditImovelType
                v-if="editingImovelType"
                :imovel-type="editingImovelType"
                :openModal="editingImovelTypeTrigger"
                :close="closeEditImovelTypeModal"
            />
        </template>
    </AuthenticatedLayout>
</template>
