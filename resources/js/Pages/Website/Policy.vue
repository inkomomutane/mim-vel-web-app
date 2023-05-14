<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import { Head } from "@inertiajs/vue3";
import PageHero from "@/Components/PageHero.vue";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import { PropType } from "vue";

defineProps({
    policy: {
        type: Object as PropType<App.Data.PolicyData>,
        required: false,
    },
});

</script>
<template>
    <GuestLayout>
        <Head title="Políticas de privacidade" />
        <PageHeader />
        <PageHero>
            <template v-slot:coverImage>
                <ResponsiveImage :class-name="'object-cover w-auto h-full'" v-if="$page.props.globals.policyMedia != null" :responsive="$page.props.globals.policyMedia ?? undefined" />
            </template>
            <template v-slot:content>
                <div
                    class=" px-4  align-middle max-w-screen-xl text-center lg:pt-16 lg:px-12"
                >
                    <div
                        class="p-32 text-center m-auto font-extrabold text-2xl text-white md:text-5xl sm:px-16 xl:px-48 dark:text-gray-400"
                    >
                    Políticas de privacidade
                    </div>
                </div>
            </template>
        </PageHero>
        <main class="">
            <div class="md:py-16">
                <article class="
                prose
                prose-p:py-0
                w-full
                sm:max-w-screen-sm
                prose-headings:text-start
                md:max-w-screen-md
                prose-headings:text-orange-400
                prose-headings:text-md
                prose-p:text-base
                prose-strong:text-orange-700
                mx-auto
                p-8
                prose-headings:text-md
                bg-white
                rounded
                shadow-md
                selection:text-white
                " >
                <p class="leading-loose " v-html="policy?.politicas"></p>
            </article>
            </div>
        </main>

    </GuestLayout>
</template>
