<script setup lang="ts">
import AppLogoIcon from './AppLogoIcon.vue';

interface Props {
    class?: string;
}

defineProps<Props>();
</script>

<template>
    <div class="flex aspect-square  items-center justify-center rounded-md  text-sidebar-primary-foreground">
        <AppLogoIcon class="h-8 fill-current text-white dark:text-black" />
    </div>
</template>
