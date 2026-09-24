<script setup lang="ts">
import AppContent from './AppContent.vue';
import AppHeader from './AppHeader.vue';
import AppShell from './AppShell.vue';
import AppSidebar from './AppSidebar.vue';

import {
    SidebarInset,
} from '@/components/ui/sidebar';

import {
    Toaster,
} from '@/components/ui/sonner';

import type {
    BreadcrumbItemType,
} from '@/types';

import { usePage } from '@inertiajs/vue3';

import { watch } from 'vue';

import { toast } from 'vue-sonner';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

const props = withDefaults(
    defineProps<Props>(),
    {
        breadcrumbs: () => [],
    },
);

const page = usePage();

watch(
    () => page.props.messages,
    (value) => {
        if (!value) {
            return;
        }

        toast(value?.message ?? '', {
            description: '',
            action: {
                label: 'Close',
                onClick: () => {
                    toast.dismiss();
                },
            },
        });
    },
);
</script>

<template>
    <Toaster />

    <AppShell>

        <AppSidebar />

        <SidebarInset
            class="
                min-w-0
                bg-[#f7f7f7]
                dark:bg-zinc-900
            "
        >
            <AppHeader
                :breadcrumbs="props.breadcrumbs"
            />

            <AppContent>
                <slot />
            </AppContent>
        </SidebarInset>

    </AppShell>
</template>
