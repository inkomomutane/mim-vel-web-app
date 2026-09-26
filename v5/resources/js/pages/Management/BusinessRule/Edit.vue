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
    BusinessRuleData,
} from "@/types/generated";

const props = defineProps({
    businessRule: {
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

const form = useForm<BusinessRuleData>({
    id: null,
    name: "",
});

watchEffect(() => {
    if (!props.openModal) {
        loaded.value = false;
    }
});

const loadBusinessRule = async () => {
    loaded.value = false;

    try {
        const response =
            await axios.get<BusinessRuleData>(
                route(
                    "management.business-rule.json",
                    {
                        businessRule:
                        props.businessRule,
                    },
                ),
            );

        form.id =
            response.data.id ?? null;

        form.name =
            response.data.name ?? "";
    } catch (error) {
        console.error(
            "Error loading business rule:",
            error,
        );
    } finally {
        loaded.value = true;
    }
};

onMounted(loadBusinessRule);

const updateBusinessRule = () => {
    form.patch(
        route(
            "management.business-rule.update",
            {
                businessRule:
                props.businessRule,
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
                    {{ t("Edit Business Rule") }}
                </DialogTitle>
            </DialogHeader>

            <FormSkeleton v-if="!loaded" />

            <form
                v-else
                class="space-y-4"
                @submit.prevent="updateBusinessRule"
            >
                <div class="space-y-2">
                    <Label for="name">
                        {{ t("Name") }}
                    </Label>

                    <Input
                        id="name"
                        v-model="form.name"
                        :placeholder="
                            t('Business rule name')
                        "
                    />

                    <InputError
                        :message="
                            form.errors.name
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
                        updateBusinessRule
                    "
                >
                    {{ t("Update") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
