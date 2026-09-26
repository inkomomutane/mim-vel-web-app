<script lang="ts" setup>
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
import { useForm } from "@inertiajs/vue3";

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
});

const createPropertyCondition = () => {
    form.post(route("management.property-condition.store"), {
        preserveScroll: true,

        onSuccess: () => {
            form.reset();

            props.close();
        },
    });
};
</script>

<template>
    <Dialog :open="openModal" @update:open="close">
        <DialogScrollContent class="sm:max-w-lg">
            <DialogHeader>
                <DialogTitle>
                    {{ t("New Property Condition") }}
                </DialogTitle>
            </DialogHeader>

            <form class="space-y-4" @submit.prevent="createPropertyCondition">
                <div class="space-y-2">
                    <Label for="nome">
                        {{ t("Nome") }}
                    </Label>

                    <Input
                        id="nome"
                        v-model="form.nome"
                        :placeholder="t('Property condition name')"
                        autocomplete="off"
                    />

                    <InputError :message="form.errors.nome" />
                </div>
            </form>

            <DialogFooter>
                <Button
                    :disabled="form.processing"
                    @click="createPropertyCondition"
                >
                    {{ t("Save") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
