<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const addNegocio = ref(false);
const nameInput = ref();
const addNegocioTrigger = () => {
    addNegocio.value = true;
};

const closeCreateProvinceModal = () => {
    addNegocio.value = false;
};

const form = useForm({
    name: "",
});

const createProvince = () => {
    form.post(route("negocio.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            closeCreateProvinceModal();
        },
        onError: () => nameInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
</script>
<template>
    <button
        type="button"
        @click="addNegocioTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
    <svg
                                        width="20"
                                        height="20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M21.23,5.77c-2.36-2.36-6.2-2.36-8.56,0c-0.21,0.21-0.39,0.44-0.56,0.67l9.03,7.81c0.03,0.03,0.07,0.06,0.09,0.08 C23.59,11.97,23.59,8.13,21.23,5.77z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M21.261,14.365c0,0,0.004-0.004,0.004-0.004l-0.031-0.027c-0.002-0.002-0.004-0.005-0.006-0.007 c-0.018-0.018-0.058-0.05-0.09-0.076l-9.81-8.48c-2.363-2.363-6.193-2.363-8.556,0c-2.363,2.363-2.363,6.193,0,8.556 c1.027,1.027,7.241,6.196,7.672,6.627c0,0,0,0,0,0c0.113,0.113,0.235,0.209,0.364,0.292c0.238,0.211,0.419,0.367,0.494,0.419 c0.537,0.376,1.256,0.471,1.844,0.09c0.335-0.218,0.469-0.633,0.523-0.904c0.05-0.045,0.12-0.106,0.2-0.176 c0.342,0.155,1.168,0.446,1.847,0.017c0.859-0.542,0.919-1.338,0.919-1.338s0.989,0.234,1.818-0.467 c0.81-0.684,0.797-1.655,0.797-1.655s1.274,0.403,2.159-0.679C22.074,15.743,21.869,15.009,21.261,14.365z"
                                            opacity=".35"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M11.133,21.316c0.284-0.284,0.199-0.199,0.482-0.482c0.609-0.609,0.609-1.596,0-2.204c-0.609-0.609-1.596-0.609-2.204,0 c-0.284,0.284-0.199,0.199-0.482,0.482c-0.609,0.609-0.609,1.596,0,2.204C9.537,21.925,10.524,21.925,11.133,21.316z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M6.964,18.253c0.284-0.284,0.199-0.199,0.482-0.482c0.609-0.609,0.609-1.596,0-2.204s-1.596-0.609-2.204,0 c-0.284,0.284-0.199,0.199-0.482,0.482c-0.609,0.609-0.609,1.596,0,2.204C5.368,18.862,6.355,18.862,6.964,18.253z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M4.773,16.568c0.284-0.284,0.199-0.199,0.482-0.482c0.609-0.609,0.609-1.596,0-2.204c-0.609-0.609-1.596-0.609-2.204,0 c-0.284,0.284-0.199,0.199-0.482,0.482c-0.609,0.609-0.609,1.596,0,2.204C3.177,17.177,4.164,17.177,4.773,16.568z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M8.965,20.048c0.284-0.284,0.479-0.479,0.763-0.763c0.609-0.609,0.609-1.596,0-2.204s-1.596-0.609-2.204,0 C7.24,17.365,7.044,17.56,6.76,17.844c-0.609,0.609-0.609,1.596,0,2.204C7.369,20.657,8.356,20.657,8.965,20.048z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M21.276,7.6c-0.353-0.168-3.649-1.904-4.758-2.073c-0.363-0.055-0.987-0.022-2.001,0.14 c-0.649,0.104-1.817,0.237-2.274,0.634c-0.425,0.369-1.765,2.389-2.574,3.634c-0.391,0.602-0.157,1.431,0.482,1.677 c0.79,0.303,1.767,0.337,2.766-0.329c0.492-0.328,1.031-0.674,1.5-0.971c0.744-0.471,1.705-0.395,2.371,0.181l1.472,1.273 C19.136,10.973,22.614,8.236,21.276,7.6z"
                                            fill="currentColor"
                                        />
                                    </svg>

        <span class="mx-4">Nova regra de negociação</span>
    </button>

    <Modal :show="addNegocio" @close="closeCreateProvinceModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeCreateProvinceModal"
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
                    Nova regra de negociação
                </h3>
                <form class="space-y-6" @submit.prevent="createProvince">
                    <div>
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Regra de negociação</label
                        >
                        <input
                            type="text"
                            name="name"
                            v-model="form.name"
                            ref="nameInput"
                            id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Regra de negociação"
                        />
                        <span class="text-medium text-red-500 font-semibold">{{
                            form.errors.name
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
