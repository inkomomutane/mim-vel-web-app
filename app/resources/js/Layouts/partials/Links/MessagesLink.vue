<script setup lang="ts">
import { tooltip } from "@/helprs";
import { Link, usePage } from "@inertiajs/vue3";
import { watch, ref } from "vue";
const mails = ref(usePage().props.mails);

watch(
    () => usePage().props.mails,
    (mailsNumber) => (mails.value = mailsNumber)
);

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
            <div class="block text-slate-200 truncate transition duration-150">
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
                                class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-white bg-orange-500 px-3 rounded"
                            >
                                {{ mails }}
                            </span></span
                        >
                    </div>
                </div>
            </div>
        </li>
    </Link>
</template>
