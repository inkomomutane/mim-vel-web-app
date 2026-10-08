<script setup lang="ts">
import { computed, ref } from 'vue'
import { Heart, Share2, BadgeCheck, ShieldCheck, Star, Check, Home, KeyRound, ConciergeBell } from '@lucide/vue'
import { Button } from '@/components/ui/button'
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogDescription } from '@/components/ui/dialog'
import PropertyGallery from '@/pages/Web/Property/components/PropertyGallery.vue'
import BookingCard from '@/pages/Web/Property/components/BookingCard.vue'
import PropertyBedrooms from '@/pages/Web/Property/components/PropertyBedrooms.vue'
import PropertyAmenities from '@/pages/Web/Property/components/PropertyAmenities.vue'
import PropertyReviews from '@/pages/Web/Property/components/PropertyReviews.vue'
import PropertyLocation from '@/pages/Web/Property/components/PropertyLocation.vue'
import PropertyRules from '@/pages/Web/Property/components/PropertyRules.vue'
import type { BookingSelection, PropertyDetails } from '@/types'
import { exampleProperty } from './data/example-property'
import Footer from "@/pages/Web/Footer.vue";
import {Head} from "@inertiajs/vue3";
import MimovelHeader from "@/pages/Web/MimovelHeader.vue";

// Pass an API-loaded property; the demo works without a prop.
const props = withDefaults(defineProps<{ property?: PropertyDetails }>(),{ property:()=>exampleProperty })
const emit = defineEmits<{ reserve: [selection: BookingSelection]; favourite: [propertyId: string, selected: boolean] }>()
const favourite = ref(false)
const aboutExpanded = ref(false)
const guaranteeOpen = ref(false)
const bookingOpen = ref(false)
const selection = ref<BookingSelection | null>(null)
const tabs = [ {id:'photos',label:'Photos'},{id:'about',label:'About'},{id:'sleep',label:'Sleep'},{id:'amenities',label:'Amenities'},{id:'reviews',label:'Reviews'},{id:'location',label:'Location'},{id:'rules',label:'Rules'} ]
const description = computed(() => aboutExpanded.value ? props.property.description : props.property.description.slice(0,260)+(props.property.description.length>260?'…':''))
function toggleFavourite(){favourite.value=!favourite.value;emit('favourite',props.property.id,favourite.value)}
async function share(){if(navigator.share){try{await navigator.share({title:props.property.title,url:location.href})}catch{}}else if(navigator.clipboard){await navigator.clipboard.writeText(location.href)}}

