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

import {
    useDebounceFn,
} from "@vueuse/core";

import {
    createColumnHelper,
} from "@tanstack/vue-table";

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

import {
    Button,
} from "@/components/ui/button";

import {
    Input,
} from "@/components/ui/input";

import {
    Label,
} from "@/components/ui/label";

import CreateBusinessRule from "./Create.vue";
import EditBusinessRule from "./Edit.vue";
import DeleteBusinessRule from "./Delete.vue";

import {
    crudManager,
    t,
} from "@/lib/utils";

import type {
    BusinessRuleData,
    BusinessRuleRequestFilters,
} from "@/types/generated";

import AppLayout from "@/pages/Management/layouts/AppLayout.vue";

interface BusinessRulePagination {
    current_page: number;

    data: BusinessRuleData[];

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
    businessRules: {
        type: Object as PropType<BusinessRulePagination>,
        required: true,
    },

    request: {
        type: Object as PropType<BusinessRuleRequestFilters>,
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
    crudManager<BusinessRuleData>(),
);

const editCrudManager = ref(
    crudManager<BusinessRuleData>(),
);

const deleteCrudManager = ref(
    crudManager<BusinessRuleData>(),
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
                    "management.business-rule.list"
                ),
                {
                    data: filters,

                    only: [
                        "businessRules",
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
        props.businessRules?.data ?? [],
);

const columnHelper =
    createColumnHelper<BusinessRuleData>();

const buildActions = (
    businessRule: BusinessRuleData,
) => [
    {
        label: t("Edit"),

        disabled:
            !props.can?.edit,

        icon: Pencil,

        onClick: () =>
            editCrudManager.value.open(
                businessRule.id
            ),
    },

    {
        label: t("Delete"),

        disabled:
            !props.can?.delete,

        icon: LucideTrash,

        onClick: () =>
            deleteCrudManager.value.open(
                businessRule
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
                label:
                    t("ID"),
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
                label:
                    t("Name"),
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
            label:
                t("Actions"),
        },
    }),
]);
</script>

<template>
    <Head
        :title="
            t('Business Rule Management')
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
                            "Business Rule Management"
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
                    <Plus
                        class="size-4"
                    />

                    {{
                        t(
                            "Add Business Rule"
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
                        :columns-defs="
                            columns
                        "
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
                                                    'Search business rules'
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
                            businessRules?.from
                        "
                        :to="
                            businessRules?.to
                        "
                        :total="
                            businessRules?.total
                        "
                        :per_page="
                            businessRules?.per_page
                        "
                        :links="
                            businessRules?.links
                        "
                        :first_page_url="
                            businessRules?.first_page_url
                        "
                        :last_page_url="
                            businessRules?.last_page_url
                        "
                        :next_page_url="
                            businessRules?.next_page_url
                        "
                        :prev_page_url="
                            businessRules?.prev_page_url
                        "
                        class="p-4"
                    />
                </template>
            </template>
        </Box>
    </AppLayout>

    <CreateBusinessRule
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

    <EditBusinessRule
        v-if="
            editCrudManager.isModalOpen
        "
        :business-rule="
            editCrudManager.model
        "
        :open-modal="
            editCrudManager.isModalOpen
        "
        :close="
            editCrudManager.close
        "
    />

    <DeleteBusinessRule
        v-if="
            deleteCrudManager.isModalOpen
        "
        :business-rule="
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
