<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const addProvence = ref(false);
const nameInput = ref();
const addProvenceTrigger = () => {
    addProvence.value = true;
};

const closeCreateProvinceModal = () => {
    addProvence.value = false;
};

const form = useForm({
    name: "",
});

const createProvince = () => {
    form.post(route("province.store"), {
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
        @click="addProvenceTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
        >
            <path
                class="fill-current text-gray-50"
                opacity="0.3"
                d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
            />
            <path
                class="fill-current text-gray-100"
                d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
            />
        </svg>

        <span class="mx-4">Nova província</span>
    </button>

    <Modal :show="addProvence" @close="closeCreateProvinceModal">
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
                    Nova província
                </h3>
                <form class="space-y-6" @submit.prevent="createProvince">
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
                            placeholder="Nome da província"
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
