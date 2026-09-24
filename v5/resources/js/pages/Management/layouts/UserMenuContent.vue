<script setup lang="ts">
import UserInfo from './UserInfo.vue';
import { DropdownMenuGroup, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator } from '@/components/ui/dropdown-menu';
import type { User } from '@/types';
import { Link } from '@inertiajs/vue3';
import { LogOut, Settings } from '@lucide/vue';
import { t } from '@/lib/utils';

interface Props {
    user: User;
}

defineProps<Props>();
</script>

<template>
    <DropdownMenuLabel class="p-0 font-normal">
        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
            <UserInfo :user="user" :show-email="true" />
        </div>
    </DropdownMenuLabel>
    <DropdownMenuSeparator />
    <DropdownMenuSeparator />
    <DropdownMenuItem :as-child="true">
        <a class="block w-full" :href="route('logout')">
            <LogOut class="mr-2 h-4 w-4" />
            {{ t('Log out') }}
        </a>
    </DropdownMenuItem>
</template>
