<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { useForm } from "@inertiajs/vue3";
import Dropdown from "primevue/dropdown";
import { PropType, ref } from "vue";

const props = defineProps({
    user: {
        type: Object as PropType<App.Data.UserData>,
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

const nameInput = ref<String | any>(props.user.name);
const emailInput = ref<String | any>(props.user.email);
const contactoInput = ref<String | any>(props.user.contacto);

const form = useForm({
    id: props.user.id,
    name: props.user.name,
    email: props.user.email,
    contacto: props.user.contacto,
    role: props.user.role?.id,
});

const updateUser = () => {
    form.patch(
        route("user.update", {
            user: props.user.id as number,
        }),
        {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                props.close();
            },
            onError: () => nameInput.value.focus(),
            onFinish: () => form.reset(),
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
                    Editar usuário
                </h3>
                <form class="space-y-6" @submit.prevent="updateUser">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div>
                            <label
                                for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Nome do usuário</label
                            >
                            <input
                                type="text"
                                name="name"
                                v-model="form.name"
                                ref="nameInput"
                                id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Nome do usuário"
                            />
                            <span
                                class="text-medium text-red-500 font-semibold"
                                >{{ form.errors.name }}</span
                            >
                        </div>
                        <div>
                            <label
                                for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Email</label
                            >
                            <input
                                type="email"
                                name="email"
                                v-model="form.email"
                                ref="emailInput"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Email"
                            />
                            <span
                                class="text-medium text-red-500 font-semibold"
                                >{{ form.errors.email }}</span
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div>
                            <label
                                for="contacto"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Contacto</label
                            >
                            <input
                                type="text"
                                name="contacto"
                                v-model="form.contacto"
                                ref="contactoInput"
                                id="contacto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Contacto"
                            />
                            <span
                                class="text-medium text-red-500 font-semibold"
                                >{{ form.errors.contacto }}</span
                            >
                        </div>
                        <div>
                            <label
                                for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Previlêgio</label
                            >
                            <Dropdown
                                v-model="form.role"
                                optionValue="id"
                                :options="($page.props.roles as any)"
                                optionLabel="name"
                                placeholder="Previlêgio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            >
                                <template #option="slotProps">
                                    <div
                                        class="bg-slate-100 dark:bg-slate-600 dark:text-slate-200 px-4 py-2 hover:bg-slate-600 dark:hover:bg-slate-800 hover:text-white"
                                        :class="
                                            form.role == slotProps.option.id
                                                ? 'bg-slate-800 dark:bg-slate-900 text-white'
                                                : ''
                                        "
                                    >
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Dropdown>
                            <span
                                class="text-medium text-red-500 font-semibold"
                                >{{ form.errors.role }}</span
                            >
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="w-full text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                    >
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </Modal>
</template>
