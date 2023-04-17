<template>
    <header
        class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 z-30"
    >
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 -mb-px">
                <!-- Header: Left side -->
                <div class="flex">
                    <!-- Hamburger button -->
                    <button
                        class="text-gray-500 dark:text-gray-100 hover:text-gray-600 lg:hidden"
                        @click.stop="$emit('toggle-sidebar')"
                        aria-controls="sidebar"
                        :aria-expanded="sidebarOpen"
                    >
                        <span class="sr-only">Open sidebar</span>
                        <svg
                            class="w-6 h-6 fill-current"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <rect x="4" y="5" width="16" height="2" />
                            <rect x="4" y="11" width="16" height="2" />
                            <rect x="4" y="17" width="16" height="2" />
                        </svg>
                    </button>
                </div>

                <!-- Header: Right side -->
                <div class="flex items-center space-x-3">
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 transition duration-150 rounded-full ml-3"
                        :class="{ 'bg-gray-200': searchModalOpen }"
                        @click.stop="searchModalOpen = true"
                        aria-controls="search-modal"
                    >
                        <span class="sr-only">Search</span>
                        <svg
                            class="w-4 h-4"
                            viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                class="fill-current text-gray-500 dark:bg-gray-200"
                                d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"
                            />
                            <path
                                class="fill-current text-gray-400 dark:bg-gray-200"
                                d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"
                            />
                        </svg>
                    </button>
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 transition duration-150 rounded-full ml-3"
                        @click="changeMode(!darkMode.valueOf())"
                    >
                        <span class="sr-only">Dark Mode</span>

                        <svg
                            class="w-5 h-5"
                            v-if="darkMode"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 28 28"
                            fill="none"
                        >
                            <path
                                class="fill-current text-gray-500 dark:text-gray-400"
                                d="M14.0001 2C14.4143 2 14.7501 2.33579 14.7501 2.75V4.2463C14.7501 4.66051 14.4143 4.9963 14.0001 4.9963C13.5859 4.9963 13.2501 4.66051 13.2501 4.2463V2.75C13.2501 2.33579 13.5859 2 14.0001 2ZM20.0001 14C20.0001 17.3137 17.3138 20 14.0001 20C10.6864 20 8.00007 17.3137 8.00007 14C8.00007 10.6863 10.6864 8 14.0001 8C17.3138 8 20.0001 10.6863 20.0001 14ZM25.2501 14.75C25.6643 14.75 26.0001 14.4142 26.0001 14C26.0001 13.5858 25.6643 13.25 25.2501 13.25H23.7538C23.3396 13.25 23.0038 13.5858 23.0038 14C23.0038 14.4142 23.3396 14.75 23.7538 14.75H25.2501ZM14.0001 23.0039C14.4143 23.0039 14.7501 23.3397 14.7501 23.7539V25.2502C14.7501 25.6644 14.4143 26.0002 14.0001 26.0002C13.5859 26.0002 13.2501 25.6644 13.2501 25.2502V23.7539C13.2501 23.3397 13.5859 23.0039 14.0001 23.0039ZM4.25007 14.75C4.66428 14.75 5.00007 14.4142 5.00007 14C5.00007 13.5858 4.66428 13.25 4.25007 13.25H2.75098C2.33676 13.25 2.00098 13.5858 2.00098 14C2.00098 14.4142 2.33676 14.75 2.75098 14.75H4.25007ZM5.21974 5.21897C5.51263 4.92607 5.9875 4.92607 6.2804 5.21897L7.7804 6.71897C8.07329 7.01186 8.07329 7.48673 7.7804 7.77963C7.4875 8.07252 7.01263 8.07252 6.71974 7.77963L5.21974 6.27963C4.92684 5.98673 4.92684 5.51186 5.21974 5.21897ZM6.2804 22.7799C5.9875 23.0728 5.51263 23.0728 5.21974 22.7799C4.92684 22.487 4.92684 22.0122 5.21974 21.7193L6.71974 20.2193C7.01263 19.9264 7.4875 19.9264 7.7804 20.2193C8.07329 20.5122 8.07329 20.987 7.7804 21.2799L6.2804 22.7799ZM22.7804 5.21897C22.4875 4.92607 22.0126 4.92607 21.7197 5.21897L20.2197 6.71897C19.9268 7.01186 19.9268 7.48673 20.2197 7.77963C20.5126 8.07252 20.9875 8.07252 21.2804 7.77963L22.7804 6.27963C23.0733 5.98673 23.0733 5.51186 22.7804 5.21897ZM21.7197 22.7803C22.0126 23.0732 22.4875 23.0732 22.7804 22.7803C23.0733 22.4874 23.0733 22.0126 22.7804 21.7197L21.2804 20.2197C20.9875 19.9268 20.5126 19.9268 20.2197 20.2197C19.9268 20.5126 19.9268 20.9874 20.2197 21.2803L21.7197 22.7803Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                        <svg
                            v-if="!darkMode"
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 28 28"
                            fill="none"
                        >
                            <path
                                class="fill-current text-gray-500 dark:text-gray-400"
                                d="M13.668 2.96956C13.6093 2.73517 13.667 2.48681 13.8232 2.30241C13.9794 2.118 14.2148 2.02014 14.4557 2.03953C20.6274 2.53631 25.4805 7.70125 25.4805 14.0004C25.4805 20.6279 20.1079 26.0004 13.4805 26.0004C9.04884 26.0004 5.17924 23.5977 3.10176 20.0276C2.98291 19.8233 2.96727 19.575 3.05957 19.3574C3.15187 19.1399 3.3413 18.9786 3.57078 18.9221C5.16953 18.5286 7.12023 17.8985 8.89027 16.9178C10.664 15.9351 12.2013 14.6311 13.0595 12.915C14.7731 9.4882 14.3203 5.57036 13.668 2.96956Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                    </button>

                    <SearchModal
                        id="search-modal"
                        searchId="search"
                        :modalOpen="searchModalOpen"
                        @open-modal="searchModalOpen = true"
                        @close-modal="searchModalOpen = false"
                    />
                    <!-- Divider -->
                    <hr class="w-px h-6 bg-gray-200" />
                    <UserMenu align="right" />
                </div>
            </div>
        </div>
    </header>
</template>

<script lang="ts" setup>
import { ref, watch, onMounted } from "vue";
import SearchModal from "@/Components/Admin/ModalSearch.vue";
import UserMenu from "@/Components/Admin/DropdownProfile.vue";

const searchModalOpen = ref(false);

const darkMode = ref<Boolean>(false);

onMounted(() => changeMode(localStorage.getItem("dark-mode") === "true"));

watch(darkMode, () => {
    localStorage.setItem("dark-mode", `${darkMode.value}`);
    if (darkMode.value) {
        document.querySelector("body")?.classList.add("dark");
    } else {
        document.querySelector("body")?.classList.remove("dark");
    }
});

const changeMode = (dark: Boolean) => {
    darkMode.value = dark;
    if (dark) {
        document.querySelector("body")?.classList.add("dark");
    } else {
        document.querySelector("body")?.classList.remove("dark");
    }
};

defineProps({
    sidebarOpen: Boolean,
});
</script>
