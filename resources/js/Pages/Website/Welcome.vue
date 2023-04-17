<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import { Head } from "@inertiajs/vue3";
import PageHero from "@/Components/PageHero.vue";
</script>
<template>
    <GuestLayout>
        <Head title="Mimóvel" />
        <PageHeader />
        <PageHero>
            <template v-slot:coverImage>
                <picture>
                    <img
                        alt="Imovel slider pulbicidade"
                        src="@/images/3.jpg"
                        class="w-full h-full object-cover hover:object-scale-down object-center"
                    />
                </picture>
            </template>
            <template v-slot:content>
                <div
                    class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12"
                >
                    <h1
                        class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-white md:text-3xl dark:text-white"
                    >
                        <img
                            src="@/images/logo/logo.png"
                            class="mx-auto mt-24 sm:m-auto w-72"
                            alt="Logo"
                        />
                    </h1>
                    <p
                        class="mb-8 text-xs font-normal text-white lg:text-sm sm:px-16 xl:px-48 dark:text-gray-400"
                    ></p>
                </div>
            </template>
        </PageHero>
        <section style="height: 9000px" class="top-0"></section>
    </GuestLayout>
</template>
