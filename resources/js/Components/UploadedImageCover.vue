<script setup lang="ts">
import { PropType } from 'vue';
import ResponsiveImage from './ResponsiveImage.vue';
    defineProps({
        image : {
            type:  Object as PropType<App.Data.MediaData> | undefined | null
        },
    })
</script>


<template>
     <ul v-if="image" class="max-h-96 overflow-y-auto">
                                    <li
                                        class="rounded border border-dashed border-green-700
                                        bg-green-100 dark:bg-green-950 flex flex-wrap p-0 my-4 gap-0 w-full"
                                    >
                                        <div class="flex items-center space-x-4 w-full">
                                            <div class="flex-shrink-0">
                                                <ResponsiveImage :responsive="image"
                                                    class="shadow-2 h-16 object-cover"  />
                                            </div>
                                            <div class="flex-1 hidden sm:block sm:w-64">
                                                <p
                                                    class="text-sm font-medium text-justify text-gray-900 truncate dark:text-white"
                                                >
                                                    {{ image.name }}
                                                </p>
                                            </div>
                                            <div class="flex-1 min-w-0"></div>
                                            <div
                                                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                            >
                                            <div
                                                class="px-6 inline-flex items-center text-base
                                                font-semibold text-gray-900 dark:text-white"
                                            >
                                                <div role="status" class="bg-green-400 rounded-full p-1">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="white"/>
                                                    <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="white"/>
                                                    </svg>

                                                    <span class="sr-only">Done...</span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </li>
     </ul>
     <span v-else></span>
</template>
