<script setup lang="ts">
import { DialogTitle, type DialogTitleProps } from "radix-vue";
import { cn } from "@/lib/utils";

const props = defineProps<DialogTitleProps & { class?: string }>();
</script>

<template>
    <DialogTitle
        v-bind="props"
        :class="
            cn(
                'text-lg text-slate-950 font-semibold leading-none tracking-tight dark:text-slate-50',
                props.class
            )
        "
    >
        <slot />
    </DialogTitle>
</template>
