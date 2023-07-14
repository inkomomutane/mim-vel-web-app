<template>
    <li
        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0"
        :class="activeCondition && 'bg-gray-900'"
    >
        <slot :handleClick="handleClick" :expanded="expanded" />
    </li>
</template>

<script lang="ts" setup>
import { ref } from "vue";
const props = defineProps({
    activeCondition: Boolean,
});
const expanded = ref(props.activeCondition);
const handleClick = () => {
    expanded.value = !expanded.value;
};
</script>
