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
});

const createBusinessRule = () => {
    form.post(
        route(
            "management.business-rule.store"
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
                    {{ t("New Business Rule") }}
                </DialogTitle>
            </DialogHeader>

            <form
                class="space-y-4"
                @submit.prevent="createBusinessRule"
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
                        autocomplete="off"
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
                        form.processing
                    "
                    @click="
                        createBusinessRule
                    "
                >
                    {{ t("Save") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
