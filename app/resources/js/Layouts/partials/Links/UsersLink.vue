<script setup lang="ts">
import { tooltip } from "@/helprs";
import { Link, usePage } from "@inertiajs/vue3";

const authorized = () => {
    const $userRole = usePage().props.auth.user?.role.name;
    return (
        $userRole == "Super-Admin" ||
        $userRole == "Admin" ||
        $userRole == "Sub-Admin" ||
        $userRole == "Agencia-imobiliaria"
    );
};
</script>
<template>
    <Link
        v-if="authorized()"
        :href="route('user.all')"
        v-tooltip.value="tooltip('Usuários')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('user.all')
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
                            viewBox="0 0 24 24"
                        >
                            <circle
                                cx="7.5"
                                cy="6.5"
                                r="3.5"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <circle
                                cx="16.5"
                                cy="6.5"
                                r="3.5"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <path
                                d="M10.5,14h8c1.93,0,3.5,1.57,3.5,3.5S20.43,21,18.5,21h-8V14z"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <path
                                d="M14,17.5c0,1.93-1.57,3.5-3.5,3.5h-5c-0.96,0-1.84-0.39-2.47-1.03C2.39,19.34,2,18.46,2,17.5C2,15.57,3.57,14,5.5,14h5c0.96,0,1.84,0.39,2.47,1.03C13.61,15.66,14,16.54,14,17.5z"
                                fill="currentColor"
                            />
                        </svg>

                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Usuários</span
                        >
                    </div>
                </div>
            </a>
        </li>
    </Link>
</template>
