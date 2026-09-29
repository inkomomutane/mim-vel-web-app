<script setup lang="ts">
import { Icon } from "@iconify/vue";

import Marquee from "@/components/inspira-ui/marquee/index.vue";

const types = [
    { name: "Nuxt", icon: "simple-icons:nuxt" },
    { name: "Vue", icon: "simple-icons:vitess" },
    { name: "Vite", icon: "simple-icons:vite" },
    { name: "vitest", icon: "simple-icons:vitest" },
    { name: "vscode", icon: "simple-icons:visualstudiocode" },
    { name: "mysql", icon: "simple-icons:mysql" },
    { name: "prisma", icon: "simple-icons:prisma" },
];
</script>

<template>
    <div
        class="relative flex w-full -rotate-3 flex-col items-center justify-center overflow-hidden"
    >
        <Marquee pause-on-hover reverse class="[--duration:50s]">
            <div
                v-for="type in types"
                :key="type.name"
                class="mx-4 flex items-center gap-2"
            >
                <Icon :icon="type.icon" class="h-12 w-12" />
                <span class="text-4xl font-black">{{ type.name }}</span>
            </div>
        </Marquee>

        <!-- Left Gradient -->
        <div
            class="pointer-events-none absolute inset-y-0 left-0 w-1/3 bg-linear-to-r from-(--ui-bg) dark:from-(--ui-bg)"
        />

        <!-- Right Gradient -->
        <div
            class="pointer-events-none absolute inset-y-0 right-0 w-1/3 bg-linear-to-l from-(--ui-bg) dark:from-(--ui-bg)"
        />
    </div>
</template>
