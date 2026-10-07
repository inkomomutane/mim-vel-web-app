import { AlertStatus } from "../Enum";
export type AdsData = {
    readonly id: number | null;
    readonly ads_title: string | null;
    readonly ads_subtitle: string | null;
    readonly ads_link: string | null;
    readonly type: string | null;
    images: ImageData[];
};
export type AlertDto = {
    type: AlertStatus;
    message: string;
};
export type BusinessRuleData = {
    id: number | null;
    name: string;
};
export type BusinessRuleRequestFilters = {
    search: string | null;
    per_page: string | null;
    sort: string | null;
};
export type CardPropertyData = {
    title: string | null;
    price: number | null;
    description: string | null;
    slug: string | null;
    bathrooms: number | null;
    year: number | null;
    floors: number | null;
    area: number | null;
    bedrooms: number | null;
    suites: number | null;
    garages: number | null;
    pools: number | null;
    address: string | null;
    map: string | null;
    for_rent: boolean;
    published_at: string | null;
    views: number | null;
    neighborhood_id: number;
    property_condition_id: number;
    property_type_id: number;
    status_id: number;
    broker_id: number;
    business_rule_id: number | null;
    property_for_id: number | null;
    intermediation_rule_id: number | null;
    details: string | null;
    approved: boolean;
    approved_by_id: number | null;
    approved_at: string | null;
    neighborhood_name: string | null;
    property_condition_name: string | null;
    property_type_name: string | null;
    status_name: string | null;
    broker_name: string | null;
    business_rule_name: string | null;
    property_for_name: string | null;
    id: number | null;
    images: ImageData[];
};
export type CityData = {
    name: string;
    province_id: number | null;
    province_name: string | null;
    id: number | null;
};
export type CityRequestFilters = {
    search: string | null;
    per_page: string | null;
    sort: string | null;
};
export type CommentData = {
    id: number | null;
    comment: string | null;
    name: string | null;
    ip: string | null;
    property_id: number;
};
export type HotelData = {
    id: number | null;
    price: number | null;
    title: string | null;
    description: string | null;
    contact: string | null;
    email: string | null;
    slug: string | null;
    hotel_meta_data_id: number;
};
export type HotelMetaDataDtoData = {
    title: string | null;
    address: string | null;
    description: string | null;
    property_type_id: number;
    property_condition_id: number;
    status_id: number;
    neighborhood_id: number;
    slug: string | null;
    id: number | null;
    property_type_name: string | null;
    property_condition_name: string | null;
    status_name: string | null;
    neighborhood_name: string | null;
};
export type ImageData = {
    readonly id: number | null;
    readonly url: string;
    readonly srcset: string | null;
    readonly placeholder: string | null;
};
export type IntermediationRuleData = {
    name: string;
    code: string;
    percentage: number;
    id: number | null;
};
export type IntermediationRuleRequestFilters = {
    search: string | null;
    per_page: string | null;
    sort: string | null;
};
export type KeyValueDto = {
    key: string;
    value: string;
};
export type MessageData = {
    id: number | null;
    client_name: string;
    message: string;
    email: string;
    contact: string;
    date_time: string | null;
    broker: string | null;
    property_url: string | null;
};
export type NeighborhoodData = {
    name: string | null;
    city_id: number;
    city_name: string | null;
    province_name: string | null;
    id: number | null;
};
export type NeighborhoodRequestFilters = {
    search: string | null;
    per_page: string | null;
    sort: string | null;
};
export type PageData = {
    name: string | null;
    content: string | null;
    slogan: string | null;
    email: string | null;
    location: string | null;
    facebook: string | null;
    instagram: string | null;
    whatsapp: string | null;
    tiktok: string | null;
    contacts: Array<any> | null;
};
export type PartnerTagData = {
    name: string | null;
    id: number | null;
};
export type PolicyData = {
    content: string | null;
    id: number | null;
};
export type PropertyConditionData = {
    name: string | null;
    id: number | null;
};
export type PropertyConditionRequestFilters = {
    search: string | null;
    sort: string | null;
    per_page: string | null;
};
export type PropertyForData = {
    name: string;
    slug: string | null;
    id: number | null;
};
export type PropertyForRequestFilters = {
    search: string | null;
    per_page: string | null;
    sort: string | null;
};
export type PropertyTypeData = {
    name: string | null;
    id: number | null;
};
export type ProvinceData = {
    name: string;
    id: number | null;
};
export type ProvinceRequestFilters = {
    search: string | null;
    per_page: string | null;
    sort: string | null;
};
export type RatingData = {
    rating: number | null;
    ip: string | null;
    name: string | null;
    property_id: number;
    id: number | null;
};
export type SelectQueryData = {
    selectedKey: string;
    selectedValues: Array<any> | null;
    search: string | null;
    page: number;
};
export type StatusData = {
    name: string | null;
    id: number | null;
};
export type StatusRequestFilters = {
    search: string | null;
    per_page: string | null;
    sort: string | null;
};
export type TermAndConditionData = {
    content: string | null;
    id: number | null;
};
export type TransactionTypeData = {
    name: string;
    slug_text: string;
    id: number | null;
};
export type UserData = {
    name: string;
    email: string;
    contact: string | null;
    location: string | null;
    active: boolean;
    auth0_id: string | null;
};
export type WebsitePropertyFilters = {
    minPrice: number | null;
    maxPrice: number | null;
    propertyTypes: Array<any>;
    conditions: Array<any>;
    propertyFor: Array<any>;
    neighbourhoods: Array<any>;
    minBedrooms: number | null;
    maxBedrooms: number | null;
    minBathrooms: number | null;
    maxBathrooms: number | null;
    minSuites: number | null;
    maxSuites: number | null;
    minGarages: number | null;
    maxGarages: number | null;
    minPools: number | null;
    maxPools: number | null;
    minFloors: number | null;
    maxFloors: number | null;
    minArea: number | null;
    maxArea: number | null;
    minYear: number | null;
    maxYear: number | null;
};
