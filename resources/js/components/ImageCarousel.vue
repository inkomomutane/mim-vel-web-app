<script setup lang="ts">
import {
    computed, HTMLAttributes,
    nextTick,
    onBeforeUnmount,
    ref,
    watch,
} from 'vue'

import {
    ChevronLeft,
    ChevronRight,
    Heart,
} from '@lucide/vue'

import {
    Carousel,
    CarouselContent,
    CarouselItem,
    type CarouselApi,
} from '@/components/ui/carousel'

import ResponsivePropertyImage from '@/components/media/ResponsivePropertyImage.vue'
import {cn, toSentence} from "@/lib/utils";

const props = withDefaults(
    defineProps<{
        object:any
        url: string,
        images: Array,
        title?: string,
        condition?: string,
        priority?: boolean
        favourite?: boolean,
        likeble?: boolean,
        class?: HTMLAttributes['class'],

    }>(),
    {
        priority: false,
        favourite: false,
        likeble: false,
        class: 'aspect-square'
    },

)

const emit = defineEmits<{
    favourite: [value: object]
}>()

const api = ref<CarouselApi>()

const currentIndex = ref(0)
const canScrollPrev = ref(false)
const canScrollNext = ref(false)

const images = computed(() => props.images ?? [])

function updateCarouselState(): void {
    if (!api.value) {
        return
    }

    currentIndex.value = api.value.selectedScrollSnap()
    canScrollPrev.value = api.value.canScrollPrev()
    canScrollNext.value = api.value.canScrollNext()
}

function setApi(value: CarouselApi): void {
    if (api.value) {
        api.value.off('select', updateCarouselState)
        api.value.off('reInit', updateCarouselState)
    }

    api.value = value

    updateCarouselState()

    value.on('select', updateCarouselState)
    value.on('reInit', updateCarouselState)
}

watch(
    () => images.value.length,
    async () => {
        await nextTick()

        api.value?.reInit()
        updateCarouselState()
    },
)

onBeforeUnmount(() => {
    api.value?.off('select', updateCarouselState)
    api.value?.off('reInit', updateCarouselState)
})

function scrollPrev(): void {
    api.value?.scrollPrev()
}

function scrollNext(): void {
    api.value?.scrollNext()
}

function goTo(index: number): void {
    api.value?.scrollTo(index)
}

function imageAlt(index: number): string {
    if (index === 0) {
        return toSentence(props.title)
    }

    return `${toSentence(props.title)} – image ${index + 1}`
}
</script>

<template>
    <div
        :class="cn('group/gallery relative  w-full overflow-hidden rounded-xl  bg-zinc-100  dark:bg-zinc-900', props.class)"
    >
        <Carousel
            :opts="{
                align: 'start',
                loop: false,
                dragFree: false,
                skipSnaps: false,
                containScroll: 'trimSnaps',
            }"
            class="
                h-full
                w-full
                [&>div]:h-full
            "
            @init-api="setApi"
        >
            <CarouselContent
                class="
                    ml-0
                    h-full
                "
            >
                <CarouselItem
                    v-for="(image, index) in images"
                    :key="image.id ?? index"
                    class="
                        h-full
                        basis-full
                        pl-0
                    "
                >
                    <a
                        :href="url"
                        :aria-label="title"
                        class="
                            block
                            h-full
                            w-full
                        "
                        @dragstart.prevent
                    >
                        <ResponsivePropertyImage
                            :image="image"
                            :alt="imageAlt(index)"
                            :priority="priority && index === 0"
                            class="
                                h-full
                                w-full
                                object-cover
                            "
                        />
                    </a>
                </CarouselItem>

                <CarouselItem
                    v-if="images.length === 0"
                    class="
                        h-full
                        basis-full
                        pl-0
                    "
                >
                    <a
                        :href="url"
                        :aria-label="title"
                        class="
                            block
                            h-full
                            w-full
                        "
                    >
                        <ResponsivePropertyImage
                            :alt="title"
                            :priority="priority"
                            class="
                                h-full
                                w-full
                                object-cover
                            "
                        />
                    </a>
                </CarouselItem>
            </CarouselContent>

            <!-- Previous image -->
            <button
                v-if="images.length > 1"
                type="button"

                aria-label="Previous property image"
                class="
                    absolute
                    left-2
                    top-1/2
                    z-20

                    hidden
                    size-8
                    -translate-y-1/2
                    items-center
                    justify-center

                    rounded-full

                    bg-white/80
                    text-zinc-800
                    backdrop-blur-sm

                    opacity-0

                    transition-[opacity,background-color]
                    duration-150

                    hover:bg-white/95

                    disabled:pointer-events-none

                    sm:flex
                "
                :class="
                    canScrollPrev
                        ? 'sm:group-hover/gallery:opacity-100'
                        : 'sm:group-hover/gallery:opacity-60'
                "
                @click.stop.prevent="scrollPrev"
            >
                <ChevronLeft
                    class="size-4"
                    :stroke-width="2"
                />
            </button>

            <!-- Next image -->
            <button
                v-if="images.length > 1"
                type="button"
                aria-label="Next property image"
                class="
                    absolute
                    right-2
                    top-1/2
                    z-20

                    hidden
                    size-8
                    -translate-y-1/2
                    items-center
                    justify-center

                    rounded-full

                    bg-white/80
                    text-zinc-800
                    backdrop-blur-sm

                    opacity-0

                    transition-[opacity,background-color]
                    duration-150

                    hover:bg-white/95

                    disabled:pointer-events-none

                    sm:flex
                "
                :class="
                    canScrollNext
                        ? 'sm:group-hover/gallery:opacity-100'
                        : 'sm:group-hover/gallery:opacity-60'
                "
                @click.stop.prevent="scrollNext"
            >
                <ChevronRight
                    class="size-4"
                    :stroke-width="2"
                />
            </button>
        </Carousel>

        <!-- Favourite -->
        <button
            type="button"
            v-if="likeble"
            :aria-label="
                favourite
                    ? 'Remove property from favourites'
                    : 'Add property to favourites'
            "
            class="
                absolute
                right-3
                top-3
                z-30

                flex
                items-center
                justify-center

                text-white

                transition-transform
                duration-150

                hover:scale-110
                active:scale-95
            "
            @click.stop.prevent="emit('favourite', property)"
        >
            <Heart
                class="
                    size-6
                    stroke-white
                "
                :class="{
                    'fill-white': favourite,
                    'fill-black/30': !favourite,
                }"
                :stroke-width="2"
            />
        </button>

        <!-- Condition -->
        <span
            v-if="condition"
            class="
                absolute
                left-3
                top-3
                z-20

                rounded-full

                bg-white/90
                px-2
                py-0.5

                text-xs
                font-medium
                text-zinc-900
            "
        >
            {{ condition }}
        </span>

        <!-- Image indicators -->
        <div
            v-if="images.length > 1"
            class="
                pointer-events-none

                absolute
                bottom-3
                left-1/2
                z-30

                flex
                -translate-x-1/2
                items-center
                gap-1.5
            "
        >
            <span
                v-for="(_, index) in images"
                :key="index"
                class="
                    size-1.5
                    rounded-full
                    bg-white

                    transition-opacity
                    duration-150
                "
                :class="
                    currentIndex === index
                        ? 'opacity-100'
                        : 'opacity-50'
                "
            />
        </div>
    </div>
</template>
