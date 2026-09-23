import {
    QueryClient,
    useInfiniteQuery,
} from '@tanstack/vue-query';

import type {
    Ref,
} from 'vue';

import type {
    ValidRouteName,
} from 'ziggy-js';

/* ============================================================================
 * CONFIG
 * ========================================================================== */

export const DEFAULT_ASYNC_SELECT_STALE_TIME =
    30_000;

export const DEFAULT_ASYNC_SELECT_GC_TIME =
    5 * 60_000;

/**
 * Shared only by AsyncSelect components.
 *
 * Therefore 20 AsyncSelect instances using the same
 * resource/search share exactly the same query cache.
 */
export const asyncSelectQueryClient =
    new QueryClient({
        defaultOptions: {
            queries: {
                retry: 1,

                refetchOnReconnect:
                    true,

                refetchOnWindowFocus:
                    true,
            },
        },
    });

/* ============================================================================
 * TYPES
 * ========================================================================== */

export interface PaginationResponse<T> {
    current_page: number;

    data: T[];

    first_page_url: string;

    from: number | null;

    last_page: number;

    last_page_url: string;

    links: unknown[];

    next_page_url: string | null;

    path: string;

    per_page: number;

    prev_page_url: string | null;

    to: number | null;

    total: number;
}

interface AsyncSelectSourceOptions<T> {
    routeName:
        () => ValidRouteName;

    routeParams:
        () => Record<
            string,
            any
        >;

    selectedKey:
        () => string;

    reduce:
        (
            item: T,
        ) => any;

    search:
        Ref<string>;

    enabled:
        Ref<boolean>;

    staleTime?:
        () => number;

    gcTime?:
        () => number;
}

interface HydrationWaiter {
    resolve:
        () => void;

    reject:
        (
            error: unknown,
        ) => void;
}

interface HydrationBatch {
    values:
        Map<
            string,
            any
        >;

    waiters:
        HydrationWaiter[];

    timer:
        | ReturnType<
        typeof setTimeout
    >
        | null;
}

/* ============================================================================
 * SHARED SELECTED-VALUE BATCHING
 * ========================================================================== */

const hydrationBatches =
    new Map<
        string,
        HydrationBatch
    >();

/* ============================================================================
 * HELPERS
 * ========================================================================== */

const stableStringify = (
    value: any,
): string => {
    if (
        value ===
        undefined
    ) {
        return 'undefined';
    }

    if (
        value === null ||
        typeof value !==
        'object'
    ) {
        return (
            JSON.stringify(
                value,
            ) ??
            String(
                value,
            )
        );
    }

    if (
        Array.isArray(
            value,
        )
    ) {
        return `[${value
            .map(
                stableStringify,
            )
            .join(',')}]`;
    }

    const keys =
        Object.keys(
            value,
        ).sort();

    return `{${keys
        .map(
            key =>
                `${JSON.stringify(
                    key,
                )}:${stableStringify(
                    value[key],
                )}`,
        )
        .join(',')}}`;
};

/* ============================================================================
 * COMPOSABLE
 * ========================================================================== */

export const useAsyncSelectSource = <
    T extends Record<string, any>,
