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
        :href="route('imovel_type.all')"
        v-tooltip.value="tooltip('Tipo de imóvel')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('imovel_type.all')
                    ? 'bg-slate-950'
                    : 'hover:bg-slate-900'
            "
        >
            <div class="block text-slate-200 truncate transition duration-150">
                <div class="flex items-center justify-between">
                    <div class="grow flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M18,21H6a3,3,0,0,1-3-3V8.765A3,3,0,0,1,4.542,6.143l6-3.333a3,3,0,0,1,2.914,0l6,3.333A3,3,0,0,1,21,8.765V18A3,3,0,0,1,18,21Z"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <path
                                d="M20.5,9.23a1.494,1.494,0,0,1-.727-.189l-6.839-3.8a1.909,1.909,0,0,0-1.864,0l-6.839,3.8A1.5,1.5,0,1,1,2.772,6.418l6.839-3.8a4.888,4.888,0,0,1,4.778,0l6.839,3.8A1.5,1.5,0,0,1,20.5,9.23Z"
                                fill="currentColor"
                            />
                            <polygon
                                points="16 21 8 21 8 15 12 13 16 15 16 21"
                                fill="currentColor"
                            />
                            <path
                                d="M16,16a1,1,0,0,1-.6-.2L12,13.25,8.6,15.8a1,1,0,0,1-1.2-1.6l4-3a1,1,0,0,1,1.2,0l4,3A1,1,0,0,1,16,16Z"
                                fill="currentColor"
                            />
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Tipo de imóvel</span
                        >
                    </div>
                </div>
            </div>
        </li>
    </Link>
</template>
