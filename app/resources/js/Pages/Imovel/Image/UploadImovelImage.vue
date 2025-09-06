<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import UploadImage from "@/Components/UploadImage.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    imovel: {
        type: String,
        required: true,
    },
});

const uploadImovelImages = ref(false);
const uploadImovelImagesProgress = ref(false);
const form = useForm({ images: [] });

const uploadImovelImagesTrigger = () => {
    uploadImovelImages.value = true;
};

const closeUloadImovelImagesModal = () => {
    uploadImovelImages.value = false;
    uploadImovelImagesProgress.value = false;
    form.reset();
};

const uploadImges = () =>
    form.post(
        route("imovel.image.store", {
            imovel: props.imovel,
        }),
        {
            forceFormData: true,
            onProgress: () => (uploadImovelImagesProgress.value = true),
            onSuccess: () => {
                closeUloadImovelImagesModal();
                form.reset();
            },
        }
    );

const backLink = () => window.history.back();
</script>
<template>
    <div
        class="flex flex-col md:flex-row items-end justify-between space-b-3 md:space-y-0 md:space-x-4 p-4"
    >
        <button
            type="button"
            @click="uploadImovelImagesTrigger"
            class="w-fit flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
        >
            <svg
                width="20"
                height="20"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
            >
                <path
                    d="M16,19H6c-1.657,0-3-1.343-3-3V6c0-1.657,1.343-3,3-3h10c1.657,0,3,1.343,3,3v10C19,17.657,17.657,19,16,19z"
                    opacity=".35"
                    fill="currentColor"
                />
                <path
                    d="M18.86,5.14C18.942,5.414,19,5.699,19,6v10c0,1.657-1.343,3-3,3H6c-0.301,0-0.586-0.058-0.86-0.14C5.512,20.095,6.644,21,8,21h10c1.657,0,3-1.343,3-3V8C21,6.644,20.095,5.512,18.86,5.14z"
                    fill="currentColor"
                />
                <circle cx="13.5" cy="8.5" r="1.5" fill="currentColor" />
                <path
                    d="M6,15.375C6,15.717,6.28,16,6.625,16h8.75C15.72,16,16,15.722,16,15.375C16,14.523,15.528,12,14.5,12c-0.507,0-1.295,1-2,1c-1.4,0-2.75-3-4-3S6,13.726,6,15.375z"
                    fill="currentColor"
                />
            </svg>

            <span class="mx-4">Carregar Imagens do imovel</span>
        </button>
        <button
            @click="backLink"
            class="w-fit self-end flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
        >
            <svg
                width="20"
                height="20"
                viewBox="0 0 48 48"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <rect
                    width="48"
                    height="48"
                    fill="white"
                    fill-opacity="0.01"
                ></rect>
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M44 40.8361C39.1069 34.8632 34.7617 31.4739 30.9644 30.6682C27.1671 29.8625 23.5517 29.7408 20.1182 30.303V41L4 23.5453L20.1182 7V17.167C26.4667 17.2172 31.8638 19.4948 36.3095 24C40.7553 28.5052 43.3187 34.1172 44 40.8361Z"
                    fill="currentColor"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linejoin="round"
                ></path>
            </svg>
            <span class="mx-4">Voltar</span>
        </button>
    </div>

    <Modal :show="uploadImovelImages" @close="closeUloadImovelImagesModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeUloadImovelImagesModal"
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
                <UploadImage
                    @update:images="(files : any) => form.images = files"
                    :uploader="uploadImges"
                    :multiple="true"
                    :disabledUpload="false"
                    :disabledCancel="false"
                    mediaType="image/*"
                    :progressUploadImage="uploadImovelImagesProgress"
                />
            </div>
        </div>
    </Modal>
</template>
