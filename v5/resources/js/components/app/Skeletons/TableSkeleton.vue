<script setup lang="ts">
import { Skeleton } from '@/components/ui/skeleton';

const totalRows = 3;
</script>

<template>
    <div class="w-full space-y-3 p-2 text-xs select-none">

        <div class="flex items-center justify-between">
            <div class="flex gap-2">
                <div class="space-y-1">
                    <Skeleton class="h-2.5 w-8 opacity-60" />
                    <Skeleton class="h-7 w-24 rounded border border-zinc-100 dark:border-zinc-800" />
                </div>
                <div class="space-y-1">
                    <Skeleton class="h-2.5 w-8 opacity-60" />
                    <Skeleton class="h-7 w-24 rounded border border-zinc-100 dark:border-zinc-800" />
                </div>
            </div>
            <Skeleton class="h-7 w-16 rounded border border-zinc-100 dark:border-zinc-800" />
        </div>

        <div class="w-full overflow-x-auto border-t border-zinc-100 dark:border-zinc-800">
            <table class="w-full border-collapse text-left">
                <thead>
                <tr class="border-b border-zinc-100 dark:border-zinc-800">
                    <th class="py-2 pl-1 pr-3 w-[65px]">
                        <Skeleton class="h-5 w-12 rounded border border-zinc-100 dark:border-zinc-800" />
                    </th>
                    <th class="py-2 px-3 w-[110px]"><Skeleton class="h-2 w-16 opacity-40" /></th>
                    <th class="py-2 px-3 w-[110px]"><Skeleton class="h-2 w-14 opacity-40" /></th>
                    <th class="py-2 px-3 w-[110px]"><Skeleton class="h-2 w-14 opacity-40" /></th>
                    <th class="py-2 px-3"><Skeleton class="h-2 w-12 opacity-40" /></th> <th class="py-2 px-3 w-[75px]"><Skeleton class="h-2 w-10 opacity-40" /></th>
                    <th class="py-2 px-3 w-[65px]"><Skeleton class="h-2 w-8 opacity-40" /></th>
                    <th class="py-2 px-3 w-[85px] text-right"><Skeleton class="h-2 w-10 opacity-40 ml-auto" /></th>
                    <th class="py-2 px-3 w-[85px] text-right"><Skeleton class="h-2 w-10 opacity-40 ml-auto" /></th>
                    <th class="py-2 px-3 w-[55px]"><Skeleton class="h-2 w-5 opacity-40" /></th>
                    <th class="py-2 px-3 w-[130px]"><Skeleton class="h-2 w-14 opacity-40" /></th>
                    <th class="py-2 pl-3 pr-1 w-[30px]"></th> </tr>
                </thead>

                <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
                <tr v-for="row in totalRows" :key="'row-' + row">
                    <td class="py-2.5 pl-1 pr-3"><Skeleton class="h-3 w-7 opacity-80" /></td> <td class="py-2.5 px-3"><Skeleton class="h-3 w-16 opacity-60" /></td> <td class="py-2.5 px-3"><Skeleton class="h-3 w-16 opacity-80" /></td> <td class="py-2.5 px-3"><Skeleton class="h-3 w-20 opacity-70" /></td> <td class="py-2.5 px-3"></td> <td class="py-2.5 px-3"><Skeleton class="h-4 w-12 rounded-sm opacity-70" /></td> <td class="py-2.5 px-3"><Skeleton class="h-4 w-10 rounded-sm opacity-70" /></td> <td class="py-2.5 px-3"><Skeleton class="h-3 w-12 opacity-80 ml-auto" /></td> <td class="py-2.5 px-3"><Skeleton class="h-3 w-12 opacity-80 ml-auto" /></td> <td class="py-2.5 px-3"><Skeleton class="h-3.5 w-3.5 rounded-sm opacity-50" /></td> <td class="py-2.5 px-3"><Skeleton class="h-3 w-20 opacity-80" /></td> <td class="py-2.5 pl-3 pr-1 text-center"><Skeleton class="h-2.5 w-0.5 rounded-full mx-auto opacity-50" /></td> </tr>
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between pt-1">
            <div class="flex items-center gap-3">
                <Skeleton class="h-7 w-12 rounded border border-zinc-100 dark:border-zinc-800" /> <Skeleton class="h-3 w-20 opacity-60" /> </div>
            <div class="flex items-center gap-0.5">
                <Skeleton class="h-6 w-6 rounded" /> <Skeleton class="h-6 w-6 rounded" /> <Skeleton class="h-6 w-6 rounded bg-zinc-900 dark:bg-zinc-100 opacity-95" /> <Skeleton class="h-6 w-6 rounded" /> <Skeleton class="h-6 w-6 rounded" /> </div>
        </div>

    </div>
</template>
