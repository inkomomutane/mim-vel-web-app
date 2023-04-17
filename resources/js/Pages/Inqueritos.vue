<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const fichas = [
    {
        title: "Inquerito sobre empregabilidade",
        data: 800,
    },
    {
        title: "Inquérito socio-economico",
        data: 320,
    },
    {
        title: "Inquerito de saneamento",
        data: 420,
    },
];
</script>
<template>
    <Head title="Inquéritos" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <!-- Right: Actions -->
        </template>
    </AuthenticatedLayout>
</template>
