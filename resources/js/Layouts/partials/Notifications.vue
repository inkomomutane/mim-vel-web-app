<script>
import flasher from "@flasher/flasher";

export default {
    props: {
        messages: Object,
    },
    watch: {
        messages(value) {
            flasher.render(value);
        },
    },
};
</script>
<template></template>
