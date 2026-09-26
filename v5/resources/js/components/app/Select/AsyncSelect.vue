<script setup lang="ts" generic="T extends Record<string, any>">
import {
    computed,
    nextTick,
    onBeforeUnmount,
    ref,
    shallowRef,
    watch,
    type PropType,
} from "vue";
import { useDebounceFn, useInfiniteScroll } from "@vueuse/core";
import { Check, ChevronDown, Loader2, Plus, X } from "@lucide/vue";
import { ListboxItem } from "reka-ui";
import { ulid } from "ulidx";
import type { ValidRouteName } from "ziggy-js";

import { Button } from "@/components/ui/button";
import {
    Command,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandList,
    CommandSeparator,
} from "@/components/ui/command";
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from "@/components/ui/popover";
import { Separator } from "@/components/ui/separator";
import { Skeleton } from "@/components/ui/skeleton";

import SelectOption from "./partial/SelectOption.vue";
import type { SelectOptionType } from "./partial/SelectOptionType";
import {
    DEFAULT_ASYNC_SELECT_STALE_TIME,
    useAsyncSelectSource,
} from "@/composables/useAsyncSelectSource";
import { cn, t } from "@/lib/utils";

type InternalOption<T> = T & {
    _uniqueKey: string;
};

const props = defineProps({
    placeholder: {
        type: String,
        default: () => t("Select"),
    },
    routeName: {
        type: Object as PropType<ValidRouteName>,
        required: true,
    },
    routeParams: {
        type: Object as PropType<Record<string, any>>,
        default: () => ({}),
    },
    reduce: {
        type: Function,
        default: (option: any) => option,
    },
    getLabel: {
        type: Function,
        default: (option: any) => option,
    },
    class: {
        type: String,
        default: "",
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    align: {
        type: String as PropType<"start" | "center" | "end">,
        default: "start",
    },
    mapper: {
        type: Function as PropType<(item: T) => SelectOptionType>,
        default: (item: T): SelectOptionType => ({
            id: item.id,
            title: item.title,
            subtitle: item.subtitle ?? "",
            slug: item.slug ?? "",
            notes: item.notes ?? "",
            trailer: item.trailer,
        }),
    },
    selectedKey: {
        type: String,
        default: "id",
    },
    createNew: {
        type: Function,
        required: false,
        default: () => console.warn("Create new function not provided"),
    },
    canCreateNew: {
        type: Boolean,
        default: true,
    },
    multiple: {
        type: Boolean,
        default: false,
    },
    staleTime: {
        type: Number,
        default: DEFAULT_ASYNC_SELECT_STALE_TIME,
    },
});

const model = defineModel<any>();

const emit = defineEmits(["value:selected", "value:deselected"]);

// State
const open = ref(false);
const searchQuery = ref("");
const activeSearch = ref("");
const selectedOptions = shallowRef<T[]>([]);
const hydratingSelected = ref(false);

let selectedGeneration = 0;

// CommandList is the actual scrolling element. Do not wrap it in another
// overflow container or infinite scroll will observe the wrong element.
const commandListRef = ref<any>(null);

const commandListElement = computed<HTMLElement | null>(() => {
    const target = commandListRef.value;

    if (!target) {
        return null;
    }

    // Future-proof in case CommandList starts forwarding its HTMLElement.
    if (target instanceof HTMLElement) {
        return target;
    }

    const element = target.$el;

    return element instanceof HTMLElement ? element : null;
});

// Model helpers
const reducedValue = (item: T): any => props.reduce(item);

const modelValues = computed<any[]>(() => {
    if (props.multiple) {
        return Array.isArray(model.value) ? model.value : [];
    }

    if (
        model.value === null ||
        model.value === undefined ||
        model.value === ""
    ) {
        return [];
    }

    return [model.value];
});

// Data source
const source = useAsyncSelectSource<T>({
    routeName: () => props.routeName,
    routeParams: () => props.routeParams,
    selectedKey: () => props.selectedKey,
    reduce: (item: T) => props.reduce(item),
    search: activeSearch,

    // Prevent every select on a large form from loading before it is opened.
    enabled: open,

    staleTime: () => props.staleTime,
});

const infiniteQuery = source.query;

// Selection helpers
const valuesEqual = (first: any, second: any): boolean =>
    Object.is(first, second);

const isSelected = (item: T): boolean => {
    const value = reducedValue(item);

    return modelValues.value.some((selected) => valuesEqual(selected, value));
};

// Result normalisation
const normaliseOption = (item: T): InternalOption<T> => {
    const key =
        (item as any)._uniqueKey ??
        item.id ??
        item[props.selectedKey] ??
        reducedValue(item) ??
        ulid().toLowerCase();

    return {
        ...item,
        _uniqueKey: String(key),
    } as InternalOption<T>;
};

const deduplicate = (values: InternalOption<T>[]): InternalOption<T>[] => {
    const result = new Map<any, InternalOption<T>>();

    for (const item of values) {
        result.set(reducedValue(item), item);
    }

    return Array.from(result.values());
};

const options = computed<InternalOption<T>[]>(() => {
    const pages = infiniteQuery.data.value?.pages ?? [];

    return deduplicate(pages.flatMap((page) => page.data.map(normaliseOption)));
});

// Selected-value hydration
const syncSelectedOptions = async (force = false) => {
    const generation = ++selectedGeneration;
    const values = [...modelValues.value];

    if (values.length === 0) {
        selectedOptions.value = [];
        hydratingSelected.value = false;
        return;
    }

    // The model may contain only an ID. Hydration resolves the display item.
    hydratingSelected.value = true;

    try {
        await source.hydrateValues(values, force);

        if (generation !== selectedGeneration) {
            return;
        }

        selectedOptions.value = values
            .map((value) => source.getCachedItem(value))
            .filter((item): item is T => item !== null);
    } catch (error) {
        if (generation !== selectedGeneration) {
            return;
        }

        console.error("AsyncSelect selected-value hydration failed:", error);
    } finally {
        // An older request must never hide a newer hydration loader.
        if (generation === selectedGeneration) {
            hydratingSelected.value = false;
        }
    }
};

const selectedValue = computed<T | null>(() => {
    if (props.multiple) {
        return null;
    }

    return selectedOptions.value[0] ?? null;
});

const resultOptions = computed(() => {
    if (!props.multiple) {
        return options.value;
    }

    return options.value.filter((option) => !isSelected(option));
});

const triggerLabel = computed(() => {
    if (modelValues.value.length > 0 && hydratingSelected.value) {
        return t("Loading...");
    }

    if (!props.multiple) {
        return selectedValue.value
            ? props.getLabel(selectedValue.value)
            : props.placeholder;
    }

    const count = modelValues.value.length;

    if (count === 0) {
        return props.placeholder;
    }

    if (count === 1 && selectedOptions.value.length === 1) {
        return props.getLabel(selectedOptions.value[0]);
    }

    return `${count} ${t("selected")}`;
});

// Query state
const loading = computed(
    () => infiniteQuery.isPending.value && options.value.length === 0,
);

const loadingMore = computed(() => infiniteQuery.isFetchingNextPage.value);

const hasMore = computed(() => infiniteQuery.hasNextPage.value === true);

const isError = computed(() => infiniteQuery.isError.value);

// Pagination
const loadNextPage = async () => {
    if (!open.value || !hasMore.value || infiniteQuery.isFetching.value) {
        return;
    }

    await infiniteQuery.fetchNextPage();
};

// Infinite scroll must observe CommandList.$el because CommandList owns
// scrollTop/clientHeight/scrollHeight.
const { reset: resetInfiniteScroll, isLoading: infiniteScrollLoading } =
    useInfiniteScroll(
        commandListElement,
        async () => {
            await loadNextPage();
        },
        {
            distance: 120,
            interval: 100,
            canLoadMore: () =>
                open.value && hasMore.value && !infiniteQuery.isFetching.value,
        },
    );

// Search
const debouncedSearch = useDebounceFn(async (value: string) => {
    activeSearch.value = value;

    await nextTick();

    if (commandListElement.value) {
        commandListElement.value.scrollTop = 0;
    }

    resetInfiniteScroll();
}, 250);

watch(searchQuery, (value) => {
    debouncedSearch(value);
});

// Re-measure after each page. This also allows page 2+ to load automatically
// when the current results are too short to make the list scrollable.
watch(
    () => infiniteQuery.data.value?.pages.length ?? 0,
    async () => {
        if (!open.value) {
            return;
        }

        await nextTick();
        resetInfiniteScroll();
    },
);

watch(
    () => infiniteQuery.isFetching.value,
    async (isFetching) => {
        if (isFetching || !open.value) {
            return;
        }

        await nextTick();
        resetInfiniteScroll();
    },
);

// Popover content mounts lazily, so CommandList.$el may appear after setup.
watch(commandListElement, async (element) => {
    if (!element || !open.value) {
        return;
    }

    await nextTick();
    resetInfiniteScroll();
});

// Selection actions
const selectSingle = (item: T) => {
    const value = reducedValue(item);
    const previous = selectedValue.value;
    const deselecting =
        previous !== null && valuesEqual(reducedValue(previous), value);

    source.remember([item]);

    if (deselecting) {
        model.value = null;
        emit("value:deselected", previous);
    } else {
        model.value = value;
        emit("value:selected", item, previous);
    }

    open.value = false;

    setTimeout(() => {
        searchQuery.value = "";
        activeSearch.value = "";
    }, 150);
};

const selectMultiple = (item: T) => {
    const value = reducedValue(item);

    source.remember([item]);

    const current = Array.isArray(model.value) ? [...model.value] : [];

    const index = current.findIndex((selected) => valuesEqual(selected, value));

    if (index >= 0) {
        current.splice(index, 1);
        model.value = current;
        emit("value:deselected", item);
        return;
    }

    current.push(value);
    model.value = current;
    emit("value:selected", item);
};

const handleSelect = (item: T, event?: Event) => {
    if (props.multiple) {
        event?.preventDefault();
        selectMultiple(item);
        return;
    }

    selectSingle(item);
};

const removeSelected = (item: T, event?: Event) => {
    event?.preventDefault();
    event?.stopPropagation();

    if (!props.multiple) {
        return;
    }

    const value = reducedValue(item);
    const current = Array.isArray(model.value) ? [...model.value] : [];

    model.value = current.filter((selected) => !valuesEqual(selected, value));

    emit("value:deselected", item);
};

// Lifecycle / synchronisation
watch(open, async (isOpen) => {
    if (!isOpen) {
        return;
    }

    if (searchQuery.value !== "") {
        debouncedSearch.cancel?.();
        searchQuery.value = "";
        activeSearch.value = "";
    }

    await syncSelectedOptions();
    await nextTick();

    if (commandListElement.value) {
        commandListElement.value.scrollTop = 0;
    }

    resetInfiniteScroll();
});

watch(
    () => modelValues.value,
    () => {
        void syncSelectedOptions();
    },
    {
        deep: true,
        immediate: true,
    },
);

watch(
    () => infiniteQuery.dataUpdatedAt.value,
    () => {
        void syncSelectedOptions();
    },
);

watch(
    [() => props.routeName, () => props.selectedKey, () => props.routeParams],
    async () => {
        selectedGeneration++;
        selectedOptions.value = [];

        await syncSelectedOptions();

        if (!open.value) {
            return;
        }

        await nextTick();

        if (commandListElement.value) {
            commandListElement.value.scrollTop = 0;
        }

        resetInfiniteScroll();
    },
    {
        deep: true,
    },
);

// Public API
const refresh = async () => {
    await source.invalidate();
    await syncSelectedOptions(true);

    if (!open.value) {
        return;
    }

    await nextTick();
    resetInfiniteScroll();
};

const invalidate = async () => {
    await source.invalidate();
};

defineExpose({
    refresh,
    invalidate,
});

onBeforeUnmount(() => {
    selectedGeneration++;
    debouncedSearch.cancel?.();
});
</script>

<template>
    <Popover v-model:open="open">
        <div class="flex flex-row">
            <PopoverTrigger as-child>
                <slot name="trigger">
                    <Button
                        id="select-42"
                        variant="outline"
                        role="combobox"
                        :disabled="disabled"
                        :aria-expanded="open"
                        class="bg-background hover:bg-accent w-full min-w-40 cursor-pointer justify-between px-3 font-normal transition-colors"
                    >
                        <span
                            :class="
                                cn(
                                    'truncate',
                                    modelValues.length === 0 &&
                                        'text-muted-foreground',
                                )
                            "
                        >
                            {{ triggerLabel }}
                        </span>

                        <div
                            class="text-muted-foreground/80 flex shrink-0 items-center gap-2"
                        >
                            <Loader2
                                v-if="hydratingSelected"
                                :size="14"
                                class="animate-spin opacity-50"
                            />

                            <ChevronDown :size="16" :stroke-width="2" />
                        </div>
                    </Button>
                </slot>
            </PopoverTrigger>
        </div>

        <PopoverContent
            class="w-full min-w-[var(--reka-popper-anchor-width)] p-0 shadow-md"
            :align="align"
        >
            <Command class="w-full">
                <div class="relative flex items-center border-b px-3">
                    <CommandInput
                        v-model="searchQuery"
                        :placeholder="placeholder"
                        class="w-full border-none focus:ring-0"
                    />

                    <Loader2
                        v-if="infiniteQuery.isFetching.value && !loadingMore"
                        :size="16"
                        class="text-muted-foreground absolute right-3 animate-spin"
                    />
                </div>

                <CommandGroup v-if="canCreateNew">
                    <Button
                        variant="ghost"
                        class="hover:bg-primary/10 hover:text-primary w-full cursor-pointer justify-start rounded-xs font-normal transition-colors"
                        @click="createNew"
                    >
                        <Plus :size="16" class="me-2 opacity-60" />

                        {{ t("Add new") }}
                    </Button>
                </CommandGroup>

                <CommandSeparator v-if="canCreateNew" />

                <CommandList ref="commandListRef">
                    <template v-if="multiple && selectedOptions.length > 0">
                        <CommandGroup :heading="t('Selected')">
                            <ListboxItem
                                v-for="option in selectedOptions"
                                :key="`selected-${reducedValue(option)}`"
                                class="data-[highlighted]:bg-accent relative flex cursor-pointer items-center gap-2 rounded-sm text-sm outline-none"
                                @select="(event) => handleSelect(option, event)"
                            >
                                <div
                                    class="flex min-w-0 flex-1 items-center gap-2"
                                >
                                    <Check
                                        :size="16"
                                        class="text-primary shrink-0"
                                    />

                                    <SelectOption
                                        :option="mapper(option)"
                                        :selected="true"
                                    />
                                </div>

                                <Button
                                    type="button"
                                    variant="ghost"
                                    size="icon"
                                    class="size-7 shrink-0"
                                    @click="
                                        (event) => removeSelected(option, event)
                                    "
                                >
                                    <X :size="14" />
                                </Button>
                            </ListboxItem>
                        </CommandGroup>

                        <CommandSeparator />
                    </template>

                    <div
                        v-if="isError"
                        class="text-destructive p-4 text-center text-sm"
                    >
                        {{ t("Unable to load results.") }}
                    </div>

                    <CommandEmpty
                        v-if="
                            !loading &&
                            !isError &&
                            resultOptions.length === 0 &&
                            selectedOptions.length === 0
                        "
                    >
                        {{ t("No items found.") }}
                    </CommandEmpty>

                    <ListboxItem
                        v-for="option in resultOptions"
                        :key="option._uniqueKey"
                        :class="
                            cn(
                                `data-[highlighted]:bg-accent data-[highlighted]:text-accent-foreground relative flex cursor-default items-center gap-2 rounded-sm text-sm outline-hidden transition-colors duration-75 select-none data-[disabled=true]:pointer-events-none data-[disabled=true]:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0`,
                                props.class,
                            )
                        "
                        @select="(event) => handleSelect(option, event)"
                    >
                        <SelectOption
                            :option="mapper(option)"
                            :selected="isSelected(option)"
                        >
                            <template #trailer="{ option: scopedOption }">
                                <slot name="trailer" :option="scopedOption" />
                            </template>
                        </SelectOption>
                    </ListboxItem>

                    <div
                        v-if="loading && options.length === 0"
                        class="flex w-full flex-col gap-4 p-4"
                    >
                        <div class="w-full space-y-2">
                            <div class="flex justify-between">
                                <Skeleton class="h-2 w-[25px]" />
                                <Skeleton class="h-2 w-[25px]" />
                            </div>

                            <Skeleton class="h-2 w-[250px]" />
                            <Skeleton class="h-2 w-[200px]" />
                        </div>
                    </div>

                    <div
                        v-if="hasMore"
                        class="flex min-h-10 w-full items-center justify-center p-2"
                    >
                        <Loader2
                            v-if="loadingMore || infiniteScrollLoading"
                            :size="14"
                            class="text-muted-foreground animate-spin"
                        />

                        <span v-else class="text-muted-foreground/60 text-xs">
                            {{ t("Scroll for more") }}
                        </span>
                    </div>

                    <template
                        v-if="
                            options.length > 0 &&
                            !loading &&
                            !loadingMore &&
                            !hasMore
                        "
                    >
                        <Separator />

                        <div class="flex items-center justify-center p-3">
                            <span class="text-muted-foreground/60 text-xs">
                                {{ t("End of results.") }}
                            </span>
                        </div>
                    </template>
                </CommandList>
            </Command>
        </PopoverContent>
    </Popover>
</template>
