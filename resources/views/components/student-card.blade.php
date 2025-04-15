@props([
    'imageUrl' => '',
    'name' => 'Okänt företag',
    'city' => 'Okänd ort',
    'link' => '#',
    'description' => 'Ingen beskrivning tillagd.',
])

<div class="bg-blue rounded-lg inline-flex flex-col justify-center items-center w-56 p-6 gap-3.5">
    {{-- Bild / Logotyp --}}
    <div class="self-stretch h-44 flex justify-center items-center overflow-hidden rounded-lg bg-white">
        @if ($imageUrl)
            <img src="{{ asset('storage/' . $imageUrl) }}" alt="Bild på {{ $name }}" class="w-full h-full object-cover">
        @else
            <div class="text-blue text-4xl font-extralight uppercase font-sans">
                {{ \Illuminate\Support\Str::of($name)->trim()->explode(' ')->map(fn($n) => \Illuminate\Support\Str::substr($n, 0, 1))->join('') }}
            </div>
        @endif
    </div>

    {{-- Innehåll --}}
    <div class="self-stretch flex flex-col justify-start items-start gap-2.5">
        <div class="self-stretch flex flex-col justify-start items-start gap-1">
            {{-- Namn + hjärta --}}
            <div class="self-stretch inline-flex justify-between items-center">
                <div class="text-grey-10 text-[9.9px] leading-3 font-semibold font-sans">
                    {{ $name }}
                </div>
                <div class="w-4 h-4 relative">
                    <img src="{{ asset('/icons/icon-heart.svg') }}" alt="Hjärta" class="w-full h-full" />
                </div>
            </div>

            {{-- Ort --}}
            <div class="text-grey-10 text-[7.92px] leading-3 font-extrabold font-sans">
                {{ $city }}
            </div>

            {{-- Hemsida --}}
            <div class="text-grey-10 text-[7.92px] leading-3 font-medium underline font-sans">
                <a href="{{ $link }}" target="_blank">Länk till hemsida</a>
            </div>
        </div>

        {{-- Beskrivning --}}
        <div class="self-stretch flex flex-col justify-start items-start gap-5">
            <div class="text-grey-10 text-[7.92px] leading-3 font-normal font-sans">
                {{ $description }}
            </div>
        </div>
    </div>
</div>
