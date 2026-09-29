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
    NeighborhoodData,
} from "@/types/generated";

const props = defineProps({
    neighborhood: {
        type: Object as PropType<NeighborhoodData>,
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

const form =
    useForm({});

const deleteNeighborhood =
    () => {
        form.delete(
            route(
                "management.neighborhood.delete",
                {
                    neighborhood:
                    props.neighborhood
                        .id,
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
        <DialogScrollContent
            class="sm:max-w-lg"
        >
            <DialogHeader>
                <DialogTitle>
                    {{
                        t(
                            "Delete Neighborhood"
                        )
                    }}
                </DialogTitle>
            </DialogHeader>

            <div
                class="text-muted-foreground py-2 text-sm"
            >
                {{
                    t(
                        "This action will permanently remove the neighborhood from the system. Are you sure you want to proceed?",
                    )
                }}
            </div>

            <div
                class="bg-muted/30 rounded-md border p-3"
            >
                <div
                    class="text-sm font-medium"
                >
                    {{
                        neighborhood.nome
                    }}
                </div>

                <div
                    v-if="
                        neighborhood.city_name
                    "
                    class="text-muted-foreground mt-1 text-xs"
                >
                    {{
                        neighborhood.city_name
                    }}

                    <template
                        v-if="
                            neighborhood.province_name
                        "
                    >
                        ·
                        {{
                            neighborhood.province_name
                        }}
                    </template>
                </div>
            </div>

            <DialogFooter>
                <Button
                    variant="destructive"
                    :disabled="
                        form.processing
                    "
                    @click="
                        deleteNeighborhood
                    "
                >
                    {{ t("Delete") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
