<script setup lang="ts">
import UserMenuContent from './UserMenuContent.vue';

import {
    Avatar,
    AvatarFallback,
    AvatarImage,
} from '@/components/ui/avatar';

import { Button } from '@/components/ui/button';

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

import { Input } from '@/components/ui/input';

import {
    SidebarTrigger,
} from '@/components/ui/sidebar';

import { getInitials } from '@/composables/useInitials';

import type {
    BreadcrumbItem,
    NavItem,
} from '@/types';

import { AppRoutes } from './AppRoutes';

import { usePage } from '@inertiajs/vue3';

import {
    Bell,
    Search,
} from '@lucide/vue';

import { computed } from 'vue';

interface Props {
    breadcrumbs?: BreadcrumbItem[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage();

const auth = computed(() => page.props.auth);

const findActiveItem = (
    items: NavItem[],
): NavItem | undefined => {
    for (const item of items) {
        if (
            item.activePattern &&
            route().current(item.activePattern)
        ) {
            return item;
        }

        if (
            item.routeName &&
            route().current(item.routeName)
        ) {
            return item;
        }

        if (item.children?.length) {
            const child = findActiveItem(item.children);

            if (child) {
                return child;
            }
        }
    }

    return undefined;
};

const currentItem = computed(() => {
    return findActiveItem(AppRoutes);
});

const pageTitle = computed(() => {
    return currentItem.value?.title ?? '';
});

const formattedDate = computed(() => {
    return new Intl.DateTimeFormat('en-GB', {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric',
    }).format(new Date());
});
</script>

<template>
    <header
        class="
            sticky
            top-0
            z-40
            flex
            h-16
            shrink-0
            items-center
            border-b
            border-neutral-100
            bg-white/95
            px-4
            backdrop-blur

            dark:border-zinc-800
            dark:bg-zinc-950/95

            lg:px-6
        "
    >
        <!-- Left -->
        <div class="flex min-w-0 items-center gap-3">

            <SidebarTrigger
                class="
                    -ml-1
                    text-neutral-500
                    hover:bg-neutral-100
                    hover:text-neutral-900

                    dark:hover:bg-zinc-800
                    dark:hover:text-white
                "
            />

            <div
                class="
                    hidden
                    h-5
                    w-px
                    bg-neutral-200
                    sm:block
                    dark:bg-zinc-800
                "
            />

            <div class="min-w-0">
                <h1
                    class="
                        truncate
                        text-base
                        font-semibold
                        text-neutral-950
                        dark:text-white
                    "
                >
                    {{ pageTitle }}
                </h1>

                <p
                    class="
                        hidden
                        text-[11px]
                        text-neutral-400
                        md:block
                    "
                >
                    {{ formattedDate }}
                </p>
            </div>
        </div>

        <!-- Right -->
        <div
            class="
                ml-auto
                flex
                items-center
                gap-2
            "
        >
            <!-- Search -->
            <div
                class="
                    relative
                    hidden
                    md:block
                "
            >
                <Search
                    class="
                        absolute
                        left-3
                        top-1/2
                        size-4
                        -translate-y-1/2
                        text-neutral-400
                    "
                />

                <Input
                    placeholder="Search"
                    class="
                        h-9
                        w-[220px]
                        border-0
                        bg-neutral-50
                        pl-9
                        shadow-none

                        placeholder:text-neutral-400

                        focus-visible:ring-1

                        lg:w-[280px]

                        dark:bg-zinc-900
                    "
                />
            </div>

            <!-- Mobile search -->
            <Button
                variant="ghost"
                size="icon"
                class="size-9 md:hidden"
            >
                <Search class="size-[18px]" />
            </Button>

            <!-- Notifications -->
            <Button
                variant="ghost"
                size="icon"
                class="
                    relative
                    size-9
                    bg-neutral-50
                    text-neutral-500

                    hover:bg-neutral-100
                    hover:text-neutral-950

                    dark:bg-zinc-900
                    dark:hover:bg-zinc-800
                    dark:hover:text-white
                "
            >
                <Bell
                    class="size-[18px]"
                    :stroke-width="1.8"
                />

                <span
                    class="
                        absolute
                        right-2
                        top-2
                        size-1.5
                        rounded-full
                        bg-orange-500
                    "
                />
            </Button>

            <!-- User -->
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <Button
                        variant="ghost"
                        class="
                            h-10
                            gap-2
                            rounded-lg
                            px-1.5

                            hover:bg-neutral-100
                            dark:hover:bg-zinc-800
                        "
                    >
                        <Avatar class="size-8">
                            <AvatarImage
                                v-if="auth.user.avatar"
                                :src="auth.user.avatar"
                                :alt="auth.user.name"
                            />

                            <AvatarFallback
                                class="
                                    bg-orange-50
                                    text-xs
                                    font-semibold
                                    text-orange-600

                                    dark:bg-orange-950
                                    dark:text-orange-400
                                "
                            >
                                {{ getInitials(auth.user.name) }}
                            </AvatarFallback>
                        </Avatar>
                    </Button>
                </DropdownMenuTrigger>

                <DropdownMenuContent
                    align="end"
                    class="w-60"
                >
                    <UserMenuContent
                        :user="auth.user"
                    />
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    </header>
</template>
