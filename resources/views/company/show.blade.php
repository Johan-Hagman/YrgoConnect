<x-public-layout>
    <div>
        <div>
            <div>
                <img src="{{ asset('storage/' . $company->image_url) }}" alt="Bild på {{ $company->name }}">
            </div>

            <h1>{{ $company->name }}</h1>
            <a href="{{ $company->website_url }}" target="_blank">Länk till hemsida</a>
            <p>{{ $company->description }}</p>

            <p>Ort:</p>
            <p>{{ $company->city }}</p>

            <p>Kontaktperson:</p> 
            <p>{{ $company->contact_name }}</p>

            <p>Vi söker:</p>


            <p>Med dessa kompetenser:</p>
            @if($company->competences->count() > 0)
                <ul>
                    @foreach($company->competences as $competence)
                        <li>{{ $competence->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>Inga kompetenser specificerade.</p>
            @endif

            <p>Deltar på mässan:</p> 
            <p>{{ $company->attendance ? 'Ja' : 'Nej' }}</p>

        </div>

        <a href="{{ route('company.edit') }}">Ändra Profil</a>
    </div>
</x-public-layout>
