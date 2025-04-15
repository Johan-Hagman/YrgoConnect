@props([
    'imageUrl' => '',
    'name' => '',
    'city' => '',
    'classes' => [],
    'websiteUrl' => '',
    'description' => '',
])

<div class="bg-blue rounded-lg inline-flex flex-col justify-center items-center w-56 p-6 gap-3.5">
    {{-- Logotyp --}}
    <div class="self-stretch h-44 flex justify-center items-center overflow-hidden rounded-lg bg-white">
        @if ($imageUrl)
            <img src="{{ asset('storage/' . $imageUrl) }}" alt="Logotyp för {{ $name }}" class="w-full h-full object-cover">
        @else
            <div class="text-blue text-4xl font-extralight uppercase font-sans">LOGO</div>
        @endif
    </div>

    <div class="self-stretch flex flex-col justify-start items-start gap-2.5 text-grey-10">
        {{-- Namn + Ort --}}
        <div class="flex justify-between items-center w-full">
            <div class="text-[9.9px] font-semibold">{{ $name }}</div>
            <div class="text-[9.9px]">{{ $city }}</div>
        </div>

        {{-- Roller --}}
        <div class="text-[7.92px] font-extrabold">
            Söker: {{ is_array($classes) ? implode(', ', $classes) : $classes }}
        </div>

        {{-- Länk till hemsida --}}
        <div class="text-[7.92px] font-medium underline">
            <a href="{{ $websiteUrl }}" target="_blank">Länk till hemsida</a>
        </div>

        {{-- Beskrivning --}}
        <div class="text-[7.92px] font-normal leading-snug">
            {{ $description }}
        </div>
    </div>
</div>
