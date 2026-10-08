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
    CityData,
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
    name: "",

    city_id:
        null as number | null,
});

const createNeighborhood = () => {
    form.post(
        route(
            "management.neighborhood.store"
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
        <DialogScrollContent
            class="sm:max-w-lg"
        >
            <DialogHeader>
                <DialogTitle>
                    {{
                        t(
                            "New Neighborhood"
                        )
                    }}
                </DialogTitle>
            </DialogHeader>

            <form
                class="space-y-4"
                @submit.prevent="
                    createNeighborhood
                "
            >
                <div class="space-y-2">
                    <Label for="name">
                        {{ t("Name") }}
                    </Label>

                    <Input
                        id="name"
                        v-model="
                            form.name
                        "
                        :placeholder="
                            t(
                                'Neighborhood name'
                            )
                        "
                        autocomplete="off"
                    />

                    <InputError
                        :message="
                            form.errors.name
                        "
                    />
                </div>

                <div class="space-y-2">
                    <Label>
                        {{ t("City") }}
                    </Label>

                    <AsyncSelect
                        v-model="
                            form.city_id
                        "
                        :mapper="
                            (item) => {
                                return {
                                    id:
                                        item.id,

                                    title:
                                        item.name,

                                    subtitle:
                                        item.province_name ||
                                        '',

                                    slug:
                                        '',

                                    notes:
                                        '',

                                    trailer:
                                        '',
                                };
                            }
                        "
                        selected-key="id"
                        route-name="management.city.list.json"
                        :get-label="
                            (
                                city: CityData,
                            ) =>
                                city.province_name
                                    ? `${city.name} - ${city.province_name}`
                                    : city.name
                        "
                        :reduce="
                            (
                                city: CityData,
                            ) =>
                                city.id
                        "
                        class="rounded"
                    />

                    <InputError
                        :message="
                            form.errors.city_id
                        "
                    />
                </div>
            </form>

            <DialogFooter>
                <Button
                    :disabled="
                        form.processing
                    "
                    @click="
                        createNeighborhood
                    "
                >
                    {{ t("Save") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
