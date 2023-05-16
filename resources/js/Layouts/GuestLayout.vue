<script setup lang="ts">
import Footer from "./partials/website/Footer.vue";
</script>
<template>
    <div class="bg-slate-200 dark:bg-slate-700 selection:bg-primary-500">
        <slot />
    </div>
    <Footer />
</template>
