<script setup lang="ts">
import {
    computed,
    onMounted,
    ref,
    watch,
} from 'vue';

import {
    useDebounceFn,
} from '@vueuse/core';

import { route } from 'ziggy-js';

import PropertyFilterBar from './PropertyFilterBar.vue';
import PropertyFiltersDialog from './PropertyFiltersDialog.vue';

import {
    createEmptyPropertyFilterState,
    toPropertyFilterPayload,
} from './types';

import type {
    PropertyFilterMeta,
    PropertyFilterPayload,
} from './types';

const emit = defineEmits<{
    search: [
        filters: PropertyFilterPayload,
    ];
}>();

const filters = ref(
    createEmptyPropertyFilterState(),
);

const meta = ref<PropertyFilterMeta | null>(
    null,
);

const loadingMeta = ref(true);

const dialogOpen = ref(false);

const previewCount = ref<number | null>(
    null,
);

const previewLoading = ref(false);

const payload = computed(() => {
    return toPropertyFilterPayload(
        filters.value,
    );
});

const activeCount = computed(() => {
    let count = 0;

    if (
        filters.value
            .neighbourhoods
            .length
    ) {
        count++;
    }

    if (
        filters.value.minPrice !== null ||
        filters.value.maxPrice !== null
    ) {
        count++;
    }

    if (
        filters.value
            .propertyTypes
            .length
    ) {
        count++;
    }

    if (
        filters.value
            .conditions
            .length
    ) {
        count++;
    }

    if (
        filters.value
            .propertyFor
            .length
    ) {
        count++;
    }

    const numbers = [
        filters.value.minBedrooms,
        filters.value.maxBedrooms,

        filters.value.minBathrooms,
        filters.value.maxBathrooms,

        filters.value.minSuites,
        filters.value.maxSuites,

        filters.value.minGarages,
        filters.value.maxGarages,

        filters.value.minPools,
        filters.value.maxPools,

        filters.value.minFloors,
        filters.value.maxFloors,

        filters.value.minArea,
        filters.value.maxArea,

        filters.value.minYear,
        filters.value.maxYear,
    ];

    if (
        numbers.some(
            (value) => value !== null,
        )
    ) {
        count++;
    }

    return count;
});

const debouncedPreview =
    useDebounceFn(
        () => {
            void loadPreview();
        },
        300,
    );

watch(
    payload,
    () => {
        debouncedPreview();
    },
    {
        deep: true,
    },
);

onMounted(async () => {
    await loadMeta();
    await loadPreview();
});

async function loadMeta() {
    loadingMeta.value = true;

    try {
        const response = await fetch(
            route(
                'website.property-filter.meta',
            ),
            {
                headers: {
                    Accept: 'application/json',
                },
            },
        );

        if (!response.ok) {
            throw new Error(
                'Unable to load property filter metadata.',
            );
        }

        const json = await response.json();

        meta.value = json.data;
    } catch (error) {
        console.error(
            'Unable to load property filter metadata.',
            error,
        );
    } finally {
        loadingMeta.value = false;
    }
}

async function loadPreview() {
    previewLoading.value = true;

    try {
        const query =
            createQueryString(
                payload.value,
            );

        const url = `${
            route(
                'website.property-filter.preview',
            )
        }?${query}`;

        const response = await fetch(
            url,
            {
                headers: {
                    Accept: 'application/json',
                },
            },
        );

        if (!response.ok) {
            throw new Error(
                'Unable to load filter preview.',
            );
        }

        const json = await response.json();

        previewCount.value =
            json.data.total;
    } catch (error) {
        console.error(
            'Unable to load property preview.',
            error,
        );

        previewCount.value = null;
    } finally {
        previewLoading.value = false;
    }
}

function createQueryString(
    data: PropertyFilterPayload,
): string {
    const params =
        new URLSearchParams();

    Object.entries(data).forEach(
        ([key, value]) => {
            if (
                value === null ||
                value === undefined ||
                value === ''
            ) {
                return;
            }

            if (Array.isArray(value)) {
                value.forEach(
                    (item) => {
                        params.append(
                            `${key}[]`,
                            String(item),
                        );
                    },
                );

                return;
            }

            params.set(
                key,
                String(value),
            );
        },
    );

    return params.toString();
}

function clearFilters() {
    filters.value =
        createEmptyPropertyFilterState();
}

function search() {
    dialogOpen.value = false;

    emit(
        'search',
        payload.value,
    );
}
</script>

<template>
    <PropertyFilterBar
        v-model="filters"
        :meta="
            meta?.price ?? null
        "
        :loading="
            loadingMeta
        "
        :active-count="
            activeCount
        "
        @filters="
            dialogOpen = true
        "
        @search="
            search
        "
    />

    <PropertyFiltersDialog
        v-model="filters"
        :open="
            dialogOpen
        "
        :meta="
            meta?.price ?? null
        "
        :loading="
            loadingMeta
        "
        :preview-count="
            previewCount
        "
        :preview-loading="
            previewLoading
        "
        @update:open="
            dialogOpen = $event
        "
        @clear="
            clearFilters
        "
        @search="
            search
        "
    />
</template>
