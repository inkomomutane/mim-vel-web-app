<script setup lang="ts">
import { computed } from 'vue'
import { formatMoney } from '@/lib/money'
import currency from  "currency.js"

const props = withDefaults(
    defineProps<{
        amount?: string | number | null
        currency?: string
        locale?: string
        fractionDigits?: number
    }>(),
    {
        currency: 'MZN',
        locale: 'pt-MZ',
        fractionDigits: 2,
    },
)

const formatted = computed(() =>
    currency(props.amount,{
        symbol: props.currency ? props.currency + ' ' : '',
        precision: props.fractionDigits,
        separator: '.',
        decimal: ',',
    }).format(),
)
</script>

<template>
    <data
        v-if="formatted"
        :value="String(amount)"
        class="font-mono font-bold text-slate-600 text-zinc-900 dark:text-zinc-50 "
    >
        {{ formatted }}
    </data>
</template>
