<script lang="ts" setup>
import {
    computed,
    h,
    ref,
    watch,
    type PropType,
} from "vue";

import {
    Head,
    router,
    useForm,
} from "@inertiajs/vue3";

import { useDebounceFn } from "@vueuse/core";
import { createColumnHelper } from "@tanstack/vue-table";

import {
    LucideTrash,
    Pencil,
    Plus,
    SearchIcon,
} from "@lucide/vue";

import MTable from "@/components/app/Table/MTable.vue";
import Pagination from "@/components/app/Pagination.vue";
import TableSkeleton from "@/components/app/Skeletons/TableSkeleton.vue";
import Box from "@/components/app/Box.vue";

import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";

import CreatePropertyFor from "./Create.vue";
import EditPropertyFor from "./Edit.vue";
import DeletePropertyFor from "./Delete.vue";

import {
    crudManager,
    t,
} from "@/lib/utils";

import type {
    PropertyForRequestFilters,
    TransactionTypeData,
} from "@/types/generated";

import AppLayout from "@/pages/Management/layouts/AppLayout.vue";

interface PropertyForPagination {
    current_page: number;
    data: TransactionTypeData[];

    first_page_url: string;
    from: number | null;
    last_page: number;
    last_page_url: string;

    links: {
        url: string | null;
        label: string;
        active: boolean;
    }[];

    next_page_url: string | null;
    path: string;
    per_page: number;
    prev_page_url: string | null;

    to: number | null;
    total: number;
}

const props = defineProps({
    propertyFors: {
        type: Object as PropType<PropertyForPagination>,
        required: true,
    },

    request: {
        type: Object as PropType<PropertyForRequestFilters>,
        required: true,
    },

    can: {
        type: Object as PropType<{
            view: boolean;
            create: boolean;
            edit: boolean;
            delete: boolean;
        }>,

        default: () => ({
            view: true,
            create: true,
            edit: true,
            delete: true,
        }),
    },
});

const loading = ref(false);

const createCrudManager = ref(
    crudManager<TransactionTypeData>(),
);

const editCrudManager = ref(
    crudManager<TransactionTypeData>(),
);

const deleteCrudManager = ref(
    crudManager<TransactionTypeData>(),
);

const form = useForm({
    search:
        props.request?.search ?? "",

    per_page:
        props.request?.per_page ?? "12",

    sort:
        props.request?.sort ?? "name",
});

const performSearchAndFilter =
    useDebounceFn(
        (
            filters: {
                search?: string | null;
                per_page?: string | null;
                sort?: string | null;
            },
        ) => {
            router.visit(
                route(
                    "management.property-for.list"
                ),
                {
                    data: filters,

                    only: [
                        "propertyFors",
                        "request",
                    ],

                    replace: true,
                    preserveState: true,
                    preserveScroll: true,

                    onStart: () => {
                        loading.value = true;
                    },

                    onFinish: () => {
                        loading.value = false;
                    },
                },
            );
        },
        400,
    );

watch(
    () => form.data(),
    (data) => {
        performSearchAndFilter(data);
    },
    {
        deep: true,
    },
);

const tableData = computed(
    () =>
        props.propertyFors?.data ?? [],
);

const columnHelper =
    createColumnHelper<TransactionTypeData>();

const buildActions = (
    propertyFor: TransactionTypeData,
) => [
    {
        label: t("Edit"),

        disabled:
            !props.can?.edit,

        icon: Pencil,

        onClick: () =>
            editCrudManager.value.open(
                propertyFor.id
            ),
    },

    {
        label: t("Delete"),

        disabled:
            !props.can?.delete,

        icon: LucideTrash,

        onClick: () =>
            deleteCrudManager.value.open(
                propertyFor
            ),
    },
];

