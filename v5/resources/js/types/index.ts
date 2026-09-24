export * from './auth';
import type { LucideIcon } from '@lucide/vue';

export interface NavItem {
    title: string;
    href?: string;

    icon?: LucideIcon;

    routeName?: string;
    activePattern?: string;

    isActive?: boolean;
    adminOnly?: boolean;

    children?: NavItem[];
}

export interface SharedData {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: {
        location: string;
        url: string;
        port: null | number;
        defaults: Record<string, unknown>;
        routes: Record<string, string>;
    };
}

export type IconSource = 'lucide' | 'lab';

export type LucideIconNode = Array<
    [
        string,
        Record<string, string | number>
    ]
>;

export interface IconData {
    id: number;
    name: string;
    slug: string;
    source: IconSource;
    icon_node: LucideIconNode;
    tags: string[];
}
