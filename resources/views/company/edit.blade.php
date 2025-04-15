<x-public-layout>
    <div class="w-full max-w-[1512px] mx-auto px-4 py-10 flex justify-center lg:p-20 lg:inline-flex lg:flex-col lg:justify-start lg:items-center lg:gap-2.5">
        <form method="POST" action="{{ route('company.update', $company) }}" enctype="multipart/form-data" class="w-96 p-6 bg-blue rounded-2xl flex flex-col justify-start items-center gap-6 lg:w-[600px] lg:p-10">
            @csrf
            @method('PATCH')

            {{-- LOGOTYP --}}
<div class="w-full h-40 bg-white rounded-2xl overflow-hidden relative group cursor-pointer lg:w-[470px] lg:h-56">
    @if ($company->image_url)
        <label for="image" class="block w-full h-full">
            <img src="{{ asset('storage/' . $company->image_url) }}"
                 alt="Bild på {{ $company->name }}s logotyp"
                 class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-80" />
            <span class="absolute inset-0 flex items-center justify-center bg-black/30 text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                Klicka för att ändra bild
            </span>
        </label>
    @else
        <label for="image" class="w-full h-full flex items-center justify-center text-sm text-gray-500">
            Välj en bild
        </label>
    @endif

    <input type="file" name="image" id="image" accept="image/*" class="hidden">
</div>

@error('image')
    <span class="text-red-500 text-sm">{{ $message }}</span>
@enderror


            {{-- FORMULÄRFÄLT --}}
            <div class="w-full flex flex-col justify-start items-start gap-4 text-white lg:self-stretch">

                {{-- Företagsnamn --}}
                <label class="font-extrabold leading-snug" for="name">Företagsnamn:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $company->name) }}" class="w-full h-11 px-5 py-3 bg-white rounded-lg text-black font-medium leading-none" />

                {{-- Länk till webbsida --}}
                <label class="font-extrabold leading-snug mt-4" for="website_url">Länk till hemsida:</label>
                <input type="url" id="website_url" name="website_url" value="{{ old('website_url', $company->website_url) }}" class="w-full h-11 px-5 py-3 bg-white rounded-lg text-black font-medium leading-none underline" />

                {{-- Beskrivning --}}
                <div x-data="{ count: {{ strlen(old('description', $company->description)) }} }" class="w-full">
                    <label class="font-extrabold leading-snug mt-4" for="description">
                        Är det något mer du vill berätta om ert företag?
                    </label>
                
                    <textarea
                        id="description"
                        name="description"
                        maxlength="240"
                        x-on:input="count = $event.target.value.length"
                        class="w-full h-60 p-4 bg-white rounded-lg text-black font-normal leading-snug"
                    >{{ old('description', $company->description) }}</textarea>
                
                    <p class="text-neutral-300 text-right w-full text-sm" x-text="`${count}/240 tecken`"></p>
                </div>
                
                {{-- Ort --}}
                <label class="font-extrabold leading-snug mt-4" for="city">Ort:</label>
                <input type="text" id="city" name="city" value="{{ old('city', $company->city) }}" class="w-full h-11 px-5 py-3 bg-white rounded-lg text-black font-medium leading-none" />

                {{-- Kontaktperson --}}
                <label class="font-extrabold leading-snug mt-4" for="contact_name">Kontaktperson:</label>
                <input type="text" id="contact_name" name="contact_name" value="{{ old('contact_name', $company->contact_name) }}" class="w-full h-11 px-5 py-3 bg-white rounded-lg text-black font-medium leading-none" />

                {{-- Klass-val --}}
                <label class="font-extrabold leading-snug mt-4">Vi söker:</label>
                <div class="flex flex-wrap gap-2">
                    @foreach(['Webbutvecklare', 'Digital Designer'] as $class)
                        <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white flex items-center gap-2">
                            <span>{{ $class }}</span>
                            <input type="checkbox" name="classes[]" value="{{ $class }}" {{ in_array($class, $selectedClasses ?? []) ? 'checked' : '' }} class="form-checkbox text-red">
                        </label>
                    @endforeach
                </div>

                {{-- Kompetenser --}}
{{-- Kompetenser --}}
@php
    $allCompetences = ['Backend', 'Frontend', 'Fullstack', 'Motion Design', 'UX/UI', '3D', 'Webflow/Framer', 'Branding', 'Content Creation'];
    $selectedCompetences = $company->competences->pluck('name')->toArray();
@endphp

<div class="w-full flex flex-col gap-2">
    <label class="text-white text-base font-extrabold leading-snug">Med dessa kompetenser:</label>
    <div class="flex flex-wrap gap-2">
        @foreach($allCompetences as $competence)
            <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-offset-[-1px] outline-white flex items-center gap-2 text-white">
                <span class="text-base font-medium leading-none">{{ $competence }}</span>
                <input type="checkbox" name="competences[]" value="{{ $competence }}"
                    {{ in_array($competence, $selectedCompetences) ? 'checked' : '' }}
                    class="w-5 h-5 rounded border-white bg-white text-red focus:ring-0 focus:ring-offset-0">
            </label>
        @endforeach
    </div>
    @error('competences')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
            
                {{-- Mässa --}}
                <label class="font-extrabold leading-snug mt-4" for="attendance">Deltar på mässan:</label>
                <input type="checkbox" id="attendance" name="attendance" value="1" {{ $company->attendance ? 'checked' : '' }} class="form-checkbox text-red">

            </div>

            {{-- SUBMIT-KNAPP --}}
            <div class="w-full flex justify-end pt-4">
                <button type="submit" class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                    <span class="text-white text-base font-medium leading-none">Spara ändringar</span>
                    <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Spara" class="w-6 h-6">
                </button>
            </div>
        </form>
    </div>
</x-public-layout>
