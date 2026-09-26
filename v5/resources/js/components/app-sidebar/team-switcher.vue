<script setup lang="ts">
import { ChevronsUpDownIcon, PlusIcon } from "@lucide/vue";

import { Dialog, DialogContent, DialogTrigger } from "@/components/ui/dialog";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuShortcut,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import {
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    useSidebar,
} from "@/components/ui/sidebar";

import type { Team } from "./types";
import { defineAsyncComponent, ref, shallowRef } from "vue";

const { teams } = defineProps<{
    teams: Team[];
}>();

const { isMobile } = useSidebar();

const activeTeam = ref<Team>(teams[0]);
function setActiveTeam(team: Team) {
    activeTeam.value = team;
}

const isOpen = shallowRef(false);

const showComponent = shallowRef<Component | null>(null);
type TComponent = "team-add";

function handleSelect(command: TComponent) {
    switch (command) {
        case "team-add":
            showComponent.value = defineAsyncComponent(
                () => import("./nav-team-add.vue"),
            );
            break;
    }
}
</script>

<template>
    <SidebarMenu>
        <SidebarMenuItem>
            <Dialog v-model:open="isOpen">
                <DropdownMenu>
                    <DropdownMenuTrigger as-child>
                        <SidebarMenuButton
                            size="lg"
                            class="data-[state=open]:bg-sidebar-accent data-[state=open]:text-sidebar-accent-foreground"
                        >
                            <div
                                class="bg-sidebar-primary text-sidebar-primary-foreground flex aspect-square size-8 items-center justify-center rounded-lg"
                            >
                                <component
                                    :is="activeTeam.logo"
                                    class="size-4"
                                />
                            </div>
                            <div
                                class="grid flex-1 text-left text-sm leading-tight"
                            >
                                <span class="truncate font-semibold">{{
                                    activeTeam.name
                                }}</span>
                                <span class="truncate text-xs">{{
                                    activeTeam.plan
                                }}</span>
                            </div>
                            <ChevronsUpDownIcon class="ml-auto" />
                        </SidebarMenuButton>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent
                        class="w-(--radix-dropdown-menu-trigger-width) min-w-56 rounded-lg"
                        align="start"
                        :side="isMobile ? 'bottom' : 'right'"
                        :side-offset="4"
                    >
                        <DropdownMenuLabel
                            class="text-muted-foreground text-xs"
                        >
                            Teams
                        </DropdownMenuLabel>
                        <DropdownMenuItem
                            v-for="(team, index) in teams"
                            :key="team.name"
                            class="gap-2 p-2"
                            @click="setActiveTeam(team)"
                        >
                            <div
                                class="flex size-6 items-center justify-center rounded-sm border"
                            >
                                <component
                                    :is="team.logo"
                                    class="size-4 shrink-0"
                                />
                            </div>
                            {{ team.name }}
                            <DropdownMenuShortcut
                                >⌘{{ index + 1 }}</DropdownMenuShortcut
                            >
                        </DropdownMenuItem>
                        <DropdownMenuSeparator />

                        <DialogTrigger as-child>
                            <DropdownMenuItem
                                class="gap-2 p-2"
                                @click.stop="handleSelect('team-add')"
                            >
                                <div
                                    class="bg-background flex size-6 items-center justify-center rounded-md border"
                                >
                                    <PlusIcon class="size-4" />
                                </div>
                                <div class="text-muted-foreground font-medium">
                                    Add team
                                </div>
                            </DropdownMenuItem>
                        </DialogTrigger>
                    </DropdownMenuContent>
                </DropdownMenu>

                <DialogContent>
                    <component :is="showComponent" @close="isOpen = false" />
                </DialogContent>
            </Dialog>
        </SidebarMenuItem>
    </SidebarMenu>
</template>
