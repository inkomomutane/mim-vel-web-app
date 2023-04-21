<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Dropdown from 'primevue/dropdown';

const props = defineProps({
    provinces:{
        type: Array as PropType<App.Data.ProvinceData>,
        required:true
    }
})

const cities = ref(props.provinces);

const addCity = ref(false);
const nameInput = ref();
const addCityTrigger = () => {
    addCity.value = true;
};

const closeCreateCityModal = () => {
    addCity.value = false;
};

const form = useForm({
    nome: "",
    province_id:null
});

const createCity = () => {
    form.post(route("city.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            closeCreateCityModal();
        },
        onError: () => nameInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
</script>
<template>
    <button
        type="button"
        @click="addCityTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
    <svg width="24" height="24" viewBox="0 0 48 48" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path class="fill-current text-gray-100" fill-rule="evenodd" clip-rule="evenodd" d="M8 43C8 42.4477 8.44772 42 9 42H39C39.5523 42 40 42.4477 40 43C40 43.5523 39.5523 44 39 44H9C8.44772 44 8 43.5523 8 43Z"></path>
<path class="fill-current text-gray-100" fill-rule="evenodd" clip-rule="evenodd" d="M12 22V42H17V22H12ZM11 20C10.4477 20 10 20.4477 10 21V43C10 43.5523 10.4477 44 11 44H18C18.5523 44 19 43.5523 19 43V21C19 20.4477 18.5523 20 18 20H11Z"></path>
<path class="fill-current text-gray-100" opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M17 4L33 10V24H28C27.4477 24 27 24.4477 27 25V42H17V4ZM20 13H22V15H20V13ZM26 13H24V15H26V13ZM28 13H30V15H28V13ZM22 17H20V19H22V17ZM24 17H26V19H24V17ZM30 17H28V19H30V17ZM20 21H22V23H20V21ZM26 21H24V23H26V21ZM28 21H30V23H28V21ZM22 25H20V27H22V25ZM24 25H26V27H24V25ZM20 29H22V31H20V29ZM26 29H24V31H26V29ZM22 33H20V35H22V33ZM24 33H26V35H24V33ZM20 37H22V39H20V37ZM26 37H24V39H26V37Z"></path>
<path class="fill-current text-gray-100"  fill-rule="evenodd" clip-rule="evenodd" d="M29 26V42H36V26H29ZM28 24C27.4477 24 27 24.4477 27 25V43C27 43.5523 27.4477 44 28 44H37C37.5523 44 38 43.5523 38 43V25C38 24.4477 37.5523 24 37 24H28Z"></path>
<path class="fill-current text-gray-100" fill-rule="evenodd" clip-rule="evenodd" d="M34 30H31V28H34V30Z"></path>
<path class="fill-current text-gray-100" fill-rule="evenodd" clip-rule="evenodd" d="M34 34H31V32H34V34Z"></path>
<path class="fill-current text-gray-100" fill-rule="evenodd" clip-rule="evenodd" d="M34 38H31V36H34V38Z"></path>
<path class="fill-current text-gray-100"  fill-rule="evenodd" clip-rule="evenodd" d="M34 42H31V40H34V42Z"></path>
<path class="fill-current text-gray-100" fill-rule="evenodd" clip-rule="evenodd" d="M15 13L15 21H13L13 13H15Z"></path>
</svg>

        <span class="mx-4">Nova cidade</span>
    </button>

    <Modal :show="addCity" @close="closeCreateCityModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeCreateCityModal"
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
                    Nova cidade
                </h3>
                <form class="space-y-6" @submit.prevent="createCity">
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
                            placeholder="Nome da cidade"
                        />
                        <span class="text-sm text-red-500 font-medium">{{
                            form.errors.nome
                        }}</span>
                    </div>

                    <div>
                        <label
                            for="provincia"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Província</label
                        >

                        <Dropdown v-model="form.province_id" optionValue="id"  :options="cities" optionLabel="name" placeholder="Selecionar província"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"

                        >

                        <template #option="slotProps">
                            <div class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                            :class="form.province_id == slotProps.option.id ? 'bg-slate-800 dark:bg-slate-900 text-white' : ''"
                            >
                                <div>{{ slotProps.option.name }}</div>
                            </div>
                        </template>
                    </Dropdown>

                        <span class="text-sm text-red-500 font-normal">{{
                            form.errors.province_id
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
