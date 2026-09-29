<script setup lang="ts">
import { cn, t } from "@/lib/utils";
import { Button } from "@/components/ui/button";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { Link, router } from "@inertiajs/vue3";
import {
    ChevronLeft,
    ChevronRight,
    ChevronsLeft,
    ChevronsRight,
} from "@lucide/vue";
import { ref, useAttrs } from "vue";

interface Props {
    type?: "default" | "async" | undefined;
    fetcher?: (url: string) => Promise<any>;
    from?: number | undefined;
    to?: number | undefined;
    total?: number | undefined;
    current_page?: number | undefined;
    last_page?: number | undefined;
    per_page?: number | undefined;
    first_page_url: string | undefined;
    last_page_url: string | undefined;
    next_page_url: string | undefined;
    prev_page_url?: string | undefined;
    links?:
        | Array<{
              url: string;
              label: string;
              active: boolean;
          }>
        | undefined;
}

const $attrs = useAttrs() as Record<string, any>;

const props = withDefaults(defineProps<Props>(), {
    type: "default",
});

const paginationOptions = ref([
    { value: 5, label: "5" },
    { value: 10, label: "10" },
    { value: 12, label: "12" },
    { value: 20, label: "20" },
    { value: 50, label: "50" },
    { value: 100, label: "100" },
    { value: 500, label: "500" },
    { value: 1000, label: "1,000" },
    { value: 5000, label: "5,000" },
    { value: 10000, label: "10,000" },
    { value: 50000, label: "50,000" },
]);

const refetchWithPerPage = (perPage: number) => {
    const params = new URL(props.first_page_url ?? "");
    params.searchParams.set("per_page", `${perPage ?? "10"}`);
    if (props.type === "async") {
        props.fetcher(params.toString());
    } else {
        router.visit(params.toString(), {
            preserveState: true,
            preserveScroll: true,
        });
    }
};
</script>

<template>
    <nav
        aria-label="Table navigation"
        :class="
            cn(
                'flex w-full flex-col items-start justify-between gap-3 overflow-x-auto md:flex-row md:items-center md:space-y-0',
                $attrs.class,
            )
        "
    >
        <div
            class="flex items-center gap-2 text-sm font-normal text-gray-500 dark:text-gray-400"
        >
            <span class="px-2">
                <Select
                    :default-value="props.per_page ?? 10"
                    @update:modelValue="refetchWithPerPage($event as number)"
                >
                    <SelectTrigger>
                        <SelectValue :placeholder="t('per page')" />
                    </SelectTrigger>
                    <SelectContent
                        class="[&_*[role=option]]:ps-2 [&_*[role=option]]:pe-8 [&_*[role=option]>span]:start-auto [&_*[role=option]>span]:end-2"
                    >
                        <template
                            v-for="option in paginationOptions"
                            :key="option.value"
                        >
                            <SelectItem :value="option.value">{{
                                option.label
                            }}</SelectItem>
                        </template>
                    </SelectContent>
                </Select>
            </span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                {{ t("Showing") }}
                <span class="font-semibold text-gray-900 dark:text-white">{{
                    `${from ?? 0}-${to ?? 0}`
                }}</span>
                {{ t("of") }}
                <span class="font-semibold text-gray-900 dark:text-white">
                    {{ total }}</span
                >
            </span>
        </div>
        <ul class="inline-flex items-stretch gap-1 text-sm font-semibold">
            <li>
                <Link
                    v-if="type === 'default'"
                    class="flex h-9 w-9 items-center justify-center rounded-sm hover:border"
                    :href="first_page_url ?? ''"
                >
                    <ChevronsLeft :size="15" class="font-current" />
                </Link>
                <Button
                    variant="link"
                    v-else
                    class="flex h-9 w-9 items-center justify-center rounded-sm hover:border"
                    @click="props.fetcher(first_page_url ?? '')"
                >
                    <ChevronsLeft :size="15" class="font-current" />
                </Button>
            </li>
            <li>
                <Link
                    v-if="type === 'default'"
                    class="flex h-9 w-9 items-center justify-center rounded-sm hover:border"
                    :href="prev_page_url ?? ''"
                >
                    <ChevronLeft :size="15" class="font-current" />
                </Link>
                <Button
                    variant="link"
                    v-else
                    class="flex h-9 w-9 items-center justify-center rounded-sm hover:border"
                    @click="props.fetcher(prev_page_url ?? '')"
                >
                    <ChevronLeft size="15" class="font-current" />
                </Button>
            </li>

            <li v-for="link in links.slice(1, -1)" :key="link.label">
                <Link
                    v-if="type === 'default'"
                    :href="link.url ?? ''"
                    :class="
                        cn(
                            'flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 font-medium dark:border-gray-600',
                            {
                                'bg-slate-950 text-white dark:bg-white dark:text-gray-950':
                                    link.active,
                            },
                        )
                    "
                >
                    {{ link.label }}
                </Link>
                <Button
                    variant="link"
                    v-else
                    :class="
                        cn(
                            'flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 font-medium dark:border-gray-600',
                            {
                                'bg-slate-950 text-white dark:bg-white dark:text-gray-950':
                                    link.active,
                            },
                        )
                    "
                    @click="props.fetcher(link.url ?? '')"
                >
                    {{ link.label }}
                </Button>
            </li>
            <li>
                <Link
                    v-if="type === 'default'"
                    class="flex h-9 w-9 items-center justify-center rounded-sm hover:border"
                    :href="next_page_url ?? ''"
                >
                    <ChevronRight :size="15" class="font-current" />
                </Link>
                <Button
                    variant="link"
                    v-else
                    class="flex h-9 w-9 items-center justify-center rounded-sm hover:border"
                    @click="props.fetcher(next_page_url ?? '')"
                >
                    <ChevronRight size="15" class="font-current" />
                </Button>
            </li>
            <li>
                <Link
                    v-if="type === 'default'"
                    class="flex h-9 w-9 items-center justify-center rounded-sm hover:border"
                    :href="last_page_url ?? ''"
                >
                    <ChevronsRight size="15" class="font-current" />
                </Link>
                <Button
                    variant="link"
                    type="button"
                    v-else
                    class="flex h-9 w-9 items-center justify-center rounded-sm hover:border"
                    @click="props.fetcher(last_page_url ?? '')"
                >
                    <ChevronsRight :size="15" class="font-current" />
                </Button>
            </li>
        </ul>
    </nav>
</template>
