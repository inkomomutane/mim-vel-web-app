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
        :href="route('bairro.all')"
        v-tooltip.value="tooltip('Bairros')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('bairro.all')
                    ? ' bg-slate-950'
                    : 'hover:bg-slate-900'
            "
        >
            <div class="block text-slate-200 truncate transition duration-150">
                <div class="flex items-center justify-between">
                    <div class="grow flex items-center">
                        <svg
                            width="20"
                            height="20"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                class="fill-current text-gray-100"
                                d="M7 9.01L7.01 8.99889"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                            <path
                                class="fill-current text-gray-100"
                                d="M11 9.01L11.01 8.99889"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                            <path
                                class="fill-current text-gray-100"
                                d="M7 13.01L7.01 12.9989"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                            <path
                                class="fill-current text-gray-100"
                                d="M11 13.01L11.01 12.9989"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                            <path
                                class="fill-current text-gray-100"
                                d="M7 17.01L7.01 16.9989"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                            <path
                                class="fill-current text-gray-100"
                                d="M11 17.01L11.01 16.9989"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                            <path
                                d="M15 21H3.6C3.26863 21 3 20.7314 3 20.4V5.6C3 5.26863 3.26863 5 3.6 5H9V3.6C9 3.26863 9.26863 3 9.6 3H14.4C14.7314 3 15 3.26863 15 3.6V9M15 21H20.4C20.7314 21 21 20.7314 21 20.4V9.6C21 9.26863 20.7314 9 20.4 9H15M15 21V17M15 9V13M15 13H17M15 13V17M15 17H17"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Bairros</span
                        >
                    </div>
                </div>
            </div>
        </li>
    </Link>
</template>
