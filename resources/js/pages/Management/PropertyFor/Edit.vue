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
import type { TransactionTypeData } from "@/types/generated";

const props = defineProps({
    propertyFor: {
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

const form = useForm<TransactionTypeData>({
    id: null,
    name: "",
    slug_text: "",
});

watchEffect(() => {
    if (!props.openModal) {
        loaded.value = false;
    }
});

const loadPropertyFor = async () => {
    loaded.value = false;

    try {
        const response =
            await axios.get<TransactionTypeData>(
                route(
                    "management.property-for.json",
                    {
                        propertyFor:
                        props.propertyFor,
                    },
                ),
            );

        form.id =
            response.data.id ?? null;

        form.name =
            response.data.name ?? "";

        form.slug_text =
            response.data.slug_text ?? "";
    } catch (error) {
        console.error(
            "Error loading transaction type:",
            error,
        );
    } finally {
        loaded.value = true;
    }
};

onMounted(loadPropertyFor);

const updatePropertyFor = () => {
    form.patch(
        route(
            "management.property-for.update",
            {
                propertyFor:
                props.propertyFor,
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
                    {{ t("Edit Transaction Type") }}
                </DialogTitle>
            </DialogHeader>

            <FormSkeleton v-if="!loaded" />

            <form
                v-else
                class="space-y-4"
                @submit.prevent="updatePropertyFor"
            >
                <div class="space-y-2">
                    <Label for="name">
                        {{ t("Name") }}
                    </Label>

                    <Input
                        id="name"
                        v-model="form.name"
                        :placeholder="t('Transaction type name')"
                    />

                    <InputError
                        :message="form.errors.name"
                    />
                </div>

                <div class="space-y-2">
                    <Label for="slug_text">
                        {{ t("Slug") }}
                    </Label>

                    <Input
                        id="slug_text"
                        v-model="form.slug_text"
                        :placeholder="t('Slug')"
                    />

                    <InputError
                        :message="form.errors.slug_text"
                    />
                </div>
            </form>

            <DialogFooter>
                <Button
                    :disabled="
                        form.processing ||
                        !loaded
                    "
                    @click="updatePropertyFor"
                >
                    {{ t("Update") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
