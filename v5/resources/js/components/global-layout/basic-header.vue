<script setup lang="ts">
import { cn } from "@/lib/utils";

import type { LayoutHeaderProps } from "./types";

defineProps<LayoutHeaderProps>();
</script>

<template>
    <header
        :class="
            cn(
                'flex flex-col justify-between gap-2 py-2 md:flex-row',
                sticky ? 'bg-background sticky top-14 z-40' : '',
            )
        "
    >
        <main>
            <h1 class="text-2xl font-bold">
                {{ title }}
            </h1>
            <p v-if="description" class="text-muted-foreground">
                {{ description }}
            </p>
        </main>

        <aside class="flex flex-wrap items-center gap-2">
            <slot name="actions" />
        </aside>
    </header>
</template>
