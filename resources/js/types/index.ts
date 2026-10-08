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

export interface PropertyPhoto { id: string; url: string; alt: string; roomId?: string }
export interface Bedroom { id: string; name: string; beds: string; photo: PropertyPhoto }
export interface Amenity { id: string; label: string; icon: string }
export interface PropertyReview { id: string; author: string; avatar?: string; rating: number; date: string; body: string }
export interface PropertyRule { id: string; label: string; icon: string }
export interface PropertyLocation { address: string; latitude: number; longitude: number; description: string }
export interface BookingQuote { currency: string; total: number; nights: number; competitor?: { name: string; total: number }; minDate?: string }
export interface PropertyDetails {
    id: string; slug: string; title: string; kind: string; locality: string; rating: number; reviewCount: number;
    bedroomsCount: number; bedsCount: number; bathrooms: number; maxGuests: number;
    highlight: string; operator: string; operatorSubtitle: string; description: string;
    photos: PropertyPhoto[]; bedrooms: Bedroom[]; amenities: Amenity[]; reviews: PropertyReview[];
    location: PropertyLocation; rules: PropertyRule[]; cancellationPolicy: string;
    checkInAfter: string; checkOutBefore: string; quote: BookingQuote;
}
export interface BookingSelection { checkIn: string; checkOut: string; guests: number }

