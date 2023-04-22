declare namespace App.Data {
export type BairroData = {
id: number | null;
nome: string;
city: App.Data.CityData;
};
export type CityData = {
id: number | null;
nome: string;
province: App.Data.ProvinceData | null;
};
export type PolicyData = {
politicas: string;
};
export type ProvinceData = {
id: number | null;
name: string;
};
export type TermAndConditionData = {
term: string;
};
}
