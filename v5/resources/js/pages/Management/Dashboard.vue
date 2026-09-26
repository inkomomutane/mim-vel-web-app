<script setup lang="ts">
import AppLayout from "@/pages/Management/layouts/AppLayout.vue";
import Dashboard from "@/pages/Management/dashboard/index.vue";
import IconPicker from "@/components/app/IconPicker.vue";
</script>

<template>
    <AppLayout>

         <IconPicker />
        <Dashboard />
    </AppLayout>
</template>
