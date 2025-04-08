<x-layout>
    <div>
        <div>
            <div class="imageContainer">
                <img src="{{ asset('storage/' . $student->image_url) }}" alt="Bild på studenten {{ $student->name }}">
            </div>

            <h1{{ $student->name }}</h1>
            <h4>{{ $student->classModel->name}}h2</h4>
            <a href="{{ $student->website_url }}">Länk till portfolio eller github</a>
            <p>{{ $student->description }}</p>
            @if ($student->cv_url)
                <a href="{{ asset('storage/' . $student->cv_url) }}" target="_blank" class="text-blue-600 underline">Ladda ned CV</a>
            @else
                <p>Inget CV uppladdat</p>
            @endif

            <a href="{{ $student->linkedin_url }}" target="_blank">Länk till LinkedIn-profil</a>

            @if ($student->competences->isNotEmpty())
                <ul class="list-disc list-inside">
                    @foreach ($student->competences as $competence)
                        <li>{{ $competence->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>Inga kompetenser registrerade.</p>
            @endif
        </div>
        <a href="{{ route('profile.edit.student') }}" class="btn btn-primary">Ändra Profil</a>
    </div>
</x-layout>
