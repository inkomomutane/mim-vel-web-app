<script lang="ts" setup>
import type { PropType } from "vue";
import { useForm } from "@inertiajs/vue3";

import { Button } from "@/components/ui/button";
import {
    Dialog,
    DialogFooter,
    DialogHeader,
    DialogScrollContent,
    DialogTitle,
} from "@/components/ui/dialog";

import { t } from "@/lib/utils";
import type { TransactionTypeData } from "@/types/generated";

const props = defineProps({
    propertyFor: {
        type: Object as PropType<TransactionTypeData>,
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

const deletePropertyFor = () => {
    form.delete(
        route(
            "management.property-for.delete",
            {
                propertyFor:
                props.propertyFor.id,
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
                    {{ t("Delete Transaction Type") }}
                </DialogTitle>
            </DialogHeader>

            <div
                class="text-muted-foreground py-2 text-sm"
            >
                {{
                    t(
                        "This action will permanently remove the transaction type from the system. Are you sure you want to proceed?",
                    )
                }}
            </div>

            <div
                class="bg-muted/30 rounded-md border p-3"
            >
                <span class="text-sm font-medium">
                    {{ propertyFor.name }}
                </span>

                <span
                    class="text-muted-foreground ml-2 text-xs"
                >
                    {{ propertyFor.slug_text }}
                </span>
            </div>

            <DialogFooter>
                <Button
                    variant="destructive"
                    :disabled="form.processing"
                    @click="deletePropertyFor"
                >
                    {{ t("Delete") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
