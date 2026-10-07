<script setup lang="ts">
import { useCookies } from "@vueuse/integrations/useCookies";
import { usePage } from "@inertiajs/vue3";
import { route } from "ziggy-js";

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

import { cn, t } from "@/lib/utils";

import {
    BadgeCheck,
    Building2,
    Handshake,
    House,
    LayoutDashboard,
    MapPinHouse,
    MapPinned,
    ScrollText,
    Tags,
} from "@lucide/vue";

const defaultOpen = useCookies([SIDEBAR_COOKIE_NAME]);
const page = usePage().props?.auth?.user;

const routes = [
    {
        title: "Dashboard",
        icon: LayoutDashboard,
        routeName: "dashboard",
        href: route("dashboard"),
        isActive: (routeName: string) => routeName === "dashboard",
    },
    {
        title: t("Provinces"),
        icon: MapPinned,
        routeName: "management.province.list",
        href: route("management.province.list"),
        isActive: (routeName: string) =>
            routeName.startsWith("management.province."),
    },
    {
        title: t("Property conditions"),
        icon: House,
        routeName: "management.property-condition.list",
        href: route("management.property-condition.list"),
        isActive: (routeName: string) =>
            routeName.startsWith("management.property-condition."),
    },
    {
        title: t("Status"),
        icon: BadgeCheck,
        routeName: "management.status.list",
        href: route("management.status.list"),
        isActive: (routeName: string) =>
            routeName.startsWith("management.status."),
    },
    {
        title: t("Property for"),
        icon: Tags,
        routeName: "management.property-for.list",
        href: route("management.property-for.list"),
        isActive: (routeName: string) =>
            routeName.startsWith("management.property-for."),
    },
    {
        title: t("Intermediation rules"),
        icon: Handshake,
        routeName: "management.intermediation-rule.list",
        href: route("management.intermediation-rule.list"),
        isActive: (routeName: string) =>
            routeName.startsWith("management.intermediation-rule."),
    },
    {
        title: t("Business rules"),
        icon: ScrollText,
        routeName: "management.business-rule.list",
        href: route("management.business-rule.list"),
        isActive: (routeName: string) =>
            routeName.startsWith("management.business-rule."),
    },
    {
        title: t("City"),
        icon: Building2,
        routeName: "management.city.list",
        href: route("management.city.list"),
        isActive: (routeName: string) =>
            routeName.startsWith("management.city."),
    },
    {
        title: t("Neighbourhood"),
        icon: MapPinHouse,
        routeName: "management.neighborhood.list",
        href: route("management.neighborhood.list"),
        isActive: (routeName: string) =>
            routeName.startsWith("management.neighborhood."),
    },
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
                        'relative container mx-auto grow p-4',
                    )
                "
            >
                <slot />
            </main>
        </SidebarInset>
    </SidebarProvider>
</template>
