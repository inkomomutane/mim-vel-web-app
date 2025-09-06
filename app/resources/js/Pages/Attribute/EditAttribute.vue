<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { useForm } from "@inertiajs/vue3";
import { PropType, ref } from "vue";
import UploadImage from "@/Components/UploadImage.vue";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";

const props = defineProps({
    attribute: {
        type: Object as PropType<App.Data.AttributeData>,
        required: true,
    },
    close: {
        type: Function,
        required: true,
    },
    openModal: {
        type: Boolean,
        required: true,
    },
});

const nameInput = ref<String | any>(props.attribute.name);

const form = useForm({
    id: props.attribute.id,
    name: props.attribute.name,
    description: props.attribute.description,
});

const updateAttribute = () => {
    form.patch(
        route("attribute.update", {
            attribute: props.attribute.id as number,
        }),
        {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                props.close();
            },
            onError: () => nameInput.value.focus(),
        }
    );
};
</script>
<template>
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
                <span class="sr-only">Fechar</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3
                    class="mb-4 text-xl font-medium text-gray-900 dark:text-white"
                >
                    Editar Attribute
                </h3>
                <form class="space-y-6" @submit.prevent="updateAttribute">
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

                    <button
                        type="button"
                        @click="updateAttribute"
                        class="w-full text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                    >
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </Modal>
</template>
