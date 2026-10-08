<script setup lang="ts">
import { ref } from 'vue'
import { Images, X } from '@lucide/vue'
import { Button } from '@/components/ui/button'
import { Dialog, DialogContent, DialogHeader, DialogTitle } from '@/components/ui/dialog'
import type { PropertyPhoto } from '@/types/property'
const props = defineProps<{ photos: PropertyPhoto[] }>()
const open = ref(false)
</script>
<template>
  <section id="photos" class="relative grid h-[260px] grid-cols-4 grid-rows-2 gap-2 overflow-hidden rounded-xl sm:h-[390px] lg:h-[425px]">
    <button v-for="(photo, index) in props.photos.slice(0,5)" :key="photo.id" type="button" :class="['overflow-hidden',index===0?'col-span-2 row-span-2':'']" @click="open = true">
      <img :src="photo.url" :alt="photo.alt" class="h-full w-full object-cover transition-transform duration-300 hover:scale-105" />
    </button>
    <Button variant="secondary" class="absolute bottom-4 right-4 rounded-full bg-white text-black shadow-sm hover:bg-white/90" @click="open = true"><Images class="mr-2 h-4 w-4" /> Show all photos</Button>
  </section>
  <Dialog v-model:open="open">
    <DialogContent class="max-h-[90vh] max-w-5xl overflow-y-auto sm:max-w-5xl">
      <DialogHeader><DialogTitle>Property photos</DialogTitle></DialogHeader>
      <div class="grid grid-cols-1 gap-3 sm:grid-cols-2"><img v-for="photo in props.photos" :key="photo.id" :src="photo.url" :alt="photo.alt" class="w-full rounded-lg object-cover" /></div>
    </DialogContent>
  </Dialog>
</template>
