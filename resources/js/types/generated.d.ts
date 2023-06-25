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
        city: any | App.Data.CityData | null;
    };
    export type CityData = {
        id: number | null;
        nome: string;
        province: any | App.Data.ProvinceData | null;
        bairros: Array<App.Data.BairroData> | null;
    };
    export type CondicaoData = {
        id: number | null;
        nome: string | null;
    };
    export type ImovelData = {
        id: any | number | null;
        titulo: any | string | null;
        descricao: any | string | null;
        banheiros: any | number | null;
        preco: any | string | number | null;
        ano: any | number | null;
        andares: any | number | null;
        area: any | number | null;
        quartos: any | number | null;
        suites: any | number | null;
        garagens: any | number | null;
        piscinas: any | number | null;
        endereco: any | string | null;
        mapa: any | string | null;
        views: any | number | null;
        condicao: App.Data.CondicaoData | null;
        bairro: any | App.Data.BairroData | null;
        tipo_de_imovel: any | App.Data.ImovelTypeData | null;
        status: any | App.Data.StatusData | null;
        corretor: any | App.Data.UserData | null;
        slug: any | string | null;
        for_rent: any | boolean | null;
        regra_de_negocio: any | App.Data.RegraDeNegocioData | null;
        imovel_for: any | App.Data.TransactionTypeData | null;
        intermediation_rule: any | App.Data.IntermediationRuleData | null;
        media: App.Data.MediaData | null;
    };
    export type ImovelTypeData = {
        id: number;
        name: string;
        icon: App.Data.MediaData;
    };
    export type IntermediationRuleData = {
        id: number;
        name: string;
        code: string;
        percentage: number;
    };
    export type MediaData = {
        id: number | null;
        file_name: string | null;
        name: string | null;
        mime_type: string | null;
        original_url: string | null;
        preview_url: string | null;
        size: number | null;
        custom_properties: Array<any> | null;
        responsive_images: App.Data.ResponsiveImageData | Array<any> | null;
        srcsets: string | null;
    };
    export type MediaLibraryOriginalData = {
        base64svg: string | null;
        urls: Array<any> | null;
    };
    export type MultilevelProvinceData = {
        id: number;
        name: string;
        cidades: Array<App.Data.CityData>;
    };
    export type PageData = {
        id: number | null;
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
        homeMedia: App.Data.MediaData | null;
        imovelsMedia: App.Data.MediaData | null;
        aboutMedia: App.Data.MediaData | null;
        contactMedia: App.Data.MediaData | null;
        termsMedia: App.Data.MediaData | null;
        policyMedia: App.Data.MediaData | null;
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
    export type RoleData = {
        id: number | null;
        name: string | null;
    };
    export type StatusData = {
        id: number | null;
        nome: string | null;
    };
    export type TermAndConditionData = {
        term: string;
    };
    export type TransactionTypeData = {
        id: number | null;
        name: string;
        slug_text: string;
    };
    export type UserData = {
        id: number | null;
        name: string | null;
        email: string | null;
        contacto: string | null;
        location: string | null;
        active: boolean | null;
        role: any | App.Data.RoleData | null;
    };
}
