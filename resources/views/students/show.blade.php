<x-layout>
    <div class="container">
        <h1>Min Profil</h1>
        <div>
            <p><strong>Namn:</strong> {{ $student->name }}</p>
            <p><strong>Website:</strong> <a href="{{ $student->website_url }}" target="_blank">{{ $student->website_url }}</a></p>
            <p><strong>LinkedIn:</strong> <a href="{{ $student->linkedin_url }}" target="_blank">{{ $student->linkedin_url }}</a></p>
            <p><strong>CV:</strong> <a href="{{ $student->cv_url }}" target="_blank">{{ $student->cv_url }}</a></p>
            <p><strong>Beskrivning:</strong> {{ $student->description }}</p>
        </div>
        <a href="{{ route('profile.edit.student') }}" class="btn btn-primary">Ändra Profil</a>
    </div>
</x-layout>
