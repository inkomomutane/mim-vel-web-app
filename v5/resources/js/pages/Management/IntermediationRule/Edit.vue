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
import {
    NumberField,
    NumberFieldContent,
    NumberFieldDecrement,
    NumberFieldIncrement,
    NumberFieldInput,
} from "@/components/ui/number-field";

import { t } from "@/lib/utils";

import type {
    IntermediationRuleData,
} from "@/types/generated";

const props = defineProps({
    intermediationRule: {
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

const form = useForm<IntermediationRuleData>({
    id: null,
    name: "",
    code: "",
    percentage: 0,
});

watchEffect(() => {
    if (!props.openModal) {
        loaded.value = false;
    }
});

const loadIntermediationRule = async () => {
    loaded.value = false;

    try {
        const response =
            await axios.get<IntermediationRuleData>(
                route(
                    "management.intermediation-rule.json",
                    {
                        intermediationRule:
                        props.intermediationRule,
                    },
                ),
            );

        form.id =
            response.data.id ?? null;

        form.name =
            response.data.name ?? "";

        form.code =
            response.data.code ?? "";

        form.percentage =
            Number(
                response.data.percentage ?? 0
            );
    } catch (error) {
        console.error(
            "Error loading intermediation rule:",
            error,
        );
    } finally {
        loaded.value = true;
    }
};

onMounted(loadIntermediationRule);

const updateIntermediationRule = () => {
    form.patch(
        route(
            "management.intermediation-rule.update",
            {
                intermediationRule:
                props.intermediationRule,
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
                    {{ t("Edit Intermediation Rule") }}
                </DialogTitle>
            </DialogHeader>

            <FormSkeleton v-if="!loaded" />

            <form
                v-else
                class="space-y-4"
                @submit.prevent="updateIntermediationRule"
            >
                <div class="space-y-2">
                    <Label for="name">
                        {{ t("Name") }}
                    </Label>

                    <Input
                        id="name"
                        v-model="form.name"
                        :placeholder="t('Rule name')"
                    />

                    <InputError
                        :message="form.errors.name"
                    />
                </div>

                <div class="space-y-2">
                    <Label for="code">
                        {{ t("Code") }}
                    </Label>

                    <Input
                        id="code"
                        v-model="form.code"
                        :placeholder="t('Rule code')"
                    />

                    <InputError
                        :message="form.errors.code"
                    />
                </div>

                <div class="space-y-2">
                    <Label for="percentage">
                        {{ t("Percentage") }}
                    </Label>

                    <NumberField
                        id="percentage"
                        v-model="form.percentage"
                        :min="0"
                        :max="100"
                        :step="1"
                    >
                        <NumberFieldContent>
                            <NumberFieldDecrement />

                            <NumberFieldInput />

                            <NumberFieldIncrement />
                        </NumberFieldContent>
                    </NumberField>

                    <InputError
                        :message="form.errors.percentage"
                    />
                </div>
            </form>

            <DialogFooter>
                <Button
                    :disabled="
                        form.processing ||
                        !loaded
                    "
                    @click="updateIntermediationRule"
                >
                    {{ t("Update") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
