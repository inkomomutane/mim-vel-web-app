<script lang="ts" setup>
import type {
    PropType,
} from 'vue';

import {
    useForm,
} from '@inertiajs/vue3';

import { Button } from '@/components/ui/button';

import {
    Dialog,
    DialogFooter,
    DialogHeader,
    DialogScrollContent,
    DialogTitle,
} from '@/components/ui/dialog';

import { t } from '@/lib/utils';

import type {
    PropertyConditionData,
} from '@/types/generated';

const props = defineProps({
    propertyCondition: {
        type: Object as PropType<PropertyConditionData>,
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

const deletePropertyCondition =
    () => {
        form.delete(
            route(
                'management.property-condition.delete',
                {
                    propertyCondition:
                    props.propertyCondition.id,
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
                    {{
                        t(
                            'Delete Property Condition',
                        )
                    }}
                </DialogTitle>
            </DialogHeader>

            <div
                class="py-2 text-sm text-muted-foreground"
            >
                {{
                    t(
                        'This action will permanently remove the property condition from the system. Are you sure you want to proceed?',
                    )
                }}
            </div>

            <div
                class="rounded-md border bg-muted/30 p-3"
            >
                <span
                    class="text-sm font-medium"
                >
                    {{
                        propertyCondition.nome
                    }}
                </span>
            </div>

            <DialogFooter>
                <Button
                    variant="destructive"
                    :disabled="
                        form.processing
                    "
                    @click="
                        deletePropertyCondition
                    "
                >
                    {{ t('Delete') }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
