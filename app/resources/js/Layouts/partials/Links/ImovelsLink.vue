<script setup lang="ts">
import { tooltip } from "@/helprs";
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <Link :href="route('imovel.all')" v-tooltip.value="tooltip('Imóveis')">
        <li
            class="px-3 py-2 rounded mb-0.5 last:mb-0"
            :class="
                route().current('imovel.*') &&
                route().current() != 'imovel.all.trash' &&
                route().current() != 'imovel.not.approved.all'
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
                            <path d="M15,12h-2v-2h2V12z" fill="currentColor" />
                            <path d="M19,12h-2v-2h2V12z" fill="currentColor" />
                            <path
                                d="M5,6H3V4h2V6z"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <path
                                d="M20,7V5c0-1.105-0.895-2-2-2h-8C9.262,3,8.624,3.405,8.277,4H7v2h1v1C6.895,7,6,7.895,6,9v12 c0,1.105,0.895,2,2,2h12c1.105,0,2-0.895,2-2V9C22,7.895,21.105,7,20,7z"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <rect
                                width="2"
                                height="2"
                                x="3"
                                y="8"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <path d="M15,23h-2v-5h2V23z" fill="currentColor" />
                            <path d="M13,7h-2V5h2V7z" fill="currentColor" />
                            <path d="M17,7h-2V5h2V7z" fill="currentColor" />
                            <path d="M11,12H9v-2h2V12z" fill="currentColor" />
                            <path d="M11,16H9v-2h2V16z" fill="currentColor" />
                            <path d="M15,16h-2v-2h2V16z" fill="currentColor" />
                            <path d="M19,16h-2v-2h2V16z" fill="currentColor" />
                            <path d="M19,20h-2v-2h2V20z" fill="currentColor" />
                            <path d="M11,20H9v-2h2V20z" fill="currentColor" />
                            <g>
                                <path
                                    d="M8,7V6H7V4h1.277C8.624,3.405,9.262,3,10,3h1c0-1.105-0.895-2-2-2H3C1.895,1,1,1.895,1,3v8c0,1.105,0.895,2,2,2h3V9 C6,7.895,6.895,7,8,7z M5,10H3V8h2V10z M5,6H3V4h2V6z"
                                    fill="currentColor"
                                />
                            </g>
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                            >Imóveis</span
                        >
                    </div>
                </div>
            </a>
        </li>
    </Link>
</template>
