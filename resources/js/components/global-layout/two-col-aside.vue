<script setup lang="ts">
import { ChevronsUpDownIcon } from "@lucide/vue";

import { Button } from "@/components/ui/button";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";

import type { TwoColAsideNavItem } from "./types";

const props = defineProps<{
    nav: TwoColAsideNavItem[];
}>();

const route = useRoute();
const currentPath = computed(() => route.path);
const activeClass = "text-primary font-semibold bg-primary/5";

const currentLink = computed(() =>
    props.nav.find((link) => link.url === currentPath.value),
);
</script>

<template>
    <nav class="flex flex-col gap-2">
        <router-link
            v-for="link in props.nav"
            :key="link.url"
            :to="link.url"
            class="hover:bg-primary/5 hidden items-center rounded-md px-2 py-1 lg:flex"
            :class="link.url === currentPath ? activeClass : ''"
        >
            <component :is="link.icon" class="mr-1 size-4" />
            <span>{{ link.title }}</span>
        </router-link>

        <DropdownMenu class="lg:hidden">
            <DropdownMenuTrigger as-child>
                <Button variant="outline" class="w-48 lg:hidden">
                    <component :is="currentLink?.icon" class="mr-1 size-4" />
                    <span>{{ currentLink?.title }}</span>
                    <ChevronsUpDownIcon class="ml-auto size-4" />
                </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent class="w-48" align="start">
                <DropdownMenuItem
                    v-for="link in props.nav"
                    :key="link.url"
                    @click="$router.push(link.url)"
                >
                    <component :is="link.icon" class="mr-1 size-4" />
                    {{ link.title }}
                </DropdownMenuItem>
            </DropdownMenuContent>
        </DropdownMenu>
    </nav>
</template>
