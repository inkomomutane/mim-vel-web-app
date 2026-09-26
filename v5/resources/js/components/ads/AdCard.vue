<script setup lang="ts">
import ImageCarousel from "@/components/ImageCarousel.vue";
import {toSentence} from "@/lib/utils";
const props = withDefaults(
    defineProps<{
        ad: any,
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
            :images="ad.images ?? []"
            :url="ad.ads_link ?? ''"
            :condition="ad.ads_type ?? 'Ads'"
            :object="ad"
            :priority="priority"
            :favourite="favourite"
            @favourite="emit('favourite', $event)"
            class="aspect-[4/5]"
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
                    v-if="ad.ads_title"
                    class="
                        truncate
                        text-sm
                        font-semibold

                        dark:text-zinc-50
                    "
                >
                    {{ ad.ads_title }}
                </p>

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
                    :href="ad.ads_link"
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
                    {{ toSentence(ad.ads_title) }}
                </a>
            </h3>

            <p
                v-if="ad.ads_subtitle"
                class="
                    truncate
                    text-sm
                    text-zinc-600
                    dark:text-zinc-400
                "
            >
                {{ ad.ads_subtitle }}
            </p>
        </div>
    </article>
</template>
