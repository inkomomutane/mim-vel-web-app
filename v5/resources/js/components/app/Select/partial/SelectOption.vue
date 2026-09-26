<script setup lang="ts">
import type { SelectOptionType } from "./SelectOptionType";
import { Badge } from "@/components/ui/badge";
import { cn } from "@/lib/utils";
import { defineProps, PropType } from "vue";
const props = defineProps({
    option: {
        type: Object as PropType<SelectOptionType>,
        default: () => {
            return {
                id: "",
                title: "",
                subtitle: "",
                prefix_slug: "",
                slug: "",
                notes: "",
                trailer: "",
            };
        },
    },
    class: {
        type: String,
        default: "",
    },
    selected: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <div
        v-if="props.option"
        :class="
            cn(
                'flex w-full cursor-pointer flex-row items-center justify-between border-l-4 p-2 py-3 text-sm font-medium transition-colors duration-200',
                [
                    'hover:bg-zinc-100 dark:hover:bg-zinc-800',
                    'dark:focus:bg-background focus:bg-zinc-100',
                ],
                {
                    'bg-background border-zinc-600 dark:border-white':
                        props.selected,
                    'hover:bg-background': props.selected,
                    'focus:bg-background': props.selected,
                    'border-transparent': !props.selected,
                },
                [
                    '!min-w-72',
                    'border-b border-b-gray-200/80 dark:border-b-zinc-900/90',
                ],
                props.class,
            )
        "
    >
        <div class="flex w-full flex-col">
            <div
                class="flex w-full flex-row items-center justify-between gap-2"
            >
                <div class="flex flex-row items-center gap-1">
                    <Badge
                        v-if="props.option.prefix_slug"
                        variant="outline"
                        class="rounded-sm border-gray-950/10 bg-transparent text-xs dark:border-gray-100/10"
                    >
                        {{ props.option.prefix_slug }}
                    </Badge>
                    <Badge
                        variant="secondary"
                        class="rounded-sm border border-gray-950/10 bg-transparent text-xs dark:border-gray-100/10"
                    >
                        {{ props.option.slug }}
                    </Badge>
                </div>

                <span class="text-foreground text-xs font-semibold">
                    <slot name="trailer" :option="props.option">
                        {{ props.option.trailer ?? "" }}
                    </slot>
                </span>
            </div>
            <div class="mt-1 flex flex-col gap-1">
                <span
                    :class="
                        cn('line-clamp-2 font-medium first-letter:uppercase', {
                            'font-bold': props.selected,
                        })
                    "
                >
                    {{ props.option.title }}
                </span>
                <span class="text-muted-foreground line-clamp-2 text-sm">
                    {{ props.option.notes }}
                </span>
            </div>
        </div>
    </div>
</template>
