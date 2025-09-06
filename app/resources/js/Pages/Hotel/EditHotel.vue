<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { vMaska } from "maska";
import Dropdown from "primevue/dropdown";
import { ulid } from "ulid";
import {
    Dialog,
    DialogContent,
    DialogClose,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/Components/ui/dialog";

import { watch } from "vue";

import { ref } from "vue";
import UploadImage from "@/Components/UploadImage.vue";
import { onMounted } from "vue";
import { PropType } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import collect from "collect.js";
import { RoomHotel } from "@/types";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import DeleteImage from "@/Pages/Image/DeleteImage.vue";

const props = defineProps({
    provinces: Array<App.Data.MultilevelProvinceData>,
    imovelsTypes: Array<App.Data.ImovelTypeData>,
    imovelConditions: Array<App.Data.CondicaoData>,
    attributes: {
        type: Array<App.Data.AttributeData>,
        required: true,
    },
    statuses: Array<App.Data.StatusData>,
    messages: Object as PropType<FlasherResponse>,
    hotel: {
        type: Object as PropType<App.Data.HotelMetaDataDtoData>,
        required: true
    },

});
const hotelRefs = ref(props.hotel);
const provinces = ref(props.provinces);
const province = ref<App.Data.MultilevelProvinceData | null>(
    provinces.value?.findLast(
        (prov) =>
            prov.id == hotelRefs.value?.bairroData?.city?.province?.id ?? -1
    ) ?? null
);
const cities = ref<Array<App.Data.CityData> | null>(
    province.value?.cidades ?? null
);
const city = ref<App.Data.CityData | null>(
    cities.value?.findLast(
        (cty) => cty.id == hotelRefs.value?.bairroData?.city?.id ?? -1
    ) ?? null
);
const bairros = ref<Array<App.Data.BairroData> | null>(
    city.value?.bairros ?? null
);
const bairro = ref<App.Data.BairroData | null>(
    bairros.value?.findLast(
        (bairro) => bairro.id == hotelRefs.value?.bairroData?.id ?? -1
    ) ?? null
);
const roomPictures = ref<Array<File>>([]);


const form = useForm({
    title: props.hotel?.title ?? "",
    bairro_id: props.hotel?.bairroData.id,
    address: props.hotel?.address,
    description: props.hotel?.description,
    condicao_id: props.hotel?.condicaoData.id,
    tipo_de_imovel_id: props.hotel?.imovelTypeData.id,
    status_id: props.hotel?.statusData.id,
    images: <any>[],
    attributes: props.hotel?.attributes?.map((attr) => attr.id) ?? [],
});



watch(
    () => roomPictures,
    () => {
        form.images = roomPictures.value;
    },
    {
        deep: true,
        immediate: true,
    }
);

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

watch(
    () => props.messages,
    (event) => {
        event?.envelopes.forEach((element) => {
            Flasher.flash(
                element.notification.type,
                element.notification.message
            );
        });
    },
    {
        deep: true,
    }
);

const updateHotel = () =>
    form.post(
        route("hotel.update", {
            hotel: props.hotel?.slug ?? "",
        }),
        {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
            },
        }
    );



const deleteImageTrigger = ref(false);
const imageToDelete = ref<App.Data.MediaData | null>(null);
const openDeleteImageModal = (image : App.Data.MediaData) => {
    deleteImageTrigger.value = true;
    imageToDelete.value = image;

};
const closeDeleteImageModal = () => {
    deleteImageTrigger.value = false;
    imageToDelete.value = null;
};

</script>