const columns = computed(() => [
    columnHelper.accessor(
        "id",
        {
            enableSorting: true,

            header: () =>
                h(
                    "button",
                    {
                        type: "button",

                        class:
                            "px-4 text-left text-xs font-medium",

                        onClick: () => {
                            form.sort =
                                form.sort === "id"
                                    ? "-id"
                                    : "id";
                        },
                    },
                    t("ID"),
                ),

            cell: ({ row }) =>
                h(
                    "span",
                    {
                        class:
                            "ps-4 text-xs text-muted-foreground",
                    },
                    String(
                        row.original.id ?? ""
                    ),
                ),

            meta: {
                label: t("ID"),
            },
        },
    ),

    columnHelper.accessor(
        "name",
        {
            enableSorting: true,

            header: () =>
                h(
                    "button",
                    {
                        type: "button",

                        class:
                            "px-4 text-left text-xs font-medium",

                        onClick: () => {
                            form.sort =
                                form.sort === "name"
                                    ? "-name"
                                    : "name";
                        },
                    },
                    t("Name"),
                ),

            cell: ({ row }) =>
                h(
                    "span",
                    {
                        class:
                            "ps-4 text-sm font-medium",
                    },
                    row.original.name,
                ),

            meta: {
                label: t("Name"),
            },
        },
    ),

    columnHelper.accessor(
        "slug_text",
        {
            enableSorting: true,

            header: () =>
                h(
                    "button",
                    {
                        type: "button",

                        class:
                            "px-4 text-left text-xs font-medium",

                        onClick: () => {
                            form.sort =
                                form.sort ===
                                "slug_text"
                                    ? "-slug_text"
                                    : "slug_text";
                        },
                    },
                    t("Slug"),
                ),

            cell: ({ row }) =>
                h(
                    "span",
                    {
                        class:
                            "ps-4 text-sm text-muted-foreground",
                    },
                    row.original.slug_text,
                ),

            meta: {
                label: t("Slug"),
            },
        },
    ),

    columnHelper.display({
        id: "actions",

        header: () => "",

        cell: ({ row }) => {
            const actions =
                buildActions(
                    row.original
                );

            return h(
                "div",
                {
                    class:
                        "flex justify-end gap-1 px-3",
                },
                actions.map(
                    (action) =>
                        h(
                            Button,
                            {
                                variant:
                                    "ghost",

                                size:
                                    "icon",

                                disabled:
                                action.disabled,

                                title:
                                action.label,

                                onClick:
                                action.onClick,
                            },
                            () =>
                                h(
                                    action.icon,
                                    {
                                        class:
                                            "size-4",
                                    },
                                ),
                        ),
                ),
            );
        },

        meta: {
            label: t("Actions"),
        },
    }),
]);
</script>

<template>
    <Head
        :title="
            t('Transaction Type Management')
        "
    />

    <AppLayout>
        <Box>
            <template #header-left>
                <h1
                    class="text-xl font-semibold"
                >
                    {{
                        t(
                            "Transaction Type Management"
                        )
                    }}
                </h1>
            </template>

            <template #header-right>
                <Button
                    :disabled="
                        !can?.create
                    "
                    class="flex items-center gap-2"
                    @click="
                        createCrudManager.open(
                            null
                        )
                    "
                >
                    <Plus class="size-4" />

                    {{
                        t(
                            "Add Transaction Type"
                        )
                    }}
                </Button>
            </template>

            <template #content-table>
                <div
                    v-if="loading"
                    class="p-4"
                >
                    <TableSkeleton />
                </div>

                <template v-else>
                    <MTable
                        v-model="tableData"
                        :columns-defs="columns"
                    >
                        <template
                            #fields_visibility
                        >
                            <div>
                                <div
                                    class="w-full md:max-w-sm"
                                >
                                    <Label
                                        class="text-muted-foreground mb-1 block text-xs"
                                    >
                                        {{
                                            t(
                                                "Search"
                                            )
                                        }}
                                    </Label>

                                    <div
                                        class="relative"
                                    >
                                        <Input
                                            v-model="
                                                form.search
                                            "
                                            :placeholder="
                                                t(
                                                    'Search transaction types'
                                                ) +
                                                '...'
                                            "
                                            class="pl-10"
                                        />

                                        <span
                                            class="absolute inset-y-0 start-0 flex items-center px-3"
                                        >
                                            <SearchIcon
                                                class="text-muted-foreground size-4"
                                            />
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </MTable>

                    <Pagination
                        :from="
                            propertyFors?.from
                        "
                        :to="
                            propertyFors?.to
                        "
                        :total="
                            propertyFors?.total
                        "
                        :per_page="
                            propertyFors?.per_page
                        "
                        :links="
                            propertyFors?.links
                        "
                        :first_page_url="
                            propertyFors?.first_page_url
                        "
                        :last_page_url="
                            propertyFors?.last_page_url
                        "
                        :next_page_url="
                            propertyFors?.next_page_url
                        "
                        :prev_page_url="
                            propertyFors?.prev_page_url
                        "
                        class="p-4"
                    />
                </template>
            </template>
        </Box>
    </AppLayout>

    <CreatePropertyFor
        v-if="
            createCrudManager.isModalOpen
        "
        :open-modal="
            createCrudManager.isModalOpen
        "
        :close="
            createCrudManager.close
        "
    />

    <EditPropertyFor
        v-if="
            editCrudManager.isModalOpen
        "
        :property-for="
            editCrudManager.model
        "
        :open-modal="
            editCrudManager.isModalOpen
        "
        :close="
            editCrudManager.close
        "
    />

    <DeletePropertyFor
        v-if="
            deleteCrudManager.isModalOpen
        "
        :property-for="
            deleteCrudManager.model
        "
        :open-modal="
            deleteCrudManager.isModalOpen
        "
        :close="
            deleteCrudManager.close
        "
    />
</template>
