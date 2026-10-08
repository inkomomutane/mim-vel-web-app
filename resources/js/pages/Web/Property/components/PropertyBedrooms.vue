<script setup lang="ts">
import { computed, ref } from 'vue'
import { ChevronLeft, ChevronRight } from '@lucide/vue'
import { Button } from '@/components/ui/button'
import type { Bedroom } from '@/types/property'
const props = defineProps<{ bedrooms: Bedroom[] }>()
const index = ref(0)
const visible = computed(()=>props.bedrooms.slice(index.value,index.value+2))
</script>
<template>
  <section id="sleep" class="scroll-mt-20 border-t py-10">
    <div class="mb-7 flex items-center justify-between"><h2 class="text-2xl font-semibold">Where you’ll sleep</h2><div class="flex gap-2"><Button size="icon" variant="secondary" class="h-9 w-9 rounded-full" :disabled="index===0" aria-label="Previous bedrooms" @click="index=Math.max(0,index-1)"><ChevronLeft class="h-4 w-4" /></Button><Button size="icon" variant="secondary" class="h-9 w-9 rounded-full" :disabled="index>=bedrooms.length-2" aria-label="Next bedrooms" @click="index=Math.min(Math.max(bedrooms.length-2,0),index+1)"><ChevronRight class="h-4 w-4" /></Button></div></div>
    <div class="grid grid-cols-2 gap-4"><article v-for="room in visible" :key="room.id"><img :src="room.photo.url" :alt="room.photo.alt" class="aspect-[1.45] w-full rounded-xl object-cover"/><h3 class="mt-3 font-medium">{{ room.name }}</h3><p class="mt-1 text-sm text-muted-foreground">{{ room.beds }}</p></article></div>
  </section>
</template>
