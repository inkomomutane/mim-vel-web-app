<script setup lang="ts">
import {
    SidebarProvider,
} from '@/components/ui/sidebar';
</script>

<template>
    <SidebarProvider
        class="
            min-h-screen
            bg-[#f7f7f7]
            dark:bg-zinc-900
        "
    >
        <slot />
    </SidebarProvider>
</template>
