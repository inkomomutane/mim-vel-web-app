<script setup lang="ts">
import { tooltip } from "@/helprs";
import { Link, usePage } from "@inertiajs/vue3";

const authorized = () => {
    const $userRole = usePage().props.auth.user?.role.name;
    return (
        $userRole == "Super-Admin" ||
        $userRole == "Admin" ||
        $userRole == "Sub-Admin" ||
        $userRole == "Agencia-imobiliaria" ||
        $userRole == "Agente-imobiliario"
    );
};
</script>
<template>
    <Link
        v-if="authorized()"
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
            <div class="block text-slate-200 truncate transition duration-150">
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
</template>
