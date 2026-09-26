<script setup lang="ts">
import {
    computed,
    nextTick,
    ref,
} from 'vue';

import {
    onClickOutside,
    useDebounceFn,
} from '@vueuse/core';

import {
    Check,
    MapPin,
    Search,
    X,
} from '@lucide/vue';

import { route } from 'ziggy-js';

import { Skeleton } from '@/components/ui/skeleton';

import type {
    FilterOption,
    RemoteFilterType,
} from './types';

const props = withDefaults(
    defineProps<{
        type: RemoteFilterType;
        placeholder?: string;
        emptyText?: string;
        suggestionsText?: string;
        selectedText?: string;
    }>(),
    {
        placeholder: 'Pesquisar...',
        emptyText: 'Nenhum resultado encontrado.',
        suggestionsText: 'Sugestões',
        selectedText: 'Seleccionados',
    },
);

const model = defineModel<FilterOption[]>({
    default: () => [],
});

const root = ref<HTMLElement | null>(null);
const input = ref<HTMLInputElement | null>(null);

const query = ref('');
const options = ref<FilterOption[]>([]);

const open = ref(false);
const loading = ref(false);

const cache = new Map<
    string,
    FilterOption[]
>();

let activeController:
    | AbortController
    | null = null;

const selectedIds = computed(() => {
    return new Set(
        model.value.map(
            (item) => item.id,
        ),
    );
});

/**
 * Selected values are always shown first.
 */
const selectedOptions = computed(() => {
    return model.value;
});

/**
 * Prevent selected items from being repeated
 * inside the normal suggestion list.
 */
const availableOptions = computed(() => {
    return options.value.filter(
        (option) => {
            return !selectedIds.value.has(
                option.id,
            );
        },
    );
});

const hasResults = computed(() => {
    return (
        selectedOptions.value.length > 0 ||
        availableOptions.value.length > 0
    );
});

onClickOutside(
    root,
    () => {
        close();
    },
);

const debouncedSearch = useDebounceFn(
    () => {
        void loadOptions();
    },
    250,
);

async function loadOptions() {
    const search =
        query.value.trim();

    const cacheKey = [
        props.type,
        search.toLocaleLowerCase(),
    ].join(':');

    const cached =
        cache.get(cacheKey);

    if (cached) {
        options.value = cached;

        return;
    }

    activeController?.abort();

    const controller =
        new AbortController();

    activeController =
        controller;

    loading.value = true;

    try {
        const response =
            await fetch(
                route(
                    'website.property-filter.options',
                    {
                        type: props.type,
                        search,
                    },
                ),
                {
                    headers: {
                        Accept: 'application/json',
                    },
                    signal:
                    controller.signal,
                },
            );

        if (!response.ok) {
            throw new Error(
                `Unable to load ${props.type}`,
            );
        }

        const json =
            await response.json();

        const data:
            FilterOption[] =
            json.data ?? [];

        cache.set(
            cacheKey,
            data,
        );

        options.value =
            data;
    } catch (error) {
        if (
            error instanceof DOMException &&
            error.name ===
            'AbortError'
        ) {
            return;
        }

        console.error(
            'Unable to load filter options.',
            error,
        );

        options.value = [];
    } finally {
        if (
            activeController ===
            controller
        ) {
            loading.value =
                false;

            activeController =
                null;
        }
    }
}

function handleSearch() {
    open.value = true;

    debouncedSearch();
}

function handleFocus() {
    open.value = true;

    if (
        options.value.length === 0
    ) {
        void loadOptions();
    }
}

function close() {
    open.value = false;
}

function clearQuery() {
    query.value = '';

    void loadOptions();

    nextTick(() => {
        input.value?.focus();
    });
}

function isSelected(
    option: FilterOption,
): boolean {
    return selectedIds.value.has(
        option.id,
    );
}

function select(
    option: FilterOption,
) {
    if (
        isSelected(option)
    ) {
        remove(option.id);

        return;
    }

    model.value = [
        ...model.value,
        option,
    ];

    query.value = '';

    void loadOptions();

    nextTick(() => {
        input.value?.focus();
    });
}

function remove(
    id: number,
) {
    model.value =
        model.value.filter(
            (item) =>
                item.id !== id,
        );
}
</script>

