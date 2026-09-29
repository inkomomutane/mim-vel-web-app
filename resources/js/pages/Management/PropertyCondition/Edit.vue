<script lang="ts" setup>
import axios from "axios";
import { onMounted, ref, watchEffect } from "vue";

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

import type { PropertyConditionData } from "@/types/generated";

const props = defineProps({
    propertyCondition: {
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

const form = useForm<PropertyConditionData>({
    id: null,
    nome: "",
});

watchEffect(() => {
    if (!props.openModal) {
        loaded.value = false;
    }
});

const loadPropertyCondition = async () => {
    loaded.value = false;

    try {
        const response = await axios.get<PropertyConditionData>(
            route("management.property-condition.json", {
                propertyCondition: props.propertyCondition,
            }),
        );

        form.id = response.data.id ?? null;

        form.nome = response.data.nome ?? "";
    } catch (error) {
        console.error("Error loading property condition:", error);
    } finally {
        loaded.value = true;
    }
};

onMounted(loadPropertyCondition);

const updatePropertyCondition = () => {
    form.patch(
        route("management.property-condition.update", {
            propertyCondition: props.propertyCondition,
        }),
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
    <Dialog :open="openModal" @update:open="close">
        <DialogScrollContent class="sm:max-w-lg">
            <DialogHeader>
                <DialogTitle>
                    {{ t("Edit Property Condition") }}
                </DialogTitle>
            </DialogHeader>

            <FormSkeleton v-if="!loaded" />

            <form
                v-else
                class="space-y-4"
                @submit.prevent="updatePropertyCondition"
            >
                <div class="space-y-2">
                    <Label for="nome">
                        {{ t("Nome") }}
                    </Label>

                    <Input
                        id="nome"
                        v-model="form.nome"
                        :placeholder="t('Property condition name')"
                    />

                    <InputError :message="form.errors.nome" />
                </div>
            </form>

            <DialogFooter>
                <Button
                    :disabled="form.processing || !loaded"
                    @click="updatePropertyCondition"
                >
                    {{ t("Update") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
