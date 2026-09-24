<script setup lang="ts">
import type {
    HTMLAttributes,
} from 'vue';

import logo from '@/images/logo/logo.jpg';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    class?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <img
        :src="logo"
        :class="$props.class"
        v-bind="$attrs"
        alt="Logo"
    />
</template>
