declare namespace App.Data {
    export type CityData = {
        id: number | null;
        nome: string;
        province: App.Data.ProvinceData;
    };
    export type ProvinceData = {
        id: number | null;
        name: string;
    };
    export type TermoData = {
        termos: string;
    };
}
