<x-public-layout>
    <div class="w-full max-w-[1512px] mx-auto px-4 py-10 flex justify-center lg:p-20 lg:inline-flex lg:flex-col lg:justify-start lg:items-center lg:gap-2.5">
        <div class="w-96 p-6 bg-blue rounded-2xl flex flex-col justify-start items-center gap-6 lg:w-[600px] lg:p-10">

            {{-- Logotyp --}}
            <div class="self-stretch bg-white rounded-2xl overflow-hidden h-40 lg:h-56 lg:w-[470px]">
                <img src="{{ asset('storage/' . $company->image_url ?: 'default_image.jpg') }}" 
                     alt="Logotyp för {{ $company->name }}" 
                     class="block w-full h-full object-cover" />
            </div>

            {{-- Innehåll --}}
            <div class="w-full flex flex-col justify-start items-start gap-4 text-white lg:self-stretch">
                <div class="w-full flex flex-col gap-2">
                    <h1 class="text-xl font-semibold leading-7">{{ $company->name }}</h1>
                    <a href="{{ $company->website_url }}" target="_blank" class="underline font-medium leading-snug">Länk till hemsida</a>
                </div>

                <p class="text-base font-normal leading-normal">{{ $company->description }}</p>

                <div class="w-full flex flex-col gap-2">
                    <p class="text-base font-extrabold leading-snug">Ort:</p>
                    <p class="text-base font-normal leading-normal">{{ $company->city }}</p>
                </div>

                <div class="w-full flex flex-col gap-2">
                    <p class="text-base font-extrabold leading-snug">Kontaktperson:</p>
                    <p class="text-base font-normal leading-normal">{{ $company->contact_name }}</p>
                </div>

                <div class="w-full flex flex-col gap-2">
                    <p class="text-base font-extrabold leading-snug">Vi söker:</p>
                    @if($company->classes->isNotEmpty())
                        <ul class="flex flex-wrap gap-2">
                            @foreach($company->classes as $class)
                                <li class="px-4 py-2 rounded-[30px] outline outline-1 outline-white text-sm leading-none">
                                    {{ $class->name }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-base italic">Inga utbildningar angivna</p>
                    @endif
                </div>

                <div class="w-full flex flex-col gap-2">
                    <p class="text-base font-extrabold leading-snug">Med dessa kompetenser:</p>
                    @if($company->competences->isNotEmpty())
                        <ul class="flex flex-wrap gap-2">
                            @foreach($company->competences as $competence)
                                <li class="px-4 py-2 rounded-[30px] outline outline-1 outline-white text-sm leading-none">
                                    {{ $competence->name }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-base italic">Inga kompetenser specificerade</p>
                    @endif
                </div>

                <div class="w-full flex flex-col gap-2">
                    <p class="text-base font-extrabold leading-snug">Deltar på mässan:</p>
                    <p class="text-base font-normal leading-normal">
                        {{ $company->attendance ? 'Ja' : 'Nej' }}
                    </p>
                </div>
            </div>

            {{-- Ändra-profil-knapp --}}
            <div class="w-full flex justify-end">
                <a href="{{ route('company.edit') }}" 
                   role="button"
                   class="p-4 rounded-[40px] outline outline-1 outline-offset-[-1px] outline-white inline-flex justify-center items-center gap-2.5">
                   <span class="justify-start text-white text-base font-medium font-sans leading-none">Ändra profil</span>
                   <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Ändra profil" class="w-6 h-6">
                </a>
            </div>
        </div>
    </div>
</x-public-layout>

