<script setup lang="ts">
import { ChevronRightIcon } from "@lucide/vue";

import { Link } from "@inertiajs/vue3";
import { route } from "ziggy-js";

import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from "@/components/ui/collapsible";

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";

import {
    SidebarGroup,
    SidebarGroupContent,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
    useSidebar,
} from "@/components/ui/sidebar";

import type { NavItem } from "@/types";

defineProps<{
    navMain: NavItem[];
}>();

const { state, isMobile } = useSidebar();

/**
 * Checks whether this specific navigation item
 * represents the current route.
 */
function isExactActive(menu: NavItem): boolean {
    if (menu.activePattern) {
        return Boolean(route().current(menu.activePattern));
    }

    if (menu.routeName) {
        return Boolean(route().current(menu.routeName));
    }

    return false;
}

/**
 * Checks whether the item itself or one of its
 * descendants is active.
 */
function containsActiveItem(menu: NavItem): boolean {
    if (isExactActive(menu)) {
        return true;
    }

    return menu.children?.some((child) => containsActiveItem(child)) ?? false;
}

/**
 * Open parent menus automatically when a child is active.
 */
function isExpanded(menu: NavItem): boolean {
    return menu.children?.some((child) => containsActiveItem(child)) ?? false;
}

/**
 * Microsoft-style active item.
 *
 * Creates:
 * - subtle selected background
 * - orange vertical line
 * - rounded item
 */
function activeItemClass(active: boolean) {
    return active
        ? `
            relative
            bg-sidebar-accent
            text-sidebar-accent-foreground
            font-medium

            before:absolute
            before:left-0
            before:top-1/2
            before:h-4
            before:w-[3px]
            before:-translate-y-1/2
            before:rounded-r-full
            before:bg-orange-500
            rounded-xs border
            hover:bg-sidebar-accent
            hover:text-sidebar-accent-foreground
        `
        : `
            relative
            text-sidebar-foreground
            hover:bg-sidebar-accent/60
            hover:text-sidebar-accent-foreground
        `;
}
</script>

<template>
    <SidebarGroup>
        <SidebarGroupContent>
            <SidebarMenu>
                <template
                    v-for="menu in navMain"
                    :key="menu.routeName ?? menu.title"
                >
                    <!-- ====================================================== -->
                    <!-- Normal menu item                                       -->
                    <!-- ====================================================== -->

                    <SidebarMenuItem v-if="!menu.children?.length">
                        <SidebarMenuButton
                            as-child
                            :tooltip="menu.title"
                            :class="activeItemClass(isExactActive(menu))"
                        >
                            <Link
                                :href="menu.href ?? '#'"
                                class="flex items-center gap-2"
                            >
                                <component
                                    :is="menu.icon"
                                    v-if="menu.icon"
                                    class="size-4"
                                />

                                <span class="truncate">
                                    {{ menu.title }}
                                </span>
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>

                    <!-- ====================================================== -->
                    <!-- Menu with children                                     -->
                    <!-- ====================================================== -->

                    <SidebarMenuItem v-else>
                        <!-- Expanded sidebar -->
                        <Collapsible
                            v-if="state !== 'collapsed' || isMobile"
                            as-child
                            :default-open="isExpanded(menu)"
                            class="group/collapsible"
                        >
                            <SidebarMenuItem>
                                <CollapsibleTrigger as-child>
                                    <SidebarMenuButton
                                        :tooltip="menu.title"
                                        class="text-sidebar-foreground hover:bg-sidebar-accent/60 hover:text-sidebar-accent-foreground relative"
                                    >
                                        <component
                                            :is="menu.icon"
                                            v-if="menu.icon"
                                            class="size-4"
                                        />

                                        <span class="truncate">
                                            {{ menu.title }}
                                        </span>

                                        <ChevronRightIcon
                                            class="ml-auto size-4 shrink-0 transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90"
                                        />
                                    </SidebarMenuButton>
                                </CollapsibleTrigger>

                                <CollapsibleContent>
                                    <SidebarMenuSub>
                                        <SidebarMenuSubItem
                                            v-for="subItem in menu.children"
                                            :key="
                                                subItem.routeName ??
                                                subItem.title
                                            "
                                        >
                                            <SidebarMenuSubButton
                                                as-child
                                                :class="
                                                    activeItemClass(
                                                        isExactActive(subItem),
                                                    )
                                                "
                                            >
                                                <Link
                                                    :href="subItem.href ?? '#'"
                                                    class="flex items-center gap-2"
                                                >
                                                    <component
                                                        :is="subItem.icon"
                                                        v-if="subItem.icon"
                                                        class="size-4"
                                                    />

                                                    <span class="truncate">
                                                        {{ subItem.title }}
                                                    </span>
                                                </Link>
                                            </SidebarMenuSubButton>
                                        </SidebarMenuSubItem>
                                    </SidebarMenuSub>
                                </CollapsibleContent>
                            </SidebarMenuItem>
                        </Collapsible>

                        <!-- Collapsed sidebar -->
                        <DropdownMenu v-else>
                            <DropdownMenuTrigger as-child>
                                <SidebarMenuButton
                                    :tooltip="menu.title"
                                    :class="
                                        activeItemClass(isExactActive(menu))
                                    "
                                >
                                    <component
                                        :is="menu.icon"
                                        v-if="menu.icon"
                                        class="size-4"
                                    />

                                    <span>{{ menu.title }}</span>
                                </SidebarMenuButton>
                            </DropdownMenuTrigger>

                            <DropdownMenuContent
                                align="start"
                                side="right"
                                :side-offset="8"
                                class="min-w-52"
                            >
                                <DropdownMenuLabel>
                                    {{ menu.title }}
                                </DropdownMenuLabel>

                                <DropdownMenuSeparator />

                                <DropdownMenuItem
                                    v-for="subItem in menu.children"
                                    :key="subItem.routeName ?? subItem.title"
                                    as-child
                                >
                                    <Link
                                        :href="subItem.href ?? '#'"
                                        :class="[
                                            'relative flex w-full items-center gap-2 rounded-sm',
                                            isExactActive(subItem) &&
                                                'bg-accent text-accent-foreground font-medium',
                                        ]"
                                    >
                                        <span
                                            v-if="isExactActive(subItem)"
                                            class="absolute top-1/2 -left-2 h-4 w-[3px] -translate-y-1/2 rounded-r-full bg-orange-500"
                                        />

                                        <component
                                            :is="subItem.icon"
                                            v-if="subItem.icon"
                                            class="size-4"
                                        />

                                        <span>
                                            {{ subItem.title }}
                                        </span>
                                    </Link>
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </SidebarMenuItem>
                </template>
            </SidebarMenu>
        </SidebarGroupContent>
    </SidebarGroup>
</template>
