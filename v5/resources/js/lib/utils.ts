import { clsx } from 'clsx';
import type { ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';
import PT from "../../../lang/pt.json";
import { createI18n } from 'vue-i18n'
import type { MessageSchema } from '../../../lang/pt.json';
import type { Ref } from 'vue';
import { ref } from 'vue';
import type { Updater } from 'vue';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}
export const i18n = createI18n({
    legacy: false,
    locale: 'PT',
    messages: {
        PT: PT,
    },
})

export const t = (key: keyof MessageSchema): string => {
    return i18n.global.t(key as string);
};
export function valueUpdater<T extends Updater<any>>(updaterOrValue: T, ref: Ref) {
    ref.value = typeof updaterOrValue === 'function' ? updaterOrValue(ref.value) : updaterOrValue;
}
export function crudManager<T>() {
    const isModalOpen = ref(false);
    const model = ref<T | null>();
    const open = (modelValue?: T) => {
        isModalOpen.value = true;
        model.value = modelValue;
    };

    const close = () => {
        model.value = null;
        isModalOpen.value = false;
    };

    return {
        isModalOpen,
        model,
        open,
        close,
    };
}
