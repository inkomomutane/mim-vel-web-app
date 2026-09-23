<script setup lang="ts">
import { computed, ref } from 'vue';
import { router } from '@inertiajs/vue3';

import {
    Building2,
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
    Dialog,
    DialogContent,
    DialogDescription,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover';

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

const translate = (language: Language) => {
    selectedLanguage.value = language.code;

    if (language.code === 'pt') {
        window.location.href = '/';

        return;
    }

    const url = encodeURIComponent(
        window.location.href,
    );

    window.location.href =
        'https://translate.google.com/translate' +
        '?sl=auto' +
        `&tl=${language.code}` +
        `&u=${url}`;
};
</script>

<template>
    <div class="min-h-screen">
        <!-- ====================================================== -->
        <!-- Header -->
        <!-- ====================================================== -->

        <header
            class="
                absolute
                inset-x-0
                top-0
                z-50
                h-[72px]
                border-b
                border-white/10
                bg-black
                text-white
            "
        >
            <div
                class="
                    relative
                    mx-auto
                    flex
                    h-full
                    w-full
                    max-w-[1832px]
                    items-center
                    justify-between
                    px-6
                    lg:px-8
                    2xl:px-12
                "
            >
                <!-- Logo -->

                <a
                    href="/"
                    class="
                        flex
                        shrink-0
                        items-center
                    "
                >
                    <img
                        src="https://mimovel.com/storage/pages/2967/responsive-images/1000614799___media_library_original_385_214.jpg"
                        alt="Mimóvel"
                        class="
                            h-9
                            w-auto
                        "
                    >
                </a>

                <!-- ================================================== -->
                <!-- Centred desktop search -->
                <!-- ================================================== -->

                <div
                    class="
                        absolute
                        left-1/2
                        top-1/2
                        hidden
                        -translate-x-1/2
                        -translate-y-1/2

                        lg:block
                    "
                >
                    <div
                        class="
                            isolate
                            flex
                            h-12
                            min-w-[520px]
                            items-center
                            gap-1
                            rounded-full
                            border
                            border-neutral-200
                            bg-white
                            p-px
                            shadow-sm
                        "
                    >
                        <!-- ========================================== -->
                        <!-- Where -->
                        <!-- ========================================== -->

                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                                <button
                                    type="button"
                                    class="
                                        flex
                                        h-11
                                        min-w-[145px]
                                        items-center
                                        gap-2
                                        rounded-full
                                        px-5
                                        text-sm
                                        font-medium
                                        transition-colors
                                        text-black
                                        hover:bg-neutral-100
                                        focus:outline-none
                                    "
                                >
                                    <MapPin
                                        class="
                                            size-4
                                            shrink-0
                                            text-neutral-500
                                        "
                                    />

                                    <span
                                        class="
                                            min-w-0
                                            flex-1
                                            truncate
                                            text-left
                                        "
                                    >
                                        {{
                                            location
                                            ?? 'Where'
                                        }}
                                    </span>

                                    <ChevronDown
                                        class="
                                            size-3.5
                                            shrink-0
                                            text-neutral-400
                                        "
                                    />
                                </button>
                            </DropdownMenuTrigger>

                            <DropdownMenuContent
                                align="start"
                                class="
                                    w-[280px]
                                    rounded-2xl
                                    p-2
                                "
                            >
                                <div
                                    class="
                                        px-3
                                        py-2
                                        text-xs
                                        font-medium
                                        text-black
                                        text-muted-foreground
                                    "
                                >
                                    Escolha uma localização
                                </div>

                                <DropdownMenuItem
                                    v-for="item in locations"
                                    :key="item"
                                    class="
                                        cursor-pointer
                                        rounded-xl
                                        px-3
                                        py-3
                                    "
                                    @select="
                                        location = item
                                    "
                                >
                                    <MapPin
                                        class="
                                            mr-2
                                            size-4
                                        "
                                    />

                                    {{ item }}
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>

                        <Separator
                            orientation="vertical"
                            class="h-5"
                        />

                        <!-- ========================================== -->
                        <!-- Type -->
                        <!-- ========================================== -->

                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                                <button
                                    type="button"
                                    class="
                                        flex
                                        h-11
                                        min-w-[140px]
                                        items-center
                                        justify-center
                                        gap-2
                                        rounded-full
                                        px-5
                                        text-sm
                                        font-medium
                                        transition-colors

                                        hover:bg-neutral-100
                                        focus:outline-none
                                    "
                                >
                                    <Building2
                                        class="
                                            size-4
                                            text-neutral-500
                                        "
                                    />

                                    <span
                                        class="
                                            max-w-[100px]
                                            truncate
                                        "
                                    >
                                        {{
                                            propertyType
                                            ?? 'Type'
                                        }}
                                    </span>
                                </button>
                            </DropdownMenuTrigger>

                            <DropdownMenuContent
                                align="start"
                                class="
                                    w-[250px]
                                    rounded-2xl
                                    p-2
                                "
                            >
                                <DropdownMenuItem
                                    v-for="type in propertyTypes"
                                    :key="type"
                                    class="
                                        cursor-pointer
                                        rounded-xl
                                        px-3
                                        py-3
                                    "
                                    @select="
                                        propertyType = type
                                    "
                                >
                                    {{ type }}
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>

                        <Separator
                            orientation="vertical"
                            class="h-5"
                        />

                        <!-- ========================================== -->
                        <!-- Pricing -->
                        <!-- ========================================== -->

                        <Popover>
                            <PopoverTrigger as-child>
                                <button
                                    type="button"
                                    class="
                                        flex
                                        h-11
                                        min-w-[135px]
                                        items-center
                                        justify-center
                                        gap-2
                                        rounded-full
                                        px-5
                                        text-sm
                                        font-medium
                                        transition-colors

                                        hover:bg-neutral-100
                                        focus:outline-none
                                    "
                                >
                                    <span
                                        class="
                                            max-w-[130px]
                                            truncate
                                        "
                                    >
                                        {{ priceLabel }}
                                    </span>
                                </button>
                            </PopoverTrigger>

                            <PopoverContent
                                align="end"
                                :side-offset="10"
                                class="
                                    w-[360px]
                                    rounded-2xl
                                    p-5
                                "
                            >
                                <div>
                                    <h3
                                        class="
                                            text-base
                                            font-semibold
                                        "
                                    >
                                        Faixa de preço
                                    </h3>

                                    <p
                                        class="
                                            mt-1
                                            text-sm
                                            text-muted-foreground
                                        "
                                    >
                                        Introduza o preço mínimo
                                        e máximo.
                                    </p>
                                </div>

                                <div
                                    class="
                                        mt-5
                                        grid
                                        grid-cols-2
                                        gap-3
                                    "
                                >
                                    <div>
                                        <label
                                            class="
                                                mb-2
                                                block
                                                text-xs
                                                font-medium
                                            "
                                        >
                                            Mínimo
                                        </label>

                                        <div class="relative">
                                            <Input
                                                v-model.number="
                                                    minPrice
                                                "
                                                type="number"
                                                min="0"
                                                placeholder="0"
                                                class="
                                                    h-11
                                                    rounded-xl
                                                    pr-10
                                                "
                                            />

                                            <span
                                                class="
                                                    absolute
                                                    right-3
                                                    top-1/2
                                                    -translate-y-1/2
                                                    text-xs
                                                    text-muted-foreground
                                                "
                                            >
                                                MT
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            class="
                                                mb-2
                                                block
                                                text-xs
                                                font-medium
                                            "
                                        >
                                            Máximo
                                        </label>

                                        <div class="relative">
                                            <Input
                                                v-model.number="
                                                    maxPrice
                                                "
                                                type="number"
                                                min="0"
                                                placeholder="Qualquer"
                                                class="
                                                    h-11
                                                    rounded-xl
                                                    pr-10
                                                "
                                            />

                                            <span
                                                class="
                                                    absolute
                                                    right-3
                                                    top-1/2
                                                    -translate-y-1/2
                                                    text-xs
                                                    text-muted-foreground
                                                "
                                            >
                                                MT
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </PopoverContent>
                        </Popover>

                        <!-- ========================================== -->
                        <!-- Search -->
                        <!-- ========================================== -->

                        <Button
                            class="
                                mr-[2px]
                                h-10
                                shrink-0
                                rounded-full
                                bg-orange-500
                                px-5
                                text-sm
                                text-white

                                hover:bg-orange-600
                            "
                            @click="search"
                        >
                            Search
                        </Button>
                    </div>
                </div>

                <!-- ================================================== -->
                <!-- Right side -->
                <!-- ================================================== -->

                <div
                    class="
                        -mr-2
                        ml-auto
                        flex
                        items-center
                        gap-1
                    "
                >
                    <!-- ============================================== -->
                    <!-- Languages -->
                    <!-- ============================================== -->

                    <Dialog>
                        <DialogTrigger as-child>
                            <Button
                                variant="ghost"
                                class="
                                    h-10
                                    gap-2
                                    rounded-full
                                    px-3

                                    hover:bg-orange-100
                                "
                            >
                                <Globe2
                                    class="size-4"
                                />

                                <span
                                    class="
                                        hidden
                                        text-sm
                                        md:inline
                                    "
                                >
                                    PT
                                </span>
                            </Button>
                        </DialogTrigger>

                        <DialogContent
                            class="
                                flex
                                max-h-[85vh]
                                flex-col
                                overflow-hidden
                                p-0

                                sm:max-w-[880px]
                                sm:rounded-[28px]
                            "
                        >
                            <DialogHeader
                                class="
                                    border-b
                                    px-8
                                    pb-5
                                    pt-7
                                    text-left
                                "
                            >
                                <DialogTitle
                                    class="
                                        text-xl
                                    "
                                >
                                    Idioma e região
                                </DialogTitle>

                                <DialogDescription>
                                    Escolha o idioma utilizado
                                    no Mimóvel.
                                </DialogDescription>
                            </DialogHeader>

                            <div
                                class="
                                    overflow-y-auto
                                    px-8
                                    py-7
                                "
                            >
                                <!-- Google Translate -->

                                <div
                                    class="
                                        mb-8
                                        flex
                                        items-center
                                        gap-4
                                        rounded-2xl
                                        bg-neutral-50
                                        p-5
                                    "
                                >
                                    <div
                                        class="
                                            flex
                                            size-10
                                            items-center
                                            justify-center
                                            rounded-full
                                            bg-white
                                            shadow-sm
                                        "
                                    >
                                        <Globe2
                                            class="
                                                size-5
                                                text-orange-500
                                            "
                                        />
                                    </div>

                                    <div>
                                        <p
                                            class="
                                                text-sm
                                                font-medium
                                            "
                                        >
                                            Google Translate
                                        </p>

                                        <p
                                            class="
                                                mt-0.5
                                                text-sm
                                                text-muted-foreground
                                            "
                                        >
                                            Traduzir automaticamente
                                            o conteúdo do website.
                                        </p>
                                    </div>
                                </div>

                                <h3
                                    class="
                                        mb-5
                                        text-xl
                                        font-semibold
                                    "
                                >
                                    Escolha um idioma e região
                                </h3>

                                <div
                                    class="
                                        grid
                                        grid-cols-1
                                        gap-2
                                        sm:grid-cols-2
                                        md:grid-cols-3
                                    "
                                >
                                    <button
                                        v-for="language in languages"
                                        :key="
                                            `${language.code}-${language.region}`
                                        "
                                        type="button"
                                        :class="[
                                            `
                                                rounded-xl
                                                border
                                                px-4
                                                py-3
                                                text-left
                                                transition-colors

                                                hover:bg-neutral-50
                                            `,
                                            selectedLanguage ===
                                            language.code
                                                ? `
                                                    border-orange-500
                                                    bg-orange-50
                                                  `
                                                : `
                                                    border-transparent
                                                  `,
                                        ]"
                                        @click="
                                            translate(language)
                                        "
                                    >
                                        <p
                                            class="
                                                text-sm
                                                font-medium
                                            "
                                        >
                                            {{ language.label }}
                                        </p>

                                        <p
                                            class="
                                                mt-0.5
                                                text-sm
                                                text-muted-foreground
                                            "
                                        >
                                            {{ language.region }}
                                        </p>
                                    </button>
                                </div>
                            </div>
                        </DialogContent>
                    </Dialog>

                    <!-- ============================================== -->
                    <!-- Menu -->
                    <!-- ============================================== -->

                    <DropdownMenu>
                        <DropdownMenuTrigger as-child>
                            <Button
                                variant="ghost"
                                size="icon"
                                class="
                                    size-10
                                    rounded-full

                                    hover:bg-orange-100
                                "
                            >
                                <Menu
                                    class="size-4"
                                />

                                <span class="sr-only">
                                    Menu
                                </span>
                            </Button>
                        </DropdownMenuTrigger>

                        <DropdownMenuContent
                            align="end"
                            class="
                                w-[240px]
                                rounded-2xl
                                p-2
                            "
                        >
                            <DropdownMenuItem
                                as-child
                                class="
                                    rounded-xl
                                    py-3
                                "
                            >
                                <a href="/">
                                    Início
                                </a>
                            </DropdownMenuItem>

                            <DropdownMenuItem
                                as-child
                                class="
                                    rounded-xl
                                    py-3
                                "
                            >
                                <a href="/imoveis">
                                    Todos imóveis
                                </a>
                            </DropdownMenuItem>

                            <DropdownMenuItem
                                as-child
                                class="
                                    rounded-xl
                                    py-3
                                "
                            >
                                <a href="/hotel">
                                    Hotel
                                </a>
                            </DropdownMenuItem>

                            <DropdownMenuSeparator />

                            <DropdownMenuItem
                                as-child
                                class="
                                    rounded-xl
                                    py-3
                                "
                            >
                                <a href="/sobre-nos">
                                    Sobre nós
                                </a>
                            </DropdownMenuItem>

                            <DropdownMenuItem
                                as-child
                                class="
                                    rounded-xl
                                    py-3
                                "
                            >
                                <a href="/contactos">
                                    Contactos
                                </a>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
            </div>
        </header>

        <!-- ====================================================== -->
        <!-- Hero -->
        <!-- ====================================================== -->

        <section
            class="
                relative
                flex
                min-h-[420px]
                flex-col
                justify-center
                overflow-hidden
                bg-neutral-950

                md:min-h-[500px]
            "
        >
            <img
                src="https://assets.wander.com/p/homepage-lp-hero@2x.webp"
                alt=""
                class="
                    absolute
                    inset-0
                    size-full
                    object-cover
                "
            >

            <!-- Important:
                 Wander uses a strong overlay.
                 Keep this: text readability improves dramatically. -->

            <div
                class="
                    absolute
                    inset-0
                    bg-black/40
                "
            />

            <div
                class="
                    relative
                    mx-auto
                    mt-[72px]
                    flex
                    w-full
                    max-w-[1832px]
                    flex-col
                    items-center
                    gap-4
                    px-6
                    text-center
                    text-white

                    lg:px-8
                    2xl:px-12
                "
            >
                <h1
                    class="
                        max-w-4xl
                        text-4xl
                        font-medium
                        tracking-tight

                        md:text-5xl
                        lg:text-6xl
                    "
                >
                    Encontre o seu lugar
                </h1>

                <p
                    class="
                        max-w-2xl
                        text-base
                        text-white/90

                        md:text-lg
                    "
                >
                    Casas, apartamentos e terrenos
                    em Moçambique.
                </p>
            </div>
        </section>
    </div>
</template>
