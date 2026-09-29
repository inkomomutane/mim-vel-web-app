<script setup lang="ts">
import { Button } from "@/components/ui/button";
import type { Row } from "@tanstack/vue-table";
import { MoreHorizontal, EllipsisVertical } from "@lucide/vue";
import type { LucideIcon } from "@lucide/vue";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuRadioGroup,
    DropdownMenuRadioItem,
    DropdownMenuSeparator,
    DropdownMenuShortcut,
    DropdownMenuSub,
    DropdownMenuSubContent,
    DropdownMenuSubTrigger,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
interface DataTableRowActionsProps {
    row: Row;
    defaultActionIcon?: LucideIcon;
    actions: {
        label: string;
        onClick: (row: Row) => void;
        icon?: LucideIcon;
        hasSeparator?: boolean;
        disable?: boolean;
        children?: Array<{
            label: string;
            onClick: (row: Row) => void;
            icon?: LucideIcon;
            disable?: boolean;
            hasSeparator?: boolean;
        }>;
    }[];
}
const props = withDefaults(defineProps<DataTableRowActionsProps>(), {
    actions: [],
});
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button
                variant="ghost"
                class="data-[state=open]:bg-muted flex h-6 w-6 p-0"
            >
                <template v-if="props.defaultActionIcon">
                    <component :is="props.defaultActionIcon" class="h-4 w-4" />
                </template>
                <template v-else>
                    <EllipsisVertical class="h-4 w-4" />
                </template>

                <span class="sr-only">Open menu</span>
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end" class="max-w-[600px]">
            <template v-for="(action, index) in props.actions" :key="index">
                <DropdownMenuItem
                    :disabled="action?.disabled || false"
                    @click="
                        action?.disabled ? () => {} : action.onClick(props.row)
                    "
                    v-if="!action.children || action.children.length === 0"
                >
                    <component
                        v-if="action.icon"
                        :is="action.icon"
                        class="mr-2 h-4 w-4"
                    />
                    {{ action.label }}
                </DropdownMenuItem>
                <DropdownMenuSeparator v-if="action.hasSeparator" />
                <DropdownMenuSub
                    v-if="action.children && action.children.length > 0"
                >
                    <DropdownMenuSubTrigger>
                        <component
                            v-if="action.icon"
                            :is="action.icon"
                            class="mr-2 h-4 w-4"
                        />
                        {{ action.label }}
                    </DropdownMenuSubTrigger>
                    <DropdownMenuSubContent align="start" class="w-[160px]">
                        <template
                            v-for="(childAction, childIndex) in action.children"
                            :key="childIndex"
                        >
                            <DropdownMenuItem
                                :disabled="childAction?.disabled || false"
                                @click="
                                    childAction?.disabled
                                        ? () => {}
                                        : childAction.onClick(props.row)
                                "
                            >
                                <component
                                    v-if="childAction.icon"
                                    :is="childAction.icon"
                                    class="mr-2 h-4 w-4"
                                />
                                {{ childAction.label }}
                            </DropdownMenuItem>
                            <DropdownMenuSeparator
                                v-if="childAction.hasSeparator"
                            />
                        </template>
                    </DropdownMenuSubContent>
                </DropdownMenuSub>
            </template>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
