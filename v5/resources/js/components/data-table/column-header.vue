<script setup lang="ts" generic="T extends RowData">
import type { RowData } from "@tanstack/vue-table";

import {
    ArrowDownIcon,
    ArrowLeftIcon,
    ArrowRightIcon,
    ArrowUpIcon,
    ChevronsUpDownIcon,
    EyeOffIcon,
    PinIcon,
    PinOffIcon,
} from "@lucide/vue";
import { computed } from "vue";

import type { DataTableColumn } from "@/components/data-table/table";

import { Button } from "@/components/ui/button";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { cn } from "@/lib/utils";

interface DataTableColumnHeaderProps {
    column: DataTableColumn<T>;
    title: string;
}

const props = defineProps<DataTableColumnHeaderProps>();

const canPinned = computed(() => props.column.getCanPin());
const canSorted = computed(() => props.column.getCanSort());
</script>

<script lang="ts">
export default {
    inheritAttrs: false,
};
</script>

<template>
    <div
        v-if="canSorted || canPinned"
        :class="cn('flex items-center space-x-2', $attrs.class ?? '')"
    >
        <DropdownMenu>
            <DropdownMenuTrigger as-child>
                <Button
                    variant="ghost"
                    size="sm"
                    class="data-[state=open]:bg-accent -ml-3 h-8"
                >
                    <template v-if="canPinned">
                        <PinIcon
                            v-if="props.column.getIsPinned()"
                            class="text-primary ml-2 size-4"
                        />
                    </template>

                    <span>{{ title }}</span>

                    <template v-if="canSorted">
                        <ArrowDownIcon
                            v-if="props.column.getIsSorted() === 'desc'"
                            class="ml-2 size-4"
                        />
                        <ArrowUpIcon
                            v-else-if="props.column.getIsSorted() === 'asc'"
                            class="ml-2 size-4"
                        />
                        <ChevronsUpDownIcon v-else class="ml-2 size-4" />
                    </template>
                </Button>
            </DropdownMenuTrigger>

            <DropdownMenuContent align="start">
                <template v-if="canSorted">
                    <DropdownMenuItem
                        @click="props.column.toggleSorting(false)"
                    >
                        <ArrowUpIcon
                            class="text-muted-foreground/70 mr-2 size-4"
                        />
                        Asc
                    </DropdownMenuItem>
                    <DropdownMenuItem @click="props.column.toggleSorting(true)">
                        <ArrowDownIcon
                            class="text-muted-foreground/70 mr-2 size-4"
                        />
                        Desc
                    </DropdownMenuItem>
                    <DropdownMenuItem @click="props.column.clearSorting()">
                        <ChevronsUpDownIcon
                            class="text-muted-foreground/70 mr-2 size-4"
                        />
                        Clear Sorting
                    </DropdownMenuItem>
                    <DropdownMenuSeparator />
                </template>

                <DropdownMenuItem @click="props.column.toggleVisibility(false)">
                    <EyeOffIcon class="text-muted-foreground/70 mr-2 size-4" />
                    Hide
                </DropdownMenuItem>

                <template v-if="canPinned">
                    <DropdownMenuSeparator />
                    <DropdownMenuItem @click="props.column.pin('start')">
                        <ArrowLeftIcon
                            class="text-muted-foreground/70 mr-2 size-4"
                        />
                        Pin Left
                    </DropdownMenuItem>
                    <DropdownMenuItem @click="props.column.pin('end')">
                        <ArrowRightIcon
                            class="text-muted-foreground/70 mr-2 size-4"
                        />
                        Pin Right
                    </DropdownMenuItem>
                    <DropdownMenuItem @click="props.column.pin(false)">
                        <PinOffIcon
                            class="text-muted-foreground/70 mr-2 size-4"
                        />
                        Unpin
                    </DropdownMenuItem>
                </template>
            </DropdownMenuContent>
        </DropdownMenu>
    </div>

    <div v-else :class="$attrs?.class ?? ''">
        {{ title }}
    </div>
</template>
