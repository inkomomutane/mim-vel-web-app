<script setup lang="ts">
import { computed, ref, watch } from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import { CheckCircle2 } from '@lucide/vue'
import type { BookingQuote, BookingSelection } from '@/types/property'
const props = defineProps<{ quote: BookingQuote; maxGuests: number }>()
const emit = defineEmits<{ reserve: [selection: BookingSelection] }>()
const checkIn = ref('2026-11-01')
const checkOut = ref('2026-11-04')
const guests = ref('1')
const error = ref('')
const money = (amount: number) => new Intl.NumberFormat('en-US',{style:'currency',currency:props.quote.currency,maximumFractionDigits:0}).format(amount)
const saving = computed(() => props.quote.competitor ? props.quote.competitor.total-props.quote.total : 0)
function reserve() {
  if (!checkIn.value || !checkOut.value || checkOut.value <= checkIn.value) { error.value='Check-out must be later than check-in.'; return }
  error.value=''
  emit('reserve',{checkIn:checkIn.value,checkOut:checkOut.value,guests:Number(guests.value)})
}
watch([checkIn,checkOut],()=>{error.value=''})
</script>
<template>
  <aside class="rounded-xl border bg-background p-5 shadow-sm sm:p-7">
    <div class="mb-5"><span class="text-2xl font-semibold tracking-tight">{{ money(quote.total) }}</span><span class="ml-1 text-xs text-muted-foreground">for {{ quote.nights }} nights</span></div>
    <div class="grid grid-cols-2 gap-2">
      <div class="space-y-1 rounded-lg border p-3"><Label for="check-in" class="text-xs text-muted-foreground">Check-in</Label><Input id="check-in" v-model="checkIn" type="date" class="h-8 border-0 px-0 shadow-none focus-visible:ring-0" /></div>
      <div class="space-y-1 rounded-lg border p-3"><Label for="check-out" class="text-xs text-muted-foreground">Check-out</Label><Input id="check-out" v-model="checkOut" type="date" :min="checkIn" class="h-8 border-0 px-0 shadow-none focus-visible:ring-0" /></div>
      <div class="col-span-2 space-y-1 rounded-lg border p-3"><Label class="text-xs text-muted-foreground">Guests</Label>
        <Select v-model="guests"><SelectTrigger class="h-8 border-0 px-0 shadow-none"><SelectValue placeholder="Choose guests" /></SelectTrigger><SelectContent><SelectItem v-for="n in maxGuests" :key="n" :value="String(n)">{{ n }} {{ n===1?'guest':'guests' }}</SelectItem></SelectContent></Select>
      </div>
    </div>
    <p v-if="error" role="alert" class="mt-2 text-xs text-destructive">{{ error }}</p>
    <Button class="mt-5 w-full rounded-full bg-emerald-700 text-white hover:bg-emerald-800" size="lg" @click="reserve">Reserve</Button>
    <p class="mt-3 text-center text-xs text-muted-foreground">You won't be charged yet.</p>
    <div v-if="quote.competitor" class="mt-6 rounded-xl border p-3 text-sm">
      <p class="mb-3 flex items-center justify-center gap-2 text-xs font-medium"><CheckCircle2 class="h-4 w-4" /> Save ~{{ money(saving) }} booking here</p>
      <div class="flex items-center justify-between rounded-md bg-emerald-50 px-3 py-2 text-emerald-950"><span>● Direct <span class="ml-2 rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] text-emerald-800">Best price</span></span><span>{{ money(quote.total) }}</span></div>
      <div class="flex justify-between px-3 py-3 text-muted-foreground"><span>● {{ quote.competitor.name }}</span><span>~{{ money(quote.competitor.total) }}</span></div>
    </div>
  </aside>
</template>
