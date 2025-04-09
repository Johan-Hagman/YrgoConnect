<x-layout>
    <div>
        <div>
            <div>
                <img src="{{ asset('storage/' . $company->image_url) }}" alt="Bild på {{ $company->name }}">
            </div>

            <h1>{{ $company->name }}</h1>
            <h4>{{ $company->city }}</h4>
            <p>Kontaktperson: {{ $company->contact_name }}</p>
            <a href="{{ $company->website_url }}" target="_blank">Länk till hemsida</a>
            <p>{{ $company->description }}</p>

            <p>Deltar på mässan: {{ $company->attendance ? 'Ja' : 'Nej' }}</p>
        </div>

        <a href="{{ route('company.edit') }}">Ändra Profil</a>
    </div>
</x-layout>
