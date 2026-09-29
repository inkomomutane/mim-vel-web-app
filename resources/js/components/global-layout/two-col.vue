<script setup lang="ts">
import { cn } from "@/lib/utils";
</script>

<template>
    <div :class="cn(`grid w-full grid-cols-1 gap-4 lg:grid-cols-[200px_1fr]`)">
        <aside>
            <slot name="aside" />
        </aside>

        <section>
            <slot name="default" />
        </section>
    </div>
</template>
