<script setup lang="ts">
import type { IconData, LucideIconNode } from "@/types";

import { Icon } from "@lucide/vue";

defineOptions({
    inheritAttrs: false,
});

const props = withDefaults(
    defineProps<{
        icon?: IconData | null;
        iconNode?: LucideIconNode | null;
        size?: number | string;
        strokeWidth?: number;
    }>(),
    {
        icon: null,
        iconNode: null,
        size: 20,
        strokeWidth: 2,
    },
);

const node = computed(() => {
    return props.iconNode ?? props.icon?.icon_node ?? null;
});

import { computed } from "vue";
</script>

<template>
    <Icon
        v-if="node"
        :icon-node="node"
        :size="size"
        :stroke-width="strokeWidth"
        v-bind="$attrs"
    />
</template>
