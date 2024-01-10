<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref, PropType, watch } from "vue";
import UploadImage from "@/Components/UploadImage.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    attribute: {
        type: Object as PropType<App.Data.AttributeData>,
        required: true,
    },
});

const uploadAttributes = ref(false);
const uploadAttributesProgress = ref(false);
const form = useForm({ image: [] });

const uploadAttributesTrigger = () => {
    uploadAttributes.value = true;
};

const closeUloadAttributesModal = () => {
    uploadAttributes.value = false;
    uploadAttributesProgress.value = false;
    form.reset();
};

const uploadImges = () =>
    form.post(
        route("attribute.image.upload", {
            attribute: props.attribute.id as number,
        }),
        {
            forceFormData: true,
            onProgress: () => (uploadAttributesProgress.value = true),
            onSuccess: () => {
                closeUloadAttributesModal();
                form.reset();
            },
        }
    );
</script>
<template>
    <button
        type="button"
        @click="uploadAttributesTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            width="20"
            height="20"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            aria-hidden="true"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M21.68 16.96l-3.13-7.31c-1.06-2.48-3.01-2.58-4.32-.22l-1.89 3.41c-.96 1.73-2.75 1.88-3.99.33l-.22-.28c-1.29-1.62-3.11-1.42-4.04.43l-1.72 3.45C1.16 19.17 2.91 22 5.59 22h12.76c2.6 0 4.35-2.65 3.33-5.04z"
            ></path>
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M6.97 8a3 3 0 100-6 3 3 0 000 6z"
                opacity=".4"
            ></path>
        </svg>

        <span class="mx-4">Carregar imagem do attributo</span>
    </button>

    <Modal :show="uploadAttributes" @close="closeUloadAttributesModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeUloadAttributesModal"
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
                    @update:images="(files : any) => form.image = files"
                    :uploader="uploadImges"
                    :multiple="true"
                    :disabledUpload="false"
                    :disabledCancel="false"
                    mediaType="image/*"
                    :progressUploadImage="uploadAttributesProgress"
                />
            </div>
        </div>
    </Modal>
</template>
