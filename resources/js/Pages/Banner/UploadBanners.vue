<script setup>
import Modal from "@/Components/Modal.vue";
import FileUpload from "primevue/fileupload";
import Button from "primevue/button";
import ProgressBar from "primevue/progressbar";
import Badge from "primevue/badge";
// import "primevue/resources/themes/lara-light-indigo/theme.css";
import { ref } from "vue";

const totalSize = ref(0);
const totalSizePercent = ref(0);
const files = ref([]);

const onRemoveTemplatingFile = (file, removeFileCallback, index) => {
    removeFileCallback(index);
    totalSize.value -= parseInt(formatSize(file.size));
    totalSizePercent.value = totalSize.value / 10;
};

const onClearTemplatingUpload = (clear) => {
    clear();
    totalSize.value = 0;
    totalSizePercent.value = 0;
};

const onSelectedFiles = (event) => {
    files.value = event.files;
    files.value.forEach((file) => {
        totalSize.value += parseInt(formatSize(file.size));
    });
};

const uploadEvent = (callback) => {
    totalSizePercent.value = totalSize.value / 10;
    callback();
};

const onTemplatedUpload = () => {};

const formatSize = (bytes) => {
    if (bytes === 0) return "0 B";
    const k = 1024;
    const sizes = ["B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + " " + sizes[i];
};

const uploadBanners = ref(false);
const uploadBannersTrigger = () => {
    uploadBanners.value = true;
};

const closeUloadBannersModal = () => {
    uploadBanners.value = false;
};
</script>
<template>
    <button
        type="button"
        @click="uploadBannersTrigger"
        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
    >
        <svg
            width="20"
            height="20"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
        >
            <polygon
                points="20,21 4,15 4,9 20,3"
                opacity=".35"
                fill="currentColor"
            />
            <path
                d="M5,14.5c0-0.386,0-4.614,0-5C5,8.672,4.328,8,3.5,8S2,8.672,2,9.5c0,0.386,0,4.614,0,5C2,15.328,2.672,16,3.5,16S5,15.328,5,14.5z"
                fill="currentColor"
            />
            <path
                d="M22,20.5c0-0.386,0-16.614,0-17C22,2.672,21.328,2,20.5,2S19,2.672,19,3.5c0,0.386,0,16.614,0,17c0,0.828,0.672,1.5,1.5,1.5S22,21.328,22,20.5z"
                fill="currentColor"
            />
            <path
                d="M7.995,16.498L7.96,16.591c-0.389,1.034,0.134,2.187,1.168,2.576L11,19.871c1.034,0.389,2.187-0.134,2.576-1.168l0.037-0.099L7.995,16.498z"
                fill="currentColor"
            />
        </svg>

        <span class="mx-4">Carregar banners</span>
    </button>

    <Modal :show="uploadBanners" @close="closeUloadBannersModal">
        <div class="relative bg-white rounded shadow dark:bg-gray-700">
            <button
                type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                @click="closeUloadBannersModal"
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
            <div class="px-6 py-6 lg:px-8 h-full">
                <FileUpload
                    name="demo[]"
                    url=""
                    @upload="onTemplatedUpload($event)"
                    :multiple="true"
                    accept="image/*"
                    :maxFileSize="1000000"
                    @select="onSelectedFiles"
                >
                    <template
                        #header="{
                            chooseCallback,
                            uploadCallback,
                            clearCallback,
                            files,
                        }"
                    >
                        <div
                            class="flex flex-wrap justify-content-between align-items-center flex-1 gap-2"
                        >
                            <div class="flex gap-2">
                                <Button
                                    @click="chooseCallback()"
                                    icon="pi pi-images"
                                    rounded
                                    outlined
                                ></Button>
                                <Button
                                    @click="uploadEvent(uploadCallback)"
                                    icon="pi pi-cloud-upload"
                                    rounded
                                    outlined
                                    severity="success"
                                    :disabled="!files || files.length === 0"
                                ></Button>
                                <Button
                                    @click="clearCallback()"
                                    icon="pi pi-times"
                                    rounded
                                    outlined
                                    severity="danger"
                                    :disabled="!files || files.length === 0"
                                ></Button>
                            </div>
                            <ProgressBar
                                :value="totalSizePercent"
                                :showValue="false"
                                :class="[
                                    'md:w-20rem h-1rem w-full md:ml-auto',
                                    {
                                        'exceeded-progress-bar':
                                            totalSizePercent > 100,
                                    },
                                ]"
                                ><span class="white-space-nowrap"
                                    >{{ totalSize }}B / 1Mb</span
                                ></ProgressBar
                            >
                        </div>
                    </template>
                    <template
                        #content="{
                            files,
                            uploadedFiles,
                            removeUploadedFileCallback,
                            removeFileCallback,
                        }"
                    >
                        <div v-if="files.length > 0">
                            <h5>Pending</h5>
                            <div class="flex flex-wrap p-0 sm:p-5 gap-5">
                                <div
                                    v-for="(file, index) of files"
                                    :key="file.name + file.type + file.size"
                                    class="card m-0 px-6 flex flex-column border-1 surface-border align-items-center gap-3"
                                >
                                    <div>
                                        <img
                                            role="presentation"
                                            :alt="file.name"
                                            :src="file.objectURL"
                                            width="100"
                                            height="50"
                                            class="shadow-2"
                                        />
                                    </div>
                                    <span class="font-semibold">{{
                                        file.name
                                    }}</span>
                                    <div>{{ formatSize(file.size) }}</div>
                                    <Badge value="Pending" severity="warning" />
                                    <Button
                                        icon="pi pi-times"
                                        @click="
                                            onRemoveTemplatingFile(
                                                file,
                                                removeFileCallback,
                                                index
                                            )
                                        "
                                        outlined
                                        rounded
                                        severity="danger"
                                    />
                                </div>
                            </div>
                        </div>

                        <div v-if="uploadedFiles.length > 0">
                            <h5>Completed</h5>
                            <div class="flex flex-wrap p-0 sm:p-5 gap-5">
                                <div
                                    v-for="(file, index) of uploadedFiles"
                                    :key="file.name + file.type + file.size"
                                    class="card m-0 px-6 flex flex-column border-1 surface-border align-items-center gap-3"
                                >
                                    <div>
                                        <img
                                            role="presentation"
                                            :alt="file.name"
                                            :src="file.objectURL"
                                            width="100"
                                            height="50"
                                            class="shadow-2"
                                        />
                                    </div>
                                    <span class="font-semibold">{{
                                        file.name
                                    }}</span>
                                    <div>{{ formatSize(file.size) }}</div>
                                    <Badge
                                        value="Completed"
                                        class="mt-3"
                                        severity="success"
                                    />
                                    <Button
                                        icon="pi pi-times"
                                        @click="
                                            removeUploadedFileCallback(index)
                                        "
                                        outlined
                                        rounded
                                        severity="danger"
                                    />
                                </div>
                            </div>
                        </div>
                    </template>

                    <template #empty>
                        <div
                            class="flex align-items-center justify-content-center flex-column"
                        >
                            <p class="mt-4 mb-0">Carregar imagem.</p>
                        </div>
                    </template>
                </FileUpload>
            </div>
        </div>
    </Modal>
</template>
