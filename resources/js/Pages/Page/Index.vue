<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { FlasherResponse } from '@flasher/flasher';
import { Head } from '@inertiajs/vue3';
import { PropType } from 'vue';

const props = defineProps({
    pageData: Object as PropType<App.Data.PageData>,
    messages: Object as PropType<FlasherResponse>,
});

</script>
<template>
    <Head title="Politicas de privacidade" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <span>
                {{ pageData }}
            </span>
        </template>
    </AuthenticatedLayout>
</template>
