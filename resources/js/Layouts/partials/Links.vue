<script setup lang="ts">
import { tooltip } from "@/helprs";
import { Link, usePage } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const mails = ref(usePage().props.mails);

watch(
    () => usePage().props.mails,
    (mailsNumber) => (mails.value = mailsNumber)
);
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
                <Link
                    :href="route('dashboard')"
                    v-tooltip.value="tooltip('Dashboard')"
                >
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('dashboard')
                                ? ' bg-slate-950'
                                : 'hover:bg-slate-900'
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
                <Link
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
                        <a
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">

                                    <svg width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
  <polygon points="20,21 4,15 4,9 20,3" opacity=".35" fill="currentColor" />
  <path d="M5,14.5c0-0.386,0-4.614,0-5C5,8.672,4.328,8,3.5,8S2,8.672,2,9.5c0,0.386,0,4.614,0,5C2,15.328,2.672,16,3.5,16S5,15.328,5,14.5z" fill="currentColor" />
  <path d="M22,20.5c0-0.386,0-16.614,0-17C22,2.672,21.328,2,20.5,2S19,2.672,19,3.5c0,0.386,0,16.614,0,17c0,0.828,0.672,1.5,1.5,1.5S22,21.328,22,20.5z" fill="currentColor" />
  <path d="M7.995,16.498L7.96,16.591c-0.389,1.034,0.134,2.187,1.168,2.576L11,19.871c1.034,0.389,2.187-0.134,2.576-1.168l0.037-0.099L7.995,16.498z" fill="currentColor" />
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

                <Link
                    :href="route('negocio.all')"
                    v-tooltip.value="tooltip('Regras de negociação')"
                >
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('negocio.all')
                                ? 'bg-slate-950'
                                : 'hover:bg-slate-900'
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg
                                        width="20"
                                        height="20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M21.23,5.77c-2.36-2.36-6.2-2.36-8.56,0c-0.21,0.21-0.39,0.44-0.56,0.67l9.03,7.81c0.03,0.03,0.07,0.06,0.09,0.08 C23.59,11.97,23.59,8.13,21.23,5.77z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M21.261,14.365c0,0,0.004-0.004,0.004-0.004l-0.031-0.027c-0.002-0.002-0.004-0.005-0.006-0.007 c-0.018-0.018-0.058-0.05-0.09-0.076l-9.81-8.48c-2.363-2.363-6.193-2.363-8.556,0c-2.363,2.363-2.363,6.193,0,8.556 c1.027,1.027,7.241,6.196,7.672,6.627c0,0,0,0,0,0c0.113,0.113,0.235,0.209,0.364,0.292c0.238,0.211,0.419,0.367,0.494,0.419 c0.537,0.376,1.256,0.471,1.844,0.09c0.335-0.218,0.469-0.633,0.523-0.904c0.05-0.045,0.12-0.106,0.2-0.176 c0.342,0.155,1.168,0.446,1.847,0.017c0.859-0.542,0.919-1.338,0.919-1.338s0.989,0.234,1.818-0.467 c0.81-0.684,0.797-1.655,0.797-1.655s1.274,0.403,2.159-0.679C22.074,15.743,21.869,15.009,21.261,14.365z"
                                            opacity=".35"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M11.133,21.316c0.284-0.284,0.199-0.199,0.482-0.482c0.609-0.609,0.609-1.596,0-2.204c-0.609-0.609-1.596-0.609-2.204,0 c-0.284,0.284-0.199,0.199-0.482,0.482c-0.609,0.609-0.609,1.596,0,2.204C9.537,21.925,10.524,21.925,11.133,21.316z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M6.964,18.253c0.284-0.284,0.199-0.199,0.482-0.482c0.609-0.609,0.609-1.596,0-2.204s-1.596-0.609-2.204,0 c-0.284,0.284-0.199,0.199-0.482,0.482c-0.609,0.609-0.609,1.596,0,2.204C5.368,18.862,6.355,18.862,6.964,18.253z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M4.773,16.568c0.284-0.284,0.199-0.199,0.482-0.482c0.609-0.609,0.609-1.596,0-2.204c-0.609-0.609-1.596-0.609-2.204,0 c-0.284,0.284-0.199,0.199-0.482,0.482c-0.609,0.609-0.609,1.596,0,2.204C3.177,17.177,4.164,17.177,4.773,16.568z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M8.965,20.048c0.284-0.284,0.479-0.479,0.763-0.763c0.609-0.609,0.609-1.596,0-2.204s-1.596-0.609-2.204,0 C7.24,17.365,7.044,17.56,6.76,17.844c-0.609,0.609-0.609,1.596,0,2.204C7.369,20.657,8.356,20.657,8.965,20.048z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M21.276,7.6c-0.353-0.168-3.649-1.904-4.758-2.073c-0.363-0.055-0.987-0.022-2.001,0.14 c-0.649,0.104-1.817,0.237-2.274,0.634c-0.425,0.369-1.765,2.389-2.574,3.634c-0.391,0.602-0.157,1.431,0.482,1.677 c0.79,0.303,1.767,0.337,2.766-0.329c0.492-0.328,1.031-0.674,1.5-0.971c0.744-0.471,1.705-0.395,2.371,0.181l1.472,1.273 C19.136,10.973,22.614,8.236,21.276,7.6z"
                                            fill="currentColor"
                                        />
                                    </svg>

                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >Regras de negociação</span
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                </Link>
                <Link
                    :href="route('condicao.all')"
                    v-tooltip.value="tooltip('Condição do imóvel')"
                >
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('condicao.all')
                                ? 'bg-slate-950'
                                : 'hover:bg-slate-900'
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg width="20" height="20"    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M6,17V5c0-1.657,1.343-3,3-3h8c1.657,0,3,1.343,3,3v12c0,1.657-1.343,3-3,3H9C7.343,20,6,18.657,6,17z" opacity=".35" fill="currentColor" />
                                            <path d="M9,20c-1.657,0-3-1.343-3-3V5C4.895,5,4,5.895,4,7v12c0,1.657,1.343,3,3,3h8c1.105,0,2-0.895,2-2H9z" fill="currentColor" />
                                            <path d="M12.883,12.973h-0.006c-0.67,0-1.187-0.605-1.072-1.265c0.35-2.013,1.917-2.083,1.917-3.333c0-0.347-0.06-1.124-0.896-1.124c-0.452,0-0.718,0.289-0.873,0.597c-0.209,0.417-0.691,0.622-1.15,0.541l0,0C10.107,8.265,9.68,7.519,9.975,6.877C10.397,5.96,11.261,5,12.972,5c2.776,0,3.148,2.174,3.148,3.196c0,2.416-1.799,2.506-2.172,3.898C13.813,12.596,13.403,12.973,12.883,12.973z M14.325,15.533c0,0.412-0.127,0.76-0.382,1.043C13.687,16.858,13.352,17,12.94,17c-0.414,0-0.748-0.142-1.003-0.424c-0.255-0.283-0.384-0.631-0.384-1.043c0-0.403,0.129-0.75,0.384-1.045c0.255-0.293,0.589-0.439,1.003-0.439c0.412,0,0.747,0.146,1.003,0.439C14.198,14.783,14.325,15.131,14.325,15.533z" fill="currentColor" />
                                            </svg>
                                   <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >Condição do imóvel</span
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                </Link>
                <Link
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
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
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
                <Link
                    :href="route('province.all')"
                    v-tooltip.value="tooltip('Províncias')"
                >
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('province.all')
                                ? 'bg-slate-950'
                                : 'hover:bg-slate-900'
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg
                                        width="20"
                                        height="20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M15,3h4c1.105,0,2,0.895,2,2v3.882c0,0.735-0.171,1.46-0.5,2.118l0,0c-0.329,0.658-0.5,1.383-0.5,2.118v5.783c0,1.234-0.84,2.309-2.037,2.608L16,22h-1.247c-0.499,0-0.994-0.08-1.468-0.238l-0.651-0.217c-1.054-0.351-2.2-0.313-3.228,0.109l0,0C8.848,21.882,8.25,22,7.646,22H5.407C4.504,22,3.638,21.64,3,21l-0.005-0.005C2.358,20.355,2,19.489,2,18.586v-3.468c0-0.735,0.171-1.46,0.5-2.118l0,0C2.829,12.342,3,11.617,3,10.882V8c0-1.105,0.895-2,2-2h4l3-2L15,3z"
                                            opacity=".35"
                                            fill="currentColor"
                                        />
                                        <circle
                                            cx="7.5"
                                            cy="16.5"
                                            r="1.5"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M12,2C9.239,2,7,4.239,7,7c0,1.977,2.001,4.704,3.471,6.441c0.799,0.944,2.259,0.944,3.058,0C14.999,11.704,17,8.977,17,7C17,4.239,14.761,2,12,2z M12,9.143c-1.183,0-2.143-0.959-2.143-2.143S10.817,4.857,12,4.857S14.143,5.817,14.143,7S13.183,9.143,12,9.143z"
                                            fill="currentColor"
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

                <Link
                    :href="route('city.all')"
                    v-tooltip.value="tooltip('Cidades')"
                >
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('city.all')
                                ? ' bg-slate-950'
                                : 'hover:bg-slate-900'
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
                <Link
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
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
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

                <Link
                    :href="route('message.all')"
                    v-tooltip.value="tooltip('Mensagens do website')"
                >
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('message.all')
                                ? 'bg-slate-950'
                                : 'hover:bg-slate-900'
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                    >
                                        <path
                                            class=""
                                            d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                        />
                                        <path
                                            opacity="0.3"
                                            d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                        />
                                    </svg>

                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                        >Mensagens |
                                        <span
                                            class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full"
                                        >
                                            {{ mails }}
                                        </span></span
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                </Link>
            </ul>
            <h3
                class="text-xs uppercase text-slate-500 font-semibold pl-3 mt-2"
            >
                <span
                    class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                    aria-hidden="true"
                    >•••</span
                >
                <span class="lg:hidden lg:sidebar-expanded:block 2xl:block"
                    >Legalidade</span
                >
            </h3>
            <ul class="mt-3">
                <Link
                    :href="route('legal.policy')"
                    v-tooltip.value="tooltip('Políticas de privacidade')"
                >
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('legal.policy')
                                ? 'bg-slate-950'
                                : 'hover:bg-slate-900'
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 16 16"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.246 14.713a27.792 27.792 0 0 1-1.505-.953c-.501-.34-.983-.707-1.444-1.1-.458-.395-.888-.82-1.288-1.274-.4-.455-.753-.95-1.05-1.478a7.8 7.8 0 0 1-.7-1.69A7.041 7.041 0 0 1 2 6.3V3.1l.5-.5c.333 0 .656-.011.97-.036.296-.023.591-.066.882-.128.284-.062.562-.148.832-.256.284-.118.557-.261.816-.427a4.83 4.83 0 0 1 1.184-.565 4.8 4.8 0 0 1 2-.142 4.018 4.018 0 0 1 1.237.383c.199.097.392.204.58.322.26.167.535.31.821.428.27.109.547.194.831.256.291.062.587.106.884.129.311.024.634.035.967.035l.5.5v3.2a7.043 7.043 0 0 1-.256 1.919 7.804 7.804 0 0 1-.7 1.69 8.751 8.751 0 0 1-1.05 1.478c-.4.452-.829.877-1.286 1.27a15.94 15.94 0 0 1-1.448 1.1 28.71 28.71 0 0 1-1.51.956h-.508zM3 3.59V6.3c-.004.555.07 1.11.22 1.645a6.7 6.7 0 0 0 .61 1.473c.263.467.575.905.93 1.308.37.417.766.81 1.188 1.174.432.368.883.712 1.352 1.03.4.267.8.523 1.2.769.4-.242.8-.498 1.2-.768.47-.319.923-.663 1.355-1.031.421-.364.817-.756 1.186-1.172a7.8 7.8 0 0 0 .93-1.308c.261-.465.466-.96.61-1.473.15-.537.223-1.09.22-1.647V3.59c-.159 0-.313-.012-.465-.023l-.079-.006a7.95 7.95 0 0 1-1.018-.147 6.112 6.112 0 0 1-1.976-.814 5.166 5.166 0 0 0-.482-.27 3.123 3.123 0 0 0-.943-.29 3.686 3.686 0 0 0-1.558.106c-.332.108-.649.26-.94.452-.312.2-.64.372-.983.513a6.4 6.4 0 0 1-1 .307c-.335.07-.675.12-1.017.146-.174.01-.355.02-.54.026zm6.065 4.3a1.5 1.5 0 1 0-1.13 0L7.5 10.5h2l-.435-2.61z"
                                        ></path>
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
                <Link
                    :href="route('legal.term')"
                    v-tooltip.value="tooltip('Termos e condições')"
                >
                    <li
                        class="px-3 py-2 rounded mb-0.5 last:mb-0"
                        :class="
                            route().current('legal.term')
                                ? ' bg-slate-950'
                                : 'hover:bg-slate-900'
                        "
                    >
                        <div
                            class="block text-slate-200 truncate transition duration-150"
                        >
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg
                                        width="20"
                                        height="20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 16 16"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M3 14h4v.91l.09.09H2.5l-.5-.5v-13l.5-.5h7.72l.35.14 3.28 3.3.15.36v2.54a3.1 3.1 0 0 0-1-.94V6H9.5L9 5.5V2H3v12zm10-9l-3-3v3h3zm.5 4v1h1l.5.5v4l-.5.5h-6l-.5-.5v-4l.5-.5h1V9a2 2 0 0 1 4 0zm-2.707-.707A1 1 0 0 0 10.5 9v1h2V9a1 1 0 0 0-1.707-.707zM9 11v3h5v-3H9z"
                                        ></path>
                                    </svg>
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
