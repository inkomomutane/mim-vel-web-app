<script setup lang="ts">
import {
    Head,
    Link, usePage,
} from '@inertiajs/vue3';
import AppLayout from "@/pages/Management/layouts/AppLayout.vue";
import IconPicker from "@/components/app/IconPicker.vue";

const form = usePage({
     icon_id: null
})
</script>

<template>
    <Head title="Home" />
    <AppLayout>
        <h1>Dashboard</h1>

        <IconPicker
            v-model="form.icon_id"
        />
    </AppLayout>
</template>
