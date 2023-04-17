<template>
    <div>
        <!-- Sidebar backdrop (mobile only) -->
        <div
            class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
            :class="
                sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'
            "
            aria-hidden="true"
        ></div>

        <!-- Sidebar -->
        <div
            id="sidebar"
            ref="sidebar"
            class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        >
            <!-- Sidebar header -->
            <div class="flex justify-between mb-10 pr-3 sm:px-2 align-middle">
                <!-- Close button -->
                <button
                    ref="trigger"
                    class="lg:hidden text-slate-500 hover:text-slate-400"
                    @click.stop="$emit('close-sidebar')"
                    aria-controls="sidebar"
                    :aria-expanded="sidebarOpen"
                >
                    <span class="sr-only">Close sidebar</span>
                    <svg
                        class="w-6 h-6 fill-current"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"
                        />
                    </svg>
                </button>
                <!-- Logo -->
                <div :class="`${sidebarExpanded ? 'block' : 'md:hidden'}`">
                    <img src="@/images/logo/logo.png" alt="Logo" width="80" />
                </div>
                <!-- Expand / collapse button -->
                <div
                    class="hidden lg:inline-flex 2xl:hidden justify-end mt-auto"
                >
                    <div class="px-3 py-2">
                        <button
                            @click.prevent="sidebarExpanded = !sidebarExpanded"
                        >
                            <span class="sr-only"
                                >Expand / collapse sidebar</span
                            >

                            <svg
                                class="w-6 h-6 fill-current sidebar-expanded:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    class="text-gray-400"
                                    opacity="0.3"
                                    d="M12.9 10.7L3 5V19L12.9 13.3C13.9 12.7 13.9 11.3 12.9 10.7Z"
                                />
                                <path
                                    class="text-slate-400"
                                    d="M21 10.7L11.1 5V19L21 13.3C22 12.7 22 11.3 21 10.7Z"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Links -->
            <div class="space-y-8">
                <!-- Pages group -->
                <div>
                    <h3
                        class="text-xs uppercase text-slate-500 font-semibold pl-3"
                    >
                        <span
                            class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                            aria-hidden="true"
                            >•••</span
                        >
                        <span
                            class="lg:hidden lg:sidebar-expanded:block 2xl:block"
                            >Pages</span
                        >
                    </h3>
                    <ul class="mt-3">
                        <!-- Dashboard -->

                        <Link :href="route('dashboard')">
                            <li
                                class="px-3 py-2 rounded mb-0.5 last:mb-0"
                                :class="
                                    route().current('dashboard')
                                        ? ' bg-slate-950'
                                        : ''
                                "
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                >
                                    <div
                                        class="flex items-center justify-between"
                                    >
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
                        <Link :href="route('inqueritos')">
                            <li
                                class="px-3 py-2 rounded mb-0.5 last:mb-0"
                                :class="
                                    route().current('inqueritos')
                                        ? ' bg-slate-950'
                                        : ''
                                "
                            >
                                <a
                                    class="block text-slate-200 truncate transition duration-150"
                                >
                                    <div
                                        class="flex items-center justify-between"
                                    >
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
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                    fill="black"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                                    fill="black"
                                                />
                                                <path
                                                    class="fill-current text-gray-100"
                                                    d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                                    fill="black"
                                                />
                                            </svg>
                                            <span
                                                class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"
                                                >Inquéritos</span
                                            >
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </Link>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { ref, onMounted, onUnmounted, watch } from "vue";
import SidebarLinkGroup from "./SidebarLinkGroup.vue";
import { Link } from "@inertiajs/vue3";

export default {
    name: "Sidebar",
    props: ["sidebarOpen"],
    components: {
        SidebarLinkGroup,
        Link,
    },
    setup(props, { emit }) {
        const trigger = ref<any>(null);
        const sidebar = ref<any>(null);
        const sidebarExpanded = ref(true);

        // close on click outside
        const clickHandler = ({ target }: { target: any }) => {
            if (!sidebar.value || !trigger.value) return;
            if (
                !props.sidebarOpen ||
                sidebar.value.contains(target) ||
                trigger.value.contains(target)
            )
                return emit("close-sidebar");
        };

        // close if the esc key is pressed
        const keyHandler = ({ keyCode }: { keyCode: any }) => {
            if (!props.sidebarOpen || keyCode !== 27) return;
            emit("close-sidebar");
        };

        onMounted(() => {
            document.addEventListener("click", clickHandler);
            document.addEventListener("keydown", keyHandler);
            document.querySelector("body")?.classList.add("sidebar-expanded");
        });

        onUnmounted(() => {
            document.removeEventListener("click", clickHandler);
            document.removeEventListener("keydown", keyHandler);
        });

        watch(sidebarExpanded, () => {
            if (sidebarExpanded.value) {
                document
                    .querySelector("body")
                    ?.classList.add("sidebar-expanded");
            } else {
                document
                    .querySelector("body")
                    ?.classList.remove("sidebar-expanded");
            }
        });

        return {
            trigger,
            sidebar,
            sidebarExpanded,
        };
    },
};
</script>
