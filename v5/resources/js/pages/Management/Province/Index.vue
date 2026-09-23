<script lang="ts" setup>
import {
    computed,
    h,
    ref,
    watch,
    type PropType,
} from 'vue';

import {
    Head,
    router,
    useForm,
} from '@inertiajs/vue3';

import { useDebounceFn } from '@vueuse/core';
import { createColumnHelper } from '@tanstack/vue-table';

import {
    LucideTrash,
    Pencil,
    Plus,
    SearchIcon,
} from '@lucide/vue';

import MTable from '@/components/app/Table/MTable.vue';
import Pagination from '@/components/app/Pagination.vue';
import TableSkeleton from "@/components/app/Skeletons/TableSkeleton.vue";

import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';

import CreateProvince from './Create.vue';
import EditProvince from './Edit.vue';
import DeleteProvince from './Delete.vue';

import { crudManager,t } from '@/lib/utils';

import type {
    ProvinceData,
    ProvinceRequestFilters,
} from '@/types/generated';
import AppLayout from "@/pages/Management/layouts/AppLayout.vue";
import Box from "@/components/app/Box.vue";

interface ProvincePagination {
    current_page: number;
    data: ProvinceData[];

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
    provinces: {
        type: Object as PropType<ProvincePagination>,
        required: true,
    },

    request: {
        type: Object as PropType<ProvinceRequestFilters>,
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
    crudManager<ProvinceData>(),
);

const editCrudManager = ref(
    crudManager<ProvinceData>(),
);

const deleteCrudManager = ref(
    crudManager<ProvinceData>(),
);

const form = useForm({
    search: props.request?.search ?? '',
    per_page: props.request?.per_page ?? '12',
    sort: props.request?.sort ?? 'name',
});

const performSearchAndFilter = useDebounceFn(
    (filters: {
        search?: string | null;
        per_page?: string | null;
        sort?: string | null;
    }) => {
        router.visit(
            route('management.province.list'),
            {
                data: filters,

                only: [
                    'provinces',
                    'request',
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
    () => props.provinces?.data ?? [],
);

const columnHelper =
    createColumnHelper<ProvinceData>();

const buildActions = (
    province: ProvinceData,
) => [
    {
        label: t('Edit'),
        disabled: !props.can?.edit,
        icon: Pencil,

        onClick: () =>
            editCrudManager.value.open(
                province.id,
            ),
    },

    {
        label: t('Delete'),
        disabled: !props.can?.delete,
        icon: LucideTrash,

        onClick: () =>
            deleteCrudManager.value.open(
                province,
            ),
    },
];

const columns = computed(() => [
    columnHelper.accessor('id', {
        enableSorting: true,

        header: () =>
            h(
                'button',
                {
                    type: 'button',
                    class:
                        'px-4 text-left text-xs font-medium',

                    onClick: () => {
                        form.sort =
                            form.sort === 'id'
                                ? '-id'
                                : 'id';
                    },
                },
                t('ID'),
            ),

        cell: ({ row }) =>
            h(
                'span',
                {
                    class:
                        'ps-4 text-xs text-muted-foreground',
                },
                String(row.original.id ?? ''),
            ),

        meta: {
            label: t('ID'),
        },
    }),

    columnHelper.accessor('name', {
        enableSorting: true,

        header: () =>
            h(
                'button',
                {
                    type: 'button',
                    class:
                        'px-4 text-left text-xs font-medium',

                    onClick: () => {
                        form.sort =
                            form.sort === 'name'
                                ? '-name'
                                : 'name';
                    },
                },
                t('Name'),
            ),

        cell: ({ row }) =>
            h(
                'span',
                {
                    class:
                        'ps-4 text-sm font-medium',
                },
                row.original.name,
            ),

        meta: {
            label: t('Name'),
        },
    }),

    columnHelper.display({
        id: 'actions',

        header: () => '',

        cell: ({ row }) => {
            const actions =
                buildActions(row.original);

            return h(
                'div',
                {
                    class:
                        'flex justify-end gap-1 px-3',
                },
                actions.map((action) =>
                    h(
                        Button,
                        {
                            variant: 'ghost',
                            size: 'icon',
                            disabled:
                            action.disabled,

                            title: action.label,

                            onClick:
                            action.onClick,
                        },
                        () =>
                            h(action.icon, {
                                class: 'size-4',
                            }),
                    ),
                ),
            );
        },

        meta: {
            label: t('Actions'),
        },
    }),
]);
</script>

<template>
    <Head :title="t('Province Management')" />
    <AppLayout>

     <Box>

         <template #header-left>
             <h1 class="text-xl font-semibold">
                 {{ t('Province Management') }}
             </h1>
         </template>

         <template #header-right>
             <Button
                 :disabled="!can?.create"
                 class="flex items-center gap-2"
                 @click="
                    createCrudManager.open(null)
                "
             >
                 <Plus class="size-4" />

                 {{ t('Add Province') }}
             </Button>
         </template>

         <template #content-table>

             <!-- Table -->
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
                     <template #fields_visibility>
                         <div>
                             <div class="w-full md:max-w-sm">
                                 <Label
                                     class="mb-1 block text-xs text-muted-foreground"
                                 >
                                     {{ t('Search') }}
                                 </Label>

                                 <div class="relative">
                                     <Input
                                         v-model="form.search"
                                         :placeholder="
                            t('Search provinces') +
                            '...'
                        "
                                         class="pl-10"
                                     />

                                     <span
                                         class="absolute inset-y-0 start-0 flex items-center px-3"
                                     >
                        <SearchIcon
                            class="size-4 text-muted-foreground"
                        />
                    </span>
                                 </div>
                             </div>
                         </div>
                     </template>

                 </MTable>

                 <Pagination
                     :from="provinces?.from"
                     :to="provinces?.to"
                     :total="provinces?.total"
                     :per_page="
                        provinces?.per_page
                    "
                     :links="provinces?.links"
                     :first_page_url="
                        provinces?.first_page_url
                    "
                     :last_page_url="
                        provinces?.last_page_url
                    "
                     :next_page_url="
                        provinces?.next_page_url
                    "
                     :prev_page_url="
                        provinces?.prev_page_url
                    "
                     class="p-4"
                 />
             </template>
         </template>
     </Box>
    </AppLayout>

    <!-- Create -->
    <CreateProvince
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

    <!-- Edit -->
    <EditProvince
        v-if="editCrudManager.isModalOpen"
        :province="
            editCrudManager.model
        "
        :open-modal="
            editCrudManager.isModalOpen
        "
        :close="editCrudManager.close"
    />

    <!-- Delete -->
    <DeleteProvince
        v-if="
            deleteCrudManager.isModalOpen
        "
        :province="
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
