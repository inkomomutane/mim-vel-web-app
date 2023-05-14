<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import { Head } from "@inertiajs/vue3";
import PageHero from "@/Components/PageHero.vue";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import { PropType } from "vue";


</script>
<template>
    <GuestLayout>
        <Head title="Sobre nós" />
        <PageHeader />
        <PageHero class="mb-0 pb-0">
            <template v-slot:coverImage>
                <ResponsiveImage  v-if="$page.props.globals.aboutMedia != null" :responsive="$page.props.globals.aboutMedia ?? undefined" />
            </template>
            <template v-slot:content>
                <div
                    class=" px-4  align-middle max-w-screen-xl text-center lg:pt-16 lg:px-12"
                >
                    <div
                        class="p-32 text-center m-auto font-extrabold text-2xl text-white md:text-5xl sm:px-16 xl:px-48 dark:text-gray-400"
                    >
                    Sobre nós
                    </div>
                </div>
            </template>
        </PageHero>
    </GuestLayout>
</template>
