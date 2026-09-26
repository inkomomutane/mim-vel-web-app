import type { LucideProps } from "@lucide/vue";
import type { FunctionalComponent } from "vue";

export type NavIcon = FunctionalComponent<LucideProps>;

export interface BaseNavItem {
    title: string;
    icon?: NavIcon;

    /**
     * Explicit Ziggy route pattern(s) used to determine
     * whether this item is active.
     *
     * Examples:
     * management.users.*
     * management.roles.index
     */
    active?: string | string[];
}

export interface NavLinkItem extends BaseNavItem {
    /**
     * Laravel named route.
     *
     * Example:
     * management.users.index
     */
    route?: string;

    /**
     * Route parameters for Ziggy.
     *
     * Example:
     * { user: 10 }
     */
    params?: Record<string, unknown>;

    /**
     * Use only for external/non-Laravel URLs.
     */
    url?: string;

    items?: never;
}

export interface NavParentItem extends BaseNavItem {
    items: NavSubItem[];

    route?: never;
    params?: never;
    url?: never;
}

export type NavSubItem = NavLinkItem | NavParentItem;

export interface NavGroup {
    title: string;
    items: NavSubItem[];
}

export type NavItem = NavSubItem;

export interface User {
    name: string;
    avatar: string;
    email: string;
}

export interface Team {
    name: string;
    logo: NavIcon;
    plan: string;
}

export interface SidebarData {
    user: User;
    teams: Team[];
    navMain: NavGroup[];
}
