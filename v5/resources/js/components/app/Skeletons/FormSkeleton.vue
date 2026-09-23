<script setup lang="ts">
import { Skeleton } from '@/components/ui/skeleton';
</script>

<template>
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
        <div class="space-y-2">
            <Skeleton class="h-4 w-16" />
            <Skeleton class="h-10 w-full rounded-md" />
        </div>

        <div class="space-y-2">
            <Skeleton class="h-4 w-12" />
            <Skeleton class="h-10 w-full rounded-md" />
        </div>

        <div class="space-y-2">
            <Skeleton class="h-4 w-12" />
            <Skeleton class="h-10 w-full rounded-md" />
        </div>

        <div class="space-y-2">
            <Skeleton class="h-4 w-20" />
            <Skeleton class="h-10 w-full rounded" />
        </div>
        <div class="space-y-2">
            <Skeleton class="h-4 w-12" />
            <Skeleton class="h-10 w-full rounded-md" />
        </div>

        <div class="space-y-2">
            <Skeleton class="h-4 w-20" />
            <Skeleton class="h-10 w-full rounded" />
        </div>
    </div>
</template>
