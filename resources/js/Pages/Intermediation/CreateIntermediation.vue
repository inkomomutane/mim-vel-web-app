<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const addIntermediation = ref(false);
const nameInput = ref();
const codeInput = ref<String | any>();
const percentageInput = ref<String | any>();
const addIntermediationTrigger = () => {
    addIntermediation.value = true;
};

const closeCreateIntermediationModal = () => {
    addIntermediation.value = false;
};

const form = useForm({
    name: "",
    code: "",
    percentage: "",
});

const createIntermediation = () => {
    form.post(route("intermediation.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            closeCreateIntermediationModal();
        },
        onError: () => nameInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
</script>
<template>
    <button
        type="button"
        @click="addIntermediationTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            width="20"
            height="20"
            xmlns="http://www.w3.org/2000/svg"
            role="img"
            viewBox="0 0 24 24"
            fill="currentColor"
        >
            <path
                d="M2.284 22.158c.001.95.679 1.752 1.62 1.792 1.31.055 2.623.022 3.935.022.954 0 1.786-.865 1.76-1.954-.029-1.221.018-2.445.029-3.667l.045-4.988c.003-.305.046-.362.335-.44a4.242 4.242 0 0 1 2.013-.067c1.23.262 2.129 1.21 2.261 2.46.066.62.07 1.249.078 1.874.025 1.64.038 3.28.054 4.921.01 1.087.796 1.877 1.883 1.882 1.171.006 2.342.008 3.513.007 1.106-.002 1.895-.778 1.898-1.883.007-3.371.007-6.742.01-10.113 0-.052 0-.105-.005-.156-.03-.355-.169-.658-.483-.838a2.638 2.638 0 0 0-.695-.291 7.484 7.484 0 0 0-2.887-.123c-.743.113-1.476.293-2.213.442-.97.196-1.946.28-2.934.178-1.268-.129-2.37-.666-3.402-1.38a32.36 32.36 0 0 0-1.494-.984c-.62-.38-1.314-.505-2.03-.544-.77-.043-1.536-.063-2.293.111-.59.136-.899.479-.966 1.077a3.438 3.438 0 0 0-.021.379m7.337-6.184a3.675 3.675 0 1 0-7.35-.031 3.675 3.675 0 0 0 7.35.03zm8.335-1.81a3.673 3.673 0 0 0-3.69 3.652 3.672 3.672 0 0 0 3.67 3.697 3.678 3.678 0 0 0 3.68-3.665 3.677 3.677 0 0 0-3.66-3.685Z"
            ></path>
        </svg>

        <span class="mx-4">Nova regra de intermediação</span>
    </button>

    <Modal :show="addIntermediation" @close="closeCreateIntermediationModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeCreateIntermediationModal"
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
                    Nova regra de intermediação
                </h3>
                <form class="space-y-6" @submit.prevent="createIntermediation">
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
                            placeholder="Nome regra de intermediação"
                        />
                        <span class="text-medium text-red-500 font-semibold">{{
                            form.errors.name
                        }}</span>
                    </div>
                    <div>
                        <label
                            for="code"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Abreviação</label
                        >
                        <input
                            type="text"
                            name="code"
                            v-model="form.code"
                            ref="codeInput"
                            id="code"
                            class="bg-gray-50 border uppercase border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Abreviação"
                        />
                        <span class="text-medium text-red-500 font-medium">{{
                            form.errors.code
                        }}</span>
                    </div>
                    <div>
                        <label
                            for="percentage"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Percentagem</label
                        >
                        <input
                            type="text"
                            name="percentage"
                            v-model="form.percentage"
                            ref="percentageInput"
                            id="percentage"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Percentagem"
                        />
                        <span class="text-medium text-red-500 font-medium">{{
                            form.errors.percentage
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
