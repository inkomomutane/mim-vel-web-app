<script setup lang="ts">
import { useCookies } from "@vueuse/integrations/useCookies";

import AppSidebar from "@/components/app-sidebar/index.vue";
import LanguageChange from "@/components/language-change.vue";
import ToggleTheme from "@/components/toggle-theme.vue";
import { Separator } from "@/components/ui/separator";
import {
    SidebarInset,
    SidebarProvider,
    SidebarTrigger,
} from "@/components/ui/sidebar";
import { SIDEBAR_COOKIE_NAME } from "@/components/ui/sidebar/utils";
import { cn } from "@/lib/utils";
import { usePage } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import { LayoutGrid, MapPinned, ShieldQuestionMark , CheckSquare } from "@lucide/vue";

const defaultOpen = useCookies([SIDEBAR_COOKIE_NAME]);
const page = usePage().props?.auth?.user;
import { t } from "@/lib/utils";
const routes = [
    {
        title: "Dashboard",
        icon: LayoutGrid,
        routeName: "dashboard",
        href: route("dashboard"),
        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t("Provinces"),
        href: route("management.province.list"),
        icon: MapPinned,
        routeName: "management.province.list",
        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t("Property conditions"),
        href: route("management.property-condition.list"),
        icon: ShieldQuestionMark ,
        routeName: "management.property-condition.list",

        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t("Status"),
        href: route("management.status.list"),
        icon: CheckSquare,
        routeName: "management.status.list",
        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t("Property for"),
        href: route("management.property-for.list"),
        icon: CheckSquare,
        routeName: "management.property-for.list",
        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t("Intermediation rules"),
        href: route("management.intermediation-rule.list"),
        icon: CheckSquare,
        routeName: "management.intermediation-rule.list",
        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t("Business rules"),
        href: route("management.business-rule.list"),
        icon: CheckSquare,
        routeName: "management.business-rule.list",
        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t('City'),
        href: route("management.city.list"),
        icon: CheckSquare,
        routeName: "management.city.list",
        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t('Neighborhood'),
        href: route("management.neighborhood.list"),
        icon: CheckSquare,
        routeName: "management.neighborhood.list",
        isActive: (routeName: string) => routeName === "dashboard",
    }
];
</script>

<template>
    <SidebarProvider :default-open="defaultOpen.get(SIDEBAR_COOKIE_NAME)">
        <AppSidebar
            :app="{
                name: 'Accounting',
                shortName: 'Basic',
            }"
            :nav-items="routes"
            :user="page"
        />
        <SidebarInset
            class="w-full max-w-full bg-slate-100 peer-data-[state=collapsed]:w-[calc(100%-var(--sidebar-width-icon)-1rem)] peer-data-[state=expanded]:w-[calc(100%-var(--sidebar-width))] dark:bg-zinc-950"
        >
            <header
                class="bg-background sticky top-0 z-40 flex h-14 shrink-0 items-center gap-3 border-b p-4 transition-[width,height] ease-linear sm:gap-4"
            >
                <SidebarTrigger class="-ml-1" />
                <Separator orientation="vertical" />
                <div class="flex-1" />
                <div class="ml-auto flex items-center space-x-2">
                    <LanguageChange />
                    <ToggleTheme />
                </div>
            </header>

            <main
                :class="
                    cn(
                        'relative grow p-4 container mx-auto',
                    )
                "
            >
                <slot />
            </main>
        </SidebarInset>
    </SidebarProvider>
</template>
