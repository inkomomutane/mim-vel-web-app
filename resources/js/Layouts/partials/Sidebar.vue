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
            class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
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
            <Links />
        </div>
    </div>
</template>

<script lang="ts">
import { ref, onMounted, onUnmounted, watch } from "vue";
import { Link } from "@inertiajs/vue3";
import Links from "./Links.vue";
import SidebarLinkGroup from "./SidebarLinkGroup.vue";

export default {
    name: "Sidebar",
    props: {
        sidebarOpen:Boolean
    },
    components: {
        SidebarLinkGroup,
        Link,
        Links,
    },
    setup(props, { emit }) {
        const trigger = ref<any|null>(null);
        const sidebar = ref<any|null>(null);

        const storedSidebarExpanded = localStorage.getItem("sidebar-expanded");
        const sidebarExpanded = ref(storedSidebarExpanded === "true" );

        // close on click outside
        const clickHandler = ({ target } : {target:any})  => {
            if (!sidebar.value || !trigger.value) return;
            if (
                !props.sidebarOpen ||
                sidebar.value.contains(target) ||
                trigger.value.contains(target)
            )
                return;
            emit("close-sidebar");
        };

        // close if the esc key is pressed
        const keyHandler = ({ keyCode } : { keyCode :any }) => {
            if (!props.sidebarOpen || keyCode !== 27) return;
            emit("close-sidebar");
        };

        onMounted(() => {
            document.addEventListener("click", clickHandler);
            document.addEventListener("keydown", keyHandler);
            document.querySelector("body")?.classList.add("sidebar-expanded");
            localStorage.setItem("sidebar-expanded","true");
        });

        onUnmounted(() => {
            document.removeEventListener("click", clickHandler);
            document.removeEventListener("keydown", keyHandler);
        });

        watch(sidebarExpanded, () => {
            localStorage.setItem("sidebar-expanded", `${sidebarExpanded.value}`);
            if (sidebarExpanded.value) {
                document.querySelector("body")?.classList.add("sidebar-expanded");
            } else {
                document.querySelector("body")?.classList.remove("sidebar-expanded");
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
