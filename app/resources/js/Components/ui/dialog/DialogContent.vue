<script setup lang="ts">
import {
    DialogClose,
    DialogContent,
    type DialogContentEmits,
    type DialogContentProps,
    DialogOverlay,
    DialogPortal,
    useEmitAsProps,
} from "radix-vue";
import { Cross2Icon } from "@radix-icons/vue";
import { cn } from "@/lib/utils";

const props = defineProps<DialogContentProps & { class?: string }>();
const emits = defineEmits<DialogContentEmits>();

const emitsAsProps = useEmitAsProps(emits);
</script>

<template>
    <DialogPortal>
        <DialogOverlay
            class="fixed inset-0 z-50 bg-slate-900/80 backdrop-blur-sm data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 dark:bg-slate-950/80"
        />
        <DialogContent
            :class="
                cn(
                    'fixed left-[50%] top-[5%] z-50 grid max-w-4xl translate-x-[-50%]  gap-4 border border-slate-200 border-slate-200 bg-white p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] sm:rounded-lg md:w-full dark:border-slate-800 dark:border-slate-800 dark:bg-slate-950',
                    props.class
                )
            "
            v-bind="{ ...props, ...emitsAsProps }"
        >
            <slot />

            <DialogClose
                class="absolute top-4 right-4 p-0.5 transition-colors rounded-md hover:bg-slate-100 dark:hover:bg-slate-800"
            >
                <Cross2Icon class="w-4 h-4" />
                <span class="sr-only">Close</span>
            </DialogClose>
        </DialogContent>
    </DialogPortal>
</template>
