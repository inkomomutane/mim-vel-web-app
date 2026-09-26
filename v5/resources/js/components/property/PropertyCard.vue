<script setup lang="ts">
import { computed } from 'vue'

import { Star } from '@lucide/vue'

import MoneyAmount from '@/components/MoneyAmount.vue'

import ImageCarousel from '../ImageCarousel.vue'
import {toSentence} from "@/lib/utils";

const props = withDefaults(
    defineProps<{
        property: App.Data.CardPropertyData
        priority?: boolean
        favourite?: boolean
        locale?: string
    }>(),
    {
        priority: false,
        favourite: false,
        locale: 'pt-MZ',
    },
)

const emit = defineEmits<{
    favourite: [property: App.Data.CardPropertyData]
}>()

const location = computed(() => {
    return [

        props.property.neighbourhood_name,
        props.property.city_name,

    ]
        .filter(Boolean)
        .join(', ')
})

const rating = computed(() => {
    if (
        props.property.rating_average === null ||
        props.property.rating_average === undefined
    ) {
        return null
    }

    return Number(props.property.rating_average).toFixed(2)
})

</script>

<template>
    <article
        class="
            group/card
            w-full
            min-w-0
            text-zinc-950
            dark:text-zinc-50
        "
    >
        <ImageCarousel
            :images="property.images ?? []"
            :priority="priority"
            :favourite="favourite"
            :title="property.title"
            :condition="property.property_type_name"
            :object="property"
            :url="property.url"
            :likeble="true"
            @favourite="emit('favourite', $event)"
        />

        <div
            class="
                mt-2.5
                flex
                min-w-0
                flex-col
                gap-0.5
            "
        >
            <div
                class="
                    flex
                    items-start
                    justify-between
                    gap-2
                "
            >
                <p
                    v-if="location"
                    class="
                        truncate
                        text-sm
                        font-semibold

                        dark:text-zinc-50
                    "
                >
                    {{ location }}
                </p>

                <div
                    v-if="rating"
                    class="
                        ml-auto
                        flex
                        shrink-0
                        items-center
                        gap-1
                        text-sm
                        tabular-nums
                    "
                    :aria-label="`${rating} out of 5 stars`"
                >
                    <Star
                        class="size-3.5 fill-current"
                        aria-hidden="true"
                    />

                    <span>
                        {{ rating }}
                    </span>
                </div>
            </div>

            <h3
                class="
                    truncate
                    text-sm
                    font-normal
                    truncate text-sm text-muted-foreground
                    dark:text-zinc-300
                "
            >
                <a
                    :href="property.url"
                    class="
                        rounded-sm
                        hover:text-zinc-950
                        focus-visible:outline-none
                        focus-visible:ring-2
                        focus-visible:ring-zinc-950
                        dark:hover:text-white
                        dark:focus-visible:ring-white

                    "
                >
                    {{ toSentence(property.title) }}
                </a>
            </h3>

            <p
                v-if="property.subtitle"
                class="
                    truncate
                    text-sm
                    text-zinc-600
                    dark:text-zinc-400
                "
            >
                {{ property.subtitle }}
            </p>

            <p class="mt-1 text-sm">
                <MoneyAmount
                    :amount="property.price_amount"
                    :currency="property.currency_code"
                    :locale="locale"
                />
            </p>
        </div>
    </article>
</template>
