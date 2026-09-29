<script setup lang="ts">
import placeholderImage from '@/images/placeholder.svg'

withDefaults(
    defineProps<{
        image?: App.Data.PropertyCardImageData | null
        alt: string
        priority?: boolean
        sizes?: string
    }>(),
    {
        image: null,
        priority: false,
        sizes: `
            (min-width: 1536px) 18vw,
            (min-width: 1280px) 23vw,
            (min-width: 1024px) 31vw,
            (min-width: 640px) 46vw,
            86vw
        `,
    },
)
</script>

<template>
    <div
        class="relative h-full w-full overflow-hidden bg-zinc-100 dark:bg-zinc-900"
        :style="
            image?.placeholder
                ? {
                      backgroundImage: `url('${image.placeholder}')`,
                      backgroundPosition: 'center',
                      backgroundSize: 'cover',
                  }
                : undefined
        "
    >
        <img
            :src="image?.url || placeholderImage"
            :srcset="image?.srcset || undefined"
            :sizes="sizes"
            :alt="alt"
            :loading="priority ? 'eager' : 'lazy'"
            :fetchpriority="priority ? 'high' : 'auto'"
            decoding="async"
            draggable="false"
            class="
                h-full
                w-full
                object-cover
                transition-transform
                duration-500
                group-hover/card:scale-[1.015]
            "
        />
    </div>
</template>
