<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import { PropType } from "vue";

const props = defineProps({
    imovel: {
        type: Object as PropType<App.Data.ImovelData>,
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
                <span class="sr-only">Fechar</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3
                    class="mb-4 text-lg font-medium text-gray-900 dark:text-white"
                >
                    Visualizar imovel
                </h3>
                <div class="">
                    <ul>
                        <li class="p-2 text-sm capitalize odd:bg-slate-50">
                            <strong>Titulo</strong>: {{ imovel.titulo ?? "" }}
                        </li>
                        <li
                            class="p-2 text-sm capitalize odd:bg-slate-50 font-semibold"
                        >
                            <strong>Preço</strong>: {{ imovel.preco ?? "" }}
                        </li>
                        <li class="p-2 text-sm capitalize odd:bg-slate-50">
                            <strong>Negociação</strong>:
                            {{ imovel.regra_de_negocio?.name ?? "" }}
                        </li>
                        <li class="p-2 text-sm capitalize odd:bg-slate-50">
                            <strong>Intermediação</strong>:
                            {{ imovel.intermediation_rule?.name ?? "" }} |
                            <strong class="text-sm font-bold"
                                >{{
                                    imovel.intermediation_rule?.percentage ?? ""
                                }}
                                %
                            </strong>
                            |
                            <span class="uppercase">{{
                                imovel.intermediation_rule?.code ?? ""
                            }}</span>
                        </li>
                        <li class="p-2 text-sm capitalize odd:bg-slate-50">
                            <strong>Localização : </strong>:
                            {{ imovel.bairro?.nome ?? "" }} |
                            {{ imovel.bairro?.city.nome ?? "" }} |
                            {{ imovel.bairro?.city?.province?.name ?? "" }}
                        </li>
                        <li
                            class="p-2 text-sm capitalize odd:bg-slate-50 font-semibold"
                        >
                            <div>
                                <strong>Localização no Mapa: </strong>
                                <div
                                    v-if="imovel.mapa"
                                    v-html="imovel.mapa"
                                    class="aspect-video"
                                ></div>
                                <span v-else class="text-sm font-thin">
                                    Mapa não encontrado!</span
                                >
                            </div>
                        </li>
                        <li
                            class="p-2 text-sm capitalize odd:bg-slate-50 font-semibold"
                        >
                            <div>
                                <strong>Detailhes do imóvel: </strong>
                                <div
                                    v-if="imovel.details"
                                    v-html="imovel.details"
                                    class="aspect-video"
                                ></div>
                                <span v-else class="text-sm font-thin">
                                    Sem detalhes por mostrar!</span
                                >
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </Modal>
</template>
