import { PropType } from "vue";

export interface MediaLibraryOriginalType {
    urls: {
        type: string[];
    };
    base64svg: String;
}
export interface ResponsiveImageType {
    id: number;
    model_type: String;
    model_id: number;
    uuid: String;
    collection_name: String;
    name: String;
    file_name: String;
    mime_type: String;
    disk: String;
    conversions_disk: String;
    size: number;
    manipulations: Array;
    custom_properties: Array;
    generated_conversions: Object;
    responsive_images: MediaLibraryOriginalType;
    order_column: number;
    created_at: Date;
    updated_at: Date;
    original_url: String;
    preview_url: String;
}
