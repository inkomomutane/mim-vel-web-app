<script setup lang="ts">
import { ref } from 'vue'
import { Clock, CircleCheck, PawPrint, CigaretteOff, PartyPopper } from '@lucide/vue'
import { Button } from '@/components/ui/button'
import { Dialog, DialogContent, DialogHeader, DialogTitle } from '@/components/ui/dialog'
import type { PropertyRule } from '@/types/property'
const props = defineProps<{ rules: PropertyRule[]; cancellation: string; checkInAfter: string; checkOutBefore: string; maxGuests: number }>()
const open = ref(false)
const icons: Record<string,any> = {'paw-print':PawPrint,'cigarette-off':CigaretteOff,'party-popper':PartyPopper}
</script>
<template>
  <section id="rules" class="scroll-mt-20 border-t py-10"><h2 class="mb-7 text-2xl font-semibold">Things to know</h2>
    <div class="grid gap-8 sm:grid-cols-3"><div><h3 class="mb-3 font-medium">Cancellation policy</h3><p class="text-sm leading-6 text-muted-foreground">{{ cancellation }}</p><button class="mt-3 text-sm underline" @click="open=true">Read more</button></div>
      <div><h3 class="mb-3 font-medium">Property rules</h3><p v-for="rule in rules" :key="rule.id" class="mb-3 flex items-center gap-2 text-sm text-muted-foreground"><component :is="icons[rule.icon] || CircleCheck" class="h-4 w-4 shrink-0" />{{ rule.label }}</p><button class="text-sm underline" @click="open=true">Read more</button></div>
      <div><h3 class="mb-3 font-medium">Safety & security</h3><p class="mb-3 flex items-center gap-2 text-sm text-muted-foreground"><Clock class="h-4 w-4" /> Check-in after {{ checkInAfter }}</p><p class="mb-3 flex items-center gap-2 text-sm text-muted-foreground"><Clock class="h-4 w-4" /> Check-out before {{ checkOutBefore }}</p><p class="text-sm text-muted-foreground">{{ maxGuests }} guests maximum</p></div></div>
  </section>
  <Dialog v-model:open="open"><DialogContent class="sm:max-w-lg"><DialogHeader><DialogTitle>Property policies</DialogTitle></DialogHeader><p class="text-sm leading-7">{{ cancellation }}</p><div v-for="rule in rules" :key="rule.id" class="text-sm">• {{ rule.label }}</div></DialogContent></Dialog>
</template>
