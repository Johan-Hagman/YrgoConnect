{{-- resources/views/students/edit.blade.php --}}
<x-layout>
    <div class="container">
        <h1>Ändra Profil</h1>

        <form action="{{ route('profile.update.student') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Namn</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
            </div>

            <div class="form-group">
                <label for="website_url">Website URL</label>
                <input type="url" id="website_url" name="website_url" class="form-control" value="{{ old('website_url', $student->website_url) }}">
            </div>

            <div class="form-group">
                <label for="linkedin_url">LinkedIn URL</label>
                <input type="url" id="linkedin_url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $student->linkedin_url) }}">
            </div>

            <div class="form-group">
                <label for="cv_url">CV URL</label>
                <input type="url" id="cv_url" name="cv_url" class="form-control" value="{{ old('cv_url', $student->cv_url) }}">
            </div>

            <div class="form-group">
                <label for="description">Beskrivning</label>
                <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $student->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Spara Ändringar</button>
        </form>
    </div>
</x-layout>
