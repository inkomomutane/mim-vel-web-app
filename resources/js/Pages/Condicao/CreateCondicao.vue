<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const addCondicao = ref(false);
const nomeInput = ref();
const addCondicaoTrigger = () => {
    addCondicao.value = true;
};

const closeCreateCondicaoModal = () => {
    addCondicao.value = false;
};

const form = useForm({
    nome: "",
});

const createCondicao = () => {
    form.post(route("condicao.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            closeCreateCondicaoModal();
        },
        onError: () => nomeInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
</script>
<template>
    <button
        type="button"
        @click="addCondicaoTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
    <svg width="20" height="20"    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M6,17V5c0-1.657,1.343-3,3-3h8c1.657,0,3,1.343,3,3v12c0,1.657-1.343,3-3,3H9C7.343,20,6,18.657,6,17z" opacity=".35" fill="currentColor" />
                                            <path d="M9,20c-1.657,0-3-1.343-3-3V5C4.895,5,4,5.895,4,7v12c0,1.657,1.343,3,3,3h8c1.105,0,2-0.895,2-2H9z" fill="currentColor" />
                                            <path d="M12.883,12.973h-0.006c-0.67,0-1.187-0.605-1.072-1.265c0.35-2.013,1.917-2.083,1.917-3.333c0-0.347-0.06-1.124-0.896-1.124c-0.452,0-0.718,0.289-0.873,0.597c-0.209,0.417-0.691,0.622-1.15,0.541l0,0C10.107,8.265,9.68,7.519,9.975,6.877C10.397,5.96,11.261,5,12.972,5c2.776,0,3.148,2.174,3.148,3.196c0,2.416-1.799,2.506-2.172,3.898C13.813,12.596,13.403,12.973,12.883,12.973z M14.325,15.533c0,0.412-0.127,0.76-0.382,1.043C13.687,16.858,13.352,17,12.94,17c-0.414,0-0.748-0.142-1.003-0.424c-0.255-0.283-0.384-0.631-0.384-1.043c0-0.403,0.129-0.75,0.384-1.045c0.255-0.293,0.589-0.439,1.003-0.439c0.412,0,0.747,0.146,1.003,0.439C14.198,14.783,14.325,15.131,14.325,15.533z" fill="currentColor" />
                                            </svg>
        <span class="mx-4">Nova condição do imóvel</span>
    </button>

    <Modal :show="addCondicao" @close="closeCreateCondicaoModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeCreateCondicaoModal"
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
                    Nova condição do imóvel
                </h3>
                <form class="space-y-6" @submit.prevent="createCondicao">
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
                            placeholder="Condição do imóvel"
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
