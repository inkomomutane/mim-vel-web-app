<script setup lang="ts">
import { computed } from 'vue';

import { Slider } from '@/components/ui/slider';
import NumberFieldInputGroup from '@/components/NumberFieldInputGroup.vue';

import type { PriceMeta } from './types';

const props = defineProps<{
    meta: PriceMeta;
}>();

const minPrice = defineModel<number | null>(
    'minPrice',
    {
        default: null,
    },
);

const maxPrice = defineModel<number | null>(
    'maxPrice',
    {
        default: null,
    },
);

const effectiveMin = computed(() => {
    return minPrice.value ?? props.meta.min;
});

const effectiveMax = computed(() => {
    return maxPrice.value ?? props.meta.max;
});

const range = computed<number[]>(() => [
    effectiveMin.value,
    effectiveMax.value,
]);

const largestBar = computed(() => {
    return Math.max(
        ...props.meta.histogram,
        1,
    );
});

function updateSlider(
    values: number[] | undefined,
) {
    if (
        !values ||
        values.length !== 2
    ) {
        return;
    }

    const minimum = Math.max(
        props.meta.min,
        values[0],
        0,
    );

    const maximum = Math.min(
        props.meta.max,
        values[1],
    );

    minPrice.value = minimum;

    maxPrice.value = Math.max(
        minimum + props.meta.step,
        maximum,
    );
}

function isBarActive(
    index: number,
): boolean {
    const total =
        props.meta.histogram.length;

    if (total === 0) {
        return false;
    }

    const fullRange =
        props.meta.max -
        props.meta.min;

    if (fullRange <= 0) {
        return true;
    }

    const bucketWidth =
        fullRange / total;

    const barStart =
        props.meta.min +
        bucketWidth * index;

    const barEnd =
        barStart +
        bucketWidth;

    return (
        barEnd >= effectiveMin.value &&
        barStart <= effectiveMax.value
    );
}
</script>

<template>
    <div class="w-full">
        <!-- Histogram + slider -->
        <div
            class="
                relative
                mb-7
                h-[72px]
                px-3
            "
        >
            <!-- Histogram -->
            <div
                class="
                    absolute
                    inset-x-4
                    bottom-[15px]
                    flex
                    h-[54px]
                    items-end
                    gap-[3px]
                "
            >
                <div
                    v-for="(
                        value,
                        index
                    ) in meta.histogram"
                    :key="index"
                    class="
                        -mb-2.5
                        min-w-[2px]
                        flex-1
                        rounded-t-[1px]
                        transition-colors
                        duration-150
                    "
                    :class="
                        isBarActive(index)
                            ? 'bg-foreground'
                            : 'bg-muted-foreground/15'
                    "
                    :style="{
                        height: `${
                            Math.max(
                                5,
                                (
                                    value /
                                    largestBar
                                ) * 100,
                            )
                        }%`,
                    }"
                />
            </div>

            <!-- Slider -->
            <Slider
                :model-value="range"
                :min="meta.min"
                :max="meta.max"
                :step="meta.step"
                :min-steps-between-thumbs="1"
                class="
                    price-slider
                    absolute
                    inset-x-0
                    bottom-1
                    z-10
                "
                @update:model-value="
                    updateSlider
                "
            />
        </div>

        <!-- Labels -->
        <div
            class="
                mb-2
                flex
                items-center
                justify-between
            "
        >
            <label
                class="
                    text-xs
                    font-medium
                    text-foreground
                "
            >
                Minimum
            </label>

            <label
                class="
                    text-xs
                    font-medium
                    text-foreground
                "
            >
                Max
            </label>
        </div>

        <!-- Inputs -->
        <div
            class="
                flex
                items-center
                justify-between
                gap-4
            "
        >
            <NumberFieldInputGroup
                v-model="minPrice"
                prefix="MZN"
                placeholder="Min"
                :min="0"
                :max="
                    effectiveMax -
                    meta.step
                "
                :step="meta.step"
                class="
                    rounded
                    bg-muted/60
                    shadow-none
                "
            />

            <NumberFieldInputGroup
                v-model="maxPrice"
                prefix="MZN"
                placeholder="Max"
                :min="
                    effectiveMin +
                    meta.step
                "
                :max="meta.max"
                :step="meta.step"
                class="
                    rounded
                    bg-muted/60
                    shadow-none
                "
            />
        </div>
    </div>
</template>

<style scoped>
/*
|--------------------------------------------------------------------------
| Slider track
|--------------------------------------------------------------------------
|
| Full track = muted grey.
| Selected range = foreground.
|
| Therefore:
|
|   grey ----- ● ███████████ ● ----- grey
|
| This behaves exactly like the histogram:
| inactive = muted
| active   = foreground
|
*/

.price-slider :deep([data-slot='slider-track']) {
    height: 2px;

    /*
     * Solid colour rather than transparent.
     *
     * We mix muted-foreground with background so that
     * it works correctly in both light and dark modes.
     */
    background: color-mix(
        in oklab,
        var(--muted-foreground) 18%,
        var(--background)
    );

    border-radius: 9999px;
}

/*
|--------------------------------------------------------------------------
| Selected range
|--------------------------------------------------------------------------
*/

.price-slider :deep([data-slot='slider-range']) {
    height: 2px;
    background: var(--foreground);
    border-radius: 9999px;
}

/*
|--------------------------------------------------------------------------
| Thumbs
|--------------------------------------------------------------------------
*/

.price-slider :deep([data-slot='slider-thumb']) {
    width: 26px;
    height: 26px;

    background: rgba(255, 255, 255, 0.98);

    border: 1px solid var(--border);
    border-radius: 9999px;

    box-shadow:
        0 1px 2px rgb(0 0 0 / 0.06),
        0 3px 5px rgb(0 0 0 / 0.10);

    z-index: 20;
}

/*
|--------------------------------------------------------------------------
| Dark mode thumb depth
|--------------------------------------------------------------------------
*/

:global(.dark)
.price-slider
:deep([data-slot='slider-thumb']) {
    box-shadow:
        0 1px 2px rgb(0 0 0 / 0.25),
        0 3px 6px rgb(0 0 0 / 0.35);
}

/*
|--------------------------------------------------------------------------
| Focus
|--------------------------------------------------------------------------
*/

.price-slider
:deep(
        [data-slot='slider-thumb']:focus-visible
    ) {
    outline: none;

    box-shadow:
        0 1px 2px rgb(0 0 0 / 0.08),
        0 3px 5px rgb(0 0 0 / 0.12),
        0 0 0 3px
        color-mix(
            in oklab,
            var(--ring) 20%,
            transparent
        );
}
.price-slider :deep([data-slot='slider-thumb']) {
    background: rgba(255, 250, 250, 0.93);
}
</style>
