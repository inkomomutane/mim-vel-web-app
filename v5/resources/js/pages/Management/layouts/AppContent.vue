<script setup lang="ts">
interface Props {
    class?: string;
}

defineProps<Props>();
</script>

<template>
    <main
        class="
            flex
            w-full
            flex-1
            flex-col
            p-4
            lg:p-6
        "
        :class="$props.class"
    >
        <div
            class="
                mx-auto
                flex
                w-full
                max-w-[1600px]
                flex-1
                flex-col
                gap-4
            "
        >
            <slot />
        </div>
    </main>
</template>
