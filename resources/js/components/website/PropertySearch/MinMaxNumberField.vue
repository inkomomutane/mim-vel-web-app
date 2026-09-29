<script setup lang="ts">
import {
    InputGroup,
    InputGroupInput,
} from '@/components/ui/input-group';

const props = withDefaults(
    defineProps<{
        label: string;
        min?: number;
        step?: number;
    }>(),
    {
        min: 0,
        step: 1,
    },
);

const minimum = defineModel<number | null>(
    'minimum',
    {
        default: null,
    },
);

const maximum = defineModel<number | null>(
    'maximum',
    {
        default: null,
    },
);

function setMinimum(
    raw: string | number,
) {
    const value = Number(raw);

    if (!Number.isFinite(value)) {
        minimum.value = null;

        return;
    }

    const safe = Math.max(
        props.min,
        value,
    );

    if (
        maximum.value !== null &&
        safe > maximum.value
    ) {
        minimum.value =
            maximum.value;

        return;
    }

    minimum.value = safe;
}

function setMaximum(
    raw: string | number,
) {
    const value = Number(raw);

    if (!Number.isFinite(value)) {
        maximum.value = null;

        return;
    }

    maximum.value = Math.max(
        props.min,
        minimum.value ?? props.min,
        value,
    );
}
</script>

<template>
    <div class="space-y-2">
        <p class="text-sm font-medium">
            {{ label }}
        </p>

        <div
            class="
                grid
                grid-cols-2
                gap-3
            "
        >
            <div class="space-y-1.5">
                <span
                    class="
                        text-xs
                        text-muted-foreground
                    "
                >
                    Mínimo
                </span>

                <InputGroup>
                    <InputGroupInput
                        type="number"
                        inputmode="numeric"
                        :min="min"
                        :max="
                            maximum ??
                            undefined
                        "
                        :step="step"
                        :model-value="
                            minimum ??
                            ''
                        "
                        placeholder="Qualquer"
                        @update:model-value="
                            setMinimum
                        "
                    />
                </InputGroup>
            </div>

            <div class="space-y-1.5">
                <span
                    class="
                        text-xs
                        text-muted-foreground
                    "
                >
                    Máximo
                </span>

                <InputGroup>
                    <InputGroupInput
                        type="number"
                        inputmode="numeric"
                        :min="
                            minimum ??
                            min
                        "
                        :step="step"
                        :model-value="
                            maximum ??
                            ''
                        "
                        placeholder="Qualquer"
                        @update:model-value="
                            setMaximum
                        "
                    />
                </InputGroup>
            </div>
        </div>
    </div>
</template>
