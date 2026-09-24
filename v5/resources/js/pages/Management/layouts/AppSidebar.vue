<script setup lang="ts">
import AppLogo from './AppLogo.vue';
import NavUser from './NavUser.vue';
import { AppRoutes } from './AppRoutes';

import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarGroup,
    SidebarGroupContent,
    SidebarGroupLabel,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
    SidebarRail,
} from '@/components/ui/sidebar';

import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from '@/components/ui/collapsible';

import type { NavItem } from '@/types';

import { Link, usePage } from '@inertiajs/vue3';

import {
    ChevronRight,
} from '@lucide/vue';

import { computed } from 'vue';
import { t } from '@/lib/utils';

const page = usePage();

const auth = computed(() => page.props.auth);

const mainNavItems: NavItem[] = AppRoutes;

const canShowItem = (item: NavItem): boolean => {
    if (!item.adminOnly) {
        return true;
    }

    return auth.value.user?.is_admin === true;
};

const isCurrentRoute = (item: NavItem): boolean => {
    if (item.activePattern) {
        return route().current(item.activePattern) === true;
    }

    if (item.routeName) {
        return route().current(item.routeName) === true;
    }

    return false;
};

const hasActiveChild = (item: NavItem): boolean => {
    if (!item.children?.length) {
        return false;
    }

    return item.children.some((child) => isCurrentRoute(child));
};
</script>

<template>
    <Sidebar
        collapsible="icon"
        class="border-r border-neutral-200 bg-white dark:border-zinc-800 dark:bg-zinc-950"
    >
        <!-- Logo -->
        <SidebarHeader
            class="h-16 justify-center border-b border-neutral-100 px-3 dark:border-zinc-800"
        >
            <AppLogo />
        </SidebarHeader>

        <!-- Navigation -->
        <SidebarContent class="px-2 py-4">

            <SidebarGroup>
                <SidebarGroupLabel
                    class="px-2 text-[11px] font-semibold uppercase tracking-wider text-neutral-400"
                >
                    {{ t('Menu') }}
                </SidebarGroupLabel>

                <SidebarGroupContent>
                    <SidebarMenu class="gap-1">

                        <template
                            v-for="item in mainNavItems"
                            :key="item.title"
                        >
                            <!-- Normal navigation item -->
                            <SidebarMenuItem
                                v-if="
                                    canShowItem(item) &&
                                    !item.children?.length
                                "
                            >
                                <SidebarMenuButton
                                    as-child
                                    :is-active="isCurrentRoute(item)"
                                    :tooltip="item.title"
                                    class="
                                        h-10
                                        rounded-lg
                                        px-3
                                        text-neutral-600
                                        transition-colors

                                        hover:bg-orange-50
                                        hover:text-orange-600

                                        data-[active=true]:bg-orange-50
                                        data-[active=true]:font-medium
                                        data-[active=true]:text-orange-600

                                        dark:text-neutral-300
                                        dark:hover:bg-orange-950/30
                                        dark:hover:text-orange-400

                                        dark:data-[active=true]:bg-orange-950/30
                                        dark:data-[active=true]:text-orange-400
                                    "
                                >
                                    <Link :href="item.href!">
                                        <component
                                            v-if="item.icon"
                                            :is="item.icon"
                                            class="size-[18px]"
                                            :stroke-width="1.8"
                                        />

                                        <span>
                                            {{ item.title }}
                                        </span>
                                    </Link>
                                </SidebarMenuButton>
                            </SidebarMenuItem>

                            <!-- Navigation group -->
                            <Collapsible
                                v-else-if="
                                    canShowItem(item) &&
                                    item.children?.length
                                "
                                :default-open="hasActiveChild(item)"
                                class="group/collapsible"
                            >
                                <SidebarMenuItem>

                                    <CollapsibleTrigger as-child>
                                        <SidebarMenuButton
                                            :tooltip="item.title"
                                            :is-active="hasActiveChild(item)"
                                            class="
                                                h-10
                                                cursor-pointer
                                                rounded-lg
                                                px-3
                                                text-neutral-600

                                                hover:bg-neutral-100
                                                hover:text-neutral-950

                                                data-[active=true]:font-medium
                                                data-[active=true]:text-neutral-950

                                                dark:text-neutral-300
                                                dark:hover:bg-zinc-800
                                                dark:hover:text-white
                                            "
                                        >
                                            <component
                                                v-if="item.icon"
                                                :is="item.icon"
                                                class="size-[18px]"
                                                :stroke-width="1.8"
                                            />

                                            <span>
                                                {{ item.title }}
                                            </span>

                                            <ChevronRight
                                                class="
                                                    ml-auto
                                                    size-4
                                                    transition-transform
                                                    duration-200
                                                    group-data-[state=open]/collapsible:rotate-90
                                                "
                                            />
                                        </SidebarMenuButton>
                                    </CollapsibleTrigger>

                                    <CollapsibleContent>
                                        <SidebarMenuSub
                                            class="
                                                ml-4
                                                border-l
                                                border-neutral-200
                                                pl-3
                                                dark:border-zinc-800
                                            "
                                        >
                                            <SidebarMenuSubItem
                                                v-for="child in item.children"
                                                :key="child.title"
                                            >
                                                <SidebarMenuSubButton
                                                    v-if="canShowItem(child)"
                                                    as-child
                                                    :is-active="isCurrentRoute(child)"
                                                    class="
                                                        h-9
                                                        rounded-lg

                                                        text-neutral-500

                                                        hover:bg-orange-50
                                                        hover:text-orange-600

                                                        data-[active=true]:bg-orange-50
                                                        data-[active=true]:font-medium
                                                        data-[active=true]:text-orange-600

                                                        dark:text-neutral-400
                                                        dark:hover:bg-orange-950/30
                                                        dark:hover:text-orange-400

                                                        dark:data-[active=true]:bg-orange-950/30
                                                        dark:data-[active=true]:text-orange-400
                                                    "
                                                >
                                                    <Link :href="child.href!">

                                                        <component
                                                            v-if="child.icon"
                                                            :is="child.icon"
                                                            class="size-4"
                                                            :stroke-width="1.8"
                                                        />

                                                        <span>
                                                            {{ child.title }}
                                                        </span>
                                                    </Link>
                                                </SidebarMenuSubButton>
                                            </SidebarMenuSubItem>
                                        </SidebarMenuSub>
                                    </CollapsibleContent>

                                </SidebarMenuItem>
                            </Collapsible>
                        </template>

                    </SidebarMenu>
                </SidebarGroupContent>
            </SidebarGroup>
        </SidebarContent>

        <!-- User -->
        <SidebarFooter
            class="border-t border-neutral-100 p-2 dark:border-zinc-800"
        >
            <NavUser />
        </SidebarFooter>

        <SidebarRail />
    </Sidebar>
</template>
