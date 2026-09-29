<script setup lang="ts">
import {
    ArrowRight,
    ChevronLeft,
    ChevronRight,
} from '@lucide/vue'

import {
    Carousel,
    CarouselContent,
    CarouselItem,
} from '@/components/ui/carousel'

import AdCard from './AdCard.vue'

withDefaults(
    defineProps<{
        id?: string
        title: string
        href?: string | null
        ads: []
        locale?: string
    }>(),
    {
        id: 'property-carousel',
        href: null,
        locale: 'pt-MZ',
    },
)

const emit = defineEmits<{
    favourite: [property]
}>()
</script>

<template>
    <section
        :aria-labelledby="`${id}-heading`"
        class="
           mx-auto flex w-full max-w-372 flex-col gap-12 px-4 pb-16 sm:px-6
        "
    >
        <div
            class="
              flex flex-col gap-4
            "
        >
            <Carousel
                v-slot="{
                    canScrollPrev,
                    canScrollNext,
                    scrollPrev,
                    scrollNext,
                }"
                :opts="{
                    align: 'start',
                    containScroll: 'trimSnaps',
                    loop: false,
                    dragFree: true,
                }"
                class="w-full"
            >
                <!-- Header -->
                <header
                    class="
                        mb-4
                        flex
                        items-center
                        justify-between
                        gap-3
                    "
                >
                    <h2
                        :id="`${id}-heading`"
                        class="
                            text-xl
                            font-semibold
                            tracking-tight
                        "
                    >
                        <a
                            v-if="href"
                            :href="href"
                            class="
                                group/title
                                inline-flex
                                items-center
                                gap-1.5
                            "
                        >
                            {{ title }}

                            <ArrowRight
                                class="
                                    size-4
                                    transition-transform
                                    group-hover/title:translate-x-0.5
                                "
                                aria-hidden="true"
                            />
                        </a>

                        <span v-else>
                            {{ title }}
                        </span>
                    </h2>

                    <!-- Outer carousel controls -->
                    <nav
                        class="

                            items-center
                            gap-2
                            flex
                        "
                        aria-label="Property carousel navigation"
                    >
                        <button
                            type="button"
                            :disabled="!canScrollPrev"
                            aria-label="Previous properties"
                            class="
                                flex
                                size-7
                                shrink-0
                                items-center
                                justify-center
                                rounded-full
                                border
                                border-zinc-200
                                bg-white
                                text-zinc-900

                                transition-colors

                                hover:bg-zinc-100

                                disabled:pointer-events-none
                                disabled:opacity-30

                                dark:border-zinc-800
                                dark:bg-zinc-950
                                dark:text-zinc-100
                                dark:hover:bg-zinc-900
                            "
                            @click="scrollPrev"
                        >
                            <ChevronLeft
                                class="size-4"
                                aria-hidden="true"
                            />
                        </button>

                        <button
                            type="button"
                            :disabled="!canScrollNext"
                            aria-label="Next properties"
                            class="
                                flex
                                size-7
                                shrink-0
                                items-center
                                justify-center
                                rounded-full
                                border
                                border-zinc-200
                                bg-white
                                text-zinc-900

                                transition-colors

                                hover:bg-zinc-100

                                disabled:pointer-events-none
                                disabled:opacity-30

                                dark:border-zinc-800
                                dark:bg-zinc-950
                                dark:text-zinc-100
                                dark:hover:bg-zinc-900
                            "
                            @click="scrollNext"
                        >
                            <ChevronRight
                                class="size-4"
                                aria-hidden="true"
                            />
                        </button>
                    </nav>
                </header>

                <!--
                    IMPORTANT:
                    The original design uses:
                    mobile: 16.5rem = 264px
                    sm+:    17.5rem = 280px

                    The CarouselItem owns the width.
                -->
                <CarouselContent class="-ml-4">
                    <CarouselItem
                        v-for="(ad, index) in ads"
                        :key="ad.id"
                        class="
                            basis-[20.625rem]
                            pl-4
                            sm:basis-[22.75rem]
                        "
                    >
                        <AdCard
                            class="w-full"
                            :ad="ad"
                            :priority="index === 0"
                            :locale="locale"
                            @favourite="emit('favourite', $event)"
                        />
                    </CarouselItem>
                </CarouselContent>
            </Carousel>
        </div>
    </section>
</template>
