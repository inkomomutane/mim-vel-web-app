<script setup lang="ts">
import { useCookies } from '@vueuse/integrations/useCookies'
import { storeToRefs } from 'pinia'

import AppSidebar from '@/components/app-sidebar/index.vue'
import LanguageChange from '@/components/language-change.vue'
import ToggleTheme from '@/components/toggle-theme.vue'
import { Separator } from '@/components/ui/separator'
import { SidebarInset, SidebarProvider, SidebarTrigger } from '@/components/ui/sidebar'
import { SIDEBAR_COOKIE_NAME } from '@/components/ui/sidebar/utils'
import { cn } from '@/lib/utils'
import { useThemeStore } from '@/stores/theme'
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import {NavItem} from "@/types";
import {LayoutGrid} from "@lucide/vue";

const defaultOpen = useCookies([SIDEBAR_COOKIE_NAME])
const themeStore = useThemeStore()
const { contentLayout } = storeToRefs(themeStore)
const page = usePage().props?.auth?.user;

const routes =[
    {
        title: 'Dashboard',
        icon: LayoutGrid,
        routeName: 'dashboard',
        url: route('dashboard'),
        isActive: (routeName: string) => routeName === 'dashboard',
    }
]


</script>

<template>
    <SidebarProvider :default-open="defaultOpen.get(SIDEBAR_COOKIE_NAME)">
        <AppSidebar :app="{
            name: 'Accounting',
            shortName: 'Basic',
        }" :nav-items="routes" :user="page"/>
        <SidebarInset
            class="w-full max-w-full peer-data-[state=collapsed]:w-[calc(100%-var(--sidebar-width-icon)-1rem)] peer-data-[state=expanded]:w-[calc(100%-var(--sidebar-width))]">
            <header
                class="flex items-center gap-3 sm:gap-4 h-14 p-4 shrink-0 transition-[width,height] ease-linear border-b sticky top-0 z-40 bg-background"
            >
                <SidebarTrigger class="-ml-1"/>
                <Separator orientation="vertical"/>
                <div class="flex-1"/>
                <div class="ml-auto flex items-center space-x-2">
                    <LanguageChange/>
                    <ToggleTheme/>
                </div>
            </header>

            <main
                :class="cn('p-4 grow relative',contentLayout === 'centered' ? 'container mx-auto ' : '' )"
            >
                <slot/>
            </main>
        </SidebarInset>
    </SidebarProvider>
</template>
