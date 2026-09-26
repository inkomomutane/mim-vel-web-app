<script setup lang="ts">
import {HTMLAttributes} from "vue";
import {cn} from "@/lib/utils";

const props = defineProps<{
    class?: HTMLAttributes['class']
}>()
</script>

<template>
    <section
        :class="cn('py-8 max-w-4xl mx-auto',props.class)"
    >
        <div class="mb-4">
            <p
                v-if="description"
                class="
                    mt-1
                    text-xs
                    text-muted-foreground
                "
            >
                {{ description }}
            </p>
        </div>

        <slot />
    </section>
</template>
