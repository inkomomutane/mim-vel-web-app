<script setup lang="ts">
import {computed, PropType} from 'vue'

import { Star } from '@lucide/vue'

import MoneyAmount from '@/components/MoneyAmount.vue'

import ImageCarousel from '../ImageCarousel.vue'
import {toSentence} from "@/lib/utils";
import {CardPropertyData} from "@/types/App/Data";



const props = defineProps({
    property: {
        type: Object as PropType<CardPropertyData>,
        required: true,
    },
    priority: {
        type: Boolean,
        default: false,
    },
    favourite: {
        type: Boolean,
        default: false,
    },
    locale: {
        type: String,
        default: 'pt-MZ',
    },
})

const emit = defineEmits<{
    favourite: [property: CardPropertyData]
}>()

const location =  [
    props.property.city_name,
    props.property.neighborhood_name,
    props.property.address,

]
    .filter(Boolean)
    .join(', ');

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
                    v-if="property.title"
                    class="
                        text-sm
                        font-semibold

                        dark:text-zinc-50
                    "
                >
                    {{ toSentence(property.title) }}
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
                   line-clamp-2

                    text-sm
                    font-normal
                    text-sm text-muted-foreground
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
                    {{ location }}
                </a>
            </h3>


            <p class="mt-1 text-sm">
                <MoneyAmount
                    :amount="property.price"
                    :currency="property.currency_code"
                    :locale="locale"
                />
            </p>
        </div>
    </article>
</template>
