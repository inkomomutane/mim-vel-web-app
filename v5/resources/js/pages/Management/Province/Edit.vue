<script lang="ts" setup>
import axios from "axios";
import { onMounted, ref, watchEffect } from "vue";
import { useForm } from "@inertiajs/vue3";

import InputError from "@/components/InputError.vue";
import FormSkeleton from "@/components/app/Skeletons/FormSkeleton.vue";

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
import type { ProvinceData } from "@/types/generated";

const props = defineProps({
    province: {
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

const form = useForm<ProvinceData>({
    id: null,
    name: "",
});

watchEffect(() => {
    if (!props.openModal) {
        loaded.value = false;
    }
});

const loadProvince = async () => {
    loaded.value = false;

    try {
        const response = await axios.get<ProvinceData>(
            route("management.province.json", {
                province: props.province,
            }),
        );

        form.id = response.data.id ?? null;
        form.name = response.data.name ?? "";
    } catch (error) {
        console.error("Error loading province:", error);
    } finally {
        loaded.value = true;
    }
};

onMounted(loadProvince);

const updateProvince = () => {
    form.patch(
        route("management.province.update", {
            province: props.province,
        }),
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
    <Dialog :open="openModal" @update:open="close">
        <DialogScrollContent class="sm:max-w-lg">
            <DialogHeader>
                <DialogTitle>
                    {{ t("Edit Province") }}
                </DialogTitle>
            </DialogHeader>

            <FormSkeleton v-if="!loaded" />

            <form v-else class="space-y-4" @submit.prevent="updateProvince">
                <div class="space-y-2">
                    <Label for="name">
                        {{ t("Name") }}
                    </Label>

                    <Input
                        id="name"
                        v-model="form.name"
                        :placeholder="t('Province name')"
                    />

                    <InputError :message="form.errors.name" />
                </div>
            </form>

            <DialogFooter>
                <Button
                    :disabled="form.processing || !loaded"
                    @click="updateProvince"
                >
                    {{ t("Update") }}
                </Button>
            </DialogFooter>
        </DialogScrollContent>
    </Dialog>
</template>
