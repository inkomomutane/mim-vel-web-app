<script lang="ts" setup>
import type {
    PropType,
} from "vue";

import {
    useForm,
} from "@inertiajs/vue3";

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
    t,
} from "@/lib/utils";

import type {
    BusinessRuleData,
} from "@/types/generated";

const props = defineProps({
    businessRule: {
        type: Object as PropType<BusinessRuleData>,
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

const form = useForm({});

const deleteBusinessRule = () => {
    form.delete(
        route(
            "management.business-rule.delete",
            {
                businessRule:
                props.businessRule.id,
            },
        ),
        {
            preserveScroll: true,

            onSuccess: () => {
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
                    {{ t("Delete Business Rule") }}
                </DialogTitle>
            </DialogHeader>

            <div
                class="text-muted-foreground py-2 text-sm"
            >
                {{
                    t(
                        "This action will permanently remove the business rule from the system. Are you sure you want to proceed?",
                    )
                }}
            </div>

            <div
                class="bg-muted/30 rounded-md border p-3"
            >
                <span class="text-sm font-medium">
                    {{ businessRule.name }}
                </span>
            </div>

            <DialogFooter>
                <Button
                    variant="destructive"
                    :disabled="
                        form.processing
                    "
                    @click="
                        deleteBusinessRule
                    "
                >
                    {{ t("Delete") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
