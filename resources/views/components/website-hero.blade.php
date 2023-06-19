@props([
    'noOpacity' => false
])

<section class="relative h-96">
    <!-- Carousel background -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
        <div class="carousel">
            {{ $coverImage }}
        </div>
    </div>
    <!-- Overlay -->
    <div
        class="absolute top-0 left-0 w-full h-full   {{ $noOpacity  ? 'bg-slate-600 opacity-80' : 'bg-slate-800  opacity-60' }}
        "
    ></div>
    <!-- Hero content -->
    <div class="absolute container mx-auto px-4">
        <section class="bg-transparent">
            {{ $content }}
        </section>
    </div>
    {{ $slot }}
</section>
