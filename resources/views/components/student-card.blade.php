@props([
    'imageUrl' => '',
    'name' => '',
    'city' => '',
    'classes' => [],
    'websiteUrl' => '',
    'description' => '',
    'cvUrl' => '',
    'linkedinUrl' => '',
    'email' => '',
    'skills' => [],
])

<div 
    x-data="{ expanded: false }" 
    class="bg-blue rounded-2xl inline-flex flex-col justify-center items-center w-96 p-10 gap-6"
>
    {{-- Logotyp --}}
    <div class="self-stretch h-80 flex justify-center items-center overflow-hidden rounded-2xl bg-white">
        @if ($imageUrl)
            <img src="{{ asset('storage/' . $imageUrl) }}" alt="Logotyp för {{ $name }}" class="w-full h-full object-cover">
        @else
            <div class="text-blue text-8xl font-extralight uppercase font-sans text-center leading-[102px]">
                {{ \Illuminate\Support\Str::of($name)->trim()->explode(' ')->map(fn($n) => \Illuminate\Support\Str::substr($n, 0, 1))->join(' ') }}
            </div>
        @endif
    </div>

    {{-- Innehåll --}}
    <div class="self-stretch flex flex-col justify-start items-start gap-4 text-white">
        {{-- Titel + Hjärta --}}
        <div class="flex flex-col justify-start items-start gap-2 w-full">
            <div class="flex justify-between items-center w-full">
                <div class="text-xl font-semibold leading-7">{{ $name }}</div>
                <div class="w-7 h-5 relative">
                    <img src="/icons/icon-heart.svg" alt="Hjärta" class="w-full h-full" />
                </div>
            </div>

            <div class="text-base font-extrabold leading-snug">
                {{ is_array($classes) ? implode(', ', $classes) : $classes }}
            </div>

            <div class="text-base font-medium underline leading-snug">
                <a href="{{ $websiteUrl }}" target="_blank">Länk till hemsida</a>
            </div>
        </div>

        {{-- Visa mer-info --}}
        <div x-show="expanded" x-transition class="flex flex-col justify-start items-start gap-8 w-full mt-4">
            {{-- Beskrivning --}}
            @if ($description)
            <div class="text-base font-normal leading-normal">
                {{ $description }}
            </div>
            @endif

            {{-- CV-länk --}}
            @if ($cvUrl)
            <div class="text-base font-medium underline leading-snug">
                <a href="{{ Str::startsWith($cvUrl, 'http') ? $cvUrl : asset('storage/' . $cvUrl) }}" target="_blank">
                    Ladda ned CV
                </a>
            </div>
            @endif

            {{-- LinkedIn-länk --}}
            @if ($linkedinUrl)
            <div class="text-base font-medium underline leading-snug">
                <a href="{{ $linkedinUrl }}" target="_blank">Länk till LinkedIn-profil</a>
            </div>
            @endif

            {{-- E-post --}}
            @if ($email)
            <div class="flex flex-col justify-start items-start gap-2">
                <div class="text-base font-extrabold leading-snug">E-postadress:</div>
                <div class="text-base font-normal leading-normal">{{ $email }}</div>
            </div>
            @endif

            {{-- Kompetenser --}}
            @if (!empty($skills))
            <div class="flex flex-col justify-start items-start gap-4 w-full">
                <div class="text-base font-extrabold leading-snug">Kompetenser:</div>
                <div class="flex flex-wrap justify-start items-start gap-2">
                    @foreach ($skills as $skill)
                        <div class="px-4 py-2 rounded-[30px] outline outline-1 outline-white text-base font-medium leading-none">
                            {{ $skill }}
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        {{-- Toggle-knapp --}}
        <div class="self-stretch inline-flex justify-center items-end mt-6">
            <button 
                @click="expanded = !expanded"
                class="p-4 bg-blue rounded-[40px] outline outline-1 outline-offset-[-1px] outline-white flex justify-center items-center gap-2.5"
            >
                <span class="text-white text-base font-medium leading-none" x-text="expanded ? 'Mindre information' : 'Mer information'"></span>
                <img 
                    src="/icons/Arrow-Down.svg" 
                    alt="Pil" 
                    class="w-6 h-6 transform transition-transform duration-300"
                    :class="expanded ? 'rotate-180' : 'rotate-0'"
                >
            </button>
        </div>
    </div>
</div>
