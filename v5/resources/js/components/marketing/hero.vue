<script setup lang="ts">
import Autoplay from "embla-carousel-autoplay";

import { Avatar, AvatarImage } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import {
    Carousel,
    CarouselContent,
    CarouselItem,
    CarouselNext,
    CarouselPrevious,
} from "@/components/ui/carousel";

const images = [
    "https://picsum.photos/640/640?random=1",
    "https://picsum.photos/640/640?random=2",
    "https://picsum.photos/640/640?random=3",
    "https://picsum.photos/640/640?random=4",
    "https://picsum.photos/640/640?random=5",
    "https://picsum.photos/640/640?random=6",
];

const users: { avatar: string; name: string; id: number }[] = [
    {
        avatar: "https://github.com/benjamincanac.png",
        name: "Benjamin Canac",
        id: 1,
    },
    { avatar: "https://github.com/romhml.png", name: "Benjamin Canac", id: 2 },
    { avatar: "https://github.com/noook.png", name: "Benjamin Canac", id: 3 },
];
</script>

<template>
    <main class="flex flex-col justify-between gap-8 lg:flex-row">
        <aside class="w-full lg:w-1/3">
            <p class="relative text-4xl font-black">
                {{ $t("marketing.hero.title") }}
            </p>

            <div class="relative mt-2 font-bold">
                {{ $t("marketing.hero.subtitle") }}
            </div>

            <div class="relative my-12 flex gap-4">
                <Button>
                    {{ $t("marketing.hero.getMore") }}
                </Button>

                <img
                    src="@/assets/icons/arrow-dark.svg"
                    alt=""
                    class="absolute top-[110%] left-8 block h-12 w-12 -rotate-90 dark:hidden"
                />
                <img
                    src="@/assets/icons/arrow-light.svg"
                    alt=""
                    class="absolute top-[110%] left-8 hidden h-12 w-12 -rotate-90 dark:block"
                />
            </div>

            <div class="flex items-center gap-2">
                <div class="flex gap-2">
                    <Avatar v-for="user in users" :key="user.id">
                        <AvatarImage :src="user.avatar" />
                    </Avatar>
                </div>

                <span class="font-black">
                    {{ $t("marketing.hero.learnPeople") }}
                </span>
            </div>
        </aside>

        <aside class="w-full lg:w-2/3 lg:px-2">
            <Carousel
                :opts="{
                    align: 'start',
                    loop: true,
                }"
                :plugins="[
                    Autoplay({
                        delay: 2000,
                    }),
                ]"
            >
                <CarouselContent>
                    <CarouselItem
                        v-for="image in images"
                        :key="image"
                        class="basis-1/3"
                    >
                        <img
                            :src="image"
                            width="320"
                            height="320"
                            class="rounded-lg"
                        />
                    </CarouselItem>
                </CarouselContent>
                <CarouselPrevious class="hidden lg:flex" />
                <CarouselNext class="hidden lg:flex" />
            </Carousel>
        </aside>
    </main>
</template>
