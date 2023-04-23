declare namespace App.Data {
export type AgendaData = {
id: number | null;
nomeDoCliente: string | null;
mensagem: string | null;
email: string | null;
contacto: string | null;
isReaded: boolean | null;
dataHora: any;
url: string | null;
};
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
export type RegraDeNegocioData = {
id: number | null;
name: string | null;
};
export type TermAndConditionData = {
term: string;
};
}