function reserve(value: BookingSelection) {
    selection.value = value;
    emit('reserve', value);
    bookingOpen.value = true
}
</script>
<template>
    <div class="min-h-screen bg-background text-foreground">
        <MimovelHeader/>
        <main class="mx-auto max-w-[1120px] px-4 pb-12 sm:px-6">
            <div class="pt-6">
                <PropertyGallery :photos="property.photos"/>
            </div>
            <nav
                class="sticky top-0 z-20 -mx-4 mt-5 overflow-x-auto border-b bg-background/95 px-4 backdrop-blur sm:-mx-6 sm:px-6">
                <div class="flex min-w-max gap-7"><a v-for="tab in tabs" :key="tab.id" :href="`#${tab.id}`"
                                                     class="py-4 text-sm text-muted-foreground transition-colors hover:text-foreground focus-visible:text-foreground">{{
                        tab.label
                    }}</a></div>
            </nav>
            <div class="mt-6 grid gap-8 lg:grid-cols-[minmax(0,1fr)_372px] lg:gap-16">
                <div class="min-w-0">
                    <section id="about" class="scroll-mt-20 pb-10">
                        <div class="flex items-start justify-between gap-4">
                            <div><p class="mb-2 text-sm text-muted-foreground">{{ property.kind }} in
                                {{ property.locality }}</p>
                                <h1 class="text-2xl font-semibold leading-tight tracking-tight">{{
                                        property.title
                                    }}</h1>
                                <p class="mt-3 text-sm text-muted-foreground">{{ property.bedroomsCount }} bedrooms ·
                                    {{ property.bedsCount }} beds · {{ property.bathrooms }} bathrooms ·
                                    {{ property.maxGuests }} guests ·
                                    <Star class="inline h-3.5 w-3.5 fill-current text-foreground"/>
                                    <a href="#reviews" class="text-foreground underline">{{
                                            property.rating.toFixed(1)
                                        }} ({{ property.reviewCount }})</a></p>
                            </div>
                            <div class="flex shrink-0 gap-2">
                                <Button size="icon" variant="secondary" class="rounded-full"
                                        :aria-label="favourite?'Remove favourite':'Add favourite'"
                                        @click="toggleFavourite">
                                    <Heart :class="['h-4 w-4',favourite?'fill-red-500 text-red-500':'']"/>
                                </Button>
                                <Button size="icon" variant="secondary" class="rounded-full" aria-label="Share property"
                                        @click="share">
                                    <Share2 class="h-4 w-4"/>
                                </Button>
                            </div>
                        </div>
                        <div class="mt-8 flex items-center gap-5 rounded-xl border p-5">
                            <div class="border-r pr-6 text-sm"><p class="font-semibold">★ {{
                                    property.rating.toFixed(1)
                                }}</p>
                                <p class="text-xs text-muted-foreground">{{ property.reviewCount }} reviews</p></div>
                            <p class="text-sm font-medium">{{ property.highlight }}</p></div>
                        <div class="mt-8 flex items-center gap-4">
                            <div class="rounded-full border p-3 shadow-sm">
                                <BadgeCheck class="h-5 w-5"/>
                            </div>
                            <div><p class="text-sm font-semibold">{{ property.operator }}</p>
                                <p class="mt-1 text-xs text-muted-foreground">{{ property.operatorSubtitle }}</p></div>
                        </div>
                        <div class="mt-9 border-t pt-9"><h2 class="mb-5 text-2xl font-semibold">About the property</h2>
                            <p class="text-sm leading-7 text-muted-foreground">{{ description }}</p>
                            <Button v-if="property.description.length>260" variant="secondary" class="mt-5 rounded-full"
                                    @click="aboutExpanded=!aboutExpanded">{{
                                    aboutExpanded ? 'Read less' : 'Read more'
                                }}
                            </Button>
                        </div>
                    </section>
                    <PropertyBedrooms :bedrooms="property.bedrooms"/>
                    <PropertyAmenities :amenities="property.amenities"/>
                    <PropertyReviews :reviews="property.reviews" :rating="property.rating"
                                     :count="property.reviewCount"/>
                    <div class="flex items-center gap-4 rounded-xl bg-muted/70 px-5 py-5">
                        <div class="rounded-full border bg-background p-3">
                            <ShieldCheck class="h-5 w-5"/>
                        </div>
                        <div class="text-sm"><p class="font-medium">The Wander Guarantee</p>
                            <p class="text-muted-foreground">Book with confidence.
                                <button class="text-blue-600 hover:underline" @click="guaranteeOpen=true">Read more.
                                </button>
                            </p>
                        </div>
                    </div>
                    <PropertyLocation :location="property.location"/>
                </div>
                <div class="hidden lg:block">
                    <div class="sticky top-20">
                        <BookingCard :quote="property.quote" :max-guests="property.maxGuests" @reserve="reserve"/>
                    </div>
                </div>
            </div>
            <PropertyRules :rules="property.rules" :cancellation="property.cancellationPolicy"
                           :check-in-after="property.checkInAfter" :check-out-before="property.checkOutBefore"
                           :max-guests="property.maxGuests"/>
            <div class="border-t py-8 text-xs text-muted-foreground">Home　›　United States　›　Texas　›　{{
                    property.title
                }}
            </div>
        </main>
        <div
            class="fixed inset-x-0 bottom-0 z-30 flex items-center justify-between border-t bg-background px-4 py-3 shadow-lg lg:hidden">
            <div><p class="font-semibold">{{
                    new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: property.quote.currency,
                        maximumFractionDigits: 0
                    }).format(property.quote.total)
                }}</p>
                <p class="text-xs text-muted-foreground">for {{ property.quote.nights }} nights</p></div>
            <Button class="rounded-full bg-emerald-700 px-8 text-white hover:bg-emerald-800" @click="bookingOpen=true">
                Reserve
            </Button>
        </div>

        <Footer/>


        <Dialog v-model:open="guaranteeOpen">
            <DialogContent class="sm:max-w-xl">
                <DialogHeader>
                    <DialogTitle>The Wander Guarantee</DialogTitle>
                    <DialogDescription>Making sure your happy place is happy, every time.</DialogDescription>
                </DialogHeader>
                <div class="space-y-6 py-3">
                    <div class="flex gap-4">
                        <Home class="h-5 w-5 shrink-0"/>
                        <div><h3 class="font-medium">Book with confidence</h3>
                            <p class="mt-1 text-sm text-muted-foreground">Beautiful homes, spotless upon arrival and
                                fairly priced with flexible options when plans change.</p></div>
                    </div>
                    <div class="flex gap-4">
                        <KeyRound class="h-5 w-5 shrink-0"/>
                        <div><h3 class="font-medium">Seamless arrivals & departures</h3>
                            <p class="mt-1 text-sm text-muted-foreground">Simple check-ins and check-outs designed to
                                make your stay stress-free.</p></div>
                    </div>
                    <div class="flex gap-4">
                        <ConciergeBell class="h-5 w-5 shrink-0"/>
                        <div><h3 class="font-medium">Care throughout your stay</h3>
                            <p class="mt-1 text-sm text-muted-foreground">Support before, during and after your
                                stay.</p></div>
                    </div>
                </div>
            </DialogContent>
        </Dialog>
        <Dialog v-model:open="bookingOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle>{{ selection ? 'Reservation details' : 'Select your dates' }}</DialogTitle>
                    <DialogDescription>{{
                            selection ? 'Review your selection before continuing to checkout.' : 'Choose your dates and guest count.'
                        }}
                    </DialogDescription>
                </DialogHeader>
                <div v-if="selection" class="space-y-3 text-sm"><p>Check-in: {{ selection.checkIn }}</p>
                    <p>Check-out: {{ selection.checkOut }}</p>
                    <p>Guests: {{ selection.guests }}</p>
                    <p class="text-muted-foreground">Connect the reserve event to your checkout route or availability
                        API.</p></div>
                <BookingCard v-else :quote="property.quote" :max-guests="property.maxGuests" @reserve="reserve"/>
            </DialogContent>
        </Dialog>
    </div>
</template>
