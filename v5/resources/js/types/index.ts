export * from './auth';
export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
    adminOnly?: boolean;
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
