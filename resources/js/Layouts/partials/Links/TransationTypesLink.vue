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
        :href="route('transaction.type.all')"
        v-tooltip.value="tooltip('Tipo de transação ')"
    >
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('transaction.type.all')
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
                                d="M22,7.652c0,0.308-0.372,0.463-0.591,0.247l-1.557-1.542c-0.198-0.196-0.198-0.517,0-0.713l1.557-1.542C21.628,3.884,22,4.039,22,4.348V7.652z"
                                fill="currentColor"
                            />
                            <path
                                d="M2,16.348c0-0.308,0.372-0.463,0.591-0.247l1.557,1.542c0.198,0.196,0.198,0.517,0,0.713l-1.557,1.542C2.372,20.116,2,19.961,2,19.652V16.348z"
                                fill="currentColor"
                            />
                            <path
                                d="M15,13H4c-1.105,0-2-0.895-2-2V4c0-1.105,0.895-2,2-2h11c1.105,0,2,0.895,2,2v7C17,12.105,16.105,13,15,13z"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <rect
                                width="15"
                                height="2"
                                x="2"
                                y="5"
                                fill="currentColor"
                            />
                            <path
                                d="M20,11H9c-1.105,0-2,0.895-2,2v1h15v-1C22,11.895,21.105,11,20,11z"
                                fill="currentColor"
                            />
                            <path
                                d="M7,20c0,1.105,0.895,2,2,2h11c1.105,0,2-0.895,2-2v-4H7V20z"
                                fill="currentColor"
                            />
                            <rect
                                width="15"
                                height="2"
                                x="7"
                                y="14"
                                opacity=".35"
                                fill="currentColor"
                            />
                        </svg>

                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Tipo de transação
                        </span>
                    </div>
                </div>
            </div>
        </li>
    </Link>
</template>
