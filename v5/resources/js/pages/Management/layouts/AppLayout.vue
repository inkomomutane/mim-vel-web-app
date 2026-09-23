<script setup lang="ts">
import AppContent from './AppContent.vue';
import AppHeader from './AppHeader.vue';
import AppShell from './AppShell.vue';
import type { BreadcrumbItemType } from '@/types';
import {Toaster} from "@/components/ui/sonner";
import { usePage } from '@inertiajs/vue3';import { h,watch,ref } from 'vue'
import { AlertDto } from '@/types/generated';


interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}
const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});





const page  = usePage();

watch(() => page.props.messages, (value) => {
    if (value) {
        toast(value?.message ?? '',{
            description: '',
            action: {
                label: 'Close',
                onClick: () => {
                    toast.dismiss();
                },
            }
        });
    }
});
</script>

<template>
    <Toaster />
    <AppShell class="flex-col" variant="header">
        <AppHeader :breadcrumbs="props.breadcrumbs" />
        <AppContent>
            <slot />
        </AppContent>
    </AppShell>
</template>