<template>
    <Head title="Criar novo Quarto" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div
                class="flex flex-col md:flex-row items-end justify-end space-b-3 md:space-y-0 md:space-x-4 p-4"
            >
                <button
                    @click="updateHotel()"
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

                    <span class="mx-4">Actualizar informação Hotel</span>
                </button>
            </div>
            <form  @submit.prevent
                class="p-8 bg-white rounded overflow-auto dark:bg-slate-700 dark:text-slate-50"
            >
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div>
                        <label
                            for="titulo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Título do Hotel</label
                        >
                        <input
                            type="text"
                            name="titulo"
                            v-model="form.title"
                            id="titulo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Título do Quarto"
                        />
                        <InputError :message="form.errors.title" />
                    </div>
                    <div>
                        <label
                            for="endereco"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Endereço</label
                        >
                        <input
                            type="text"
                            name="endereco"
                            v-model="form.address"
                            id="endereco"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Endereço"
                        />
                        <InputError :message="form.errors.address" />
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
                                        bairro == slotProps.option
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
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-2 py-2">
                    <div>
                        <label
                            for="descricao"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Descrição</label
                        >
                        <ckeditor
                            :editor="ClassicEditor"
                            v-model="form.description"
                            :config="{}"
                        ></ckeditor>
                        <InputError :message="form.errors.description ?? ''" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 gap-2 py-2">
                    <div>
                        <label
                            for="attributes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Attributos</label
                        >
                        <div class="flex flex-wrap gap-2">
                            <div v-for="(attribute,index) in props.attributes" class="flex items-center space-x-2">
                                <input
                                    type="checkbox"
                                    :id="attribute.id ?? `${index}`"
                                    :value="attribute.id"
                                    v-model="form.attributes"
                                    class="rounded border-gray-300 text-slate-500 shadow-sm focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50"
                                />
                                <label
                                    :for="attribute.id ?? `${index}` "
                                    class="text-sm font-medium text-gray-900 dark:text-white flex items-center space-x-2 gap-x-2"
                                >
                                    <ResponsiveImage class-name="w-8 h-8 rounded" :responsive="attribute.image" />
                                    {{ attribute.name }}
                                </label
                                >
                            </div>
                        </div>
                        <InputError :message="form.errors.attributes ?? ''" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 py-2">
                    <div>
                        <label
                            for="tipo_de_hotel_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Tipo de hotel</label
                        >
                        <Dropdown
                            v-model="form.tipo_de_imovel_id"
                            :options="imovelsTypes"
                            optionValue="id"
                            optionLabel="name"
                            placeholder="Tipo de Quarto"
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
                            >Condição do Quarto</label
                        >
                        <Dropdown
                            v-model="form.condicao_id"
                            :options="imovelConditions ?? []"
                            optionValue="id"
                            optionLabel="nome"
                            placeholder="Condição do Quarto"
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
                            >Estado do Quarto</label
                        >
                        <Dropdown
                            v-model="form.status_id"
                            :options="statuses ?? []"
                            optionValue="id"
                            optionLabel="nome"
                            placeholder="Estado do Quarto"
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
                <div class="grid gap-2 py-2">
                    <UploadImage
                            @update:images="
                                (files:any) => (roomPictures = files)
                            "
                            :multiple="true"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Fotos do hotel"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files> </template>
                        </UploadImage>
                </div>
                <div>
                        <ul class="max-h-96 overflow-y-auto">
                            <li
                                v-for="image in (props.hotel.media)"
                                class="rounded border border-dashed border-green-700 bg-green-100 dark:bg-green-950 flex flex-wrap p-0 mb-4 gap-0 w-full"
                            >
                            <div   class="flex items-center space-x-4 w-full">
                                    <div class="flex-shrink-0">
                                        <ResponsiveImage
                                            :responsive="image"
                                            class-name="w-[100px] shadow-2 h-16 object-cover"
                                        />
                                    </div>
                                    <div class="flex-1 hidden sm:block sm:w-64">
                                        <p
                                            class="text-sm font-medium text-justify text-gray-900 truncate dark:text-white"
                                        >
                                            {{ image.name }}
                                        </p>
                                    </div>
                                    <div class="flex-1 min-w-fit">
                                        <p
                                            class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                        >
                                            {{ image.size }} KB
                                        </p>
                                    </div>
                                    <div class="flex-1 min-w-0"></div>

                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                    >
                                        <div role="status">
                                            <svg
                                                class="w-6 h-6 mr-2 text-gray-200 dark:text-green-50 fill-green-500"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M0 0h24v24H0V0z"
                                                    fill="none"
                                                ></path>
                                                <path
                                                    d="M17.3 6.3c-.39-.39-1.02-.39-1.41 0l-5.64 5.64 1.41 1.41L17.3 7.7c.38-.38.38-1.02 0-1.4zm4.24-.01l-9.88 9.88-3.48-3.47c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l4.18 4.18c.39.39 1.02.39 1.41 0L22.95 7.71c.39-.39.39-1.02 0-1.41h-.01c-.38-.4-1.01-.4-1.4-.01zM1.12 14.12L5.3 18.3c.39.39 1.02.39 1.41 0l.7-.7-4.88-4.9c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.03 0 1.42z"
                                                ></path>
                                            </svg>
                                            <span class="sr-only">Done</span>
                                        </div>
                                    </div>
                                    <button  @click="openDeleteImageModal(image)" class="px-4">
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5 text-gray-500 hover:text-red-500"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
            </form>
            <DeleteImage v-if="imageToDelete" :open-modal="deleteImageTrigger" :close="closeDeleteImageModal" :image="imageToDelete" />

        </template>
    </AuthenticatedLayout>
</template>
