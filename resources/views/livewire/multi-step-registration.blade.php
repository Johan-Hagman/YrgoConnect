<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf

        {{-- Step 1: User --}}
        @if($step === 1)
            <h1>Ta chansen att hitta din perfekta LIA-matchning!</h1>
            <p>Registrera din profil för att se vem som kommer på eventet den 23 april.</p>

            <img src="public/icons/Bar-Step-1.png" alt="Progress bar showing step 1 out of 4">

            <label class="required">Jag är</label>
            <label><input type="radio" wire:model="role" value="student"> Student</label>
            <label><input type="radio" wire:model="role" value="company"> Företag</label>
            @error('role') <span class="text-red-500">{{ $message }}</span> @enderror

            <label class="required">E-postadress</label>
            <input type="email" wire:model.lazy="email" placeholder="exempel@mail.com" required>
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror

            <label class="required">Lösenord</label>
            <input type="password" wire:model.lazy="password" placeholder="********" required>
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror

            <label>Bekräfta lösenord</label>
            <input type="password" wire:model.lazy="password_confirmation" placeholder="********">

            <button type="button" wire:click="registerUser">Nästa</button>
        @endif

        {{-- Step 2: Company // Student --}}
        @if($step === 2 && $role === 'company')
            <h1>Ta chansen att träffa branschens nyaste stjärnor!</h1>

            <img src="public/icons/Bar-Step-2.png" alt="Progress bar showing step 2 out of 4">

            <label class="required">Företagsnamn</label>
            <input type="text" wire:model="company_name" placeholder="Företaget AB" required>
            @error('company_name') <span>{{ $message }}</span> @enderror

            <label>Företagets Logotyp</label>
            <input type="file" wire:model="image" accept="image/*">
            <div wire:loading wire:target="image">Laddar upp...</div>
            @error('image') <span>{{ $message }}</span> @enderror

            <label>Ort</label>
            <input type="text" wire:model="city">

            <label class="required">Kontaktperson</label>
            <input type="text" wire:model="contact_name" placeholder="Förnamn Efternanm" required> 
            @error('contact_name') <span>{{ $message }}</span> @enderror

            <label>Länk till företagets webbsida</label>
            <input type="url" wire:model="website_url" placeholder="https://www.yrgo.se/">
            @error('website_url') <span>{{ $message }}</span> @enderror

            <button type="button" wire:click="nextStep">Nästa</button>
        @endif

        @if($step === 2 && $role === 'student')



        @endif

        {{-- Step 3: Company // Student --}}
        @if($step === 3 && $role === 'company')
        <h1>Ta chansen att träffa branschens nyaste stjärnor!</h1>

        <img src="public/icons/Bar-Step-3.png" alt="Progress bar showing step 3 out of 4">

            <label class="required">Roller ni söker</label>
            <label><input type="checkbox" wire:model="class" value="Webbutvecklare"> Webbutvecklare</label>
            <label><input type="checkbox" wire:model="class" value="Digital Designer"> Digital Designer</label>
            @error('class') <span class="text-red-500">{{ $message }}</span> @enderror

            <label>Kompetenser (valfritt)</label>
            @foreach(['Backend', 'Frontend', 'Fullstack', 'Motion Design', 'UX/UI', '3D', 'Webflow/Framer', 'Branding', 'Content Creation'] as $competence)
                <label><input type="checkbox" wire:model="competences" value="{{ $competence }}"> {{ $competence }}</label>
            @endforeach

            <label>Övrig info om företaget</label>
            <textarea wire:model="description" maxlength="240" placeholder="Berätta gärna om förmåner, sammanhållning etc."></textarea>
            <span>{{ strlen($description) }}/240 tecken</span>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror

            <label>
                <input type="checkbox" wire:model="event_attendance"> Vi vill delta på eventet
            </label>

            <label class="required">
                <input type="checkbox" wire:model="accept_terms"> Jag godkänner användarvillkoren
            </label>
            @error('accept_terms') <span class="text-red-500">{{ $message }}</span> @enderror

            <button type="button" wire:click="previousStep">Tillbaka</button>
            <button type="button" wire:click="nextStep">Nästa</button>
        @endif

        {{-- Step 4: Review --}}
        @if($step === 4)
            <h1>Se över din information</h1>

            @if($role === 'company')
                <p><strong>Företagsnamn:</strong> {{ $company_name }}</p>
                <p><strong>Ort:</strong> {{ $city }}</p>
                <p><strong>Kontaktperson:</strong> {{ $contact_name }}</p>
                <p><strong>Webbsida:</strong> {{ $website_url }}</p>
                <p><strong>Roller:</strong> {{ implode(', ', $class) }}</p>
                <p><strong>Kompetenser:</strong> {{ implode(', ', $competences) }}</p>
                <p><strong>Övrigt:</strong> {{ $description }}</p>
                <p><strong>Deltar på eventet:</strong> {{ $event_attendance ? 'Ja' : 'Nej' }}</p>
            @endif

            <button type="button" wire:click="previousStep">Tillbaka</button>
            <button type="submit">Registrera</button>
        @endif

        {{-- Step 5: Confirmation! --}}
        @if($step === 5)
            <h1>Registreringen lyckades!</h1>
            <p>Välkommen till plattformen 🎉</p>
            <a href="{{ route('dashboard') }}">Gå till dashboard</a>
        @endif
    </form>
</div>
