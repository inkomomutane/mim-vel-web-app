<script setup lang="ts">
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader, SidebarMenuButton,
    SidebarRail,
} from '@/components/ui/sidebar'
import {   IconInnerShadowTop } from '@tabler/icons-vue'

import { sidebarData } from './data/sidebar-data'
import NavFooter from './nav-footer.vue'
import { t } from "@/lib/utils"
import {LayoutGrid, ListCheck, ListChecks, CheckSquare} from '@lucide/vue'
import NavTeamCollapsible from "@/components/app-sidebar/nav-team-collapsible.vue";
import type {NavItem, User} from "@/types";
import type { LucideIcon } from "@lucide/vue";

interface  Props {
    navItems: Array<NavItem>,
    user: User,
    app: {
        name: string,
        shortName: string,
        logo?: LucideIcon,
        image?: string,
    }
}
const props = defineProps<Props>()
</script>

<template>
    <Sidebar collapsible="icon" class="z-50">
        <SidebarHeader

            class="h-14 border-b   flex items-center  w-full p-2 group-data-[collapsible=icon]:justify-center"
        >
            <div
                type="button"
                class=" flex w-full h-full items-center gap-2 rounded"
            >
                <div class="            flex aspect-square size-8 shrink-0 items-center justify-center        "
                >
                    <img v-if="app.image" :src="app.image" alt="Logo" class="h-6 w-6 rounded-full object-cover"/>
                    <component v-else-if="app.logo" :is="app.logo" class="h-6 w-6"/>
                    <IconInnerShadowTop v-else class="h-6 w-6"/>
                </div>

                <div class="grid min-w-0 flex-1 text-left text-sm leading-tight">
                        <span class="truncate font-semibold">
                            {{ t(app.name ?? '') }}
                        </span>

                    <span class="truncate text-xs text-muted-foreground">
                        {{ t(app.shortName ?? '') }}
                    </span>
                </div>
            </div>
        </SidebarHeader>

        <SidebarContent >
            <NavTeamCollapsible :nav-main="navItems" />
        </SidebarContent>
        <SidebarFooter

            class="h-14 border-t py-1 group-data-[collapsible=icon]:justify-center"
        >
            <NavFooter  :user="user" />
        </SidebarFooter>
        <SidebarRail />
    </Sidebar>
</template>
