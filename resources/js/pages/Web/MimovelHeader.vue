<script setup lang="ts">
import {
    computed,
    onMounted,
    ref,
} from 'vue';

import { router } from '@inertiajs/vue3';
import logo from "@/images/logo/logo.png"

import {
    Building2,
    Check,
    ChevronDown,
    Globe2,
    MapPin,
    Menu,
    Search,
} from '@lucide/vue';

import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Separator } from '@/components/ui/separator';

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover';

import ToggleTheme from '@/components/toggle-theme.vue';

/*
|--------------------------------------------------------------------------
| Search
|--------------------------------------------------------------------------
*/

const locations = [
    'Maputo',
    'Matola',
    'Beira',
    'Nampula',
    'Tete',
    'Chimoio',
];

const propertyTypes = [
    'Apartamento',
    'Casa',
    'Vivenda',
    'Terreno',
    'Hotel',
    'Escritório',
    'Loja',
];

const location = ref<string | null>(null);
const propertyType = ref<string | null>(null);

const minPrice = ref<number | null>(null);
const maxPrice = ref<number | null>(null);

const priceLabel = computed(() => {
    if (!minPrice.value && !maxPrice.value) {
        return 'Pricing';
    }

    const format = (value: number) =>
        new Intl.NumberFormat('pt-MZ').format(value);

    if (minPrice.value && maxPrice.value) {
        return `${format(minPrice.value)} – ${format(maxPrice.value)} MT`;
    }

    if (minPrice.value) {
        return `From ${format(minPrice.value)} MT`;
    }

    return `Up to ${format(maxPrice.value!)} MT`;
});

const search = () => {
    router.get(
        '/imoveis',
        {
            location: location.value,
            type: propertyType.value,
            min_price: minPrice.value,
            max_price: maxPrice.value,
        },
        {
            preserveState: true,
            preserveScroll: true,
        },
    );
};

/*
|--------------------------------------------------------------------------
| Language
|--------------------------------------------------------------------------
*/

interface Language {
    label: string;
    region: string;
    code: string;
}

const languages: Language[] = [
    {
        label: 'Português',
        region: 'Moçambique',
        code: 'pt',
    },
    {
        label: 'English',
        region: 'United Kingdom',
        code: 'en',
    },
    {
        label: 'English',
        region: 'United States',
        code: 'en',
    },
    {
        label: 'Português',
        region: 'Portugal',
        code: 'pt',
    },
    {
        label: 'Français',
        region: 'France',
        code: 'fr',
    },
    {
        label: 'Español',
        region: 'España',
        code: 'es',
    },
];

const selectedLanguage = ref('pt');

const selectedLanguageLabel = computed(() => {
    return (
        languages.find(
            (language) =>
                language.code ===
                selectedLanguage.value,
        )?.code.toUpperCase() ?? 'PT'
    );
});

/*
|--------------------------------------------------------------------------
| Google Translate
|--------------------------------------------------------------------------
*/

declare global {
    interface Window {
        google?: {
            translate?: {
                TranslateElement: new (
                    options: Record<
                        string,
                        unknown
                    >,
                    elementId: string,
                ) => void;
            };
        };

        googleTranslateElementInit?: () => void;
    }
}

const translatorReady = ref(false);

function initialiseGoogleTranslate() {
    if (
        !window.google?.translate
            ?.TranslateElement
    ) {
        return;
    }

    const container =
        document.getElementById(
            'google_translate_element',
        );

    if (!container) {
        return;
    }

    // Prevent duplicate initialisation.
    if (
        container.querySelector(
            '.goog-te-combo',
        )
    ) {
        translatorReady.value = true;

        return;
    }

    new window.google.translate.TranslateElement(
        {
            pageLanguage: 'pt',

            includedLanguages:
                'pt,en,fr,es',

            autoDisplay: false,
        },
        'google_translate_element',
    );

    translatorReady.value = true;
}

function loadGoogleTranslate() {
    if (
        window.google?.translate
            ?.TranslateElement
    ) {
        initialiseGoogleTranslate();

        return;
    }

    window.googleTranslateElementInit =
        initialiseGoogleTranslate;

    const existingScript =
        document.querySelector<HTMLScriptElement>(
            'script[data-google-translate]',
        );

    if (existingScript) {
        return;
    }

    const script =
        document.createElement('script');

    script.src =
        'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';

    script.async = true;
    script.defer = true;

    script.dataset.googleTranslate =
        'true';

    document.head.appendChild(script);
}

function translate(language: Language) {
    selectedLanguage.value =
        language.code;

    const select =
        document.querySelector<HTMLSelectElement>(
            '.goog-te-combo',
        );

    if (!select) {
        return;
    }

    select.value = language.code;

    select.dispatchEvent(
        new Event('change', {
            bubbles: true,
        }),
    );
}

onMounted(() => {
    loadGoogleTranslate();
});
</script>

