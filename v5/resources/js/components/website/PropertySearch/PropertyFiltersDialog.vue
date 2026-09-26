<script setup lang="ts">
import { X } from '@lucide/vue';

import { Button } from '@/components/ui/button';

import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';

import FilterSection from './FilterSection.vue';
import FiltersSkeleton from './FiltersSkeleton.vue';
import MinMaxNumberField from './MinMaxNumberField.vue';
import PriceRangeFilter from './PriceRangeFilter.vue';
import RemoteFilterField from './RemoteFilterField.vue';

import type {
    PriceMeta,
    PropertyFilterState,
} from './types';

defineProps<{
    open: boolean;
    meta: PriceMeta | null;
    loading: boolean;

    previewCount: number | null;
    previewLoading: boolean;
}>();

const emit = defineEmits<{
    'update:open': [value: boolean];
    clear: [];
    search: [];
}>();

const filters = defineModel<PropertyFilterState>({
    required: true,
});

function update<K extends keyof PropertyFilterState>(
    key: K,
    value: PropertyFilterState[K],
) {
    filters.value = {
        ...filters.value,
        [key]: value,
    };
}
</script>

<template>
    <Dialog
        :open="open"
        @update:open="
            emit(
                'update:open',
                $event,
            )
        "
    >
        <DialogContent
            class="
                grid
                h-[calc(100dvh-1rem)]
                w-[calc(100vw-1rem)]
                max-w-2xl
                grid-rows-[auto_minmax(0,1fr)_auto]
                gap-0
                overflow-hidden
                rounded-3xl
                border
                bg-background/98
                p-0
                shadow-2xl
                backdrop-blur-xl
                sm:h-[min(88dvh,850px)]
            "
        >
            <DialogHeader
                class="
                    border-b
                    px-5
                    py-5
                    pr-14
                    text-left
                    sm:px-7
                "
            >
                <DialogTitle
                    class="
                        text-xl
                        font-semibold
                        sm:text-2xl
                    "
                >
                    Filtros
                </DialogTitle>

                <DialogDescription>
                    Refine a pesquisa antes de mostrar os imóveis.
                </DialogDescription>
            </DialogHeader>

            <!-- Scrollable -->
            <div
                class="
                    min-h-0
                    overflow-y-auto
                    overscroll-contain
                    px-5
                    sm:px-7
                "
            >
                <FiltersSkeleton
                    v-if="
                        loading ||
                        !meta
                    "
                />

                <template v-else>
                    <FilterSection
                        title="Preço"
                    >
                        <PriceRangeFilter
                            :meta="meta"
                            :min-price="
                                filters.minPrice
                            "
                            :max-price="
                                filters.maxPrice
                            "
                            @update:min-price="
                                update(
                                    'minPrice',
                                    $event,
                                )
                            "
                            @update:max-price="
                                update(
                                    'maxPrice',
                                    $event,
                                )
                            "
                        />
                    </FilterSection>

                    <FilterSection
                        title="Onde"
                        description="Pode seleccionar vários bairros."
                    >
                        <RemoteFilterField
                            :model-value="
                                filters.neighbourhoods
                            "
                            type="neighbourhoods"
                            placeholder="Pesquisar bairros..."
                            @update:model-value="
                                update(
                                    'neighbourhoods',
                                    $event,
                                )
                            "
                        />
                    </FilterSection>

                    <FilterSection
                        title="Tipo de imóvel"
                    >
                        <RemoteFilterField
                            :model-value="
                                filters.propertyTypes
                            "
                            type="propertyTypes"
                            placeholder="Pesquisar tipos de imóvel..."
                            @update:model-value="
                                update(
                                    'propertyTypes',
                                    $event,
                                )
                            "
                        />
                    </FilterSection>

                    <FilterSection
                        title="Finalidade"
                    >
                        <RemoteFilterField
                            :model-value="
                                filters.propertyFor
                            "
                            type="propertyFor"
                            placeholder="Venda, arrendamento..."
                            @update:model-value="
                                update(
                                    'propertyFor',
                                    $event,
                                )
                            "
                        />
                    </FilterSection>

                    <FilterSection
                        title="Condição"
                    >
                        <RemoteFilterField
                            :model-value="
                                filters.conditions
                            "
                            type="conditions"
                            placeholder="Pesquisar condição..."
                            @update:model-value="
                                update(
                                    'conditions',
                                    $event,
                                )
                            "
                        />
                    </FilterSection>

                    <FilterSection
                        title="Divisões"
                    >
                        <div
                            class="
                                grid
                                gap-5
                                sm:grid-cols-2
                            "
                        >
                            <MinMaxNumberField
                                label="Quartos"
                                :minimum="
                                    filters.minBedrooms
                                "
                                :maximum="
                                    filters.maxBedrooms
                                "
                                @update:minimum="
                                    update(
                                        'minBedrooms',
                                        $event,
                                    )
                                "
                                @update:maximum="
                                    update(
                                        'maxBedrooms',
                                        $event,
                                    )
                                "
                            />

                            <MinMaxNumberField
                                label="Casas de banho"
                                :minimum="
                                    filters.minBathrooms
                                "
                                :maximum="
                                    filters.maxBathrooms
                                "
                                @update:minimum="
                                    update(
                                        'minBathrooms',
                                        $event,
                                    )
                                "
                                @update:maximum="
                                    update(
                                        'maxBathrooms',
                                        $event,
                                    )
                                "
                            />

                            <MinMaxNumberField
                                label="Suites"
                                :minimum="
                                    filters.minSuites
                                "
                                :maximum="
                                    filters.maxSuites
                                "
                                @update:minimum="
                                    update(
                                        'minSuites',
                                        $event,
                                    )
                                "
                                @update:maximum="
                                    update(
                                        'maxSuites',
                                        $event,
                                    )
                                "
                            />

                            <MinMaxNumberField
                                label="Garagens"
                                :minimum="
                                    filters.minGarages
                                "
                                :maximum="
                                    filters.maxGarages
                                "
                                @update:minimum="
                                    update(
                                        'minGarages',
                                        $event,
                                    )
                                "
                                @update:maximum="
                                    update(
                                        'maxGarages',
                                        $event,
                                    )
                                "
                            />

                            <MinMaxNumberField
                                label="Piscinas"
                                :minimum="
                                    filters.minPools
                                "
                                :maximum="
                                    filters.maxPools
                                "
                                @update:minimum="
                                    update(
                                        'minPools',
                                        $event,
                                    )
                                "
                                @update:maximum="
                                    update(
                                        'maxPools',
                                        $event,
                                    )
                                "
                            />

                            <MinMaxNumberField
                                label="Andares"
                                :minimum="
                                    filters.minFloors
                                "
                                :maximum="
                                    filters.maxFloors
                                "
                                @update:minimum="
                                    update(
                                        'minFloors',
                                        $event,
                                    )
                                "
                                @update:maximum="
                                    update(
                                        'maxFloors',
                                        $event,
                                    )
                                "
                            />
                        </div>
                    </FilterSection>

                    <FilterSection
                        title="Área"
                    >
                        <MinMaxNumberField
                            label="Área em m²"
                            :step="10"
                            :minimum="
                                filters.minArea
                            "
                            :maximum="
                                filters.maxArea
                            "
                            @update:minimum="
                                update(
                                    'minArea',
                                    $event,
                                )
                            "
                            @update:maximum="
                                update(
                                    'maxArea',
                                    $event,
                                )
                            "
                        />
                    </FilterSection>

                    <FilterSection
                        title="Ano"
                        :last="true"
                    >
                        <MinMaxNumberField
                            label="Ano de construção"
                            :min="1900"
                            :minimum="
                                filters.minYear
                            "
                            :maximum="
                                filters.maxYear
                            "
                            @update:minimum="
                                update(
                                    'minYear',
                                    $event,
                                )
                            "
                            @update:maximum="
                                update(
                                    'maxYear',
                                    $event,
                                )
                            "
                        />
                    </FilterSection>
                </template>
            </div>

            <!-- Fixed bottom footer -->
            <DialogFooter
                class="
                    flex-row
                    items-center
                    justify-between
                    gap-3
                    border-t
                    bg-background/95
                    px-5
                    py-4
                    backdrop-blur-xl
                    sm:px-7
                "
            >
                <Button
                    type="button"
                    variant="ghost"
                    class="
                        shrink-0
                        rounded-full
                    "
                    @click="
                        emit('clear')
                    "
                >
                    Limpar filtros
                </Button>

                <Button
                    type="button"
                    class="
                        min-w-36
                        rounded-full
                        bg-black
                        px-5
                        text-white
                        hover:bg-black/85
                    "
                    @click="
                        emit('search')
                    "
                >
                    <template
                        v-if="
                            previewLoading
                        "
                    >
                        A calcular...
                    </template>

                    <template
                        v-else
                    >
                        ({{
                            previewCount ?? 0
                        }})
                        Mostrar resultados
                    </template>
                </Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>
