import type { ColumnDef } from '@tanstack/vue-table';
import type { Component } from 'vue';

export type ColumnTableConfig<T> = {
    header: string;
    accessorKey: keyof T;
    cell?: (value: any) => string | Component;
    headerClass?: string;
    cellClass?: string;
};

export function ColumnTableDef<T>(config: ColumnTableConfig<T>): ColumnDef<T> {
    return {
        accessorKey: config.accessorKey as string,
        header: () => config.header,
        cell: ({ row }) =>
            config.cell
                ? config.cell(row.getValue(config.accessorKey))
                : row.getValue(config.accessorKey),
        meta: {
            class: {
                header: config.headerClass,
                cell: config.cellClass,
            },
        },
    };
}
