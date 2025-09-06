<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref, PropType, watch } from "vue";
import UploadImage from "@/Components/UploadImage.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    user: {
        type: Object as PropType<App.Data.UserData>,
        required: true,
    },
});

const uploadLogos = ref(false);
const uploadLogosProgress = ref(false);
const form = useForm({ logo: [] });

const uploadLogosTrigger = () => {
    uploadLogos.value = true;
};

const closeUloadLogosModal = () => {
    uploadLogos.value = false;
    uploadLogosProgress.value = false;
    form.reset();
};

const uploadImges = () => {
    if (props.user.id) {
        form.post(
            route("profile.logo.update", {
                user: props.user.id,
            }),
            {
                forceFormData: true,
                onProgress: () => (uploadLogosProgress.value = true),
                onSuccess: () => {
                    closeUloadLogosModal();
                    form.reset();
                },
            }
        );
    }
};
</script>
<template>
    <button
        type="button"
        @click="uploadLogosTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            width="20"
            height="20"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
        >
            <polygon
                points="20,21 4,15 4,9 20,3"
                opacity=".35"
                fill="currentColor"
            />
            <path
                d="M5,14.5c0-0.386,0-4.614,0-5C5,8.672,4.328,8,3.5,8S2,8.672,2,9.5c0,0.386,0,4.614,0,5C2,15.328,2.672,16,3.5,16S5,15.328,5,14.5z"
                fill="currentColor"
            />
            <path
                d="M22,20.5c0-0.386,0-16.614,0-17C22,2.672,21.328,2,20.5,2S19,2.672,19,3.5c0,0.386,0,16.614,0,17c0,0.828,0.672,1.5,1.5,1.5S22,21.328,22,20.5z"
                fill="currentColor"
            />
            <path
                d="M7.995,16.498L7.96,16.591c-0.389,1.034,0.134,2.187,1.168,2.576L11,19.871c1.034,0.389,2.187-0.134,2.576-1.168l0.037-0.099L7.995,16.498z"
                fill="currentColor"
            />
        </svg>

        <span class="mx-4">Carregar logo</span>
    </button>

    <Modal :show="uploadLogos" @close="closeUloadLogosModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeUloadLogosModal"
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
                    @update:images="(files : any) => form.logo = files"
                    :uploader="uploadImges"
                    :multiple="false"
                    :disabledUpload="false"
                    :disabledCancel="false"
                    mediaType="image/*"
                    :progressUploadImage="uploadLogosProgress"
                />
            </div>
        </div>
    </Modal>
</template>
