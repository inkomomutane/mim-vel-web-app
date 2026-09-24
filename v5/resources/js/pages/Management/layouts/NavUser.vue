<script setup lang="ts">
import UserInfo from './UserInfo.vue';
import UserMenuContent from './UserMenuContent.vue';

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

import {
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';

import type {
    SharedData,
    User,
} from '@/types';

import { usePage } from '@inertiajs/vue3';

import {
    ChevronsUpDown,
} from '@lucide/vue';

const page = usePage<SharedData>();

const user = page.props.auth.user as User;
</script>

<template>
    <SidebarMenu>
        <SidebarMenuItem>
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <SidebarMenuButton
                        size="lg"
                        class="
                            rounded-lg

                            hover:bg-neutral-100

                            data-[state=open]:bg-neutral-100

                            dark:hover:bg-zinc-800
                            dark:data-[state=open]:bg-zinc-800
                        "
                    >
                        <UserInfo
                            :user="user"
                        />

                        <ChevronsUpDown
                            class="
                                ml-auto
                                size-4
                                text-neutral-400
                            "
                        />
                    </SidebarMenuButton>
                </DropdownMenuTrigger>

                <DropdownMenuContent
                    class="
                        w-(--radix-dropdown-menu-trigger-width)
                        min-w-56
                        rounded-lg
                    "
                    side="right"
                    align="end"
                    :side-offset="8"
                >
                    <UserMenuContent
                        :user="user"
                    />
                </DropdownMenuContent>
            </DropdownMenu>
        </SidebarMenuItem>
    </SidebarMenu>
</template>
