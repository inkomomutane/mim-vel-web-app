<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import Modal from "@/Components/Modal.vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import UploadImage from "@/Components/UploadImage.vue";
import { useForm } from "@inertiajs/vue3";
import { PropType, ref, watch } from "vue";
import { vMaska } from "maska";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";

const props = defineProps({
    hotel: {
        type: Object as PropType<App.Data.HotelData>,
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
const form = useForm({
    title: props.hotel?.title,
    price: props.hotel?.preco,
    description: props.hotel?.description ?? "",
    images: <any>[],
    existingImages: props.hotel?.images,
});

const roomPictures = ref<Array<File>>([]);

watch(
    () => roomPictures,
    () => {
        form.images = roomPictures.value;
    },
    {
        deep: true,
        immediate: true,
    }
);

const createRoom = () => {
    return form.post(
        route("hotel.rooms.update.new-room", {
            room: props.hotel?.id as number,
        }),
        {
            onSuccess: () => props.close(),
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
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 pb-2 lg:px-8">
                <h3
                    class="mb-4 text-xl font-medium text-gray-900 dark:text-white"
                >
                    Editar quarto
                </h3>
                <div class="space-y-2">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label
                                for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Título</label
                            >
                            <input
                                type="text"
                                name="title"
                                v-model="form.title"
                                required
                                id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Título"
                            />
                            <InputError :message="form.errors.title" />
                        </div>
                        <div>
                            <label
                                for="roomPrice"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Preço</label
                            >
                            <input
                                type="text"
                                name="roomPrice"
                                v-maska
                                v-model="form.price"
                                required
                                data-maska="0.99"
                                data-maska-tokens="0:\d:multiple|9:\d:optional"
                                id="priceItem"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="preço"
                            />
                            <InputError :message="form.errors.price" />
                        </div>
                        <div class="md:col-span-2">
                            <label
                                for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Descrição</label
                            >
                            <ckeditor
                                :editor="ClassicEditor"
                                v-model="form.description"
                                :config="{}"
                            ></ckeditor>
                            <InputError :message="form.errors.description" />
                        </div>
                    </div>
                    <div>
                        <UploadImage
                            @update:images="
                                (files:any) => (roomPictures = files)
                            "
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Fotos do quarto"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files> </template>
                        </UploadImage>
                    </div>
                    <div>
                        <ul class="max-h-96 overflow-y-auto">
                            <li v-if="form.images.length == 0"
                                v-for="image in hotel.images"
                                class="rounded border border-dashed border-green-700 bg-green-100 dark:bg-green-950 flex flex-wrap p-0 mb-4 gap-0 w-full"
                            >
                                <div class="flex items-center space-x-4 w-full">
                                    <div class="flex-shrink-0">
                                        <ResponsiveImage
                                            :responsive="image"
                                            class-name="w-[100px] shadow-2 h-16 object-cover"
                                        />
                                    </div>
                                    <div class="flex-1 hidden sm:block sm:w-64">
                                        <p
                                            class="text-sm font-medium text-justify text-gray-900 truncate dark:text-white"
                                        >
                                            {{ image.name }}
                                        </p>
                                    </div>
                                    <div class="flex-1 min-w-fit">
                                        <p
                                            class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                        >
                                            {{ image.size }} KB
                                        </p>
                                    </div>
                                    <div class="flex-1 min-w-0"></div>

                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                    >
                                        <div role="status">
                                            <svg
                                                class="w-6 h-6 mr-2 text-gray-200 dark:text-green-50 fill-green-500"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M0 0h24v24H0V0z"
                                                    fill="none"
                                                ></path>
                                                <path
                                                    d="M17.3 6.3c-.39-.39-1.02-.39-1.41 0l-5.64 5.64 1.41 1.41L17.3 7.7c.38-.38.38-1.02 0-1.4zm4.24-.01l-9.88 9.88-3.48-3.47c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l4.18 4.18c.39.39 1.02.39 1.41 0L22.95 7.71c.39-.39.39-1.02 0-1.41h-.01c-.38-.4-1.01-.4-1.4-.01zM1.12 14.12L5.3 18.3c.39.39 1.02.39 1.41 0l.7-.7-4.88-4.9c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.03 0 1.42z"
                                                ></path>
                                            </svg>
                                            <span class="sr-only">Done</span>
                                        </div>
                                    </div>
                                    <button class="px-4">
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5 text-gray-500 hover:text-red-500"
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
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button
                        type="submit"
                        @click="createRoom"
                        class="flex w-full justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                    >
                        <svg
                            width="20"
                            height="20"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                        >
                            <path
                                fill="currentColor"
                                d="M4.28 7h2.72l-1.15-1.68c-0.542-0.725-1.36-1.216-2.295-1.319l-0.555-0.001v1.54c-0.011 0.063-0.018 0.136-0.018 0.211 0 0.69 0.56 1.25 1.25 1.25 0.017 0 0.034-0 0.050-0.001z"
                            ></path>
                            <path
                                fill="currentColor"
                                d="M13 7v-0.28c0-0.003 0-0.007 0-0.010 0-0.934-0.749-1.693-1.678-1.71l-4.692-0c0.5 0.62 1.37 2 1.37 2h5z"
                            ></path>
                            <path
                                fill="currentColor"
                                d="M15 5.1c-0.552 0-1 0.448-1 1v1.9h-12v-4c0-0.552-0.448-1-1-1s-1 0.448-1 1v9h2v-2h12v2h2v-6.9c0-0.552-0.448-1-1-1z"
                            ></path>
                        </svg>

                        <span class="px-3"> Actualizar </span>
                    </button>
                </div>
            </div>
        </div>
    </Modal>
</template>
