<script setup lang="ts">
import {
    Head,
    Link,
} from '@inertiajs/vue3';
import AppLayout from "@/pages/Management/layouts/AppLayout.vue";
</script>

<template>
    <Head title="Home" />
    <AppLayout>
        <h1>Dashboard</h1>

        <Link :href="route('home')">
            About
        </Link>
    </AppLayout>
</template>
