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
                                d="M6,17V5c0-1.657,1.343-3,3-3h8c1.657,0,3,1.343,3,3v12c0,1.657-1.343,3-3,3H9C7.343,20,6,18.657,6,17z"
                                opacity=".35"
                                fill="currentColor"
                            />
                            <path
                                d="M9,20c-1.657,0-3-1.343-3-3V5C4.895,5,4,5.895,4,7v12c0,1.657,1.343,3,3,3h8c1.105,0,2-0.895,2-2H9z"
                                fill="currentColor"
                            />
                            <path
                                d="M12.883,12.973h-0.006c-0.67,0-1.187-0.605-1.072-1.265c0.35-2.013,1.917-2.083,1.917-3.333c0-0.347-0.06-1.124-0.896-1.124c-0.452,0-0.718,0.289-0.873,0.597c-0.209,0.417-0.691,0.622-1.15,0.541l0,0C10.107,8.265,9.68,7.519,9.975,6.877C10.397,5.96,11.261,5,12.972,5c2.776,0,3.148,2.174,3.148,3.196c0,2.416-1.799,2.506-2.172,3.898C13.813,12.596,13.403,12.973,12.883,12.973z M14.325,15.533c0,0.412-0.127,0.76-0.382,1.043C13.687,16.858,13.352,17,12.94,17c-0.414,0-0.748-0.142-1.003-0.424c-0.255-0.283-0.384-0.631-0.384-1.043c0-0.403,0.129-0.75,0.384-1.045c0.255-0.293,0.589-0.439,1.003-0.439c0.412,0,0.747,0.146,1.003,0.439C14.198,14.783,14.325,15.131,14.325,15.533z"
                                fill="currentColor"
                            />
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
</template>
