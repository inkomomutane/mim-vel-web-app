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
import type { ProvinceData } from "@/types/generated";

const props = defineProps({
    province: {
        type: Object as PropType<ProvinceData>,
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

const deleteProvince = () => {
    form.delete(
        route("management.province.delete", {
            province: props.province.id,
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
                    {{ t("Delete Province") }}
                </DialogTitle>
            </DialogHeader>

            <div class="text-muted-foreground py-2 text-sm">
                {{
                    t(
                        "This action will permanently remove the province from the system. Are you sure you want to proceed?",
                    )
                }}
            </div>

            <div class="bg-muted/30 rounded-md border p-3">
                <span class="text-sm font-medium">
                    {{ province.name }}
                </span>
            </div>

            <DialogFooter>
                <Button
                    variant="destructive"
                    :disabled="form.processing"
                    @click="deleteProvince"
                >
                    {{ t("Delete") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
