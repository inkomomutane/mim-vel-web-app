<script setup lang="ts">
import { tooltip } from "@/helprs";
import { Link, usePage } from "@inertiajs/vue3";

const authorized = () => {
    const $userRole = usePage().props.auth.user?.role.name;
    return $userRole == "Super-Admin" || $userRole == "Admin";
};
</script>
<template>
    <Link
        v-if="authorized()"
        :href="route('mimovel')"
        v-tooltip.value="tooltip('Mimóvel páginas')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('mimovel')
                    ? ' bg-slate-950'
                    : 'hover:bg-slate-900'
            "
        >
            <a class="block text-slate-200 truncate transition duration-150">
                <div class="flex items-center justify-between">
                    <div class="grow flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M21 12a9 9 0 1 0 -9 9"></path>
                            <path d="M3.6 9h16.8"></path>
                            <path d="M3.6 15h8.4"></path>
                            <path d="M11.578 3a17 17 0 0 0 0 18"></path>
                            <path
                                d="M12.5 3c1.719 2.755 2.5 5.876 2.5 9"
                            ></path>
                            <path d="M18 21v-7m3 3l-3 -3l-3 3"></path>
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Mimóvel páginas</span
                        >
                    </div>
                </div>
            </a>
        </li>
    </Link>
</template>
