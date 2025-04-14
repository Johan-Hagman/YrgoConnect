<x-public-layout>
    <div>
        <form method="POST" action="{{ route('company.update', $company) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="imageContainer">
                @if ($company->image_url)
                    <img src="{{ asset('storage/' . $company->image_url) }}" alt="Bild på {{ $company->name }}s logga">
                @endif
                <input type="file" name="image" accept="image/*">
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="name">Företagsnamn:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $company->name) }}">
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="website_url">Länk till hemsida:</label>
                <input type="url" id="website_url" name="website_url" value="{{ old('website_url', $company->website_url) }}"  placeholder="Länk till webbsida">
                @error('website_url')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="description">Är det något mer du vill berätta om ert företag?</label>
                <textarea id="description" name="description" maxlength="240">{{ old('description', $company->description) }}</textarea>
                <span>0/240 tecken</span>
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="city">Ort:</label>
                <input type="text" id="city" name="city" value="{{ old('city', $company->city) }}">
                @error('city')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="contact_name">Kontaktperson:</label>
                <input type="text" id="contact_name" name="contact_name" value="{{ old('contact_name', $company->contact_name) }}">
                @error('contact_name')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label>Vi söker:</label>
                <div>
                    <label>
                        <input type="checkbox" name="classes[]" value="Webbutvecklare" 
                            {{ in_array('Webbutvecklare', $selectedClasses ?? []) ? 'checked' : '' }}>
                        Webbutvecklare
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="classes[]" value="Digital Designer" 
                            {{ in_array('Digital Designer', $selectedClasses ?? []) ? 'checked' : '' }}>
                        Digital Designer
                    </label>
                </div>
            </div>

            <div>
                <label>Med dessa kompetenser:</label>
                @php
                    $allCompetences = ['Backend', 'Frontend', 'Fullstack', 'Motion Design', 'UX/UI', '3D', 'Webflow/Framer', 'Branding', 'Content Creation'];
                    $selectedCompetences = $company->competences->pluck('name')->toArray();
                @endphp
                
                @foreach($allCompetences as $competence)
                    <div>
                        <label>
                            <input type="checkbox" name="competences[]" value="{{ $competence }}" 
                                {{ in_array($competence, $selectedCompetences) ? 'checked' : '' }}>
                            {{ $competence }}
                        </label>
                    </div>
                @endforeach
                @error('competences')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label for="attendance">Deltar på mässan:</label>
                <div>
                    <label>
                        <input type="checkbox" id="attendance" name="attendance" value="1" 
                            {{ $company->attendance ? 'checked' : '' }}>
                        Ja
                    </label>
                </div>
                @error('attendance')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <button type="submit">Spara ändringar</button>
                <a href="{{ route('company.show') }}">Avbryt</a>
            </div>
        </form>
    </div>
</x-public-layout>