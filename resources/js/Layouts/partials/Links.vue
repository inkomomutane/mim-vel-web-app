<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <div class="space-y-8">
        <!-- Pages group -->
        <div>
            <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                <span
                    class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                    aria-hidden="true"
                    >•••</span
                >
                <span class="lg:hidden lg:sidebar-expanded:block 2xl:block"
                    >Pages</span
                >
            </h3>
            <ul class="mt-3">
                <!-- Dashboard -->
                <Link :href="route('dashboard')">
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('dashboard') ? ' bg-slate-950' : ''
                        "
                    >
                        <a
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                    >
                                        <rect
                                            class="fill-current text-gray-100"
                                            x="2"
                                            y="2"
                                            width="9"
                                            height="9"
                                            rx="2"
                                        />
                                        <rect
                                            class="fill-current text-indigo-300"
                                            opacity="0.3"
                                            x="13"
                                            y="2"
                                            width="9"
                                            height="9"
                                            rx="2"
                                        />
                                        <rect
                                            class="fill-current text-indigo-300"
                                            opacity="0.3"
                                            x="13"
                                            y="13"
                                            width="9"
                                            height="9"
                                            rx="2"
                                        />
                                        <rect
                                            class="fill-current text-indigo-300"
                                            opacity="0.3"
                                            x="2"
                                            y="13"
                                            width="9"
                                            height="9"
                                            rx="2"
                                        />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >Dashboard</span
                                    >
                                </div>
                            </div>
                        </a>
                    </li>
                </Link>
                <Link :href="route('province.all')">
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('province.all')
                                ? ' bg-slate-950'
                                : ''
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                   
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path   class="fill-current text-gray-100" opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" />
                                        <path   class="fill-current text-gray-100" d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" />
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
            </ul>
        </div>
    </div>
</template>
