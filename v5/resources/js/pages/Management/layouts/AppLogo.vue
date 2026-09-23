<script setup lang="ts">
import AppLogoIcon from './AppLogoIcon.vue';

interface Props {
    class?: string;
}

defineProps<Props>();
</script>

<template>
    <div class="flex aspect-square  items-center justify-center rounded-md  text-sidebar-primary-foreground">
        <AppLogoIcon class="size-8 fill-current text-white dark:text-black" />
    </div>
    <div class="ml-1 grid flex-1 text-left text-xs">
        <span class="mb-0.5 truncate font-semibold leading-none">Mimóvel</span>
    </div>
</template>
