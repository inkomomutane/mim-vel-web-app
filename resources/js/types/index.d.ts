import { AgendaData } from "./generated.d";

export interface PaginatedData {
    data: Array;
    links: Array;
    meta: {
        current_page?: number;
        first_page_url?: String;
        from?: Number;
        last_page?: number;
        last_page_url?: String;
        next_page_url?: String;
        path?: String;
        per_page?: Number;
        prev_page_url?: String;
        to?: Number;
        total?: Number;
    };
}

export enum FlahserType {
    success = "success",
    error = "error",
    warning = "warning",
    info = "info",
}

export enum OrderDataBy {
    asc = "asc",
    desc = "desc",
}

export interface RoomHotel {
    id: string;
    price: number;
    images: Array<File>;
}

export interface Provinces extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.ProvinceData>;
}

export interface Cities extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.CityData>;
}

export interface Bairros extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.BairroData>;
}

export interface Mails extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.AgendaData>;
}

export interface RegrasDeNegocioData extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.RegraDeNegocioData>;
}

export interface Statuses extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.StatusData>;
}

export interface Condicaos extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.CondicaoData>;
}

export interface Banners extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.MediaData>;
}

export interface TransactionTypes extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.TransactionTypeData>;
}

export interface Users extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.UserData>;
}

export interface ImovelTypes extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.ImovelTypeData>;
}
export interface Intermediations extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.IntermediationRuleData>;
}

export interface Imovels extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.ImovelData>;
}
export interface ImovelImages extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.MediaData>;
}

export interface Hotels extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.HotelMetaDataDtoData>;
}
export interface Attributes extends Omit<PaginatedData, "data"> {
    data: Array<App.Data.AttributeData>;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: App.Data.UserData;
    };
    site: {
        type: String;
    };
    mails: {
        type: Number;
    };
    trash: {
        type: Number;
    };
    notAprrovedImovels: {
        type: Number;
    };
    globals: App.Data.PageData;
    roles: {
        type: Array<App.Data.RoleData>;
    };
};
