<script setup lang="ts">
import { ref } from 'vue'
import { Star } from '@lucide/vue'
import { Button } from '@/components/ui/button'
import { Dialog, DialogContent, DialogHeader, DialogTitle } from '@/components/ui/dialog'
import type { PropertyReview } from '@/types/property'
const props = defineProps<{ reviews: PropertyReview[]; rating: number; count: number }>()
const open = ref(false)
</script>
<template>
  <section id="reviews" class="scroll-mt-20 border-t py-10">
    <h2 class="mb-7 flex items-center gap-2 text-2xl font-semibold"><Star class="h-5 w-5 fill-current" /> {{ rating.toFixed(1) }} · {{ count }} reviews</h2>
    <div class="space-y-7">
      <article v-for="review in reviews.slice(0,3)" :key="review.id">
        <p class="font-medium">{{ review.author }}</p><p class="mt-1 text-xs text-muted-foreground"><span class="text-foreground">{{ '★'.repeat(review.rating) }}</span> · {{ review.date }}</p>
        <p class="mt-2 line-clamp-3 text-sm leading-6">{{ review.body }}</p><button type="button" class="mt-2 text-sm text-muted-foreground underline underline-offset-4" @click="open=true">Read more</button>
      </article>
    </div>
    <Button variant="secondary" class="mt-7 rounded-full" @click="open=true">Show all reviews</Button>
  </section>
  <Dialog v-model:open="open"><DialogContent class="max-h-[80vh] overflow-y-auto sm:max-w-2xl"><DialogHeader><DialogTitle>{{ rating.toFixed(1) }} · {{ count }} reviews</DialogTitle></DialogHeader>
    <div class="divide-y"><article v-for="review in reviews" :key="review.id" class="py-5"><p class="font-medium">{{ review.author }}</p><p class="my-2 text-xs text-muted-foreground">{{ '★'.repeat(review.rating) }} · {{ review.date }}</p><p class="text-sm leading-7">{{ review.body }}</p></article></div>
  </DialogContent></Dialog>
</template>
