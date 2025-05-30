@props([
    'imageUrl' => '',
    'name' => '',
    'city' => '',
    'classes' => [],
    'websiteUrl' => '',
    'description' => '',
    'contactPerson' => '',
    'email' => '',
    'roles' => [],
    'skills' => [],
    'company' => null
])

<div x-data="{ open: false }" class="bg-blue rounded-2xl inline-flex flex-col justify-center items-center w-96 p-10 gap-6">
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

    <div class="self-stretch flex flex-col justify-start items-start gap-4 text-white">
        {{-- Titel + Hjärta --}}
        <div class="flex flex-col justify-start items-start gap-2 w-full">
            <div class="flex justify-between items-center w-full">
                <div class="text-xl font-semibold leading-7">{{ $name }}</div>
                @auth
                    @if(auth()->user()->role->name === 'Student' && $company)
                        <livewire:favorite-button :favoritable="$company" wire:key="company-{{$company->id}}" />
                    @else
                        <div class="w-7 h-5 relative">
                            <img src="/icons/icon-heart.svg" alt="Hjärta" class="w-full h-full" />
                        </div>
                    @endif
                @endauth
            </div>

            {{-- Länk --}}
            <div class="text-base font-medium underline leading-snug">
                <a href="{{ $websiteUrl }}" target="_blank">Länk till webbsida</a>
            </div>
        </div>

        {{-- Beskrivning + Expandera --}}
        <template x-if="open">
            <div class="flex flex-col justify-start items-start gap-6 w-full">
                <div class="text-base font-normal leading-normal">{{ $description }}</div>

                {{-- Ort --}}
                <div class="flex flex-col gap-2">
                    <div class="text-base font-extrabold leading-snug">Ort:</div>
                    <div class="text-base font-normal leading-normal">{{ $city }}</div>
                </div>

                {{-- Kontaktperson --}}
                @if ($contactPerson)
                    <div class="flex flex-col gap-2">
                        <div class="text-base font-extrabold leading-snug">Kontaktperson:</div>
                        <div class="text-base font-normal leading-normal">{{ $contactPerson }}</div>
                    </div>
                @endif

                {{-- E-post --}}
                @if ($email)
                    <div class="flex flex-col gap-2">
                        <div class="text-base font-extrabold leading-snug">E-postadress:</div>
                        <div class="text-base font-normal leading-normal">{{ $email }}</div>
                    </div>
                @endif

               {{-- Utbildningar --}}
@if (!empty($classes))
<div class="flex flex-col gap-2 w-full">
    <div class="text-base font-extrabold leading-snug">Vi söker:</div>
    <div class="flex flex-wrap gap-2">
        @foreach ($classes as $class)
            <div class="px-4 py-2 rounded-[30px] outline outline-1 outline-offset-[-1px] outline-white text-base font-medium leading-none">
                {{ $class }}
            </div>
        @endforeach
    </div>
</div>
@endif


                {{-- Kompetenser --}}
                @if (!empty($skills))
                    <div class="flex flex-col gap-2 w-full">
                        <div class="text-base font-extrabold leading-snug">Med dessa kompetenser:</div>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($skills as $skill)
                                <div class="px-4 py-2 rounded-[30px] outline outline-1 outline-offset-[-1px] outline-white text-base font-medium leading-none">
                                    {{ $skill }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </template>

        {{-- Toggle-knapp --}}
        <div class="self-stretch inline-flex justify-center items-end">
            <button @click="open = !open" class="p-4 bg-blue rounded-[40px] outline outline-1 outline-offset-[-1px] outline-white flex justify-center items-center gap-2.5">
                <div class="text-white text-base font-medium leading-none" x-text="open ? 'Mindre information' : 'Mer information'"></div>
                <img src="/icons/Arrow-Down.svg" alt="Pil" class="w-6 h-6 transform transition-transform duration-300" :class="open ? 'rotate-180' : 'rotate-0'">
            </button>
        </div>
    </div>
</div>
