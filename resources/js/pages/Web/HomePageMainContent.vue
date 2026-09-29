<script lang="ts" setup>
import {PropertyCardData} from "@/types/property";
import PropertyCarouselSection from "@/components/property/PropertyCarouselSection.vue";
import FilterSection from "@/components/website/PropertySearch/FilterSection.vue";
import PropertySearchFilters from "@/components/website/PropertySearch/PropertySearchFilters.vue";
import {PropertyFilterPayload} from "@/components/website/PropertySearch/types";
import AdCarouselSection from "@/components/ads/AdCarouselSection.vue";
const props = defineProps<{
    relevant: Array<PropertyCardData>;
    latest: Array<PropertyCardData>;
    hotels?: Array<PropertyCardData>;
    ads: Array
}>();



function searchProperties(
    filters: PropertyFilterPayload,
) {
    router.get(
        route('website.properties.index'),
        filters,
        {
            preserveState: true,
            preserveScroll: true,
            replace: true,
        },
    );
}

</script>


<template>
    <main class="flex-1">
        <div class="mx-auto  flex w-full max-w-372 flex-col gap-12 px-4 pb-4 sm:px-6">
            <section class="flex flex-col items-center gap-6 pt-10 text-center sm:pt-14"><h1
                class="max-w-5xl text-balance text-3xl font-bold tracking-tight sm:text-4xl">
                Encontre casas, escritórios, armazéns,lojas e muito mais...
            </h1>
                <p class="max-w-xl text-balance text-muted-foreground">
                    Mimóvel | Meu imovel
                 </p>

            </section>

        </div>
        <FilterSection title="Search properties" >
            <PropertySearchFilters @search="searchProperties" />
        </FilterSection>
        <PropertyCarouselSection
            title="Imoveis em destaque"
            href="/properties/maputo"
            :properties="relevant"
            @favourite="(e) => { console.log('favourite', e) }"
        />
        <PropertyCarouselSection
             title="Novos imóveis"
             href="/properties/maputo"
            :properties="latest"
            @favourite="(e) => { console.log('favourite', e) }"
        />

        <AdCarouselSection
            title="Publicidade"
            href="#"
            :ads="ads"
            @favourite="(e) => { console.log('favourite', e) }"
        />

    </main>
</template>
