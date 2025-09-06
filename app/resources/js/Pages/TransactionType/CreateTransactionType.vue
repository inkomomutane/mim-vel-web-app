<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const addTransactionType = ref(false);
const nameInput = ref();
const slugTextInput = ref();
const addTransactionTypeTrigger = () => {
    addTransactionType.value = true;
};

const closeCreateTransactionTypeModal = () => {
    addTransactionType.value = false;
};

const form = useForm({
    name: "",
    slug_text: "",
});

const createTransactionType = () => {
    form.post(route("transaction.type.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            closeCreateTransactionTypeModal();
        },
        onError: () => {
            nameInput.value.focus();
            slugTextInput.value.focus();
        },
    });
};
</script>
<template>
    <button
        type="button"
        @click="addTransactionTypeTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            width="20"
            height="20"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
        >
            <path
                d="M22,7.652c0,0.308-0.372,0.463-0.591,0.247l-1.557-1.542c-0.198-0.196-0.198-0.517,0-0.713l1.557-1.542C21.628,3.884,22,4.039,22,4.348V7.652z"
                fill="currentColor"
            />
            <path
                d="M2,16.348c0-0.308,0.372-0.463,0.591-0.247l1.557,1.542c0.198,0.196,0.198,0.517,0,0.713l-1.557,1.542C2.372,20.116,2,19.961,2,19.652V16.348z"
                fill="currentColor"
            />
            <path
                d="M15,13H4c-1.105,0-2-0.895-2-2V4c0-1.105,0.895-2,2-2h11c1.105,0,2,0.895,2,2v7C17,12.105,16.105,13,15,13z"
                opacity=".35"
                fill="currentColor"
            />
            <rect width="15" height="2" x="2" y="5" fill="currentColor" />
            <path
                d="M20,11H9c-1.105,0-2,0.895-2,2v1h15v-1C22,11.895,21.105,11,20,11z"
                fill="currentColor"
            />
            <path
                d="M7,20c0,1.105,0.895,2,2,2h11c1.105,0,2-0.895,2-2v-4H7V20z"
                fill="currentColor"
            />
            <rect
                width="15"
                height="2"
                x="7"
                y="14"
                opacity=".35"
                fill="currentColor"
            />
        </svg>
        <span class="mx-4">Novo tipo de transação</span>
    </button>

    <Modal :show="addTransactionType" @close="closeCreateTransactionTypeModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeCreateTransactionTypeModal"
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
                    Novo tipo de transação
                </h3>
                <form class="space-y-6" @submit.prevent="createTransactionType">
                    <div>
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Nome</label
                        >
                        <input
                            type="text"
                            name="name"
                            v-model="form.name"
                            ref="nameInput"
                            id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nome do tipo de transação"
                        />
                        <span class="text-medium text-red-500 font-semibold">{{
                            form.errors.name
                        }}</span>
                    </div>
                    <div class="mt-4">
                        <label
                            for="slug_text"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Prefixo nos imóveis</label
                        >
                        <input
                            type="text"
                            name="slug_text"
                            v-model="form.slug_text"
                            ref="slugTextInput"
                            id="slug_text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Prefixo nos imóveis"
                        />
                        <span class="text-medium text-red-500 font-semibold">{{
                            form.errors.slug_text
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
