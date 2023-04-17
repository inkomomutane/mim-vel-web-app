<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

defineProps<{
    status?: string;
}>();

const form = useForm({
    email: "",
    password: "",
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => {
            form.reset("password");
        },
    });
};
</script>

<template>
    <Head title="Autenticação"></Head>
    <GuestLayout>
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
            <a
                :href="route('dashboard')"
                class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white"
            >
                <img
                    class="w-64 mr-2"
                    src="@/images/logo/logo.png"
                    alt="logo"
                />
            </a>
            <div
                class="w-full rounded-lg bg-white shadow-2xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
            >
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-md text-center font-semibold leading-tight tracking-tight text-gray-700 md:text-2xl dark:text-white"
                    >
                        Login
                    </h1>
                    <form
                        class="space-y-4 md:space-y-6"
                        @submit.prevent="submit"
                    >
                        <div>
                            <label
                                for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Seu email</label
                            >
                            <input
                                type="email"
                                v-model="form.email"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Email@ong.org"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>
                        <div>
                            <label
                                for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Senha</label
                            >
                            <input
                                type="password"
                                v-model="form.password"
                                id="password"
                                placeholder="Senha"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-slate-600 focus:border-slate-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            />
                        </div>
                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                        <button
                            type="submit"
                            class="w-full text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Autenticar-se
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