<template>
    <div
        ref="root"
        class="relative w-full"
    >
        <!-- Main search field -->
        <div
            class="
                flex
                h-12
                w-full
                cursor-text
                items-center
                gap-2.5
                rounded-lg
                border
                border-input
                bg-background
                px-4
                transition-colors
                focus-within:border-ring
                focus-within:ring-[3px]
                focus-within:ring-ring/20
            "
            @click="input?.focus()"
        >
            <Search
                class="
                    size-4
                    shrink-0
                    text-muted-foreground
                "
            />

            <input
                ref="input"
                v-model="query"
                type="text"
                autocomplete="off"
                :placeholder="placeholder"
                class="
                    min-w-0
                    flex-1
                    bg-transparent
                    text-sm
                    outline-none
                    placeholder:text-muted-foreground
                "
                @focus="handleFocus"
                @input="handleSearch"
            />

            <button
                v-if="query"
                type="button"
                aria-label="Limpar pesquisa"
                class="
                    flex
                    size-7
                    shrink-0
                    items-center
                    justify-center
                    rounded-md
                    text-muted-foreground
                    transition-colors
                    hover:bg-muted
                    hover:text-foreground
                "
                @mousedown.prevent
                @click.stop="clearQuery"
            >
                <X class="size-4" />
            </button>
        </div>

        <!-- Results -->
        <div
            v-if="open"
            class="
                absolute
                left-0
                top-full
                z-50
                mt-2
                w-full
                min-w-80
                overflow-hidden
                rounded-2xl
                border
                bg-popover
                text-popover-foreground
                shadow-xl
            "
        >
            <div
                class="
                    max-h-[420px]
                    overflow-y-auto
                    px-3
                    py-4
                "
            >
                <!--
                    SELECTED ITEMS

                    Always appear at the top.

                    The small vertical primary bar on
                    the left creates the Windows-like
                    active navigation appearance.
                -->
                <template
                    v-if="
                        selectedOptions.length
                    "
                >
                    <p
                        class="
                            mb-2
                            px-3
                            text-sm
                            font-semibold
                            text-foreground
                        "
                    >
                        {{ selectedText }}
                    </p>

                    <div
                        class="
                            mb-5
                            space-y-1
                        "
                    >
                        <button
                            v-for="option in selectedOptions"
                            :key="`selected-${option.id}`"
                            type="button"
                            :aria-pressed="true"
                            class="
                                group
                                relative
                                flex
                                min-h-11
                                w-full
                                items-center
                                gap-3
                                overflow-hidden
                                rounded-md
                                bg-accent
                                px-3
                                py-2
                                text-left
                                transition-colors
                                hover:bg-accent/80
                            "
                            @mousedown.prevent
                            @click="
                                remove(option.id)
                            "
                        >
                            <!-- Windows active indicator -->
                            <span
                                class="
                                    absolute
                                    left-0
                                    top-1/2
                                    h-6
                                    w-[3px]
                                    -translate-y-1/2
                                    rounded-r-full
                                    bg-primary
                                "
                            />

                            <MapPin
                                class="
                                    size-4
                                    shrink-0
                                    text-foreground
                                "
                            />

                            <div
                                class="
                                    min-w-0
                                    flex-1
                                "
                            >
                                <p
                                    class="
                                        truncate
                                        text-sm
                                        font-medium
                                        text-foreground
                                    "
                                >
                                    {{
                                        option.label
                                    }}
                                </p>

                                <p
                                    v-if="
                                        option.subtitle
                                    "
                                    class="
                                        mt-0.5
                                        truncate
                                        text-xs
                                        text-muted-foreground
                                    "
                                >
                                    {{
                                        option.subtitle
                                    }}
                                </p>
                            </div>

                            <Check
                                class="
                                    size-4
                                    shrink-0
                                    text-primary
                                "
                            />
                        </button>
                    </div>
                </template>

                <!-- Suggestions heading -->
                <p
                    v-if="
                        loading ||
                        availableOptions.length
                    "
                    class="
                        mb-2
                        px-3
                        text-sm
                        font-semibold
                        text-foreground
                    "
                >
                    {{
                        suggestionsText
                    }}
                </p>

                <!-- Loading -->
                <template
                    v-if="loading"
                >
                    <div
                        v-for="index in 5"
                        :key="index"
                        class="
                            flex
                            min-h-11
                            items-center
                            gap-3
                            px-3
                            py-2
                        "
                    >
                        <Skeleton
                            class="
                                size-4
                                shrink-0
                                rounded
                            "
                        />

                        <div
                            class="
                                min-w-0
                                flex-1
                                space-y-2
                            "
                        >
                            <Skeleton
                                class="
                                    h-4
                                    w-2/3
                                "
                            />

                            <Skeleton
                                class="
                                    h-3
                                    w-1/2
                                "
                            />
                        </div>
                    </div>
                </template>

                <!-- Available options -->
                <template v-else>
                    <div
                        class="space-y-1"
                    >
                        <button
                            v-for="option in availableOptions"
                            :key="option.id"
                            type="button"
                            :aria-pressed="false"
                            class="
                                group
                                flex
                                min-h-11
                                w-full
                                items-center
                                gap-3
                                rounded-md
                                px-3
                                py-2
                                text-left
                                transition-colors
                                hover:bg-accent
                            "
                            @mousedown.prevent
                            @click="
                                select(option)
                            "
                        >
                            <MapPin
                                class="
                                    size-4
                                    shrink-0
                                    text-muted-foreground
                                    transition-colors
                                    group-hover:text-foreground
                                "
                            />

                            <div
                                class="
                                    min-w-0
                                    flex-1
                                "
                            >
                                <p
                                    class="
                                        truncate
                                        text-sm
                                        font-normal
                                        text-foreground
                                    "
                                >
                                    {{
                                        option.label
                                    }}
                                </p>

                                <p
                                    v-if="
                                        option.subtitle
                                    "
                                    class="
                                        mt-0.5
                                        truncate
                                        text-xs
                                        text-muted-foreground
                                    "
                                >
                                    {{
                                        option.subtitle
                                    }}
                                </p>
                            </div>
                        </button>
                    </div>

                    <!-- Empty -->
                    <div
                        v-if="
                            !hasResults
                        "
                        class="
                            px-4
                            py-10
                            text-center
                            text-sm
                            text-muted-foreground
                        "
                    >
                        {{ emptyText }}
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
