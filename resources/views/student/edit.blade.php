<x-public-layout>
    <div class="w-full max-w-[1512px] mx-auto px-4 py-10 flex justify-center 
                lg:p-20 lg:inline-flex lg:flex-col lg:justify-start lg:items-center lg:gap-2.5">
        <form method="POST" action="{{ route('student.update', $student) }}" enctype="multipart/form-data"
              class="w-96 p-6 bg-blue rounded-2xl flex flex-col justify-start items-center gap-6
                     lg:w-[600px] lg:p-10">
            @csrf
            @method('PATCH')

            {{-- PROFILBILD --}}
            <div class="w-full h-80 bg-white rounded-2xl overflow-hidden relative group cursor-pointer">
                @if ($student->image_url)
                    <label for="image" class="block w-full h-full">
                        <img src="{{ asset('storage/' . $student->image_url) }}"
                             alt="Bild på {{ $student->name }}"
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

            {{-- FÄLT --}}
            <div class="w-full flex flex-col justify-start items-start gap-4 text-white">

                {{-- Namn --}}
                <label class="font-extrabold leading-snug" for="name">För- och efternamn:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}"
                       class="w-full h-11 px-5 py-3 bg-white rounded-lg text-black font-medium leading-none" />

                {{-- Klass --}}
                <label class="font-extrabold leading-snug mt-4">Utbildning:</label>
                <div x-data="{ selectedClass: '{{ $student->classModel->name }}' }" class="flex flex-wrap gap-2">
                    @foreach(['Webbutvecklare', 'Digital Designer'] as $class)
                        <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white flex items-center gap-2">
                            <span>{{ $class }}</span>
                            <input type="radio" name="class" value="{{ $class }}" 
                                {{ $student->classModel->name == $class ? 'checked' : '' }}
                                x-on:change="selectedClass = $event.target.value"
                                class="form-radio text-red border-white">
                        </label>
                    @endforeach
                </div>

                {{-- Portfolio --}}
                <label class="font-extrabold leading-snug mt-4" for="website_url">Länk till portfolio:</label>
                <input type="url" id="website_url" name="website_url" value="{{ old('website_url', $student->website_url) }}"
                       class="w-full h-11 px-5 py-3 bg-white rounded-lg text-black font-medium underline" />

                {{-- Hisspitch --}}
                <div x-data="{ count: {{ strlen(old('description', $student->description)) }} }" class="w-full">
                    <label class="font-extrabold leading-snug mt-4" for="description">
                        Här kan du skriva en hisspitch om dig själv:
                    </label>
                
                    <textarea
                        id="description"
                        name="description"
                        maxlength="240"
                        x-on:input="count = $event.target.value.length"
                        class="w-full h-60 p-4 bg-white rounded-lg text-black font-normal leading-snug"
                    >{{ old('description', $student->description) }}</textarea>
                
                    <span 
                        class="text-sm font-normal mb-4 text-right block"
                        :class="count >= 240 ? 'text-red' : 'text-white'">
                        <span x-text="count"></span>/240 tecken
                    </span>
                </div>

                {{-- LinkedIn --}}
                <label class="font-extrabold leading-snug mt-4" for="linkedin_url">Länk till LinkedIn-profil:</label>
                <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $student->linkedin_url) }}"
                       class="w-full h-11 px-5 py-3 bg-white rounded-lg text-black font-medium underline" />
                
                {{-- Kompetenser --}}
                <div class="w-full flex flex-col gap-2">
                    <label class="text-white text-base font-extrabold leading-snug">Kompetenser:</label>
                    <div class="flex flex-wrap gap-2" x-data="{ selectedClass: '{{ $student->classModel->name }}' }">
                        {{-- Web Developer Competences --}}
                        @foreach(['Backend', 'Frontend', 'Fullstack'] as $competence)
                            <label x-show="selectedClass === 'Webbutvecklare'" 
                                class="px-4 py-2 rounded-[30px] outline outline-1 outline-white flex items-center gap-2 text-white">
                                <span class="text-base font-medium leading-none">{{ $competence }}</span>
                                <input type="checkbox" name="competences[]" value="{{ $competence }}"
                                    {{ in_array($competence, $student->competences->pluck('name')->toArray()) ? 'checked' : '' }}
                                    class="w-5 h-5 rounded border-white bg-white text-red focus:ring-0 focus:ring-offset-0">
                            </label>
                        @endforeach
                        
                        {{-- Digital Designer Competences --}}
                        @foreach(['Motion Design', 'UX/UI', '3D', 'Webflow/Framer', 'Branding', 'Content Creation'] as $competence)
                            <label x-show="selectedClass === 'Digital Designer'" 
                                class="px-4 py-2 rounded-[30px] outline outline-1 outline-white flex items-center gap-2 text-white">
                                <span class="text-base font-medium leading-none">{{ $competence }}</span>
                                <input type="checkbox" name="competences[]" value="{{ $competence }}"
                                    {{ in_array($competence, $student->competences->pluck('name')->toArray()) ? 'checked' : '' }}
                                    class="w-5 h-5 rounded border-white bg-white text-red focus:ring-0 focus:ring-offset-0">
                            </label>
                        @endforeach
                    </div>
                    @error('competences')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- CV --}}
                <label class="font-extrabold leading-snug mt-4" for="cv">Ladda upp CV:</label>
                <input type="file" name="cv" accept="application/pdf">
                @if ($student->cv_url)
                    <p>
                        <a href="{{ asset('storage/' . $student->cv_url) }}" target="_blank" class="underline">
                            Se uppladdat CV
                        </a>
                    </p>
                @endif



            </div>

            {{-- KNAPP --}}
            <div class="w-full flex justify-end pt-4">
                <button type="submit"
                        class="p-4 rounded-[40px] outline outline-1 outline-white flex justify-center items-center gap-2.5">
                    <span class="text-white text-base font-medium leading-none">Spara Ändringar</span>
                    <img src="{{ asset('icons/Arrow-Right.svg') }}" alt="Spara" class="w-6 h-6">
                </button>
            </div>
        </form>
    </div>
</x-public-layout>
