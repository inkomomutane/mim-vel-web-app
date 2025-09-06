<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { Mails } from "@/types";
import { PropType } from "vue";
import { ref, watch } from "vue";
import Modal from "@/Components/Modal.vue";
import axios from "axios";
import Flasher, { tooltip } from "@/helprs";
import { FlasherResponse } from "@flasher/flasher";

const props = defineProps({
    messages_agendas: Object as PropType<Mails>,
    mails: Number,
    messages: Object as PropType<FlasherResponse>,
});

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

const links = ref(props.messages_agendas?.links);
const viewingMessage = ref(false);
const loadedMessage = ref<App.Data.AgendaData | null>(null);

watch(
    () => props.messages_agendas?.links,
    (value) => {
        links.value = value;
    }
);

const closeViewingMessage = () => {
    viewingMessage.value = false;
};

const showViewingMessage = (mail: App.Data.AgendaData) => {
    if (!mail.isReaded) {
        axios
            .patch(route("message.update", { agenda: mail as any }), {
                is_readed: true,
            })
            .then(() => {
                router.reload({ only: ["messages_agendas", "mails"] });
            });
    }
    viewingMessage.value = true;
    loadedMessage.value = mail;
};

const form = useForm({
    agenda: null,
});

const deleteMessage = (mail: App.Data.AgendaData) => {
    form.delete(
        route("message.delete", {
            agenda: mail.id as number,
        }),
        {
            preserveScroll: true,
            onSuccess: () => {
                viewingMessage.value = false;
                form.reset();
            },
            onFinish: () => form.reset(),
        }
    );
};
</script>
<template>
    <Head title="Messanges do website" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="bg-white shadow rounded-md dark:bg-gray-800">
                <div
                    class="flex items-center px-8 py-4 justify-between border-b border-b-slate-300 dark:border-b-slate-700"
                >
                    <h5
                        class="text-sm font-bold leading-none text-gray-900 dark:text-white"
                    >
                        Mensagens
                    </h5>
                </div>
                <div class="flow-root">
                    <ul
                        role="list"
                        class="divide-y divide-gray-200 dark:divide-gray-700"
                    >
                        <button class="w-full text-left">
                            <li
                                class="py-3 sm:py-4 px-8 border-b dark:border-b-slate-700"
                                v-for="message in props.messages_agendas?.data"
                                :class="
                                    message.isReaded
                                        ? 'bg-slate-100 hover:bg-slate-100 dark:bg-slate-950 dark:hover:bg-slate-900'
                                        : ' hover:bg-slate-200 dark:hover:bg-slate-600'
                                "
                                @click="showViewingMessage(message)"
                            >
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <svg
                                            class="w-6 h-6 rounded-full"
                                            :class="
                                                !message.isReaded
                                                    ? 'ring-2 ring-green-400 dark:ring-slate-100'
                                                    : 'ring-2 ring-slate-400 dark:ring-slate-400'
                                            "
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                        >
                                            <path
                                                class="fill-current text-gray-500 dark:text-gray-200"
                                                opacity="0.3"
                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                            />
                                            <path
                                                class="fill-current text-gray-500 dark:text-slate-400"
                                                d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                            />
                                        </svg>
                                    </div>

                                    <div class="flex-1 max-w-fit">
                                        <p
                                            class="text-sm font-medium text-gray-900 capitalize dark:text-white"
                                        >
                                            {{ message.nomeDoCliente }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex-1 min-w-0 line-clamp-1 capitalize text-sm text-gray-700 dark:text-gray-200"
                                    >
                                        {{ message.mensagem }}
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                    >
                                        <svg
                                            class="currentColor"
                                            v-if="message.isReaded"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="currentColor"
                                        >
                                            <path
                                                class="currentColor"
                                                d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                            ></path>
                                            <path
                                                class="currentColor"
                                                opacity="0.3"
                                                d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                            ></path>
                                        </svg>

                                        <svg
                                            v-else
                                            fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                class="currentColor"
                                                opacity="0.3"
                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                            />
                                            <path
                                                class="currentColor"
                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                            </li>
                        </button>
                    </ul>
                </div>

                <nav
                    class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-3"
                    aria-label="Table navigation"
                >
                    <span
                        class="text-sm font-normal text-gray-500 dark:text-gray-400"
                    >
                        Showing
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >{{
                                `${messages_agendas?.meta.from ?? 0}-${
                                    messages_agendas?.meta.to ?? 0
                                }`
                            }}</span
                        >
                        of
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                        >
                            {{ messages_agendas?.meta.total }}</span
                        >
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li
                            v-if="links[0].active"
                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <Link
                                href=""
                                class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                >&laquo; Previous</Link
                            >
                        </li>
                        <li v-else>
                            <Link
                                class="flex rounded-l-lg items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                :href="links[0].url ?? ''"
                                >&laquo; Previous</Link
                            >
                        </li>
                        <li
                            v-for="link in links.slice(1, -1)"
                            :key="link.label"
                        >
                            <Link
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                v-if="!link.active"
                                :href="link.url ?? ''"
                                >{{ link.label }}
                            </Link>
                            <span
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                v-else
                                :class="`${
                                    link.active
                                        ? 'bg-gray-700 dark:bg-slate-600 text-white dark:text-slate-100'
                                        : ''
                                }`"
                                >{{ link.label }}</span
                            >
                        </li>
                        <li
                            v-if="links.slice(-1)[0].active"
                            class="disabled flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <span
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                >Next &raquo;</span
                            >
                        </li>
                        <li
                            v-else
                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <Link :href="links.slice(-1)[0].url ?? ''"
                                >Next &raquo;</Link
                            >
                        </li>
                    </ul>
                </nav>
            </div>
            <Modal :show="viewingMessage" @close="closeViewingMessage">
                <div
                    class="relative flex flex-col w-full h-full p-10 dark:bg-gray-700 dark:text-gray-200"
                >
                    <div
                        class="flex w-full items-center justify-between text-gray-700 dark:text-gray-400"
                    >
                        <div class="flex flex-1 w-10 h-10">
                            <svg
                                class="ml-2 w-10 h-10 rounded-full"
                                :class="
                                    !loadedMessage?.isReaded ?? false
                                        ? 'ring-2 ring-green-400 dark:ring-slate-100'
                                        : 'ring-2 ring-slate-400 dark:ring-slate-400'
                                "
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    class="fill-current text-gray-500 dark:text-gray-200"
                                    opacity="0.3"
                                    d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                />
                                <path
                                    class="fill-current text-gray-500 dark:text-slate-400"
                                    d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                />
                            </svg>
                            <div>
                                <p
                                    class="capitalize my-auto ml-4 font-bold dark:text-slate-200"
                                >
                                    {{ loadedMessage?.nomeDoCliente }}
                                </p>
                                <a
                                    :href="'tel:' + loadedMessage?.contacto"
                                    class="capitalize my-auto ml-4 text-sm flex flex-row dark:text-slate-200"
                                >
                                    <svg
                                        class="my-auto mr-2"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                    >
                                        <path
                                            class=""
                                            d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                        />
                                        <path
                                            class=""
                                            opacity="0.3"
                                            d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                        />
                                    </svg>
                                    {{ loadedMessage?.contacto }}
                                </a>
                            </div>
                        </div>

                        <div
                            class="flex border dark:border-gray-800 rounded-lg justify-end"
                        >
                            <a
                                v-if="
                                    loadedMessage?.url != null ||
                                    loadedMessage?.url
                                "
                                :href="
                                    loadedMessage?.url
                                        ? route('post.imovel.show', {
                                              imovel: loadedMessage?.url,
                                          })
                                        : ''
                                "
                                v-tooltip.value="tooltip('Ver o imóvel')"
                                v-tooltip.bottom="true"
                                class="px-2 py-2"
                                target="_blank"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                >
                                    <path
                                        class="dark:fill-slate-50"
                                        d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                    />
                                    <path
                                        class="dark:fill-slate-50"
                                        opacity="0.5"
                                        d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                    />
                                </svg> </a
                            ><a
                                v-if="
                                    loadedMessage?.contacto != undefined ||
                                    loadedMessage?.contacto != null
                                "
                                :href="'tel:' + loadedMessage?.contacto"
                                class="px-2 py-2 my-auto border-r-2 border-l-2 dark:border-gray-800"
                                v-tooltip.value="
                                    tooltip('Ligar para o cliente')
                                "
                                v-tooltip.bottom="true"
                            >
                                <svg
                                    class="currentColor"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        class="fill-current dark:fill-slate-50"
                                        d="M8,4l10,2h1c1.657,0,3,1.343,3,3v10c0,1.657-1.343,3-3,3H9c-1.657,0-3-1.343-3-3v-1L4,8L8,4z"
                                        opacity=".2"
                                    />
                                    <path
                                        class="currentColor fill-current dark:fill-slate-50"
                                        d="M18,5v1H9C7.34,6,6,7.34,6,9v9H5c-1.66,0-3-1.34-3-3V5c0-1.66,1.34-3,3-3h10C16.66,2,18,3.34,18,5z"
                                    />
                                    <path
                                        class="currentColor fill-current dark:fill-slate-50"
                                        d="M18.393,15.467c-0.809-0.809-2.121-0.809-2.93,0l-0.516,0.516l-2.93-2.93l0.516-0.516c0.809-0.809,0.809-2.121,0-2.93s-2.121-0.809-2.93,0c-0.517,0.517-0.7,1.239-0.556,1.904c0.123,0.919,0.606,3.029,2.509,4.932s4.013,2.386,4.932,2.509c0.665,0.144,1.387-0.039,1.904-0.556C19.202,17.587,19.202,16.276,18.393,15.467z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </a>
                            <a
                                class="px-2 py-2 my-auto border-r-2 dark:border-gray-800"
                                v-if="
                                    loadedMessage?.email != undefined ||
                                    loadedMessage?.email != null
                                "
                                :href="'mail:' + loadedMessage?.email ?? ''"
                                v-tooltip.value="tooltip('Responder por email')"
                                v-tooltip.bottom="true"
                            >
                                <svg
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        class="dark:fill-slate-50"
                                        d="M19.87,6.13C19.6,6.05,19.3,6,19,6H7C5.34,6,4,7.34,4,9v9c0,0.3,0.05,0.6,0.13,0.87C2.89,18.5,2,17.36,2,16V7 c0-1.66,1.34-3,3-3h12C18.36,4,19.5,4.89,19.87,6.13z"
                                        fill="currentColor"
                                    />
                                    <path
                                        class="dark:fill-slate-50"
                                        d="M4,18V9c0-1.657,1.343-3,3-3h12c1.657,0,3,1.343,3,3v9c0,1.657-1.343,3-3,3H7 C5.343,21,4,19.657,4,18z"
                                        opacity=".35"
                                        fill="currentColor"
                                    />
                                    <path
                                        class="dark:fill-slate-50"
                                        d="M22,9v1.31l-5.74,3.72C15.27,14.67,14.14,15,13,15s-2.27-0.33-3.26-0.97L4,10.31V9c0-0.7,0.24-1.34,0.64-1.85l6.73,4.36 c0.99,0.65,2.27,0.65,3.26,0l6.73-4.36C21.76,7.66,22,8.3,22,9z"
                                        fill="currentColor"
                                    />
                                    <path
                                        class="dark:fill-slate-50"
                                        d="M23.674,18.866l-3.387-2.603C19.761,15.858,19,16.234,19,16.897V18h-3.5c-0.828,0-1.5,0.672-1.5,1.5s0.672,1.5,1.5,1.5H19 v1.103c0,0.664,0.761,1.039,1.287,0.634l3.387-2.603C24.091,19.814,24.091,19.186,23.674,18.866z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </a>
                            <button
                                class="px-2 py-2 border-r-2"
                                v-if="
                                    loadedMessage?.email != undefined ||
                                    loadedMessage?.email != null
                                "
                                @click="deleteMessage(loadedMessage)"
                                v-tooltip.value="tooltip('Apagar mensagem')"
                                v-tooltip.bottom="true"
                            >
                                <svg
                                    class="w-5 h-5 fill-current text-red-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"
                                    ></path>
                                </svg>
                            </button>
                            <button
                                class="px-2 py-2"
                                v-if="
                                    loadedMessage?.email != undefined ||
                                    loadedMessage?.email != null
                                "
                                @click="closeViewingMessage"
                                v-tooltip.value="tooltip('Fechar')"
                                v-tooltip.bottom="true"
                            >
                                <svg
                                    aria-hidden="true"
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        class="dark:fill-slate-50"
                                        fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <a
                        :href="'mail:' + loadedMessage?.email"
                        class="capitalize text-blue-900 my-auto mt-2 ml-2 font-semibold text-xs flex flex-row dark:text-slate-200"
                    >
                        {{ loadedMessage?.email }}
                    </a>
                    <div
                        class="flex py-4 overflow-y-auto bg-slate-100 dark:bg-slate-800 rounded-r-md my-6 border-l-2 border-slate-800 dark:border-current dark:border-l"
                    >
                        <p class="capitalize mx-4 text-justify text-sm">
                            {{ loadedMessage?.mensagem }}
                        </p>
                    </div>
                </div>
            </Modal>
        </template>
    </AuthenticatedLayout>
</template>
