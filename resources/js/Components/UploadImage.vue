<template>
    <div class="card">
        <FileUpload
            customUpload
            @uploader="uploader"
            :multiple="multiple"
            :accept="mediaType"
            :maxFileSize="9000000"
            @select="onSelectedFiles"
            :disabled="progressUploadImage"
            :file-limit="multiple ? 50 : 1"
        >
            <template
                #content="{
                    files,
                    uploadedFiles,
                    removeUploadedFileCallback,
                    removeFileCallback,
                }"
            >
                <ul v-if="files.length > 0" class="max-h-96 overflow-y-auto">
                    <li
                        v-for="(file, index) of files"
                        :key="file.name + file.type + file.size"
                        class="rounded border border-dashed border-orange-700 bg-orange-100 dark:bg-orange-950 flex flex-wrap p-0 my-4 gap-0 w-full"
                    >
                        <div class="flex items-center space-x-4 w-full">
                            <div class="flex-shrink-0">
                                <img
                                    role="presentation"
                                    :alt="file.name"
                                    :src="file.objectURL"
                                    width="100"
                                    class="shadow-2 h-16 object-cover"
                                />
                            </div>
                            <div class="flex-1 hidden sm:block sm:w-64">
                                <p
                                    class="text-sm font-medium text-justify text-gray-900 truncate dark:text-white"
                                >
                                    {{ file.name }}
                                </p>
                            </div>
                            <div class="flex-1 min-w-fit">
                                <p
                                    class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                >
                                    {{ formatSize(file.size) }}
                                </p>
                            </div>
                            <div class="flex-1 min-w-0"></div>
                            <div
                                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                            >
                                <div role="status">
                                    <svg
                                        class="w-6 h-6 mr-2 text-gray-200 dark:text-orange-50 fill-orange-500"
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

                                    <span class="sr-only">Pendente...</span>
                                </div>
                            </div>
                            <button
                                @click="
                                    onRemoveTemplatingFile(
                                        file,
                                        removeFileCallback,
                                        index
                                    )
                                "
                                class="px-4"
                            >
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
                <div v-if="uploadedFiles.length > 0">
                    <ul class="max-h-96 overflow-y-auto">
                        <li
                            v-for="(file, index) of uploadedFiles"
                            :key="file.name + file.type + file.size"
                            class="rounded border border-dashed border-green-300 bg-green-100 dark:bg-green-800 flex flex-wrap p-0 my-4 gap-0 w-full"
                        >
                            <div class="flex items-center space-x-4 w-full">
                                <div class="flex-shrink-0">
                                    <img
                                        role="presentation"
                                        :alt="file.name"
                                        :src="file.objectURL"
                                        width="100"
                                        height="50"
                                        class="shadow-2 h-16 object-cover"
                                    />
                                </div>
                                <div class="flex-1 hidden sm:block sm:w-64">
                                    <p
                                        class="text-sm font-medium text-justify text-gray-900 truncate dark:text-white"
                                    >
                                        {{ file.name }}
                                    </p>
                                </div>
                                <div class="flex-1 min-w-fit">
                                    <p
                                        class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                    >
                                        {{ formatSize(file.size) }}
                                    </p>
                                </div>
                                <div class="flex-1 min-w-0"></div>
                                <div
                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                >
                                    <div role="status">
                                        <svg
                                            class="fillCurrent text-green-500 dark:text-green-50"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                        >
                                            <path
                                                class="fill-green-400 dark:fill-green-50"
                                                opacity="0.5"
                                                d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z"
                                            />
                                            <path
                                                class="fill-green-500 dark:fill-green-50"
                                                d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <button
                                    @click="removeUploadedFileCallback(index)"
                                    class="px-4"
                                >
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
            </template>
            <template #empty>
                <div v-if="progressUploadImage == false">
                    <slot name="files" />
                </div>
                <div
                    v-else
                    role="status"
                    class="rounded p-2 mt-2 border border-dashed bg-orange-50 dark:bg-slate-700 dark:border-slate-400 border-orange-400"
                >
                    <svg
                        aria-hidden="true"
                        class="mx-auto w-8 h-8 text-gray-200 animate-spin dark:text-orange-50 fill-orange-500 dark:fill-slate-700"
                        viewBox="0 0 100 101"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor"
                        />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill"
                        />
                    </svg>
                    <span class="sr-only">Pendente...</span>
                </div>
            </template>

            <template
                #header="{
                    chooseCallback,
                    uploadCallback,
                    clearCallback,
                    files,
                }"
            >
                <div
                    class="grid grid-cols-1 gap-2 text-gray-50 text-base"
                    :class="`${
                        disabledUpload && disabledCancel
                            ? ''
                            : disabledUpload || disabledCancel
                            ? 'sm:grid-cols-2'
                            : 'sm:grid-cols-3'
                    }`"
                >
                    <button
                        @click="chooseCallback()"
                        class="min-w-full flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-900 focus:outline-none dark:focus:ring-slate-800"
                    >
                        <svg
                            width="20"
                            height="20"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M21.68 16.96l-3.13-7.31c-1.06-2.48-3.01-2.58-4.32-.22l-1.89 3.41c-.96 1.73-2.75 1.88-3.99.33l-.22-.28c-1.29-1.62-3.11-1.42-4.04.43l-1.72 3.45C1.16 19.17 2.91 22 5.59 22h12.76c2.6 0 4.35-2.65 3.33-5.04z"
                            ></path>
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M6.97 8a3 3 0 100-6 3 3 0 000 6z"
                                opacity=".4"
                            ></path>
                        </svg>
                        <span class="mx-4"
                            >{{ labelText ?? "Upload image" }}
                        </span>
                    </button>
                    <button
                        v-if="!disabledUpload"
                        @click="uploadEvent(uploadCallback)"
                        :disabled="
                            disabledUpload || !files || files.length === 0
                        "
                        :class="{ disabledUpload: 'bg-transparent w-0' }"
                        class="flex items-center justify-center text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm pr-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-900 focus:outline-none dark:focus:ring-slate-800"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"
                            ></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>

                        <span class="mx-4">Upload</span>
                    </button>
                    <button
                        v-if="!disabledCancel"
                        @click="clearUplodingImages(clearCallback)"
                        :disabled="!files || files.length === 0"
                        class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm pr-4 dark:bg-slate-600 dark:hover:bg-slate-900 focus:outline-none dark:focus:ring-slate-800"
                    >
                        <svg
                            width="20"
                            height="20"
                            xmlns="http://www.w3.org/2000/svg"
                            version="1.1"
                            viewBox="0 0 36 36"
                            preserveAspectRatio="xMidYMid meet"
                            fill="currentColor"
                        >
                            <title>cancel-line</title>
                            <path
                                class="clr-i-outline clr-i-outline-path-1"
                                d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2ZM4,18A13.93,13.93,0,0,1,7.43,8.85L27.15,28.57A14,14,0,0,1,4,18Zm24.57,9.15L8.85,7.43A14,14,0,0,1,28.57,27.15Z"
                            ></path>
                            <rect
                                x="0"
                                y="0"
                                width="36"
                                height="36"
                                fill-opacity="0"
                            ></rect>
                        </svg>

                        <span class="px-4">Cancel</span>
                    </button>
                </div>
            </template>
        </FileUpload>
    </div>
</template>

<script>
import { ref, computed } from "vue";
import Button from "primevue/button";
import FileUpload from "primevue/fileupload";
import collect from "collect.js";

export default {
    name: "UploadImage",
    props: {
        uploader: Function,
        successEvent: Function,
        errorEvent: Function,
        mediaType: String,
        disabledUpload: {
            type: Boolean,
            required: true,
        },
        labelText: String,
        disabledCancel: {
            type: Boolean,
            required: true,
        },
        multiple: {
            type: Boolean,
            required: true,
        },
        progressUploadImage: Boolean,
    },
    emits: ["update:images"],
    components: {
        Button,
        FileUpload,
        ref,
        computed,
    },
    setup(props, { emit }) {
        const totalSize = ref(0);
        const totalSizePercent = ref(0);
        const files = ref([]);
        const onRemoveTemplatingFile = (file, removeFileCallback, index) => {
            removeFileCallback(index);
            files.value = collect(files.value).except(file).all();
            totalSize.value -= parseInt(formatSize(file.size));
            totalSizePercent.value = totalSize.value / 10;
            emit("update:images", files.value);
        };

        const onSelectedFiles = (event) => {
            if (props.multiple) {
                files.value = event.files;
            } else {
                files.value = [collect(event.files).last()];
            }

            files.value.forEach((file) => {
                totalSize.value += parseInt(formatSize(file.size));
            });
            emit("update:images", files.value);
        };

        const uploadEvent = (callback) => {
            totalSizePercent.value = totalSize.value / 10;
            callback();
        };

        const clearUplodingImages = (callback) => {
            files.value = collect([]).all();
            emit("update:images", files.value);
            callback();
        };

        const formatSize = (bytes) => {
            if (bytes === 0) return "0 B";
            const k = 1024;
            const sizes = ["B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return (
                parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + " " + sizes[i]
            );
        };
        return {
            onRemoveTemplatingFile,
            clearUplodingImages,
            onSelectedFiles,
            uploadEvent,
            formatSize,
            totalSize,
            totalSizePercent,
            files,
        };
    },
};
</script>
