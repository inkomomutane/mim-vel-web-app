<script setup lang="ts">
import { ref } from "vue";
import { PropType } from "vue";

const props = defineProps({
    responsive: {
        type: Object as PropType<App.Data.MediaData>,
    },
    class: String,
    className: String,
    caption: String,
    alt: String,
});

const optimized = ref<Boolean>(props.responsive?.mime_type !== "image/webp");
</script>

<template>
    <img
        v-if="optimized && responsive != undefined"
        :class="className"
        :srcset="responsive?.srcsets ?? ''"
        :src="responsive?.original_url ?? ''"
        loading="lazy"
        :alt="alt"
        sizes="1px"
        onload="window.requestAnimationFrame(function(){if(!(size=getBoundingClientRect().width))return;onload=null;sizes=Math.ceil(size/window.innerWidth*100)+'vw';});"
    />
    <img
        :class="className"
        v-else-if="responsive != undefined"
        :src="responsive?.original_url ?? ''"
        loading="lazy"
        :alt="alt"
    />
    <img
        :class="`${className} object-left-top`"
        v-else
        src="../images/placeholder.svg"
        loading="lazy"
        :alt="alt"
    />
</template>
