<script setup lang="ts">
import { MoonIcon, SunIcon, SunMoonIcon } from "@lucide/vue";
import { useColorMode } from "@vueuse/core";

import { Button } from "@/components/ui/button";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import {HTMLAttributes} from "vue";
import {cn} from "@/lib/utils";

const mode = useColorMode();
const props = defineProps<{
    class?: HTMLAttributes['class']
}>()
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button
                variant="outline"
                size="icon-sm"
                aria-label="Toggle theme"
                title="Toggle theme"
                :class="cn(props.class)"
            >
                <SunIcon
                    class="scale-100 rotate-0 transition-all dark:scale-0 dark:-rotate-90"
                />
                <MoonIcon
                    class="absolute scale-0 rotate-90 transition-all dark:scale-100 dark:rotate-0"
                />
                <span class="sr-only">Toggle theme</span>
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end">
            <DropdownMenuItem @click="mode = 'light'">
                <SunIcon />
                Light
            </DropdownMenuItem>
            <DropdownMenuItem @click="mode = 'dark'">
                <MoonIcon />
                Dark
            </DropdownMenuItem>
            <DropdownMenuItem @click="mode = 'auto'">
                <SunMoonIcon />
                System
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
