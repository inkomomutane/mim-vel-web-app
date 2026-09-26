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

import type { StatusData } from "@/types/generated";

const props = defineProps({
    status: {
        type: Object as PropType<StatusData>,
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

const deleteStatus = () => {
    form.delete(
        route("management.status.delete", {
            status: props.status.id,
        }),
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
    <Dialog :open="openModal" @update:open="close">
        <DialogScrollContent class="sm:max-w-lg">
            <DialogHeader>
                <DialogTitle>
                    {{ t("Delete Status") }}
                </DialogTitle>
            </DialogHeader>

            <div class="text-muted-foreground py-2 text-sm">
                {{
                    t(
                        "This action will permanently remove the status from the system. Are you sure you want to proceed?",
                    )
                }}
            </div>

            <div class="bg-muted/30 rounded-md border p-3">
                <span class="text-sm font-medium">
                    {{ status.nome }}
                </span>
            </div>

            <DialogFooter>
                <Button
                    variant="destructive"
                    :disabled="form.processing"
                    @click="deleteStatus"
                >
                    {{ t("Delete") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
