<script setup lang="ts">
import Ripple from "@/components/inspira-ui/ripple/index.vue";
import SignInButton from "@/components/sign-in-button.vue";
import SignUpButton from "@/components/sign-up-button.vue";
</script>

<template>
    <div
        class="relative flex h-[450px] w-full flex-col items-center justify-center overflow-hidden rounded-lg md:w-full lg:w-full"
    >
        <p
            class="z-10 text-center text-5xl font-medium tracking-tighter whitespace-pre-wrap text-black dark:text-white"
        >
            {{ $t("marketing.setup.title") }}
        </p>
        <small class="mt-2">
            {{ $t("marketing.setup.subtitle") }}
        </small>

        <div class="z-100 my-2 flex items-center gap-3">
            <SignInButton />
            <SignUpButton />
        </div>

        <Ripple
            class="bg-white/5 mask-[linear-gradient(to_bottom,white,transparent)]"
            circle-class="border-[hsl(var(--primary))] bg-primary/25 blobed"
        />
    </div>
</template>

<style scoped>
:deep(.blobed) {
    border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
}
</style>
