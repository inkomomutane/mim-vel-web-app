<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
const showModal = ref(false);
const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};
</script>
<template>
    <div
        class="flex items-center space-x-6 mt-8 shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-500"
    >
        <div class="relative w-full">
            <div
                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
            >
                <svg
                    class="w-5 h-5 fill-gray-400 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"
                    ></path>
                </svg>
            </div>
            <input
                @focus="openModal"
                type="search"
                id="default-search"
                class="block w-full p-4 px-8 pl-10 text-sm text-gray-400 border ring-0 focus:ring-0 border-gray-50 rounded-full bg-white focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-white dark:placeholder-gray-900 dark:text-white"
                placeholder="Encontre o teu imóvel dos sonhos aqui..."
                required
            />
        </div>
    </div>

    <div>
        <!-- Button to open modal -->

        <Modal :show="showModal" @close="closeModal">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button
                    @click="closeModal"
                    type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="crypto-modal"
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
                <!-- Modal header -->
                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                    <div class="flex items-center mr-4">
                        <div class="relative w-full">
                            <div
                                class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                            >
                                <svg
                                    class="w-5 h-5 fill-gray-400 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"
                                    ></path>
                                </svg>
                            </div>
                            <span
                                class="block w-full p-4 bg-transparent px-8 text-base text-gray-700 border ring-0 focus:ring-0 border-transparent focus:ring-transparent focus:border-transparent dark:bg-gray-700 dark:border-white dark:placeholder-gray-900 dark:text-white py-1"
                                >Encontre o teu imóvel dos sonhos aqui...</span
                            >
                        </div>
                    </div>
                </div>
                <!-- Modal body -->
                <div class="p-6">
                    <div class="grid justify-end">
                        <button
                            type="button"
                            class="text-white bg-orange-400 hover:bg-orange-400 focus:outline-none focus:ring-0 focus:ring-orange-300 focus:bg-orange-500 font-medium rounded-sm text-sm px-5 py-2.5 text-center mr-2 dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-500"
                        >
                            Buscar
                        </button>
                    </div>
                </div>
            </div>
        </Modal>
    </div>
</template>
