<script setup lang="ts">
import Modal from '@/Components/Modal.vue';
import { PropType } from 'vue';

const props = defineProps({
    province:Object as PropType<App.Data.ProvinceData>,
})

</script>
<template>
    <Modal>
        <div class="bg-white rounded">
            
        </div>
    </Modal>
</template>
