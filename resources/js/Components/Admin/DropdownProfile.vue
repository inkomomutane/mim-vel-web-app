<template>
    <div class="relative inline-flex">
        <button
            ref="trigger"
            class="inline-flex justify-center items-center group"
            aria-haspopup="true"
            @click.prevent="dropdownOpen = !dropdownOpen"
            :aria-expanded="dropdownOpen"
        >
            <ResponsiveImage
                :responsive="$page.props.auth.user.logo"
                class-name="w-8 h-8 p-[2px] rounded-full ring-2 ring-green-400 dark:ring-slate-400"
            ></ResponsiveImage>
            <div class="flex items-center truncate">
                <span
                    class="truncate capitalize ml-2 text-sm font-medium dark:text-gray-200 group-hover:text-gray-800 dark:group-hover:text-gray-400"
                    >{{ $page.props.auth.user.name }}</span
                >
                <svg
                    class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400"
                    viewBox="0 0 12 12"
                >
                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                </svg>
            </div>
        </button>
        <transition
            enter-active-class="transition ease-out duration-200 transform"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-out duration-200"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-show="dropdownOpen"
                class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-gray-700 border border-gray-200 dark:border-slate-900 py-1.5 rounded shadow-lg dark:shadow-2xl overflow-hidden mt-1"
                :class="align === 'right' ? 'right-0' : 'left-0'"
            >
                <div
                    class="pt-0.5 pb-2 px-3 mb-1 border-b border-gray-200 dark:border-gray-600"
                >
                    <div class="font-semibold text-gray-600 dark:text-gray-50">
                        {{ $page.props.auth.user.name }}
                    </div>
                    <div
                        class="text-xs text-gray-500 dark:text-gray-200 capitalize"
                    >
                        {{ $page.props.auth.user.email }}
                    </div>
                </div>
                <ul
                    ref="dropdown"
                    @focusin="dropdownOpen = true"
                    @focusout="dropdownOpen = false"
                >
                    <li>
                        <button
                            class="font-medium text-sm w-full text-indigo-500 hover:text-indigo-600 hover:bg-slate-100 flex items-center py-1 px-3"
                            @click="logout(this)"
                        >
                            Sign Out
                        </button>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { useForm } from "@inertiajs/vue3";
import ResponsiveImage from "../ResponsiveImage.vue";

const form = useForm({});
const logout = (e) => form.post(route("logout"));

defineProps({
    align: String,
});

const dropdownOpen = ref(false);
const trigger = ref(null);
const dropdown = ref(null);

// close on click outside
const clickHandler = ({ target }) => {
    if (
        !dropdownOpen.value ||
        dropdown.value.contains(target) ||
        trigger.value.contains(target)
    ) {
        return;
    }
    dropdownOpen.value = false;
};

// close if the esc key is pressed
const keyHandler = ({ keyCode }) => {
    if (!dropdownOpen.value || keyCode !== 27) {
        return;
    }
    dropdownOpen.value = false;
};

onMounted(() => {
    document.addEventListener("click", clickHandler);
    document.addEventListener("keydown", keyHandler);
});

onUnmounted(() => {
    document.removeEventListener("click", clickHandler);
    document.removeEventListener("keydown", keyHandler);
});
</script>
