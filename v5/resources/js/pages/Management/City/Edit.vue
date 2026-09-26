<script lang="ts" setup>
import axios from "axios";

import {
    onMounted,
    ref,
    watchEffect,
} from "vue";

import { useForm } from "@inertiajs/vue3";

import InputError from "@/components/InputError.vue";
import FormSkeleton from "@/components/app/Skeletons/FormSkeleton.vue";

import { Button } from "@/components/ui/button";
import {
    Dialog,
    DialogFooter,
    DialogHeader,
    DialogScrollContent,
    DialogTitle,
} from "@/components/ui/dialog";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";

import { t } from "@/lib/utils";

import type {
    CityData,
    ProvinceData,
} from "@/types/generated";
import AsyncSelect from "@/components/app/Select/AsyncSelect.vue";

const props = defineProps({
    city: {
        type: Number,
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

const loaded = ref(false);

const form = useForm<CityData>({
    id: null,
    nome: "",
    province_id: null,
    province_name: null,
});

watchEffect(() => {
    if (!props.openModal) {
        loaded.value = false;
    }
});

const loadCity = async () => {
    loaded.value = false;

    try {
        const response =
            await axios.get<CityData>(
                route(
                    "management.city.json",
                    {
                        city: props.city,
                    },
                ),
            );

        form.id =
            response.data.id ?? null;

        form.nome =
            response.data.nome ?? "";

        form.province_id =
            response.data.province_id ?? null;

        form.province_name =
            response.data.province_name ?? null;
    } catch (error) {
        console.error(
            "Error loading city:",
            error,
        );
    } finally {
        loaded.value = true;
    }
};

onMounted(loadCity);

const updateCity = () => {
    form.patch(
        route(
            "management.city.update",
            {
                city: props.city,
            },
        ),
        {
            preserveScroll: true,

            onSuccess: () => {
                form.reset();

                props.close();
            },
        },
    );
};
</script>

<template>
    <Dialog
        :open="openModal"
        @update:open="close"
    >
        <DialogScrollContent class="sm:max-w-lg">
            <DialogHeader>
                <DialogTitle>
                    {{ t("Edit City") }}
                </DialogTitle>
            </DialogHeader>

            <FormSkeleton v-if="!loaded" />

            <form
                v-else
                class="space-y-4"
                @submit.prevent="updateCity"
            >
                <div class="space-y-2">
                    <Label for="nome">
                        {{ t("Name") }}
                    </Label>

                    <Input
                        id="nome"
                        v-model="form.nome"
                        :placeholder="t('City name')"
                    />

                    <InputError
                        :message="form.errors.nome"
                    />
                </div>

                <div class="space-y-2">
                    <Label>
                        {{ t("Province") }}
                    </Label>

                    <AsyncSelect
                        v-model="form.province_id"
                        :mapper="
                            (item) => {
                                return {
                                    id: item.id,
                                    title: item.name,
                                    subtitle: '',
                                    slug: '',
                                    notes: '',
                                    trailer: '',
                                };
                            }
                        "
                        selected-key="id"
                        route-name="management.province.list.json"
                        :get-label="
                            (province: ProvinceData) =>
                                province.name
                        "
                        :reduce="
                            (province: ProvinceData) =>
                                province.id
                        "
                        class="rounded"
                    />

                    <InputError
                        :message="form.errors.province_id"
                    />
                </div>
            </form>

            <DialogFooter>
                <Button
                    :disabled="
                        form.processing ||
                        !loaded
                    "
                    @click="updateCity"
                >
                    {{ t("Update") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
