<template>
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <Sidebar
            :sidebarOpen="sidebarOpen"
            @close-sidebar="sidebarOpen = false"
        />
        <!-- Content area -->
        <div
            class="relative bg-slate-100 dark:bg-slate-900 flex flex-col flex-1 overflow-hidden overflow-y-auto overflow-x-hidden"
        >
            <!-- Site header -->
            <Header
                :sidebarOpen="sidebarOpen"
                @toggle-sidebar="sidebarOpen = !sidebarOpen"
            />
            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                    <!-- Cards -->
                    <slot name="content"></slot>
                </div>
            </main>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref } from "vue";
import Sidebar from "./partials/Sidebar.vue";
import Header from "./partials/Header.vue";
const sidebarOpen = ref(false);
</script>
