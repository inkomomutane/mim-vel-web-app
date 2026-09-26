export type RemoteFilterType =
    | 'propertyTypes'
    | 'conditions'
    | 'propertyFor'
    | 'neighbourhoods';

export type FilterOption = {
    id: number;
    label: string;
    subtitle?: string | null;
};

export type PriceMeta = {
    min: number;
    max: number;
    step: number;
    histogram: number[];
};

export type PropertyFilterMeta = {
    price: PriceMeta;
};

export type PropertyFilterState = {
    minPrice: number | null;
    maxPrice: number | null;

    propertyTypes: FilterOption[];
    conditions: FilterOption[];
    propertyFor: FilterOption[];
    neighbourhoods: FilterOption[];

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

export type PropertyFilterPayload = {
    minPrice: number | null;
    maxPrice: number | null;

    propertyTypes: number[];
    conditions: number[];
    propertyFor: number[];
    neighbourhoods: number[];

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

export function createEmptyPropertyFilterState(): PropertyFilterState {
    return {
        minPrice: null,
        maxPrice: null,

        propertyTypes: [],
        conditions: [],
        propertyFor: [],
        neighbourhoods: [],

        minBedrooms: null,
        maxBedrooms: null,

        minBathrooms: null,
        maxBathrooms: null,

        minSuites: null,
        maxSuites: null,

        minGarages: null,
        maxGarages: null,

        minPools: null,
        maxPools: null,

        minFloors: null,
        maxFloors: null,

        minArea: null,
        maxArea: null,

        minYear: null,
        maxYear: null,
    };
}

export function toPropertyFilterPayload(
    filters: PropertyFilterState,
): PropertyFilterPayload {
    return {
        minPrice: filters.minPrice,
        maxPrice: filters.maxPrice,

        propertyTypes: filters.propertyTypes.map(
            (item) => item.id,
        ),

        conditions: filters.conditions.map(
            (item) => item.id,
        ),

        propertyFor: filters.propertyFor.map(
            (item) => item.id,
        ),

        neighbourhoods: filters.neighbourhoods.map(
            (item) => item.id,
        ),

        minBedrooms: filters.minBedrooms,
        maxBedrooms: filters.maxBedrooms,

        minBathrooms: filters.minBathrooms,
        maxBathrooms: filters.maxBathrooms,

        minSuites: filters.minSuites,
        maxSuites: filters.maxSuites,

        minGarages: filters.minGarages,
        maxGarages: filters.maxGarages,

        minPools: filters.minPools,
        maxPools: filters.maxPools,

        minFloors: filters.minFloors,
        maxFloors: filters.maxFloors,

        minArea: filters.minArea,
        maxArea: filters.maxArea,

        minYear: filters.minYear,
        maxYear: filters.maxYear,
    };
}
