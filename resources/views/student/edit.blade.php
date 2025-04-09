<x-layout>
    <div>
        <form method="POST" action="{{ route('student.update', $student) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="imageContainer">
                <img src="{{ asset('storage/' . $student->image_url ?: 'default_image.jpg') }}" alt="Bild på studenten {{ $student->name }}">
                <input type="file" name="image" accept="image/*">
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
                       
            <label class="required">För- och efternamn</label>
            <input type="text" name="name" value="{{ $student->name }}" required>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

            <label class="required">Utbildning</label>
            <label>Webbutvecklare <input type="radio" name="class" value="Webbutvecklare" {{ $student->classModel->name == 'Webbutvecklare' ? 'checked' : '' }}></label>
            <label>Digital Designer <input type="radio" name="class" value="Digital Designer" {{ $student->classModel->name == 'Digital Designer' ? 'checked' : '' }}></label>
            @error('class') <span class="text-red-500">{{ $message }}</span> @enderror

            <div>
                <label class="required">Länk till portfolio eller github</label>
                <input type="url" name="website_url" value="{{ $student->website_url }}" required>
                @error('website_url') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <label>Här kan du skriva en hisspitch om dig själv:</label>
            <textarea name="description" maxlength="240" placeholder="Här kan du skriva en hisspitch och berätta lite mer om dig själv.">{{ $student->description }}</textarea>
            <span>{{ strlen($student->description) }}/240 tecken</span>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror

            @if ($student->cv_url)
                <p><a href="{{ asset('storage/' . $student->cv_url) }}" target="_blank">Uppladdat CV</a></p>
            @endif
            <input type="file" name="cv" accept="application/pdf">
            @error('cv') <span class="text-red-500">{{ $message }}</span> @enderror

            <label>Länk till LinkedIn-profil</label>
            <input type="url" name="linkedin_url" value="{{ $student->linkedin_url }}">
            @error('linkedin_url') <span class="text-red-500">{{ $message }}</span> @enderror

            <label class="required">Kompetenser:</label>
            {{-- @foreach($availableCompetences as $competence)
                <label>
                    <input type="checkbox" name="competences[]" value="{{ $competence }}" 
                        {{ in_array($competence, json_decode($student->competences)) ? 'checked' : '' }}>
                    {{ $competence }}
                </label>
            @endforeach             --}}

            <button type="submit">Spara ändringar</button>
            <a href="{{ route('student.show') }}">Avbryt</a>
        </form>
    </div>
</x-layout>