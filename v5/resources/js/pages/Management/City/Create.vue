<script lang="ts" setup>
import { useForm } from "@inertiajs/vue3";


import InputError from "@/components/InputError.vue";

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
    ProvinceData,
} from "@/types/generated";
import AsyncSelect from "@/components/app/Select/AsyncSelect.vue";

const props = defineProps({
    close: {
        type: Function,
        required: true,
    },

    openModal: {
        type: Boolean,
        required: true,
    },
});

const form = useForm({
    nome: "",
    province_id: null as number | null,
});

const createCity = () => {
    form.post(
        route(
            "management.city.store"
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
                    {{ t("New City") }}
                </DialogTitle>
            </DialogHeader>

            <form
                class="space-y-4"
                @submit.prevent="createCity"
            >
                <div class="space-y-2">
                    <Label for="nome">
                        {{ t("Name") }}
                    </Label>

                    <Input
                        id="nome"
                        v-model="form.nome"
                        :placeholder="t('City name')"
                        autocomplete="off"
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
                    :disabled="form.processing"
                    @click="createCity"
                >
                    {{ t("Save") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
