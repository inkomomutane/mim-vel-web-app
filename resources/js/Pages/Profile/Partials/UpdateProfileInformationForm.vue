<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps<{
    mustVerifyEmail?: Boolean;
    status?: String;
}>();

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    location: user.location,
    contacto : user.contacto
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Informação do Perfil</h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Atualize as informações de perfil e o endereço de e-mail da sua conta.
            </p>
            <p class="p-1 text-sm bg-green-500 w-fit rounded-sm font-semibold mt-4 text-white px-4">{{ user.role?.name }}</p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 gap-4 grid grid-cols-1 md:grid-cols-2 ">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome completo</label>


                <input
                    id="name"
                    type="text"
                    class="bg-gray-50 border border-gray-300
                    text-gray-900 text-sm rounded-sm focus:ring-gray-500
                     focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700
                      dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                       dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input
                    id="email"
                    type="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contacto</label>
                <input
                    id="contacto"
                    type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    v-model="form.contacto"
                    required
                    autocomplete="contacto"
                />
                <InputError class="mt-2" :message="form.errors.contacto" />
            </div>


            <div>
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço</label>
                <input
                    id="location"
                    type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    v-model="form.location"
                    autocomplete="location"
                />
                <InputError class="mt-2" :message="form.errors.location" />
            </div>



            <div class="flex items-center gap-4">

                <button :disabled="form.processing" type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Save</button>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Informação actualizada.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
