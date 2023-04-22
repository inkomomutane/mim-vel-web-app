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
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            class="fill-current text-gray-100"
                                            opacity="0.3"
                                            d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                        />
                                        <path
                                            class="fill-current text-gray-100"
                                            d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
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
                <Link :href="route('city.all')">
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('city.all') ? ' bg-slate-950' : ''
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg
                                        width="24"
                                        height="24"
                                        viewBox="0 0 48 48"
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            class="fill-current text-gray-100"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8 43C8 42.4477 8.44772 42 9 42H39C39.5523 42 40 42.4477 40 43C40 43.5523 39.5523 44 39 44H9C8.44772 44 8 43.5523 8 43Z"
                                        ></path>
                                        <path
                                            class="fill-current text-gray-100"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M12 22V42H17V22H12ZM11 20C10.4477 20 10 20.4477 10 21V43C10 43.5523 10.4477 44 11 44H18C18.5523 44 19 43.5523 19 43V21C19 20.4477 18.5523 20 18 20H11Z"
                                        ></path>
                                        <path
                                            class="fill-current text-gray-100"
                                            opacity="0.5"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M17 4L33 10V24H28C27.4477 24 27 24.4477 27 25V42H17V4ZM20 13H22V15H20V13ZM26 13H24V15H26V13ZM28 13H30V15H28V13ZM22 17H20V19H22V17ZM24 17H26V19H24V17ZM30 17H28V19H30V17ZM20 21H22V23H20V21ZM26 21H24V23H26V21ZM28 21H30V23H28V21ZM22 25H20V27H22V25ZM24 25H26V27H24V25ZM20 29H22V31H20V29ZM26 29H24V31H26V29ZM22 33H20V35H22V33ZM24 33H26V35H24V33ZM20 37H22V39H20V37ZM26 37H24V39H26V37Z"
                                        ></path>
                                        <path
                                            class="fill-current text-gray-100"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M29 26V42H36V26H29ZM28 24C27.4477 24 27 24.4477 27 25V43C27 43.5523 27.4477 44 28 44H37C37.5523 44 38 43.5523 38 43V25C38 24.4477 37.5523 24 37 24H28Z"
                                        ></path>
                                        <path
                                            class="fill-current text-gray-100"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M34 30H31V28H34V30Z"
                                        ></path>
                                        <path
                                            class="fill-current text-gray-100"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M34 34H31V32H34V34Z"
                                        ></path>
                                        <path
                                            class="fill-current text-gray-100"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M34 38H31V36H34V38Z"
                                        ></path>
                                        <path
                                            class="fill-current text-gray-100"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M34 42H31V40H34V42Z"
                                        ></path>
                                        <path
                                            class="fill-current text-gray-100"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M15 13L15 21H13L13 13H15Z"
                                        ></path>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >Cidades</span
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                </Link>
                <Link :href="route('bairro.all')">
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('bairro.all') ? ' bg-slate-950' : ''
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg
                                        width="22"
                                        height="22"
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
                <Link :href="route('legal.policy')">
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('legal.policy') ? ' bg-slate-950' : ''
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg  xmlns="http://www.w3.org/2000/svg" width="22"
                                        height="22" viewBox="0 0 16 16" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.246 14.713a27.792 27.792 0 0 1-1.505-.953c-.501-.34-.983-.707-1.444-1.1-.458-.395-.888-.82-1.288-1.274-.4-.455-.753-.95-1.05-1.478a7.8 7.8 0 0 1-.7-1.69A7.041 7.041 0 0 1 2 6.3V3.1l.5-.5c.333 0 .656-.011.97-.036.296-.023.591-.066.882-.128.284-.062.562-.148.832-.256.284-.118.557-.261.816-.427a4.83 4.83 0 0 1 1.184-.565 4.8 4.8 0 0 1 2-.142 4.018 4.018 0 0 1 1.237.383c.199.097.392.204.58.322.26.167.535.31.821.428.27.109.547.194.831.256.291.062.587.106.884.129.311.024.634.035.967.035l.5.5v3.2a7.043 7.043 0 0 1-.256 1.919 7.804 7.804 0 0 1-.7 1.69 8.751 8.751 0 0 1-1.05 1.478c-.4.452-.829.877-1.286 1.27a15.94 15.94 0 0 1-1.448 1.1 28.71 28.71 0 0 1-1.51.956h-.508zM3 3.59V6.3c-.004.555.07 1.11.22 1.645a6.7 6.7 0 0 0 .61 1.473c.263.467.575.905.93 1.308.37.417.766.81 1.188 1.174.432.368.883.712 1.352 1.03.4.267.8.523 1.2.769.4-.242.8-.498 1.2-.768.47-.319.923-.663 1.355-1.031.421-.364.817-.756 1.186-1.172a7.8 7.8 0 0 0 .93-1.308c.261-.465.466-.96.61-1.473.15-.537.223-1.09.22-1.647V3.59c-.159 0-.313-.012-.465-.023l-.079-.006a7.95 7.95 0 0 1-1.018-.147 6.112 6.112 0 0 1-1.976-.814 5.166 5.166 0 0 0-.482-.27 3.123 3.123 0 0 0-.943-.29 3.686 3.686 0 0 0-1.558.106c-.332.108-.649.26-.94.452-.312.2-.64.372-.983.513a6.4 6.4 0 0 1-1 .307c-.335.07-.675.12-1.017.146-.174.01-.355.02-.54.026zm6.065 4.3a1.5 1.5 0 1 0-1.13 0L7.5 10.5h2l-.435-2.61z"></path>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >Políticas de privacidade</span
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                </Link>
                <Link :href="route('legal.term')">
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('legal.term') ? ' bg-slate-950' : ''
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M3 14h4v.91l.09.09H2.5l-.5-.5v-13l.5-.5h7.72l.35.14 3.28 3.3.15.36v2.54a3.1 3.1 0 0 0-1-.94V6H9.5L9 5.5V2H3v12zm10-9l-3-3v3h3zm.5 4v1h1l.5.5v4l-.5.5h-6l-.5-.5v-4l.5-.5h1V9a2 2 0 0 1 4 0zm-2.707-.707A1 1 0 0 0 10.5 9v1h2V9a1 1 0 0 0-1.707-.707zM9 11v3h5v-3H9z"></path></svg>
                                   <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >Termos e condições</span
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
