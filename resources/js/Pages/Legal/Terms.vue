<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import BalloonEditor from "@ckeditor/ckeditor5-build-balloon";
import { PropType, watch } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";

const props = defineProps({
    term: Object as PropType<App.Data.TermAndConditionData>,
    messages: Object as PropType<FlasherResponse>,
});

const form = useForm({
    termos: props.term?.term,
});

const updateTerm = () => {
    form.patch(route("legal.term.update"));
};

watch(
    () => props.messages,
    (value) => {
        value?.envelopes.forEach((element) => {
            Flasher.flash(
                element.notification.type,
                element.notification.message
            );
        });
    }
);
</script>
<template>
    <Head title="Termos e condições" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div
                class="flex flex-col md:flex-row items-center justify-end space-b-3 md:space-y-0 md:space-x-4 p-4"
            >
                <button
                    @click="updateTerm"
                    type="button"
                    class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                >
                    <svg
                        width="20"
                        height="20"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M3 14h4v.91l.09.09H2.5l-.5-.5v-13l.5-.5h7.72l.35.14 3.28 3.3.15.36v2.54a3.1 3.1 0 0 0-1-.94V6H9.5L9 5.5V2H3v12zm10-9l-3-3v3h3zm.5 4v1h1l.5.5v4l-.5.5h-6l-.5-.5v-4l.5-.5h1V9a2 2 0 0 1 4 0zm-2.707-.707A1 1 0 0 0 10.5 9v1h2V9a1 1 0 0 0-1.707-.707zM9 11v3h5v-3H9z"
                        ></path>
                    </svg>

                    <span class="mx-4">Actualizar termos e condições</span>
                </button>
            </div>
            <div
                class="p-8 bg-white rounded overflow-auto dark:bg-slate-700 dark:text-slate-50"
            >
                {{ form.errors.termos }}
                <ckeditor
                    class="border-none shadow-none shadow-transparent"
                    :editor="BalloonEditor"
                    v-model="form.termos"
                    :config="{}"
                ></ckeditor>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
<style>
.ck-focused {
    border: none !important;
    box-shadow: none !important;
}
</style>
