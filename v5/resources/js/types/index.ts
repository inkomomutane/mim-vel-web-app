export * from "./auth";
import type { LucideIcon } from "@lucide/vue";

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

export type IconSource = "lucide" | "lab";

export type LucideIconNode = Array<[string, Record<string, string | number>]>;

export interface IconData {
    id: number;
    name: string;
    slug: string;
    source: IconSource;
    icon_node: LucideIconNode;
    tags: string[];
}


export interface FilterOption {
    id: number | string
    label: string
    description?: string | null
}

export interface PriceHistogramBucket {
    from: number
    to: number
    count: number
}

export interface PropertyFilterPayload {
    min_price: number
    max_price: number

    propertyTypes: Array<number | string>
    conditions: Array<number | string>
    propertyFor: Array<number | string>
    neighbourhoods: Array<number | string>
}

export interface PropertyFilterMeta {
    currency: {
        code: string
        symbol: string
    }

    price: {
        min: number
        max: number
        step: number
        histogram: PriceHistogramBucket[]
    }

    options: {
        propertyTypes: FilterOption[]
        conditions: FilterOption[]
        propertyFor: FilterOption[]
        neighbourhoods: FilterOption[]
    }

    selected: {
        propertyTypes: FilterOption[]
        conditions: FilterOption[]
        propertyFor: FilterOption[]
        neighbourhoods: FilterOption[]
    }

    count: number
}
