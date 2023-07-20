<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { vMaska } from "maska";
import Dropdown from "primevue/dropdown";

import { watch } from "vue";

import { ref } from "vue";
import UploadImage from "@/Components/UploadImage.vue";
import { onMounted } from "vue";
import { PropType } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

const props = defineProps({
    regrasDeNegocio: Array<App.Data.RegraDeNegocioData>,
    transactionTypes: Array<App.Data.TransactionTypeData>,
    provinces: Array<App.Data.MultilevelProvinceData>,
    imovelsTypes: Array<App.Data.ImovelTypeData>,
    imovelConditions: Array<App.Data.CondicaoData>,
    intermediationRules: Array<App.Data.IntermediationRuleData>,
    statuses: Array<App.Data.StatusData>,
    messages: Object as PropType<FlasherResponse>,
});

const regrasDeNegocio = ref(props.regrasDeNegocio);
const transactionTypes = ref(props.transactionTypes);

const provinces = ref(props.provinces);
const province = ref<App.Data.MultilevelProvinceData | null>(null);

const cities = ref<Array<App.Data.CityData> | null>(null);
const city = ref<App.Data.CityData | null>(null);
const bairros = ref<Array<App.Data.BairroData> | null>(null);

const form = useForm({
    titulo: "",
    preco: null,
    regra_de_negocio_id: null,
    imovel_for_id: null,
    bairro_id: null,
    endereco: "",
    descricao: "",
    details: "",
    condicao_id: null,
    tipo_de_imovel_id: null,
    intermediation_rule_id: null,
    status_id: null,
    ano: null,
    andares: null,
    banheiros: null,
    area: null,
    quartos: null,
    suites: null,
    garagens: null,
    piscinas: null,
    mapa: "",
    images: [],
});

watch(
    () => province.value,
    (e) => {
        province.value =
            provinces.value?.findLast((prov) => prov.id == e?.id ?? -1) ?? null;
        cities.value = province.value?.cidades ?? null;
        bairros.value = null;
        form.bairro_id = null;
    }
);

watch(
    () => city.value,
    (e) => {
        city.value =
            cities.value?.findLast((cty) => cty.id == e?.id ?? -1) ?? null;
        bairros.value = city.value?.bairros ?? null;
        form.bairro_id = null;
    }
);

