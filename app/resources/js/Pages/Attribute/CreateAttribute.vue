<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import UploadImage from "@/Components/UploadImage.vue";
import InputError from "@/Components/InputError.vue";

const addAttribute = ref(false);
const nomeInput = ref();
const addAttributeTrigger = () => {
    addAttribute.value = true;
};

const closeCreateAttributeModal = () => {
    addAttribute.value = false;
};

const form = useForm({
    name: "",
    description: "",
    image: null,
});

const createAttribute = () => {
    form.post(route("attribute.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            closeCreateAttributeModal();
        },
        onError: () => nomeInput.value.focus(),
    });
};
</script>
<template>
    <button
        type="button"
        @click="addAttributeTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            width="24"
            height="24"
            stroke-width="1.5"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                class="fill-current text-gray-100"
                d="M7 9.01L7.01 8.99889"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                class="fill-current text-gray-100"
                d="M11 9.01L11.01 8.99889"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                class="fill-current text-gray-100"
                d="M7 13.01L7.01 12.9989"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                class="fill-current text-gray-100"
                d="M11 13.01L11.01 12.9989"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                class="fill-current text-gray-100"
                d="M7 17.01L7.01 16.9989"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                class="fill-current text-gray-100"
                d="M11 17.01L11.01 16.9989"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                d="M15 21H3.6C3.26863 21 3 20.7314 3 20.4V5.6C3 5.26863 3.26863 5 3.6 5H9V3.6C9 3.26863 9.26863 3 9.6 3H14.4C14.7314 3 15 3.26863 15 3.6V9M15 21H20.4C20.7314 21 21 20.7314 21 20.4V9.6C21 9.26863 20.7314 9 20.4 9H15M15 21V17M15 9V13M15 13H17M15 13V17M15 17H17"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
        </svg>

        <span class="mx-4">Novo attributo</span>
    </button>

    <Modal :show="addAttribute" @close="closeCreateAttributeModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeCreateAttributeModal"
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
                    Novo attributo
                </h3>
                <form
                    class="grid md:grid-cols-2 gap-2"
                    @submit.prevent="createAttribute"
                >
                    <div>
                        <label
                            for="nome"
                            class="block text-sm font-medium text-gray-900 dark:text-white"
                            >Nome</label
                        >
                        <input
                            type="text"
                            name="nome"
                            v-model="form.name"
                            ref="nameInput"
                            id="nome"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nome do attributo"
                        />
                        <span class="text-sm text-red-500 font-medium">{{
                            form.errors.name
                        }}</span>
                    </div>

                    <div>
                        <label
                            for="description"
                            class="block text-sm font-medium text-gray-900 dark:text-white"
                            >Descrição</label
                        >
                        <input
                            type="text"
                            name="description"
                            v-model="form.description"
                            ref="descriptionInput"
                            id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Descrição do attributo"
                        />
                        <span class="text-sm text-red-500 font-normal">{{
                            form.errors.description
                        }}</span>
                    </div>
                    <div class="col-span-2">
                        <label
                            for="images"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Imagem do attributo</label
                        >
                        <UploadImage
                            @update:images="
                                (files:any) => (form.image = files)
                            "
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Imagem do attributo"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files></template>
                        </UploadImage>
                        <InputError :message="form.errors.image ?? ''" />
                    </div>

                    <button
                        type="submit"
                        class="w-full text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                    >
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </Modal>
</template>
