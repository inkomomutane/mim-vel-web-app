<script setup lang="ts">
import {
    computed,
    ref,
} from 'vue';

import {
    Filter,
    Search,
} from '@lucide/vue';

import { Button } from '@/components/ui/button';

import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover';

import { Separator } from '@/components/ui/separator';
import { Skeleton } from '@/components/ui/skeleton';

import PriceRangeFilter from './PriceRangeFilter.vue';
import RemoteFilterField from './RemoteFilterField.vue';

import type {
    PriceMeta,
    PropertyFilterState,
} from './types';

const props = defineProps<{
    meta: PriceMeta | null;
    loading: boolean;
    activeCount: number;
}>();

const emit = defineEmits<{
    filters: [];
    search: [];
}>();

const filters = defineModel<PropertyFilterState>({
    required: true,
});

const locationOpen = ref(false);
const priceOpen = ref(false);

const locationLabel = computed(() => {
    if (
        filters.value
            .neighbourhoods
            .length === 0
    ) {
        return 'Pesquisar localização';
    }

    const first =
        filters.value.neighbourhoods[0];

    if (
        filters.value
            .neighbourhoods
            .length === 1
    ) {
        return first.label;
    }

    return `${first.label} +${
        filters.value
            .neighbourhoods
            .length - 1
    }`;
});

const priceLabel = computed(() => {
    if (
        filters.value.minPrice === null &&
        filters.value.maxPrice === null
    ) {
        return 'Qualquer preço';
    }

    return [
        filters.value.minPrice !== null
            ? formatPrice(
                filters.value.minPrice,
            )
            : 'Mín.',

        filters.value.maxPrice !== null
            ? formatPrice(
                filters.value.maxPrice,
            )
            : 'Máx.',
    ].join(' – ');
});

function formatPrice(
    value: number,
) {
    return new Intl.NumberFormat(
        'pt-MZ',
        {
            maximumFractionDigits: 0,
        },
    ).format(value);
}

function setNeighbourhoods(
    value: typeof filters.value.neighbourhoods,
) {
    filters.value = {
        ...filters.value,
        neighbourhoods: value,
    };
}

function setMinPrice(
    value: number | null,
) {
    filters.value = {
        ...filters.value,
        minPrice: value,
    };
}

function setMaxPrice(
    value: number | null,
) {
    filters.value = {
        ...filters.value,
        maxPrice: value,
    };
}
</script>

<template>
    <div
        class="
            flex
            w-full

            items-center
            rounded-full
            border
            bg-background
            p-1.5

            transition-shadow
            hover:shadow-md
        "
    >
        <!-- Onde -->
        <Popover
            v-model:open="locationOpen"
        >
            <PopoverTrigger as-child>
                <button
                    type="button"
                    class="
                        flex
                        min-w-0
                        flex-[1.35]
                        flex-col
                        items-start
                        rounded-full
                        px-5
                        py-2
                        text-left
                        transition-colors
                        hover:bg-accent/60
                    "
                >
                    <span
                        class="
                            text-xs
                            font-semibold
                        "
                    >
                        Onde
                    </span>

                    <span
                        class="
                            w-full
                            truncate
                            text-sm
                        "
                        :class="
                            filters.neighbourhoods.length
                                ? 'text-foreground'
                                : 'text-muted-foreground'
                        "
                    >
                        {{ locationLabel }}
                    </span>
                </button>
            </PopoverTrigger>

            <PopoverContent
                align="start"
                :side-offset="8"
                class="
                    w-[min(94vw,380px)]
                    rounded-xl
                    p-4
                    shadow-xl
                "
            >
                <RemoteFilterField
                    :model-value="
                        filters.neighbourhoods
                    "
                    type="neighbourhoods"
                    placeholder="Pesquisar bairros..."
                    @update:model-value="
                        setNeighbourhoods
                    "
                />

            </PopoverContent>
        </Popover>

        <Separator
            orientation="vertical"
            class="h-8!"
        />

        <!-- Preços -->
        <Popover
            v-model:open="priceOpen"
        >
            <PopoverTrigger as-child>
                <button
                    type="button"
                    class="
                        flex
                        min-w-0
                        flex-1
                        flex-col
                        items-start
                        rounded-full
                        px-5
                        py-2
                        text-left
                        transition-colors
                        hover:bg-accent/60
                    "
                >
                    <span
                        class="
                            text-xs
                            font-semibold
                        "
                    >
                        Preços
                    </span>

                    <span
                        class="
                            w-full
                            truncate
                            text-sm
                            text-muted-foreground
                        "
                    >
                        {{ priceLabel }}
                    </span>
                </button>
            </PopoverTrigger>

            <PopoverContent
                align="center"
                :side-offset="8"
                class="
                    w-[min(94vw,480px)]
                    rounded-md
                    p-5

                "
            >
                <template
                    v-if="
                        loading ||
                        !meta
                    "
                >
                    <div class="space-y-4">
                        <Skeleton class="h-16 w-full" />
                        <Skeleton class="h-4 w-full" />

                        <div
                            class="
                                grid
                                grid-cols-2
                                gap-4
                            "
                        >
                            <Skeleton class="h-12 w-full" />
                            <Skeleton class="h-12 w-full" />
                        </div>
                    </div>
                </template>

                <PriceRangeFilter
                    v-else
                    :meta="meta"
                    :min-price="
                        filters.minPrice
                    "
                    :max-price="
                        filters.maxPrice
                    "
                    @update:min-price="
                        setMinPrice
                    "
                    @update:max-price="
                        setMaxPrice
                    "
                />
            </PopoverContent>
        </Popover>

        <Separator
            orientation="vertical"
            class="
                hidden
                h-8!
                sm:block
            "
        />

        <!-- Filters -->
        <button
            type="button"
            class="
                hidden
                min-w-0
                flex-1
                items-center
                gap-2
                rounded-full
                px-5
                py-2
                text-left
                transition-colors
                hover:bg-accent/60
                sm:flex
            "
            @click="
                emit('filters')
            "
        >
            <div
                class="
                    min-w-0
                    flex-1
                "
            >
                <p
                    class="
                        text-xs
                        font-semibold
                    "
                >
                    Filtros
                </p>

                <p
                    class="
                        truncate
                        text-sm
                        text-muted-foreground
                    "
                >
                    {{
                        activeCount
                            ? `${activeCount} activos`
                            : 'Mais opções'
                    }}
                </p>
            </div>

            <Filter class="size-4" />
        </button>

        <!-- Search -->
        <Button
            type="button"
            size="icon"
            class="
                size-11
                shrink-0
                rounded-full
                bg-black
                text-white
                hover:bg-black/85
            "
            @click="
                emit('search')
            "
        >
            <Search class="size-4" />
        </Button>
    </div>
</template>
