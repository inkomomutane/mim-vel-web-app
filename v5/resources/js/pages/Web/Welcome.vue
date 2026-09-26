<script setup lang="ts">
import MimovelHeader from "@/pages/Web/MimovelHeader.vue";
import Footer from "@/pages/Web/Footer.vue";
import HomePageMainContent from "@/pages/Web/HomePageMainContent.vue";
import {PropertyCardData} from "@/types/property";
const props = defineProps<{
    relevant: Array<PropertyCardData>;
    latest: Array<PropertyCardData>;
    seoData: Object,
    ads: Array
}>();
</script>

<template>
    <MimovelHeader/>
    <HomePageMainContent
        :relevant="relevant"
        :latest="latest"
        :ads="ads"
    />
    <Footer />
</template>
