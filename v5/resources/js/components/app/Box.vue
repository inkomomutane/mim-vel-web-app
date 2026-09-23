<script setup lang="ts">
import { cn } from '@/lib/utils';
</script>
<template>
    <div class="relative">

        <div class="pb-4">
            <div class="">
                <div class="">
                    <slot name="tabs" />
                </div>
                <div :class="cn('mt-6 border border-zinc-200 bg-white shadow-inner dark:border-zinc-700 dark:bg-zinc-950', $attrs.class,' overflow-hidden')">

                    <slot name="status-ribbon">
                    </slot>

                    <div class="grid gap-3 p-8 lg:grid-cols-2">
                        <!-- header -->
                        <div class="flex gap-3 lg:justify-start">
                            <slot name="header-left"> </slot>
                        </div>
                        <div class="flex lg:justify-end">
                            <slot name="header-right"> </slot>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="p-4 sm:p-0">
                        <div class="grid grid-cols-1 p-4 md:px-8">
                            <slot name="content-table"> </slot>
                        </div>
                        <!-- Line add -->
                        <div class="grid md:grid-cols-2">
                            <div class="flex-col md:justify-start">
                                <slot name="table-line-add"></slot>
                                <slot name="remarks"></slot>
                            </div>

                            <div class="flex md:justify-end">
                                <slot name="totals"></slot>
                            </div>
                        </div>
                        <!-- Totals -->
                    </div>
                    <div class="grid grid-cols-1 p-4 sm:px-8 lg:grid-cols-2">
                        <!-- footer -->
                        <div class="flex md:justify-start">
                            <slot name="footer-left"> </slot>
                        </div>
                        <div class="flex md:justify-end">
                            <slot name="footer-right"> </slot>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <slot name="copy-from"> </slot>
    </div>
</template>
