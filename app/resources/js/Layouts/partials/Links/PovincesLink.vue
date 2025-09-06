<script setup lang="ts">
import { tooltip } from "@/helprs";
import { Link, usePage } from "@inertiajs/vue3";

const authorized = () => {
    const $userRole = usePage().props.auth.user?.role.name;
    return (
        $userRole == "Super-Admin" ||
        $userRole == "Admin" ||
        $userRole == "Sub-Admin" ||
        $userRole == "Agencia-imobiliaria" ||
        $userRole == "Agente-imobiliario"
    );
};
</script>
<template>
    <Link
        v-if="authorized()"
        :href="route('province.all')"
        v-tooltip.value="tooltip('Províncias')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('province.all')
                    ? 'bg-slate-950'
                    : 'hover:bg-slate-900'
            "
        >
            <div class="block text-slate-200 truncate transition duration-150">
                <div class="flex items-center justify-between">
                    <div class="grow flex items-center">
                        <svg
                            width="20"
                            height="20"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M15,3h4c1.105,0,2,0.895,2,2v3.882c0,0.735-0.171,1.46-0.5,2.118l0,0c-0.329,0.658-0.5,1.383-0.5,2.118v5.783c0,1.234-0.84,2.309-2.037,2.608L16,22h-1.247c-0.499,0-0.994-0.08-1.468-0.238l-0.651-0.217c-1.054-0.351-2.2-0.313-3.228,0.109l0,0C8.848,21.882,8.25,22,7.646,22H5.407C4.504,22,3.638,21.64,3,21l-0.005-0.005C2.358,20.355,2,19.489,2,18.586v-3.468c0-0.735,0.171-1.46,0.5-2.118l0,0C2.829,12.342,3,11.617,3,10.882V8c0-1.105,0.895-2,2-2h4l3-2L15,3z"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <circle
                                cx="7.5"
                                cy="16.5"
                                r="1.5"
                                fill="currentColor"
                            />
                            <path
                                d="M12,2C9.239,2,7,4.239,7,7c0,1.977,2.001,4.704,3.471,6.441c0.799,0.944,2.259,0.944,3.058,0C14.999,11.704,17,8.977,17,7C17,4.239,14.761,2,12,2z M12,9.143c-1.183,0-2.143-0.959-2.143-2.143S10.817,4.857,12,4.857S14.143,5.817,14.143,7S13.183,9.143,12,9.143z"
                                fill="currentColor"
                            />
                        </svg>

                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Províncias</span
                        >
                    </div>
                </div>
            </div>
        </li>
    </Link>
</template>