>(
    options:
    AsyncSelectSourceOptions<T>,
) => {
    /* ========================================================================
     * RESOURCE IDENTITY
     * ====================================================================== */

    const resourceKey =
        (): string => {
            return [
                String(
                    options.routeName(),
                ),

                options.selectedKey(),

                stableStringify(
                    options.routeParams(),
                ),
            ].join('::');
        };

    const rootQueryKey =
        () => [
            'async-select',
            resourceKey(),
        ] as const;

    const itemQueryKey =
        (
            value: any,
        ) => [
            'async-select',
            resourceKey(),
            'item',
            stableStringify(
                value,
            ),
        ] as const;

    const getStaleTime =
        (): number => {
            return Math.max(
                0,

                options
                    .staleTime?.() ??
                DEFAULT_ASYNC_SELECT_STALE_TIME,
            );
        };

    const getGcTime =
        (): number => {
            return Math.max(
                0,

                options
                    .gcTime?.() ??
                DEFAULT_ASYNC_SELECT_GC_TIME,
            );
        };

    /* ========================================================================
     * ITEM CACHE
     * ====================================================================== */

    const remember = (
        items: T[],
    ): void => {
        for (
            const item of items
            ) {
            const value =
                options.reduce(
                    item,
                );

            asyncSelectQueryClient
                .setQueryData(
                    itemQueryKey(
                        value,
                    ),

                    item,
                );
        }
    };

    const getCachedItem = (
        value: any,
    ): T | null => {
        return (
            asyncSelectQueryClient
                .getQueryData<T>(
                    itemQueryKey(
                        value,
                    ),
                ) ??
            null
        );
    };

    const isCachedItemFresh = (
        value: any,
    ): boolean => {
        const state =
            asyncSelectQueryClient
                .getQueryState(
                    itemQueryKey(
                        value,
                    ),
                );

        if (
            !state ||
            state.data ===
            undefined
        ) {
            return false;
        }

        if (
            state.isInvalidated
        ) {
            return false;
        }

        const staleTime =
            getStaleTime();

        if (
            staleTime ===
            Number.POSITIVE_INFINITY
        ) {
            return true;
        }

        return (
            Date.now() -
            state.dataUpdatedAt <
            staleTime
        );
    };

    /* ========================================================================
     * HTTP
     * ====================================================================== */

    const request = async (
        search: string,

        page: number,

        selectedValues: any[],

        signal?:
        AbortSignal,
    ): Promise<
        PaginationResponse<T>
    > => {
        const url =
            route(
                options.routeName(),

                {
                    ...options
                        .routeParams(),

                    search,

                    page,

                    selectedKey:
                        options.selectedKey(),

                    selectedValues,
                },
            );

        const response =
            await fetch(
                url,

                {
                    signal,

                    headers: {
                        Accept:
                            'application/json',
                    },

                    /**
                     * TanStack owns the cache.
                     */
                    cache:
                        'no-store',
                },
            );

        if (
            !response.ok
        ) {
            throw new Error(
                `AsyncSelect HTTP error ${response.status}`,
            );
        }

        return (
            await response.json()
        ) as PaginationResponse<T>;
    };

    /* ========================================================================
     * INFINITE QUERY
     * ====================================================================== */

    const query =
        useInfiniteQuery(
            () => ({
                queryKey: [
                    'async-select',

                    resourceKey(),

                    'list',

                    options.search.value,
                ],

                enabled:
                options.enabled.value,

                staleTime:
                    getStaleTime(),

                gcTime:
                    getGcTime(),

                initialPageParam:
                    1,

                queryFn:
                    async ({
                               pageParam,
                               signal,
                           }) => {
                        const result =
                            await request(
                                options
                                    .search
                                    .value,

                                Number(
                                    pageParam,
                                ),

                                /**
                                 * Selected-value hydration
                                 * is separate.
                                 */
                                [],

                                signal,
                            );

                        remember(
                            result.data,
                        );

                        return result;
                    },

                /**
                 * Laravel numbered pagination.
                 */
                getNextPageParam:
                    lastPage => {
                        if (
                            lastPage
                                .current_page >=
                            lastPage
                                .last_page
                        ) {
                            return undefined;
                        }

                        return (
                            lastPage
                                .current_page +
                            1
                        );
                    },
            }),

            asyncSelectQueryClient,
        );

    /* ========================================================================
     * SELECTED VALUE HYDRATION
     * ====================================================================== */

    const hydrateValues = async (
        values:
        any[],

        force =
        false,
    ): Promise<void> => {
        if (
            values.length ===
            0
        ) {
            return;
        }

        const uniqueValues =
            Array.from(
                new Map(
                    values.map(
                        value => [
                            stableStringify(
                                value,
                            ),

                            value,
                        ],
                    ),
                ).values(),
            );

        const valuesToLoad =
            uniqueValues.filter(
                value =>
                    force ||
                    !isCachedItemFresh(
                        value,
                    ),
            );

        if (
            valuesToLoad.length ===
            0
        ) {
            return;
        }

        const key =
            resourceKey();

        let batch =
            hydrationBatches.get(
                key,
            );

        if (
            !batch
        ) {
            batch = {
                values:
                    new Map(),

                waiters:
                    [],

                timer:
                    null,
            };

            hydrationBatches.set(
                key,
                batch,
            );
        }

        for (
            const value of
            valuesToLoad
            ) {
            batch.values.set(
                stableStringify(
                    value,
                ),

                value,
            );
        }

        return new Promise<void>(
            (
                resolve,
                reject,
            ) => {
                batch!.waiters.push({
                    resolve,

                    reject,
                });

                if (
                    batch!.timer
                ) {
                    return;
                }

                /**
                 * Allow sibling AsyncSelect
                 * instances one event loop
                 * turn to register their IDs.
                 */
                batch!.timer =
                    setTimeout(
                        async () => {
                            const currentBatch =
                                hydrationBatches
                                    .get(
                                        key,
                                    );

                            if (
                                !currentBatch
                            ) {
                                return;
                            }

                            const selectedValues =
                                Array.from(
                                    currentBatch
                                        .values
                                        .values(),
                                );

                            const waiters =
                                [
                                    ...currentBatch
                                        .waiters,
                                ];

                            hydrationBatches.delete(
                                key,
                            );

                            try {
                                const result =
                                    await request(
                                        '',

                                        1,

                                        selectedValues,
                                    );

                                const returnedValues =
                                    new Set(
                                        result
                                            .data
                                            .map(
                                                item =>
                                                    stableStringify(
                                                        options.reduce(
                                                            item,
                                                        ),
                                                    ),
                                            ),
                                    );

                                /**
                                 * Record deleted from
                                 * backend?
                                 *
                                 * Remove stale cached item.
                                 */
                                for (
                                    const value of
                                    selectedValues
                                    ) {
                                    if (
                                        returnedValues.has(
                                            stableStringify(
                                                value,
                                            ),
                                        )
                                    ) {
                                        continue;
                                    }

                                    asyncSelectQueryClient
                                        .removeQueries({
                                            queryKey:
                                                itemQueryKey(
                                                    value,
                                                ),

                                            exact:
                                                true,
                                        });
                                }

                                remember(
                                    result.data,
                                );

                                for (
                                    const waiter of
                                    waiters
                                    ) {
                                    waiter.resolve();
                                }
                            } catch (
                                error
                                ) {
                                for (
                                    const waiter of
                                    waiters
                                    ) {
                                    waiter.reject(
                                        error,
                                    );
                                }
                            }
                        },

                        0,
                    );
            },
        );
    };

    /* ========================================================================
     * INVALIDATE
     * ====================================================================== */

    const invalidate =
        async () => {
            await asyncSelectQueryClient
                .invalidateQueries({
                    queryKey:
                        rootQueryKey(),
                });
        };

    /* ========================================================================
     * CLEAR
     * ====================================================================== */

    const clear =
        () => {
            asyncSelectQueryClient
                .removeQueries({
                    queryKey:
                        rootQueryKey(),
                });
        };

    return {
        query,

        hydrateValues,

        getCachedItem,

        remember,

        invalidate,

        clear,
    };
};
