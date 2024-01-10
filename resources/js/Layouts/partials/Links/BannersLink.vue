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
        :href="route('banners.all')"
        v-tooltip.value="tooltip('Banners pulicitários')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('banners.all')
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
                            <polygon
                                points="20,21 4,15 4,9 20,3"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <path
                                d="M5,14.5c0-0.386,0-4.614,0-5C5,8.672,4.328,8,3.5,8S2,8.672,2,9.5c0,0.386,0,4.614,0,5C2,15.328,2.672,16,3.5,16S5,15.328,5,14.5z"
                                fill="currentColor"
                            />
                            <path
                                d="M22,20.5c0-0.386,0-16.614,0-17C22,2.672,21.328,2,20.5,2S19,2.672,19,3.5c0,0.386,0,16.614,0,17c0,0.828,0.672,1.5,1.5,1.5S22,21.328,22,20.5z"
                                fill="currentColor"
                            />
                            <path
                                d="M7.995,16.498L7.96,16.591c-0.389,1.034,0.134,2.187,1.168,2.576L11,19.871c1.034,0.389,2.187-0.134,2.576-1.168l0.037-0.099L7.995,16.498z"
                                fill="currentColor"
                            />
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Banners pulicitários</span
                        >
                    </div>
                </div>
            </a>
        </li>
    </Link>
</template>
