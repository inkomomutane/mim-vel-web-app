<script setup lang="ts">
import { MapPin, ExternalLink } from '@lucide/vue'
import type { PropertyLocation } from '@/types/property'
const props = defineProps<{ location: PropertyLocation }>()
const mapUrl = `https://www.openstreetmap.org/?mlat=${props.location.latitude}&mlon=${props.location.longitude}#map=13/${props.location.latitude}/${props.location.longitude}`
</script>
<template>
  <section id="location" class="scroll-mt-20 border-t py-10"><h2 class="mb-7 text-2xl font-semibold">Where you’ll be</h2><p class="mb-5 text-sm text-muted-foreground">{{ location.address }}</p>
    <div class="relative flex h-[360px] items-center justify-center rounded-xl bg-zinc-100 dark:bg-zinc-900"><MapPin class="h-11 w-11 text-zinc-700 dark:text-zinc-200" /><a :href="mapUrl" target="_blank" rel="noopener noreferrer" class="absolute bottom-4 right-4 flex items-center gap-2 rounded-full bg-background px-4 py-2 text-sm shadow">View map <ExternalLink class="h-4 w-4" /></a><span class="absolute bottom-4 left-4 text-xs text-muted-foreground">Approximate location · OpenStreetMap</span></div>
    <p class="mt-5 text-sm leading-7">{{ location.description }}</p>
  </section>
</template>
