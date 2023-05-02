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
export type CondicaoData = {
id: number | null;
nome: string | null;
};
export type MediaData = {
id: number;
file_name: string | null;
name: string | null;
mime_type: string | null;
original_url: string | null;
preview_url: string | null;
size: number | null;
custom_properties: Array<any> | null;
responsive_images: Array<any> | null;
srcsets: string | null;
};
export type MediaLibraryOriginalData = {
base64svg: string | null;
urls: Array<any> | null;
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
export type ResponsiveImageData = {
media_library_original: App.Data.MediaLibraryOriginalData | null;
};
export type StatusData = {
id: number | null;
nome: string | null;
};
export type TermAndConditionData = {
term: string;
};
export type TransactionTypeData = {
id: number;
name: string;
slug_text: string;
};
}
