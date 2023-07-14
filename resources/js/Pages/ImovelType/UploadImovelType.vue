<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref, PropType, watch } from "vue";
import UploadImage from "@/Components/UploadImage.vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const uploadImovelTypes = ref(false);
const nomeInput = ref();
const uploadImovelTypesProgress = ref(false);
const form = useForm({
    images: [],
    nome: "",
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
    form.post(route("imovel_type.store"), {
        forceFormData: true,
        onProgress: () => (uploadImovelTypesProgress.value = true),
        onSuccess: () => {
            closeUloadImovelTypesModal();
            form.reset();
        },
        onError: () => (uploadImovelTypesProgress.value = false),
    });
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

    <Modal :show="uploadImovelTypes" @close="closeUloadImovelTypesModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeUloadImovelTypesModal"
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
                            :uploader="uploadImges"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            mediaType="image/*"
                            :progressUploadImage="uploadImovelTypesProgress"
                        />

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
