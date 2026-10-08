<script setup lang="ts">
import { ref } from 'vue'
import { Waves, Bath, Flame, CarFront, Wifi, Puzzle, ShieldAlert, AirVent, CookingPot, Tv, CircleCheck } from '@lucide/vue'
import { Button } from '@/components/ui/button'
import { Dialog, DialogContent, DialogHeader, DialogTitle } from '@/components/ui/dialog'
import type { Amenity } from '@/types/property'
const props = defineProps<{ amenities: Amenity[] }>()
const open = ref(false)
const icons: Record<string,any> = {'waves':Waves,'bath':Bath,'flame':Flame,'car-front':CarFront,'wifi':Wifi,'puzzle':Puzzle,'shield-alert':ShieldAlert,'air-vent':AirVent,'cooking-pot':CookingPot,'tv':Tv}
</script>
<template>
  <section id="amenities" class="scroll-mt-20 border-t py-10"><h2 class="mb-7 text-2xl font-semibold">Amenities</h2>
    <div class="grid grid-cols-2 gap-x-6 gap-y-5"><div v-for="amenity in amenities.slice(0,8)" :key="amenity.id" class="flex items-center gap-3 text-sm"><component :is="icons[amenity.icon] || CircleCheck" class="h-5 w-5 shrink-0 text-muted-foreground" />{{ amenity.label }}</div></div>
    <Button variant="secondary" class="mt-8 rounded-full" @click="open=true">Show all {{ amenities.length }} amenities</Button>
  </section>
  <Dialog v-model:open="open"><DialogContent class="max-h-[80vh] overflow-y-auto sm:max-w-lg"><DialogHeader><DialogTitle>All amenities</DialogTitle></DialogHeader><div class="grid gap-5 py-4"><div v-for="amenity in amenities" :key="amenity.id" class="flex gap-3 text-sm"><component :is="icons[amenity.icon] || CircleCheck" class="h-5 w-5" />{{ amenity.label }}</div></div></DialogContent></Dialog>
</template>
