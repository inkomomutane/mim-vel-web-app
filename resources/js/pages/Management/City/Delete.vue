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
    CityData,
} from "@/types/generated";

const props = defineProps({
    city: {
        type: Object as PropType<CityData>,
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

const deleteCity = () => {
    form.delete(
        route(
            "management.city.delete",
            {
                city: props.city.id,
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
                    {{ t("Delete City") }}
                </DialogTitle>
            </DialogHeader>

            <div
                class="text-muted-foreground py-2 text-sm"
            >
                {{
                    t(
                        "This action will permanently remove the city from the system. Are you sure you want to proceed?",
                    )
                }}
            </div>

            <div
                class="bg-muted/30 rounded-md border p-3"
            >
                <div class="text-sm font-medium">
                    {{ city.nome }}
                </div>

                <div
                    v-if="city.province_name"
                    class="text-muted-foreground mt-1 text-xs"
                >
                    {{ city.province_name }}
                </div>
            </div>

            <DialogFooter>
                <Button
                    variant="destructive"
                    :disabled="form.processing"
                    @click="deleteCity"
                >
                    {{ t("Delete") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
