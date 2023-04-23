<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const addStatus = ref(false);
const nomeInput = ref();
const addStatusTrigger = () => {
    addStatus.value = true;
};

const closeCreateStatusModal = () => {
    addStatus.value = false;
};

const form = useForm({
    nome: "",
});

const createStatus = () => {
    form.post(route("status.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            closeCreateStatusModal();
        },
        onError: () => nomeInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
</script>
<template>
    <button
        type="button"
        @click="addStatusTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            width="20"
            height="20"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
        >
            <circle cx="6" cy="6.5" r="2.4" fill="currentColor" />
            <circle cx="3.6" cy="13.4" r="2.2" fill="currentColor" />
            <circle
                cx="7.4"
                cy="19.7"
                r="1.9"
                opacity=".35"
                fill="currentColor"
            />
            <circle
                cx="14.7"
                cy="20.6"
                r="1.7"
                opacity=".35"
                fill="currentColor"
            />
            <circle
                cx="19.9"
                cy="15.4"
                r="1.5"
                opacity=".35"
                fill="currentColor"
            />
            <circle cx="19.2" cy="8.1" r="2.9" fill="currentColor" />
            <circle cx="13" cy="4.1" r="2.7" fill="currentColor" />
        </svg>
        <span class="mx-4">Novo status</span>
    </button>

    <Modal :show="addStatus" @close="closeCreateStatusModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeCreateStatusModal"
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
            <div class="px-6 py-6 lg:px-8">
                <h3
                    class="mb-4 text-xl font-medium text-gray-900 dark:text-white"
                >
                    Novo status
                </h3>
                <form class="space-y-6" @submit.prevent="createStatus">
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
                            ref="nameInput"
                            id="nome"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nome do status"
                        />
                        <span class="text-medium text-red-500 font-semibold">{{
                            form.errors.nome
                        }}</span>
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
