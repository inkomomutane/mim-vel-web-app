<script lang="ts" setup>
import axios from 'axios';
import {
    onMounted,
    ref,
    watchEffect,
} from 'vue';

import { useForm } from '@inertiajs/vue3';

import InputError from '@/components/InputError.vue';
import FormSkeleton from '@/components/app/Skeletons/FormSkeleton.vue';

import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogFooter,
    DialogHeader,
    DialogScrollContent,
    DialogTitle,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

import { t } from '@/lib/utils';

import type {
    StatusData,
} from '@/types/generated';

const props = defineProps({
    status: {
        type: Number,
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

const loaded = ref(false);

const form = useForm<StatusData>({
    id: null,
    nome: '',
});

watchEffect(() => {
    if (!props.openModal) {
        loaded.value = false;
    }
});

const loadStatus = async () => {
    loaded.value = false;

    try {
        const response =
            await axios.get<StatusData>(
                route(
                    'management.status.json',
                    {
                        status: props.status,
                    },
                ),
            );

        form.id =
            response.data.id ?? null;

        form.nome =
            response.data.nome ?? '';
    } catch (error) {
        console.error(
            'Error loading status:',
            error,
        );
    } finally {
        loaded.value = true;
    }
};

onMounted(loadStatus);

const updateStatus = () => {
    form.patch(
        route(
            'management.status.update',
            {
                status: props.status,
            },
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
                    {{ t('Edit Status') }}
                </DialogTitle>
            </DialogHeader>

            <FormSkeleton
                v-if="!loaded"
            />

            <form
                v-else
                class="space-y-4"
                @submit.prevent="
                    updateStatus
                "
            >
                <div class="space-y-2">
                    <Label for="nome">
                        {{ t('Nome') }}
                    </Label>

                    <Input
                        id="nome"
                        v-model="form.nome"
                        :placeholder="
                            t('Status name')
                        "
                    />

                    <InputError
                        :message="
                            form.errors.nome
                        "
                    />
                </div>
            </form>

            <DialogFooter>
                <Button
                    :disabled="
                        form.processing
                        || !loaded
                    "
                    @click="updateStatus"
                >
                    {{ t('Update') }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
