<script setup lang="ts" generic="T">
import type { ColumnTableConfig } from "@/components/Table/ColumnTableDef";

import { Button } from "@/components/ui/button";
import {
    DropdownMenu,
    DropdownMenuCheckboxItem,
    DropdownMenuContent,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";

import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";

import { cn, t } from "@/lib/utils";

import { ChevronDown, Columns3Cog } from "@lucide/vue";

import {
    FlexRender,
    columnFilteringFeature,
    columnPinningFeature,
    columnSizingFeature,
    columnVisibilityFeature,
    createExpandedRowModel,
    createFilteredRowModel,
    createSortedRowModel,
    rowExpandingFeature,
    rowPaginationFeature,
    rowSelectionFeature,
    rowSortingFeature,
    tableFeatures,
    useTable,
    type Column,
    type ColumnDef,
    type ColumnVisibilityState,
    type Row,
} from "@tanstack/vue-table";

import type { CSSProperties } from "vue";
import { watch } from "vue";

/*
|--------------------------------------------------------------------------
| TanStack Table Features
|--------------------------------------------------------------------------
|
| V9 features are explicitly registered.
|
| There is no getCoreRowModel() anymore because the core row model
| is automatically available.
|
| We intentionally do NOT register createPaginatedRowModel() because
| this table uses manualPagination.
|
*/

const features = tableFeatures({
    columnFilteringFeature,
    filteredRowModel: createFilteredRowModel(),

    columnPinningFeature,
    columnSizingFeature,
    columnVisibilityFeature,

    rowSortingFeature,
    sortedRowModel: createSortedRowModel(),

    rowExpandingFeature,
    expandedRowModel: createExpandedRowModel(),

    rowPaginationFeature,
    rowSelectionFeature,
});

/*
|--------------------------------------------------------------------------
| Props
|--------------------------------------------------------------------------
*/

interface Props {
    columnsDefs: Array<ColumnTableConfig<T>>;

    /*
     * Keep the legacy public API.
     *
     * Internally TanStack v9 uses:
     *
     * left  -> start
     * right -> end
     */
    pinning?: {
        left: Array<string>;
        right: Array<string>;
    };

    visibleFields?: Array<string>;

    showFieldsVisibility?: boolean;

    clickRow?: (row: Row<typeof features, T>) => void;
}

const props = withDefaults(defineProps<Props>(), {
    pinning: () => ({
        left: [],
        right: [],
    }),

    visibleFields: () => [],

    showFieldsVisibility: true,

    clickRow: () => undefined,
});

/*
|--------------------------------------------------------------------------
| Model
|--------------------------------------------------------------------------
*/

const model = defineModel<T[]>({
    default: () => [],
});

/*
|--------------------------------------------------------------------------
| Styles
|--------------------------------------------------------------------------
*/

const disabledStyle =
    "bg-muted text-muted-foreground border-b dark:border-zinc-700";

/*
|--------------------------------------------------------------------------
| Table
|--------------------------------------------------------------------------
*/

const table = useTable({
    features,

    /*
     * V9 Vue adapter accepts refs directly.
     */
    data: model,

    /*
     * Keep columns reactive.
     *
     * The cast isolates the v9 feature generic from your existing
     * ColumnTableConfig abstraction.
     */
    get columns() {
        return props.columnsDefs as unknown as Array<
            ColumnDef<typeof features, T>
        >;
    },

    /*
     * Data supplied to this component is already paginated.
     */
    manualPagination: true,

    /*
     * Useful when rows are edited/replaced while the user is working
     * with the table.
     */
    autoResetExpanded: false,
    autoResetPageIndex: false,
});

/*
|--------------------------------------------------------------------------
| Column pinning
|--------------------------------------------------------------------------
|
| TanStack v9 renamed:
|
| left  -> start
| right -> end
|
| We translate here so every existing parent component can continue
| using:
|
| :pinning="{ left: ['name'], right: ['actions'] }"
|
*/

watch(
    () => props.pinning,
    (pinning) => {
        table.setColumnPinning({
            start: pinning?.left ?? [],
            end: pinning?.right ?? [],
        });
    },
    {
        immediate: true,
        deep: true,
    },
);

/*
|--------------------------------------------------------------------------
| Initial / controlled visible fields
|--------------------------------------------------------------------------
*/

watch(
    () => props.visibleFields,
    (fields) => {
        /*
         * Empty array means show everything.
         */
        if (!fields?.length) {
            table.setColumnVisibility({});
            return;
        }

        const allowedFields = new Set(fields);

        const visibility: ColumnVisibilityState = {};

        for (const column of table.getAllLeafColumns()) {
            visibility[column.id] = allowedFields.has(column.id);
        }

        table.setColumnVisibility(visibility);
    },
    {
        immediate: true,
        deep: true,
    },
);

/*
|--------------------------------------------------------------------------
| Disabled row
|--------------------------------------------------------------------------
|
| `row.disabled` was incorrect.
|
| TanStack Row contains metadata about the row.
| Your actual entity is inside:
|
| row.original
|
*/

function isRowDisabled(row: Row<typeof features, T>): boolean {
    const original = row.original as T & {
        disabled?: boolean;
    };

    return Boolean(original.disabled);
}

/*
|--------------------------------------------------------------------------
| Disabled column
|--------------------------------------------------------------------------
*/

function isColumnDisabled(column: Column<typeof features, T>): boolean {
    const meta = column.columnDef.meta as
        | {
              disabled?: boolean;
          }
        | undefined;

    return Boolean(meta?.disabled);
}

/*
|--------------------------------------------------------------------------
| Row click
|--------------------------------------------------------------------------
*/

function handleRowClick(event: MouseEvent, row: Row<typeof features, T>): void {
    event.stopPropagation();

    if (isRowDisabled(row)) {
        return;
    }

    props.clickRow(row);
}

/*
|--------------------------------------------------------------------------
| Sticky column pinning
|--------------------------------------------------------------------------
|
| Do NOT simply use:
|
| left-0
| right-0
|
| If two columns are pinned, they would sit on top of each other.
|
| TanStack calculates the offset of each pinned column.
|
*/

function getPinningStyles(column: Column<typeof features, T>): CSSProperties {
    const pinned = column.getIsPinned();

    if (!pinned) {
        return {};
    }

    const isLastStartColumn =
        pinned === "start" && column.getIsLastColumn("start");

    const isFirstEndColumn = pinned === "end" && column.getIsFirstColumn("end");

    return {
        position: "sticky",

        insetInlineStart:
            pinned === "start" ? `${column.getStart("start")}px` : undefined,

        insetInlineEnd:
            pinned === "end" ? `${column.getAfter("end")}px` : undefined,

        width: `${column.getSize()}px`,

        zIndex: 20,

        boxShadow: isLastStartColumn
            ? "-4px 0 4px -4px rgb(0 0 0 / 0.15) inset"
            : isFirstEndColumn
              ? "4px 0 4px -4px rgb(0 0 0 / 0.15) inset"
              : undefined,
    };
}
</script>

<template>
    <!--
    |--------------------------------------------------------------------------
    | Column visibility
    |--------------------------------------------------------------------------
    -->

    <slot name="fields_visibility" :table="table">
        <div
            v-if="showFieldsVisibility"
            class="mb-2 flex items-center justify-between px-2"
        >
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <Button variant="outline" class="ml-auto">
                        <Columns3Cog />

                        <ChevronDown class="ml-2 h-4 w-4" />
                    </Button>
                </DropdownMenuTrigger>

                <DropdownMenuContent align="end">
                    <DropdownMenuCheckboxItem
                        v-for="column in table
                            .getAllColumns()
                            .filter((column) => column.getCanHide())"
                        :key="column.id"
                        class="capitalize"
                        :model-value="column.getIsVisible()"
                        @update:model-value="
                            (value) => {
                                column.toggleVisibility(!!value);
                            }
                        "
                    >
                        {{ column.id }}
                    </DropdownMenuCheckboxItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    </slot>

    <!--
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    -->

    <Table>
        <!--
        |--------------------------------------------------------------------------
        | Header
        |--------------------------------------------------------------------------
        -->

        <TableHeader>
            <TableRow
                v-for="headerGroup in table.getHeaderGroups()"
                :key="headerGroup.id"
            >
                <TableHead
                    v-for="header in headerGroup.headers"
                    :key="header.id"
                    :colspan="header.colSpan"
                    :data-pinned="header.column.getIsPinned() || undefined"
                    :style="getPinningStyles(header.column)"
                    :class="
                        cn({
                            'bg-background': header.column.getIsPinned(),
                        })
                    "
                >
                    <FlexRender v-if="!header.isPlaceholder" :header="header" />
                </TableHead>
            </TableRow>
        </TableHeader>

        <!--
        |--------------------------------------------------------------------------
        | Body
        |--------------------------------------------------------------------------
        -->

        <TableBody>
            <template v-if="table.getRowModel().rows.length">
                <template v-for="row in table.getRowModel().rows" :key="row.id">
                    <!-- Main row -->

                    <TableRow
                        :data-state="
                            row.getIsSelected() ? 'selected' : undefined
                        "
                        :class="cn(isRowDisabled(row) && disabledStyle)"
                        @click="(event) => handleRowClick(event, row)"
                    >
                        <TableCell
                            v-for="cell in row.getVisibleCells()"
                            :key="cell.id"
                            :data-pinned="
                                cell.column.getIsPinned() || undefined
                            "
                            :style="getPinningStyles(cell.column)"
                            :class="
                                cn(
                                    'items-center p-1 text-sm',

                                    {
                                        'bg-background':
                                            cell.column.getIsPinned(),
                                    },

                                    isColumnDisabled(cell.column) &&
                                        disabledStyle,
                                )
                            "
                        >
                            <FlexRender :cell="cell" />
                        </TableCell>
                    </TableRow>

                    <!-- Expanded content -->

                    <TableRow v-if="row.getIsExpanded()">
                        <TableCell
                            :colspan="Math.max(row.getVisibleCells().length, 1)"
                            class="p-0"
                        >
                            <slot name="expanded" :row="row" :table="table" />
                        </TableCell>
                    </TableRow>
                </template>
            </template>

            <!--
            |--------------------------------------------------------------------------
            | Empty state
            |--------------------------------------------------------------------------
            -->

            <TableRow v-else>
                <TableCell
                    :colspan="Math.max(table.getVisibleLeafColumns().length, 1)"
                    class="h-14 text-center"
                >
                    {{ t("No items found.") }}
                </TableCell>
            </TableRow>

            <!--
            |--------------------------------------------------------------------------
            | Custom footer
            |--------------------------------------------------------------------------
            -->

            <slot name="footer" :table="table" />

            <!-- Keep legacy spacing row -->

            <TableRow>
                <TableCell />
            </TableRow>
        </TableBody>
    </Table>
</template>
