<script setup lang="ts">
import AppIcon from "./CustomIcon.vue";

import { Button } from "@/components/ui/button";

import { Input } from "@/components/ui/input";

import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from "@/components/ui/popover";

import { ScrollArea } from "@/components/ui/scroll-area";

import { Badge } from "@/components/ui/badge";

import { Check, ChevronsUpDown, Search } from "@lucide/vue";

import axios from "axios";

import { onMounted, ref, watch } from "vue";

import type { IconData } from "@/types";

const props = withDefaults(
    defineProps<{
        modelValue?: number | null;
        placeholder?: string;
        disabled?: boolean;
    }>(),
    {
        modelValue: null,
        placeholder: "Select icon",
        disabled: false,
    },
);

const emit = defineEmits<{
    (event: "update:modelValue", value: number | null): void;

    (event: "change", value: IconData | null): void;
}>();

const open = ref(false);

const search = ref("");

const icons = ref<IconData[]>([]);

const selectedIcon = ref<IconData | null>(null);

const loading = ref(false);
const loadingSelected = ref(false);

const page = ref(1);
const lastPage = ref(1);

let searchTimeout: ReturnType<typeof setTimeout> | undefined;

const loadIcons = async (reset = false) => {
    if (loading.value) {
        return;
    }

    if (reset) {
        page.value = 1;
        icons.value = [];
    }

    loading.value = true;

    try {
        const response = await axios.get(route("core.icons.list.json"), {
            params: {
                search: search.value || undefined,

                page: page.value,

                per_page: 80,
            },
        });

        const incoming: IconData[] = response.data.data;

        if (reset) {
            icons.value = incoming;
        } else {
            const existing = new Set(icons.value.map((icon) => icon.id));

            icons.value.push(
                ...incoming.filter((icon) => !existing.has(icon.id)),
            );
        }

        page.value = response.data.current_page;

        lastPage.value = response.data.last_page;
    } finally {
        loading.value = false;
    }
};

const loadMore = async () => {
    if (loading.value || page.value >= lastPage.value) {
        return;
    }

    page.value++;

    await loadIcons();
};

const loadSelected = async () => {
    if (!props.modelValue) {
        selectedIcon.value = null;

        return;
    }

    if (selectedIcon.value?.id === props.modelValue) {
        return;
    }

    loadingSelected.value = true;

    try {
        const response = await axios.get(route("icons.show", props.modelValue));

        selectedIcon.value = response.data.data;
    } catch {
        selectedIcon.value = null;
    } finally {
        loadingSelected.value = false;
    }
};

const selectIcon = (icon: IconData) => {
    selectedIcon.value = icon;

    emit("update:modelValue", icon.id);

    emit("change", icon);

    open.value = false;
};

const clearIcon = () => {
    selectedIcon.value = null;

    emit("update:modelValue", null);

    emit("change", null);

    open.value = false;
};

watch(search, () => {
    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {
        loadIcons(true);
    }, 300);
});

watch(
    () => props.modelValue,
    () => {
        loadSelected();
    },
);

watch(open, (value) => {
    if (value && icons.value.length === 0) {
        loadIcons(true);
    }
});

onMounted(() => {
    loadSelected();
});
</script>

<template>
    <Popover v-model:open="open">
        <PopoverTrigger as-child>
            <Button
                type="button"
                variant="outline"
                role="combobox"
                :disabled="disabled"
                class="w-full justify-between"
            >
                <div class="flex min-w-0 items-center gap-2">
                    <AppIcon
                        v-if="selectedIcon"
                        :icon="selectedIcon"
                        :size="18"
                        class="shrink-0"
                    />

                    <span v-if="selectedIcon" class="truncate">
                        {{ selectedIcon.name }}
                    </span>

                    <span
                        v-else-if="loadingSelected"
                        class="text-muted-foreground"
                    >
                        Loading...
                    </span>

                    <span v-else class="text-muted-foreground">
                        {{ placeholder }}
                    </span>
                </div>

                <ChevronsUpDown class="ml-2 size-4 shrink-0 opacity-50" />
            </Button>
        </PopoverTrigger>

        <PopoverContent class="w-[420px] p-0" align="start">
            <div class="border-b p-3">
                <div class="relative">
                    <Search
                        class="text-muted-foreground absolute top-1/2 left-3 size-4 -translate-y-1/2"
                    />

                    <Input
                        v-model="search"
                        placeholder="Search icons..."
                        class="pl-9"
                    />
                </div>
            </div>

            <ScrollArea class="h-[400px]">
                <div
                    v-if="loading && icons.length === 0"
                    class="text-muted-foreground flex h-32 items-center justify-center text-sm"
                >
                    Loading icons...
                </div>

                <div
                    v-else-if="!loading && icons.length === 0"
                    class="text-muted-foreground flex h-32 items-center justify-center text-sm"
                >
                    No icons found.
                </div>

                <div v-else class="grid grid-cols-5 gap-1 p-2">
                    <button
                        v-for="icon in icons"
                        :key="`${icon.source}-${icon.id}`"
                        type="button"
                        class="hover:bg-accent relative flex aspect-square flex-col items-center justify-center gap-2 rounded-md border border-transparent p-2 transition-colors"
                        :class="{
                            'bg-accent border-border':
                                selectedIcon?.id === icon.id,
                        }"
                        :title="icon.name"
                        @click="selectIcon(icon)"
                    >
                        <AppIcon :icon="icon" :size="22" />

                        <span class="w-full truncate text-center text-[10px]">
                            {{ icon.name }}
                        </span>

                        <Badge
                            v-if="icon.source === 'lab'"
                            variant="secondary"
                            class="absolute top-1 right-1 px-1 py-0 text-[8px]"
                        >
                            Lab
                        </Badge>

                        <Check
                            v-if="selectedIcon?.id === icon.id"
                            class="absolute top-1 left-1 size-3"
                        />
                    </button>
                </div>

                <div v-if="page < lastPage" class="p-3">
                    <Button
                        type="button"
                        variant="outline"
                        class="w-full"
                        :disabled="loading"
                        @click="loadMore"
                    >
                        {{ loading ? "Loading..." : "Load more" }}
                    </Button>
                </div>
            </ScrollArea>

            <div v-if="modelValue" class="border-t p-2">
                <Button
                    type="button"
                    variant="ghost"
                    class="w-full"
                    @click="clearIcon"
                >
                    Remove icon
                </Button>
            </div>
        </PopoverContent>
    </Popover>
</template>