<template>
    <!--
        Google Translate exists only as the translation engine.

        The user interacts with our Shadcn dropdown instead.
    -->
    <div
        id="google_translate_element"
        class="google-translate-element"
        aria-hidden="true"
    />

    <header
        class="sticky inset-x-0 z-50 h-[62px] border-b bg-background/65 backdrop-blur"
        style="
            top: var(
                --app-header-top,
                0px
            );
        "
    >
        <div
            class="relative mx-auto flex h-full w-full max-w-372 items-center justify-between px-6 lg:px-8 2xl:px-12"
        >
            <!-- ============================================== -->
            <!-- Logo -->
            <!-- ============================================== -->

            <a
                href="/"
                class="flex shrink-0 items-center"
            >
                <img
                    :src="logo"
                    alt="Mimóvel"
                    class="h-8 w-auto"
                />
            </a>

            <!-- ============================================== -->
            <!-- Right side -->
            <!-- ============================================== -->

            <div
                class="-mr-2 ml-auto flex items-center gap-1"
            >
                <!-- ========================================== -->
                <!-- Theme -->
                <!-- DO NOT CHANGE -->
                <!-- ========================================== -->

                <ToggleTheme
                    class="border-none"
                />

                <!-- ========================================== -->
                <!-- Language -->
                <!-- ========================================== -->

                <DropdownMenu>
                    <DropdownMenuTrigger
                        as-child
                    >
                        <Button
                            variant="ghost"
                            class="h-10 gap-2 px-3 hover:bg-orange-100"
                        >
                            <Globe2
                                class="size-4"
                            />

                            <span
                                class="hidden text-sm md:inline"
                            >
                                {{
                                    selectedLanguageLabel
                                }}
                            </span>

                            <ChevronDown
                                class="size-3.5 opacity-60"
                            />
                        </Button>
                    </DropdownMenuTrigger>

                    <DropdownMenuContent
                        align="end"
                        :side-offset="8"
                        class=""
                    >
                        <DropdownMenuLabel
                            class="px-3 py-2"
                        >
                            <div
                                class="flex flex-col gap-0.5"
                            >
                                <span
                                    class="text-sm font-semibold"
                                >
                                    Idioma e
                                    região
                                </span>

                                <span
                                    class="text-muted-foreground text-xs font-normal"
                                >
                                    Traduzir o
                                    conteúdo do
                                    Mimóvel
                                </span>
                            </div>
                        </DropdownMenuLabel>

                        <DropdownMenuSeparator />

                        <DropdownMenuItem
                            v-for="language in languages"
                            :key="`${language.code}-${language.region}`"
                            class="cursor-pointer rounded-xl px-3 py-2.5"
                            :disabled="
                                !translatorReady
                            "
                            @select="
                                translate(
                                    language,
                                )
                            "
                        >
                            <div
                                class="flex w-full items-center justify-between gap-4"
                            >
                                <div
                                    class="flex min-w-0 flex-col"
                                >
                                    <span
                                        class="truncate text-sm font-medium"
                                    >
                                        {{
                                            language.label
                                        }}
                                    </span>

                                    <span
                                        class="text-muted-foreground truncate text-xs"
                                    >
                                        {{
                                            language.region
                                        }}
                                    </span>
                                </div>

                                <Check
                                    v-if="
                                        selectedLanguage ===
                                        language.code
                                    "
                                    class="size-4 shrink-0 text-orange-500"
                                />
                            </div>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>

                <!-- ========================================== -->
                <!-- Menu -->
                <!-- ========================================== -->

                <DropdownMenu>
                    <DropdownMenuTrigger
                        as-child
                    >
                        <Button
                            variant="ghost"
                            size="icon"
                            class="size-10 hover:bg-orange-100"
                        >
                            <Menu
                                class="size-4"
                            />

                            <span
                                class="sr-only"
                            >
                                Menu
                            </span>
                        </Button>
                    </DropdownMenuTrigger>

                    <DropdownMenuContent
                        align="end"
                        :side-offset="8"
                    >
                        <DropdownMenuItem
                            as-child

                        >
                            <a :href="route('login')">
                                Login
                            </a>
                        </DropdownMenuItem>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem
                            as-child

                        >
                            <a :href="route('logout')">
                                Logout
                            </a>
                        </DropdownMenuItem>


                    </DropdownMenuContent>
                </DropdownMenu>
            </div>
        </div>
    </header>
</template>

<style>
/*
|--------------------------------------------------------------------------
| Hide Google's own language selector
|--------------------------------------------------------------------------
|
| Google still creates .goog-te-combo internally.
| Our Shadcn dropdown controls that selector.
|
*/

.google-translate-element {
    position: absolute;
    width: 1px;
    height: 1px;
    overflow: hidden;
    clip: rect(0 0 0 0);
    clip-path: inset(50%);
    white-space: nowrap;
}
</style>
