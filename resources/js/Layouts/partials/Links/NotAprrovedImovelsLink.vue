<script setup lang="ts">
import { tooltip } from "@/helprs";
import { Link, usePage } from "@inertiajs/vue3";
import { watch } from "vue";
import { ref } from "vue";
const notAprrovedImovels = ref(usePage().props.notAprrovedImovels);
watch(
    () => usePage().props.notAprrovedImovels,
    (notAprrovedImovelsNumber) =>
        (notAprrovedImovels.value = notAprrovedImovelsNumber)
);

const authorized = () => {
    const $userRole = usePage().props.auth.user?.role.name;
    return (
        $userRole == "Super-Admin" ||
        $userRole == "Admin" ||
        $userRole == "Sub-Admin"
    );
};
</script>
<template>
    <Link
        v-if="authorized()"
        :href="route('imovel.not.approved.all')"
        v-tooltip.value="tooltip('Imóveis não aprovados')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('imovel.not.approved.all*') &&
                route().current() != 'imovel.all.trash'
                    ? ' bg-slate-950'
                    : 'hover:bg-slate-900'
            "
        >
            <a class="block text-slate-200 truncate transition duration-150">
                <div class="flex items-center justify-between">
                    <div class="grow flex items-center">
                        <svg
                            width="20"
                            height="20"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8.533.133a1.75 1.75 0 00-1.066 0l-5.25 1.68A1.75 1.75 0 001 3.48V7c0 1.566.32 3.182 1.303 4.682.983 1.498 2.585 2.813 5.032 3.855a1.7 1.7 0 001.33 0c2.447-1.042 4.049-2.357 5.032-3.855C14.68 10.182 15 8.566 15 7V3.48a1.75 1.75 0 00-1.217-1.667L8.533.133zm-.61 1.429a.25.25 0 01.153 0l5.25 1.68a.25.25 0 01.174.238V7c0 1.358-.275 2.666-1.057 3.86-.784 1.194-2.121 2.34-4.366 3.297a.2.2 0 01-.154 0c-2.245-.956-3.582-2.104-4.366-3.298C2.775 9.666 2.5 8.36 2.5 7V3.48a.25.25 0 01.174-.237l5.25-1.68zM11.28 6.28a.75.75 0 00-1.06-1.06L7.25 8.19l-.97-.97a.75.75 0 10-1.06 1.06l1.5 1.5a.75.75 0 001.06 0l3.5-3.5z"
                            ></path>
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Imóveis não aprovados</span
                        >
                        <span
                            class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-white-800 bg-red-600 rounded-full"
                        >
                            {{ notAprrovedImovels }}
                        </span>
                    </div>
                </div>
            </a>
        </li>
    </Link>
</template>
