<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref, PropType } from "vue";
import UploadImage from "@/Components/UploadImage.vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";

const props = defineProps({
    imovelType: Object as PropType<App.Data.ImovelTypeData>,
    close: {
        type: Function,
        required: true,
    },
    openModal: {
        type: Boolean,
        required: true,
    },
});

const uploadImovelTypes = ref(false);
const nomeInput = ref();
const uploadImovelTypesProgress = ref(false);
const form = useForm({
    images: [],
    nome: props.imovelType?.name,
});

const uploadImovelTypesTrigger = () => {
    uploadImovelTypes.value = true;
};

const closeUloadImovelTypesModal = () => {
    uploadImovelTypes.value = false;
    uploadImovelTypesProgress.value = false;
    form.reset();
};

const uploadImges = () =>
    form.post(
        route("imovel_type.update", {
            imovelType: props.imovelType?.id as number,
        }),
        {
            forceFormData: true,
            onProgress: () => (uploadImovelTypesProgress.value = true),
            onSuccess: () => {
                closeUloadImovelTypesModal();
                props.close();
                form.reset();
            },
            onError: () => (uploadImovelTypesProgress.value = true),
        }
    );
</script>
<template>
    <button
        type="button"
        @click="uploadImovelTypesTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
        >
            <path
                d="M18,21H6a3,3,0,0,1-3-3V8.765A3,3,0,0,1,4.542,6.143l6-3.333a3,3,0,0,1,2.914,0l6,3.333A3,3,0,0,1,21,8.765V18A3,3,0,0,1,18,21Z"
                opacity=".35"
                fill="currentColor"
            />
            <path
                d="M20.5,9.23a1.494,1.494,0,0,1-.727-.189l-6.839-3.8a1.909,1.909,0,0,0-1.864,0l-6.839,3.8A1.5,1.5,0,1,1,2.772,6.418l6.839-3.8a4.888,4.888,0,0,1,4.778,0l6.839,3.8A1.5,1.5,0,0,1,20.5,9.23Z"
                fill="currentColor"
            />
            <polygon
                points="16 21 8 21 8 15 12 13 16 15 16 21"
                fill="currentColor"
            />
            <path
                d="M16,16a1,1,0,0,1-.6-.2L12,13.25,8.6,15.8a1,1,0,0,1-1.2-1.6l4-3a1,1,0,0,1,1.2,0l4,3A1,1,0,0,1,16,16Z"
                fill="currentColor"
            />
        </svg>

        <span class="mx-4">Criar novo tipo de imóvel</span>
    </button>

    <Modal :show="props.openModal" @close="props.close">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="props.close"
            >
                <svg
                    aria-hidden="true"
                    class="w-5 h-5"
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
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8 h-full">
                <h3
                    class="mb-4 text-xl font-medium text-gray-900 dark:text-white"
                >
                    Criar novo tipo de imóvel
                </h3>
                <div class="space-y-6">
                    <div>
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Nome</label
                        >
                        <input
                            type="text"
                            name="nome"
                            v-model="form.nome"
                            ref="nomeInput"
                            id="nome"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nome do tipo de imóvel"
                        />
                        <InputError :message="form.errors.nome" />
                    </div>

                    <div>
                        <label
                            for="icon"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Icon</label
                        >

                        <UploadImage
                            @update:images="(files : any) => form.images = files"
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            mediaType="image/*"
                            :progressUploadImage="uploadImovelTypesProgress"
                        >
                            <template v-slot:files>
                                <div
                                    class="flex items-center space-x-4 w-full border-dashed border border-green-500 bg-green-100 dark:bg-green-900 mt-2 rounded-md"
                                >
                                    <div class="flex-shrink-0">
                                        <ResponsiveImage
                                            :responsive="imovelType?.icon"
                                            class-name="shadow-2 h-16 object-cover"
                                        />
                                    </div>
                                    <div class="flex-1 hidden sm:block sm:w-64">
                                        <p
                                            class="text-sm font-medium text-justify text-gray-900 truncate dark:text-white"
                                        >
                                            {{ imovelType?.name }}
                                        </p>
                                    </div>
                                    <div class="flex-1 min-w-0"></div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                    >
                                        <div role="status" class="px-4">
                                            <svg
                                                class="fillCurrent text-green-500 dark:text-green-50"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                            >
                                                <path
                                                    class="fill-green-400 dark:fill-green-50"
                                                    opacity="0.5"
                                                    d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z"
                                                />
                                                <path
                                                    class="fill-green-500 dark:fill-green-50"
                                                    d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </UploadImage>

                        <InputError :message="form.errors.images" />
                    </div>

                    <button
                        type="submit"
                        @click="uploadImges"
                        class="w-full text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                    >
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </Modal>
</template>
