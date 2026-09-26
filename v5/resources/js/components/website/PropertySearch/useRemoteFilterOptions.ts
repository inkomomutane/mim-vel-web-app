import { ref } from 'vue';

import { route } from 'ziggy-js';

import type {
    FilterOption,
    RemoteFilterType,
} from './types';

/**
 * Shared between every component instance.
 *
 * Example:
 * neighbourhood:maputo
 * condition:new
 * property_type:house
 */
const cache = new Map<
    string,
    FilterOption[]
>();

export function useRemoteFilterOptions(
    getType: () => RemoteFilterType,
) {
    const options = ref<FilterOption[]>([]);
    const loading = ref(false);

    let controller: AbortController | null =
        null;

    async function load(
        search = '',
    ): Promise<void> {
        const normalisedSearch = search
            .trim()
            .toLocaleLowerCase();

        const type = getType();

        const cacheKey =
            `${type}:${normalisedSearch}`;

        if (cache.has(cacheKey)) {
            options.value =
                cache.get(cacheKey) ?? [];

            return;
        }

        controller?.abort();

        const requestController =
            new AbortController();

        controller = requestController;

        loading.value = true;

        try {
            const response = await fetch(
                route(
                    'website.property-filter.options',
                    {
                        type,
                        search: search.trim(),
                    },
                ),
                {
                    headers: {
                        Accept: 'application/json',
                    },
                    signal:
                    requestController.signal,
                },
            );

            if (!response.ok) {
                throw new Error(
                    `Unable to load ${type}`,
                );
            }

            const json = await response.json();

            const data: FilterOption[] =
                json.data ?? [];

            cache.set(
                cacheKey,
                data,
            );

            options.value = data;
        } catch (error) {
            if (
                error instanceof DOMException &&
                error.name === 'AbortError'
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
                controller ===
                requestController
            ) {
                loading.value = false;
                controller = null;
            }
        }
    }

    function clearCache() {
        cache.clear();
    }

    return {
        options,
        loading,
        load,
        clearCache,
    };
}