onMounted(() => {
    props.messages?.envelopes.forEach((element) => {
        Flasher.flash(element.notification.type, element.notification.message);
    });
});
const storeImovel = () =>
    form.post(route("imovel.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
</script>

<template>
    <Head title="Criar novo imóvel" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div
                class="flex flex-col md:flex-row items-end justify-end space-b-3 md:space-y-0 md:space-x-4 p-4"
            >
                <button
                    @click="storeImovel()"
                    type="button"
                    class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M8.246 14.713a27.792 27.792 0 0 1-1.505-.953c-.501-.34-.983-.707-1.444-1.1-.458-.395-.888-.82-1.288-1.274-.4-.455-.753-.95-1.05-1.478a7.8 7.8 0 0 1-.7-1.69A7.041 7.041 0 0 1 2 6.3V3.1l.5-.5c.333 0 .656-.011.97-.036.296-.023.591-.066.882-.128.284-.062.562-.148.832-.256.284-.118.557-.261.816-.427a4.83 4.83 0 0 1 1.184-.565 4.8 4.8 0 0 1 2-.142 4.018 4.018 0 0 1 1.237.383c.199.097.392.204.58.322.26.167.535.31.821.428.27.109.547.194.831.256.291.062.587.106.884.129.311.024.634.035.967.035l.5.5v3.2a7.043 7.043 0 0 1-.256 1.919 7.804 7.804 0 0 1-.7 1.69 8.751 8.751 0 0 1-1.05 1.478c-.4.452-.829.877-1.286 1.27a15.94 15.94 0 0 1-1.448 1.1 28.71 28.71 0 0 1-1.51.956h-.508zM3 3.59V6.3c-.004.555.07 1.11.22 1.645a6.7 6.7 0 0 0 .61 1.473c.263.467.575.905.93 1.308.37.417.766.81 1.188 1.174.432.368.883.712 1.352 1.03.4.267.8.523 1.2.769.4-.242.8-.498 1.2-.768.47-.319.923-.663 1.355-1.031.421-.364.817-.756 1.186-1.172a7.8 7.8 0 0 0 .93-1.308c.261-.465.466-.96.61-1.473.15-.537.223-1.09.22-1.647V3.59c-.159 0-.313-.012-.465-.023l-.079-.006a7.95 7.95 0 0 1-1.018-.147 6.112 6.112 0 0 1-1.976-.814 5.166 5.166 0 0 0-.482-.27 3.123 3.123 0 0 0-.943-.29 3.686 3.686 0 0 0-1.558.106c-.332.108-.649.26-.94.452-.312.2-.64.372-.983.513a6.4 6.4 0 0 1-1 .307c-.335.07-.675.12-1.017.146-.174.01-.355.02-.54.026zm6.065 4.3a1.5 1.5 0 1 0-1.13 0L7.5 10.5h2l-.435-2.61z"
                        ></path>
                    </svg>

                    <span class="mx-4">Salvar imóvel</span>
                </button>
            </div>
            <div
                class="p-8 bg-white rounded overflow-auto dark:bg-slate-700 dark:text-slate-50"
            >
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div>
                        <label
                            for="titulo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Títuto do imóvel</label
                        >
                        <input
                            type="text"
                            name="titulo"
                            v-model="form.titulo"
                            id="titulo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Título do imóvel"
                        />
                        <InputError :message="form.errors.titulo" />
                    </div>
                    <div>
                        <label
                            for="Preço"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Preço do imóvel</label
                        >
                        <input
                            v-maska
                            data-maska="000000000000000000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="preco"
                            v-model="form.preco"
                            id="preco"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Preço do imóvel"
                        />
                        <InputError :message="form.errors.preco" />
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 py-2">
                    <div>
                        <label
                            for="regra_de_negocio_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Regra de negociação</label
                        >
                        <Dropdown
                            v-model="form.regra_de_negocio_id"
                            optionValue="id"
                            :options="regrasDeNegocio"
                            optionLabel="name"
                            placeholder="Regra de negociação"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        form.regra_de_negocio_id ==
                                        slotProps.option.id
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.name }}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <InputError
                            :message="form.errors.regra_de_negocio_id"
                        />
                    </div>
                    <div>
                        <label
                            for="intermediation_rule_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Regra de intermediação</label
                        >
                        <Dropdown
                            v-model="form.intermediation_rule_id"
                            optionValue="id"
                            :options="intermediationRules"
                            optionLabel="name"
                            placeholder="Regra de intermediação"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        form.intermediation_rule_id ==
                                        slotProps.option.id
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.name }}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <InputError
                            :message="form.errors.intermediation_rule_id"
                        />
                    </div>
                    <div>
                        <label
                            for="imovel_for_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Imovel para</label
                        >
                        <Dropdown
                            v-model="form.imovel_for_id"
                            optionValue="id"
                            :options="transactionTypes"
                            optionLabel="name"
                            placeholder="Imóvel para:"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        form.imovel_for_id ==
                                        slotProps.option.id
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.name }}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <InputError :message="form.errors.imovel_for_id" />
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 py-2">
                    <div>
                        <label
                            for="province_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Província</label
                        >
                        <Dropdown
                            v-model="province"
                            :options="provinces"
                            optionLabel="name"
                            placeholder="Província"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        province == slotProps.option
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.name }}</div>
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                    <div>
                        <label
                            for="province_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Cidade</label
                        >
                        <Dropdown
                            v-model="city"
                            :options="cities ?? []"
                            optionLabel="nome"
                            placeholder="Cidade"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        city == slotProps.option
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.nome }}</div>
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                    <div>
                        <label
                            for="bairro_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Bairro</label
                        >
                        <Dropdown
                            v-model="form.bairro_id"
                            :options="bairros ?? []"
                            optionValue="id"
                            optionLabel="nome"
                            placeholder="Bairro"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        city == slotProps.option
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.nome }}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <InputError :message="form.errors.bairro_id ?? ''" />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-2">
                    <div>
                        <label
                            for="endereco"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Endereço</label
                        >
                        <input
                            type="text"
                            name="endereco"
                            v-model="form.endereco"
                            id="endereco"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Endereço"
                        />
                        <InputError :message="form.errors.endereco" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 gap-2 py-2">
                    <div>
                        <label
                            for="descricao"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Descrição</label
                        >
                        <ckeditor
                            :editor="ClassicEditor"
                            v-model="form.descricao"
                            :config="{}"
                        ></ckeditor>
                        <InputError :message="form.errors.descricao ?? ''" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 gap-2 py-2">
                    <div>
                        <label
                            for="Mapa"
                            class="block mb-2 text-sm font-medium bg-orange-300 text-gray-900 dark:text-white"
                            >Link do mapa google (Só para o corretor do imóvel)</label
                        >
                        <textarea
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            v-model="form.mapa"
                        ></textarea>
                        <InputError :message="form.errors.mapa ?? ''" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 gap-2 py-2">
                    <div>
                        <label
                            for="descricao"
                            class="block mb-2 text-sm font-medium bg-orange-300 text-gray-900 dark:text-white"
                            >Detalhes do imovel (Só para o corretor do imóvel)
                        </label>
                        <ckeditor
                            :editor="ClassicEditor"
                            v-model="form.details"
                            :config="{}"
                        ></ckeditor>
                        <InputError :message="form.errors.details ?? ''" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 py-2">
                    <div>
                        <label
                            for="tipo_de_imovel_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Tipo de imovel</label
                        >
                        <Dropdown
                            v-model="form.tipo_de_imovel_id"
                            :options="imovelsTypes"
                            optionValue="id"
                            optionLabel="name"
                            placeholder="Tipo de imóvel"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        form.tipo_de_imovel_id ==
                                        slotProps.option.id
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.name }}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <InputError
                            :message="form.errors.tipo_de_imovel_id ?? ''"
                        />
                    </div>
                    <div>
                        <label
                            for="condicao_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Condição do imóvel</label
                        >
                        <Dropdown
                            v-model="form.condicao_id"
                            :options="imovelConditions ?? []"
                            optionValue="id"
                            optionLabel="nome"
                            placeholder="Condição do imóvel"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        form.condicao_id == slotProps.option.id
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.nome }}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <InputError :message="form.errors.condicao_id ?? ''" />
                    </div>
                    <div>
                        <label
                            for="status_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Estado do imóvel</label
                        >
                        <Dropdown
                            v-model="form.status_id"
                            :options="statuses ?? []"
                            optionValue="id"
                            optionLabel="nome"
                            placeholder="Estado do imóvel"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        >
                            <template #option="slotProps">
                                <div
                                    class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                    :class="
                                        form.status_id == slotProps.option.id
                                            ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                            : ''
                                    "
                                >
                                    <div>{{ slotProps.option.nome }}</div>
                                </div>
                            </template>
                        </Dropdown>
                        <InputError :message="form.errors.status_id ?? ''" />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-2 py-2">
                    <div>
                        <label
                            for="images"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Fotos do imóvel</label
                        >
                        <UploadImage
                            @update:images="
                                (files:any) => (form.images = files)
                            "
                            :multiple="true"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Fotos do imóvel"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files></template>
                        </UploadImage>
                        <InputError :message="form.errors.images ?? ''" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 py-2">
                    <div>
                        <label
                            for="Ano de construção"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Ano de construção</label
                        >
                        <input
                            v-maska
                            data-maska="0000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="ano"
                            v-model="form.ano"
                            id="ano"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Ano de construção"
                        />
                        <InputError :message="form.errors.ano" />
                    </div>

                    <div>
                        <label
                            for="Àreia"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Àreia <small class="order-1">(m2)</small></label
                        >
                        <input
                            v-maska
                            data-maska="00000000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="area"
                            v-model="form.area"
                            id="area"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Àreia"
                        />
                        <InputError :message="form.errors.area" />
                    </div>

                    <div>
                        <label
                            for="Quartos"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Quartos</label
                        >
                        <input
                            v-maska
                            data-maska="000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="quartos"
                            v-model="form.quartos"
                            id="quartos"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Quartos"
                        />
                        <InputError :message="form.errors.quartos" />
                    </div>

                    <div>
                        <label
                            for="Suites"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Suites</label
                        >
                        <input
                            v-maska
                            data-maska="000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="quartos"
                            v-model="form.suites"
                            id="suites"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Suites"
                        />
                        <InputError :message="form.errors.suites" />
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 py-2">
                    <div>
                        <label
                            for="Banheiros"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Banheiros</label
                        >
                        <input
                            v-maska
                            data-maska="0000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="banheiros"
                            v-model="form.banheiros"
                            id="banheiros"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Banheiros"
                        />
                        <InputError :message="form.errors.banheiros" />
                    </div>

                    <div>
                        <label
                            for="piscinas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Piscinas</label
                        >
                        <input
                            v-maska
                            data-maska="00000000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="piscinas"
                            v-model="form.piscinas"
                            id="piscinas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Piscinas"
                        />
                        <InputError :message="form.errors.piscinas" />
                    </div>

                    <div>
                        <label
                            for="Garagens"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Garagens</label
                        >
                        <input
                            v-maska
                            data-maska="000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="garagens"
                            v-model="form.garagens"
                            id="garagens"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Garagens"
                        />
                        <InputError :message="form.errors.garagens" />
                    </div>

                    <div>
                        <label
                            for="Andares"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Andares</label
                        >
                        <input
                            v-maska
                            data-maska="000"
                            data-maska-tokens="0:\d:optional|9:\d:optional"
                            type="text"
                            name="andares"
                            v-model="form.andares"
                            id="andares"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Andares"
                        />
                        <InputError :message="form.errors.andares" />
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
<style>
.ck-editor__editable {
    @apply !bg-gray-50 !border !border-gray-300 !text-gray-900 !text-sm !rounded-b focus:!ring-slate-500 focus:!border-slate-500 !block !w-full !p-2.5 dark:!bg-gray-600 dark:!border-gray-500 dark:!placeholder-gray-400 dark:!text-white;
}

.ck-focused {
    @apply !shadow-none ring-1 focus:!ring-gray-800 focus-within:!ring-gray-600 focus-visible:!ring-gray-600;
}
.ck-toolbar {
    @apply dark:!text-white dark:!bg-gray-300 dark:!border-gray-500;
}
</style>
