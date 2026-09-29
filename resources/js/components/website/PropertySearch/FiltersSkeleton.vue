<script setup lang="ts">
import { Skeleton } from '@/components/ui/skeleton';
</script>

<template>
    <div class="px-5 sm:px-6">
        <div
            v-for="section in 4"
            :key="section"
            class="
                space-y-4
                border-b
                py-6
            "
        >
            <Skeleton class="h-4 w-32" />

            <div
                v-if="section === 1"
                class="
                    flex
                    h-16
                    items-end
                    gap-1
                "
            >
                <Skeleton
                    v-for="bar in 16"
                    :key="bar"
                    class="
                        h-full
                        min-w-0
                        flex-1
                        rounded-sm
                    "
                    :style="{
                        height: `${
                            20 +
                            (
                                (
                                    bar *
                                    13
                                ) %
                                70
                            )
                        }%`,
                    }"
                />
            </div>

            <template v-else>
                <Skeleton class="h-12 w-full rounded-xl" />

                <div
                    class="
                        flex
                        gap-2
                    "
                >
                    <Skeleton class="h-7 w-20 rounded-full" />
                    <Skeleton class="h-7 w-28 rounded-full" />
                    <Skeleton class="h-7 w-16 rounded-full" />
                </div>
            </template>
        </div>
    </div>
</template>
