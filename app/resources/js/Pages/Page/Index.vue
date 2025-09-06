<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import UploadImage from "@/Components/UploadImage.vue";
import UploadedImageCover from "@/Components/UploadedImageCover.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Flasher from "@/helprs";
import { FlasherResponse } from "@flasher/flasher";
import { Head, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { ref } from "vue";
import { PropType } from "vue";

const props = defineProps({
    pageData: Object as PropType<App.Data.PageData>,
    messages: Object as PropType<FlasherResponse>,
});

const pageDatarefs = ref(props.pageData);

const updateGlobalSiteDataProgress = ref(false);

const form = useForm({
    name: pageDatarefs.value?.name,
    slogan: pageDatarefs.value?.slogan,
    content: pageDatarefs.value?.content ?? "",
    email: pageDatarefs.value?.email,
    location: pageDatarefs.value?.location,
    facebook: pageDatarefs.value?.facebook,
    whatsapp: pageDatarefs.value?.whatsapp,
    instagram: pageDatarefs.value?.instagram,
    homeMedia: [],
    imovelsMedia: [],
    aboutMedia: [],
    contactMedia: [],
    termsMedia: [],
    policyMedia: [],
    logoMedia: [],
});

const updateGlobalSiteData = () =>
    form.post(route("mimovel.update"), {
        onProgress: () => (updateGlobalSiteDataProgress.value = true),
        onSuccess: () => {
            form.reset();
            form.name = pageDatarefs.value?.name;
            form.slogan = pageDatarefs.value?.slogan;
            form.content = pageDatarefs.value?.content ?? "";
            form.email = pageDatarefs.value?.email;
            form.location = pageDatarefs.value?.location;
            form.facebook = pageDatarefs.value?.facebook;
            form.whatsapp = pageDatarefs.value?.whatsapp;
            form.instagram = pageDatarefs.value?.instagram;
            form.homeMedia = [];
            form.imovelsMedia = [];
            form.aboutMedia = [];
            form.contactMedia = [];
            form.termsMedia = [];
            form.policyMedia = [];
            form.logoMedia = [];
        },
        forceFormData: true,
        preserveState: (page) => Object.keys(page.props.errors).length === 1,
    });
onMounted(() => {
    props.messages?.envelopes.forEach((element) => {
        Flasher.flash(element.notification.type, element.notification.message);
    });
});
</script>
<template>
    <Head title="Mimóvel páginas" />
    <AuthenticatedLayout>
        <template v-slot:content>
            <div class="mx-auto max-w-screen-xl">
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0"
                >
                    <button
                        type="button"
                        @click="updateGlobalSiteData()"
                        class="flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M21 12a9 9 0 1 0 -9 9"></path>
                            <path d="M3.6 9h16.8"></path>
                            <path d="M3.6 15h8.4"></path>
                            <path d="M11.578 3a17 17 0 0 0 0 18"></path>
                            <path
                                d="M12.5 3c1.719 2.755 2.5 5.876 2.5 9"
                            ></path>
                            <path d="M18 21v-7m3 3l-3 -3l-3 3"></path>
                        </svg>
                        <span class="mx-4">Actualizar dados globais</span>
                    </button>
                </div>
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mt-3 bg-white dark:bg-slate-800 rounded p-8 shadow"
                >
                    <div>
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Nome da empresa</label
                        >
                        <input
                            type="text"
                            name="name"
                            v-model="form.name"
                            ref="nameInput"
                            id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nome da empresa"
                        />
                        <InputError
                            v-if="form.errors.name"
                            :message="form.errors.name"
                        />
                    </div>
                    <div>
                        <label
                            for="nome"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Slogan da empresa</label
                        >
                        <input
                            type="text"
                            name="slogan"
                            v-model="form.slogan"
                            ref="sloganInput"
                            id="slogan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Slogan da empresa"
                        />
                        <InputError
                            v-if="form.errors.slogan"
                            :message="form.errors.slogan"
                        />
                    </div>
                    <div class="sm:col-span-2 md:col-span-1">
                        <label
                            for="nome"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Email da empresa</label
                        >
                        <input
                            type="email"
                            name="email"
                            v-model="form.email"
                            ref="emailInput"
                            id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Email da empresa"
                        />
                        <InputError
                            v-if="form.errors.email"
                            :message="form.errors.email"
                        />
                    </div>
                    <div class="sm:col-span-2 md:col-span-3">
                        <label
                            for="content"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Descrição curta sobre a empresa</label
                        >
                        <textarea
                            :maxlength="400"
                            name="content"
                            v-model="form.content"
                            ref="contentInput"
                            id="content"
                            rows="3"
                            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'
                            class="bg-gray-50 row-auto h-auto border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Descrição curta sobre a empresa"
                        />
                        <InputError
                            v-if="form.errors.content"
                            :message="form.errors.content"
                        />
                    </div>
                    <div class="sm:col-span-2 md:col-span-3">
                        <label
                            for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Endereço da empresa</label
                        >
                        <input
                            type="text"
                            name="location"
                            v-model="form.location"
                            ref="locationInput"
                            id="location"
                            class="bg-gray-50 row-auto h-auto border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Endereço da empresa"
                        />
                        <InputError
                            v-if="form.errors.location"
                            :message="form.errors.location"
                        />
                    </div>

                    <div>
                        <label
                            for="facebook"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Link do facebook</label
                        >
                        <input
                            type="text"
                            name="facebook"
                            v-model="form.facebook"
                            ref="facebookInput"
                            id="facebook"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Link do facebook"
                        />
                        <InputError
                            v-if="form.errors.facebook"
                            :message="form.errors.facebook"
                        />
                    </div>
                    <div>
                        <label
                            for="whatsapp"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Link do whatsapp</label
                        >
                        <input
                            type="text"
                            name="whatsapp"
                            v-model="form.whatsapp"
                            ref="whatsappInput"
                            id="whatsapp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Link do whatsapp"
                        />
                        <InputError
                            v-if="form.errors.whatsapp"
                            :message="form.errors.whatsapp"
                        />
                    </div>
                    <div class="sm:col-span-2 md:col-span-1">
                        <label
                            for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Link do instagram</label
                        >
                        <input
                            type="text"
                            name="instagram"
                            v-model="form.instagram"
                            ref="instagramInput"
                            id="instagram"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Link do instagram"
                        />
                        <InputError
                            v-if="form.errors.instagram"
                            :message="form.errors.instagram"
                        />
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Logotipo do slider da página home</label
                        >
                        <UploadImage
                            @update:images="(files:any) => (form.logoMedia = files)"
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Fazer upload da imagem para slider da página home"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files>
                                <UploadedImageCover
                                    v-if="pageDatarefs?.logoMedia"
                                    :image="(pageDatarefs?.logoMedia as App.Data.MediaData)"
                                />
                            </template>
                        </UploadImage>

                        <InputError
                            v-if="form.errors.homeMedia"
                            :message="form.errors.homeMedia"
                        />
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Imagem para slider da página home</label
                        >
                        <UploadImage
                            @update:images="(files:any) => (form.homeMedia = files)"
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Fazer upload da imagem para slider da página home"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files>
                                <UploadedImageCover
                                    v-if="pageDatarefs?.homeMedia"
                                    :image="(pageDatarefs?.homeMedia as App.Data.MediaData)"
                                />
                            </template>
                        </UploadImage>

                        <InputError
                            v-if="form.errors.homeMedia"
                            :message="form.errors.homeMedia"
                        />
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Imagem para slider da página imóveis</label
                        >
                        <UploadImage
                            @update:images="
                                (files:any) => (form.imovelsMedia = files)
                            "
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Imagem para slider da página imóveis"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files>
                                <UploadedImageCover
                                    v-if="pageDatarefs?.imovelsMedia"
                                    :image="(pageDatarefs?.imovelsMedia as App.Data.MediaData)"
                                />
                            </template>
                        </UploadImage>
                        <InputError
                            v-if="form.errors.imovelsMedia"
                            :message="form.errors.imovelsMedia"
                        />
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Imagem para slider da página sobre-nos</label
                        >
                        <UploadImage
                            @update:images="
                                (files:any) => (form.aboutMedia = files)
                            "
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Imagem para slider da página sobre-nos"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files>
                                <UploadedImageCover
                                    v-if="pageDatarefs?.aboutMedia"
                                    :image="(pageDatarefs?.aboutMedia as App.Data.MediaData)"
                                />
                            </template>
                        </UploadImage>
                        <InputError
                            v-if="form.errors.aboutMedia"
                            :message="form.errors.aboutMedia"
                        />
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Imagem para slider da página contacto</label
                        >
                        <UploadImage
                            @update:images="
                                (files:any) => (form.contactMedia = files)
                            "
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Imagem para slider da página contacto"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files>
                                <UploadedImageCover
                                    v-if="pageDatarefs?.contactMedia"
                                    :image="(pageDatarefs?.contactMedia as App.Data.MediaData)"
                                />
                            </template>
                        </UploadImage>
                        <InputError
                            v-if="form.errors.contactMedia"
                            :message="form.errors.contactMedia"
                        />
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Imagem para slider da página termos &
                            condições</label
                        >
                        <UploadImage
                            @update:images="
                                (files:any) => (form.termsMedia = files)
                            "
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Imagem para slider da página termos & condições"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files>
                                <UploadedImageCover
                                    v-if="pageDatarefs?.termsMedia"
                                    :image="(pageDatarefs?.termsMedia as App.Data.MediaData)"
                                />
                            </template>
                        </UploadImage>
                        <InputError
                            v-if="form.errors.termsMedia"
                            :message="form.errors.termsMedia"
                        />
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="instagram"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Imagem para slider da página politicas de
                            privacidade</label
                        >
                        <UploadImage
                            @update:images="
                                (files:any) => (form.policyMedia = files)
                            "
                            :multiple="false"
                            :disabledUpload="true"
                            :disabledCancel="true"
                            label-text="Imagem para slider da página politicas de privacidade"
                            mediaType="image/*"
                            :progressUploadImage="false"
                        >
                            <template v-slot:files>
                                <UploadedImageCover
                                    v-if="pageDatarefs?.policyMedia"
                                    :image="(pageDatarefs?.policyMedia as App.Data.MediaData)"
                                />
                            </template>
                        </UploadImage>
                        <InputError
                            v-if="form.errors.policyMedia"
                            :message="form.errors.policyMedia"
                        />
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
