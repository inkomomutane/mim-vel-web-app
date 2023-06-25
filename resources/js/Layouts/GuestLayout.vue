<script setup lang="ts">
import Footer from "./partials/website/Footer.vue";
defineProps({
    showFooter: {
        type:Boolean,
    }
})
</script>
<template>
    <div class="bg-orange-100 dark:bg-slate-700 selection:bg-primary-500">
        <slot />
    </div>
    <Footer v-if="showFooter === true || showFooter == undefined || showFooter == null" />
</template>
