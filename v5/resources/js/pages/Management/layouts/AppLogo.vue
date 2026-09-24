<script setup lang="ts">
import AppLogoIcon from './AppLogoIcon.vue';

import {
    useSidebar,
} from '@/components/ui/sidebar';

const {
    state,
} = useSidebar();
</script>

<template>
    <div
        class="
            flex
            h-10
            items-center
            gap-2.5
            px-1
        "
    >
        <AppLogoIcon
            class="
                size-9
                shrink-0
                rounded-lg
                object-cover
            "
        />

        <div
            v-if="state !== 'collapsed'"
            class="
                min-w-0
                leading-tight
            "
        >
            <div
                class="
                    truncate
                    text-sm
                    font-bold
                    tracking-tight
                    text-neutral-950
                    dark:text-white
                "
            >
                Mimóvel
            </div>

            <div
                class="
                    truncate
                    text-[10px]
                    text-neutral-400
                "
            >
                Property Management
            </div>
        </div>
    </div>
</template>
