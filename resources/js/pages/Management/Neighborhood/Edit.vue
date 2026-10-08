<script lang="ts" setup>
import axios from "axios";

import {
    onMounted,
    ref,
    watchEffect,
} from "vue";

import {
    useForm,
} from "@inertiajs/vue3";

import InputError from "@/components/InputError.vue";

import FormSkeleton from "@/components/app/Skeletons/FormSkeleton.vue";

import {
    Button,
} from "@/components/ui/button";

import {
    Dialog,
    DialogFooter,
    DialogHeader,
    DialogScrollContent,
    DialogTitle,
} from "@/components/ui/dialog";

import {
    Input,
} from "@/components/ui/input";

import {
    Label,
} from "@/components/ui/label";

import {
    t,
} from "@/lib/utils";

import type {
    CityData,
    NeighborhoodData,
} from "@/types/generated";
import AsyncSelect from "@/components/app/Select/AsyncSelect.vue";

const props = defineProps({
    neighborhood: {
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

const loaded =
    ref(false);

const form =
    useForm<NeighborhoodData>({
        id: null,

        name: "",

        city_id: null,

        city_name: null,

        province_name: null,
    });

watchEffect(() => {
    if (
        !props.openModal
    ) {
        loaded.value = false;
    }
});

const loadNeighborhood =
    async () => {
        loaded.value = false;

        try {
            const response =
                await axios.get<NeighborhoodData>(
                    route(
                        "management.neighborhood.json",
                        {
                            neighborhood:
                            props.neighborhood,
                        },
                    ),
                );

            form.id =
                response.data.id ??
                null;

            form.name =
                response.data.name ??
                "";

            form.city_id =
                response.data.city_id ??
                null;

            form.city_name =
                response.data.city_name ??
                null;

            form.province_name =
                response.data.province_name ??
                null;
        } catch (error) {
            console.error(
                "Error loading neighborhood:",
                error,
            );
        } finally {
            loaded.value = true;
        }
    };

onMounted(
    loadNeighborhood
);

const updateNeighborhood =
    () => {
        form.patch(
            route(
                "management.neighborhood.update",
                {
                    neighborhood:
                    props.neighborhood,
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
        <DialogScrollContent
            class="sm:max-w-lg"
        >
            <DialogHeader>
                <DialogTitle>
                    {{
                        t(
                            "Edit Neighborhood"
                        )
                    }}
                </DialogTitle>
            </DialogHeader>

            <FormSkeleton
                v-if="!loaded"
            />

            <form
                v-else
                class="space-y-4"
                @submit.prevent="
                    updateNeighborhood
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
                        form.processing ||
                        !loaded
                    "
                    @click="
                        updateNeighborhood
                    "
                >
                    {{ t("Update") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
