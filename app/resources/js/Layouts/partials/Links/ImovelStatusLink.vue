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
        :href="route('status.all')"
        v-tooltip.value="tooltip('Status do imóvel')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('status.all')
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
                            <circle
                                cx="6"
                                cy="6.5"
                                r="2.4"
                                fill="currentColor"
                            />
                            <circle
                                cx="3.6"
                                cy="13.4"
                                r="2.2"
                                fill="currentColor"
                            />
                            <circle
                                cx="7.4"
                                cy="19.7"
                                r="1.9"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <circle
                                cx="14.7"
                                cy="20.6"
                                r="1.7"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <circle
                                cx="19.9"
                                cy="15.4"
                                r="1.5"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <circle
                                cx="19.2"
                                cy="8.1"
                                r="2.9"
                                fill="currentColor"
                            />
                            <circle
                                cx="13"
                                cy="4.1"
                                r="2.7"
                                fill="currentColor"
                            />
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Status do imóvel</span
                        >
                    </div>
                </div>
            </div>
        </li>
    </Link>
</template>
