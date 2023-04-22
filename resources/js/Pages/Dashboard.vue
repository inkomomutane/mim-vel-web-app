<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>
<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template v-slot:content> </template>
    </AuthenticatedLayout>
</template>
