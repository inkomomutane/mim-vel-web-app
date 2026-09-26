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

import type {
    IntermediationRuleData,
} from "@/types/generated";

const props = defineProps({
    intermediationRule: {
        type: Object as PropType<IntermediationRuleData>,
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

const deleteIntermediationRule = () => {
    form.delete(
        route(
            "management.intermediation-rule.delete",
            {
                intermediationRule:
                props.intermediationRule.id,
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
                    {{ t("Delete Intermediation Rule") }}
                </DialogTitle>
            </DialogHeader>

            <div
                class="text-muted-foreground py-2 text-sm"
            >
                {{
                    t(
                        "This action will permanently remove the intermediation rule from the system. Are you sure you want to proceed?",
                    )
                }}
            </div>

            <div
                class="bg-muted/30 rounded-md border p-3"
            >
                <div class="text-sm font-medium">
                    {{ intermediationRule.name }}
                </div>

                <div
                    class="text-muted-foreground mt-1 text-xs"
                >
                    {{ intermediationRule.code }}
                    ·
                    {{ intermediationRule.percentage }}%
                </div>
            </div>

            <DialogFooter>
                <Button
                    variant="destructive"
                    :disabled="form.processing"
                    @click="deleteIntermediationRule"
                >
                    {{ t("Delete") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
