<script setup lang="ts">
import type { HTMLAttributes } from 'vue'

import {
    NumberField,
    NumberFieldDecrement,
    NumberFieldIncrement,
    NumberFieldInput,
} from '@/components/ui/number-field'

import {
    InputGroup,
    InputGroupAddon,
    InputGroupButton,
} from '@/components/ui/input-group'

import {
    Minus,
    Plus,
} from '@lucide/vue'

import { cn } from '@/lib/utils'

const model = defineModel<number | null>({
    default: null,
})

const props = withDefaults(
    defineProps<{
        id?: string
        name?: string

        min?: number
        max?: number
        step?: number

        prefix?: string
        suffix?: string

        placeholder?: string

        disabled?: boolean
        readonly?: boolean
        required?: boolean

        showControls?: boolean

        locale?: string
        formatOptions?: Intl.NumberFormatOptions

        class?: HTMLAttributes['class']
        inputClass?: HTMLAttributes['class']
    }>(),
    {
        step: 1,
        prefix: undefined,
        suffix: undefined,
        placeholder: undefined,
        disabled: false,
        readonly: false,
        required: false,
        showControls: false,
        locale: undefined,
        formatOptions: undefined,
    },
)
</script>

<template>
    <NumberField
        v-model="model"
        :id="id"
        :name="name"
        :min="min"
        :max="max"
        :step="step"
        :disabled="disabled"
        :readonly="readonly"
        :required="required"
        :locale="locale"
        :format-options="formatOptions"
        class="w-full"
    >
        <InputGroup
            :class="
                cn(
                    'focus-within:border-ring',
                    'focus-within:ring-ring/50',
                    'focus-within:ring-[3px]',
                    props.class,
                )
            "
        >
            <!-- LEFT SIDE -->
            <InputGroupAddon
                v-if="prefix || $slots.prefix"
                align="inline-start"
            >
                <slot name="prefix">
                    <span class="text-muted-foreground">
                        {{ prefix }}
                    </span>
                </slot>
            </InputGroupAddon>

            <!-- DECREMENT -->
            <InputGroupAddon
                v-if="showControls"
                align="inline-start"
            >
                <NumberFieldDecrement as-child>
                    <InputGroupButton
                        type="button"
                        size="icon-xs"
                        :disabled="disabled || readonly"
                    >
                        <Minus class="size-3.5" />
                    </InputGroupButton>
                </NumberFieldDecrement>
            </InputGroupAddon>

            <!-- ACTUAL NUMBER INPUT -->
            <NumberFieldInput
                :placeholder="placeholder"
                :class="
                    cn(
                        'h-full flex-1',
                        'rounded-none',
                        'border-0',
                        'bg-transparent',
                        'px-2',
                        'shadow-none',
                        'outline-none',
                        'focus-visible:ring-0',
                        'focus-visible:ring-offset-0',
                        props.inputClass,
                    )
                "
            />

            <!-- INCREMENT -->
            <InputGroupAddon
                v-if="showControls"
                align="inline-end"
            >
                <NumberFieldIncrement as-child>
                    <InputGroupButton
                        type="button"
                        size="icon-xs"
                        :disabled="disabled || readonly"
                    >
                        <Plus class="size-3.5" />
                    </InputGroupButton>
                </NumberFieldIncrement>
            </InputGroupAddon>

            <!-- RIGHT SIDE -->
            <InputGroupAddon
                v-if="suffix || $slots.suffix"
                align="inline-end"
            >
                <slot name="suffix">
                    <span class="text-muted-foreground">
                        {{ suffix }}
                    </span>
                </slot>
            </InputGroupAddon>
        </InputGroup>
    </NumberField>
</template>
