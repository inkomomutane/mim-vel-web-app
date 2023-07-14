<script setup lang="ts">
defineProps({
    message: {
        type: String,
    },
});
</script>
<template>
    <span class="text-red-600 text-sm font-normal">{{ message }}</span>
</template>
