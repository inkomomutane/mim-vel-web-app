<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { PropType, watch } from "vue";
import { FlasherResponse } from "@flasher/flasher";
import Flasher from "@/helprs";

const props = defineProps({
    policy: Object as PropType<App.Data.PolicyData>,
    messages: Object as PropType<FlasherResponse>,
});

const form = useForm({
    politicas: props.policy?.politicas,
});

const updatePolicy = () => {
    form.patch(route("legal.policy.update"));
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
    <Head title="Politicas de privacidade" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div
                class="flex flex-col md:flex-row items-center justify-end space-b-3 md:space-y-0 md:space-x-4 p-4"
            >
                <button
                    @click="updatePolicy"
                    type="button"
                    class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M8.246 14.713a27.792 27.792 0 0 1-1.505-.953c-.501-.34-.983-.707-1.444-1.1-.458-.395-.888-.82-1.288-1.274-.4-.455-.753-.95-1.05-1.478a7.8 7.8 0 0 1-.7-1.69A7.041 7.041 0 0 1 2 6.3V3.1l.5-.5c.333 0 .656-.011.97-.036.296-.023.591-.066.882-.128.284-.062.562-.148.832-.256.284-.118.557-.261.816-.427a4.83 4.83 0 0 1 1.184-.565 4.8 4.8 0 0 1 2-.142 4.018 4.018 0 0 1 1.237.383c.199.097.392.204.58.322.26.167.535.31.821.428.27.109.547.194.831.256.291.062.587.106.884.129.311.024.634.035.967.035l.5.5v3.2a7.043 7.043 0 0 1-.256 1.919 7.804 7.804 0 0 1-.7 1.69 8.751 8.751 0 0 1-1.05 1.478c-.4.452-.829.877-1.286 1.27a15.94 15.94 0 0 1-1.448 1.1 28.71 28.71 0 0 1-1.51.956h-.508zM3 3.59V6.3c-.004.555.07 1.11.22 1.645a6.7 6.7 0 0 0 .61 1.473c.263.467.575.905.93 1.308.37.417.766.81 1.188 1.174.432.368.883.712 1.352 1.03.4.267.8.523 1.2.769.4-.242.8-.498 1.2-.768.47-.319.923-.663 1.355-1.031.421-.364.817-.756 1.186-1.172a7.8 7.8 0 0 0 .93-1.308c.261-.465.466-.96.61-1.473.15-.537.223-1.09.22-1.647V3.59c-.159 0-.313-.012-.465-.023l-.079-.006a7.95 7.95 0 0 1-1.018-.147 6.112 6.112 0 0 1-1.976-.814 5.166 5.166 0 0 0-.482-.27 3.123 3.123 0 0 0-.943-.29 3.686 3.686 0 0 0-1.558.106c-.332.108-.649.26-.94.452-.312.2-.64.372-.983.513a6.4 6.4 0 0 1-1 .307c-.335.07-.675.12-1.017.146-.174.01-.355.02-.54.026zm6.065 4.3a1.5 1.5 0 1 0-1.13 0L7.5 10.5h2l-.435-2.61z"
                        ></path>
                    </svg>

                    <span class="mx-4">Actualizar politicas</span>
                </button>
            </div>
            <div
                class="p-8 bg-white rounded overflow-auto dark:bg-slate-700 dark:text-slate-50"
            >
                {{ form.errors.politicas }}
                <ckeditor
                    :editor="ClassicEditor"
                    v-model="form.politicas"
                    :config="{}"
                ></ckeditor>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
<style>
.ck-editor__editable {
    @apply !bg-gray-50 !border !border-gray-300 !text-gray-900 !text-sm !rounded-b focus:!ring-slate-500 focus:!border-slate-500 !block !w-full !p-2.5 dark:!bg-gray-600 dark:!border-gray-500 dark:!placeholder-gray-400 dark:!text-white;
}

.ck-focused {
    @apply !shadow-none ring-1 focus:!ring-gray-800 focus-within:!ring-gray-600 focus-visible:!ring-gray-600;
}
.ck-toolbar {
    @apply dark:!text-white dark:!bg-gray-300 dark:!border-gray-500;
}
</style>
