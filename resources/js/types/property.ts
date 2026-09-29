export interface MediaLibraryOriginalData {
    base64svg?: string | null;
    urls?: string[] | null;
}

export interface ResponsiveImageData {
    media_library_original?: MediaLibraryOriginalData | null;
}

export interface MediaData {
    id?: number | null;
    file_name?: string | null;
    name?: string | null;
    mime_type?: string | null;
    original_url?: string | null;
    preview_url?: string | null;
    size?: number | null;
    custom_properties?: Record<string, unknown> | null;
    responsive_images?: ResponsiveImageData | null;
    srcsets?: string | null;
}

export interface PropertyCardData {
    id: number;
    slug: string;

    title: string;

    city?: string | null;
    province?: string | null;
    country?: string | null;

    bedrooms?: number | null;
    bathrooms?: number | null;

    price: string | number;

    /**
     * ISO-4217 code:
     * MZN
     * USD
     * EUR
     */
    currency: string;

    rating?: number | null;

    /**
     * ISO 8601.
     *
     * Correct:
     * 2025-10-01
     *
     * Avoid:
     * 1 Oct 2025
     */
    available_from?: string | null;

    is_featured?: boolean;

    images: MediaData[];
}
