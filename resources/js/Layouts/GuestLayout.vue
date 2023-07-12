<script setup lang="ts">
import Footer from "./partials/website/Footer.vue";
import Header from "./partials/website/Header.vue";
defineProps({
    showFooter: {
        type: Boolean,
    },
});
</script>
<template>
    <Header :solid-bg="true"/>
    <div class="bg-slate-50 dark:bg-slate-700 selection:bg-primary-500">
        <slot />
    </div>
    <Footer
        v-if="
            showFooter === true || showFooter == undefined || showFooter == null
        "
    />
</template>
