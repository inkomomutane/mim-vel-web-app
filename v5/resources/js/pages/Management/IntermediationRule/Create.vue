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
import {
    NumberField,
    NumberFieldContent,
    NumberFieldDecrement,
    NumberFieldIncrement,
    NumberFieldInput,
} from "@/components/ui/number-field";

import { t } from "@/lib/utils";

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
    code: "",
    percentage: 0,
});

const createIntermediationRule = () => {
    form.post(
        route(
            "management.intermediation-rule.store"
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
                    {{ t("New Intermediation Rule") }}
                </DialogTitle>
            </DialogHeader>

            <form
                class="space-y-4"
                @submit.prevent="createIntermediationRule"
            >
                <div class="space-y-2">
                    <Label for="name">
                        {{ t("Name") }}
                    </Label>

                    <Input
                        id="name"
                        v-model="form.name"
                        :placeholder="t('Rule name')"
                        autocomplete="off"
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
                        autocomplete="off"
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
                    :disabled="form.processing"
                    @click="createIntermediationRule"
                >
                    {{ t("Save") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
