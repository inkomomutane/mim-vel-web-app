<script setup lang="ts">
import { computed } from "vue";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { Button } from "@/components/ui/button";
import { ArrowUp, ArrowDown, ArrowUpDown } from "@lucide/vue";
import { cn } from "@/lib/utils";

const props = defineProps({
    column: {
        type: Object,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    class: {
        type: String,
        default: "",
    },
});

// Define the model binding link.
// If the parent doesn't provide v-model, it safely defaults to undefined/empty string.
const sortModel = defineModel<string>({ default: "" });
const fieldName = props.column.id;

// Strictly verify against the actual field name to avoid false positives
const isAsc = computed(() => {
    return sortModel.value !== undefined && sortModel.value === fieldName;
});

const isDesc = computed(() => {
    return sortModel.value !== undefined && sortModel.value === `-${fieldName}`;
});

const isSorted = computed(() => isAsc.value || isDesc.value);

const setSortDirection = (direction: "asc" | "desc") => {
    const newValue = direction === "asc" ? fieldName : `-${fieldName}`;

    // If the active state is already exactly what's requested, exit immediately.
    // This stops redundant processing/API calls.
    if (sortModel.value === newValue) return;

    // Update the parent model directly
    sortModel.value = newValue;
};
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button
                variant="ghost"
                type="button"
                :class="
                    cn(
                        'text-muted-foreground w-full justify-between gap-2 rounded-md border transition-all duration-200',
                        // Only apply active border styles if this column is GENUINELY sorted in the parent model
                        isSorted
                            ? 'text-foreground bg-accent/50 border font-semibold'
                            : 'border-transparent hover:bg-transparent',
                        props.class,
                    )
                "
            >
                <slot name="title" :title="title">
                    <span class="first-letter:uppercase">{{ title }}</span>
                </slot>

                <ArrowUp v-if="isAsc" class="text-primary h-4 w-4" />
                <ArrowDown v-else-if="isDesc" class="text-primary h-4 w-4" />
                <ArrowUpDown v-else class="h-4 w-4 opacity-40" />
            </Button>
        </DropdownMenuTrigger>

        <DropdownMenuContent align="start" class="side-offset-4 w-32">
            <DropdownMenuItem
                @select="setSortDirection('asc')"
                :class="
                    cn(
                        'flex cursor-pointer items-center gap-2',
                        isAsc && 'bg-accent text-primary font-medium',
                    )
                "
            >
                <ArrowUp class="h-4 w-4" />
                <span>Asc</span>
            </DropdownMenuItem>

            <DropdownMenuItem
                @select="setSortDirection('desc')"
                :class="
                    cn(
                        'flex cursor-pointer items-center gap-2',
                        isDesc && 'bg-accent text-primary font-medium',
                    )
                "
            >
                <ArrowDown class="h-4 w-4" />
                <span>Desc</span>
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
