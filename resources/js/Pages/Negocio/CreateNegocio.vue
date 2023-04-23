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
            width="24"
            height="24"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
        >
            <path
                class="fill-current text-gray-100"
                opacity="0.4"
                d="M15,3h4c1.105,0,2,0.895,2,2v3.882c0,0.735-0.171,1.46-0.5,2.118l0,0c-0.329,0.658-0.5,1.383-0.5,2.118v5.783c0,1.234-0.84,2.309-2.037,2.608L16,22h-1.247c-0.499,0-0.994-0.08-1.468-0.238l-0.651-0.217c-1.054-0.351-2.2-0.313-3.228,0.109l0,0C8.848,21.882,8.25,22,7.646,22H5.407C4.504,22,3.638,21.64,3,21l-0.005-0.005C2.358,20.355,2,19.489,2,18.586v-3.468c0-0.735,0.171-1.46,0.5-2.118l0,0C2.829,12.342,3,11.617,3,10.882V8c0-1.105,0.895-2,2-2h4l3-2L15,3z"
            />
            <circle
                class="fill-current text-gray-100"
                cx="7.5"
                cy="16.5"
                r="1.5"
                fill="currentColor"
            />
            <path
                class="fill-current text-gray-100"
                d="M12,2C9.239,2,7,4.239,7,7c0,1.977,2.001,4.704,3.471,6.441c0.799,0.944,2.259,0.944,3.058,0C14.999,11.704,17,8.977,17,7C17,4.239,14.761,2,12,2z M12,9.143c-1.183,0-2.143-0.959-2.143-2.143S10.817,4.857,12,4.857S14.143,5.817,14.143,7S13.183,9.143,12,9.143z"
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
