<div>
    @if($step == 1)
        <h1>Ta chansen att hitta din perfekta LIA-matchning </h1>
        <p>Registrera din profil för att se vem som kommer på eventet den 23 april.</p>

        
        <div>
            <x-input-label :value="__('Jag är')" />

            <div class="mt-2 flex space-x-4">
                <label class="inline-flex items-center"> Jag är
                    <input type="radio" name="role" value="Student" class="text-indigo-600 border-gray-300 focus:ring-indigo-500" required>
                    <span class="ml-2">Student</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="radio" name="role" value="Företag" class="text-indigo-600 border-gray-300 focus:ring-indigo-500" required>
                    <span class="ml-2">Företag</span>
                </label>
            </div>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>



        <input type="email" wire:model="email" placeholder="E-post">
        <input type="password" wire:model="password" placeholder="Lösenord">
        <input type="password" wire:model="password_confirmation" placeholder="Bekräfta lösenord">
        

        <button wire:click="registerUser">Nästa</button>
    @endif

    @if($step == 2 && $role == 'company')
        <h2>Steg 2: Företagsinformation</h2>
        <input type="text" wire:model="company_name" placeholder="Företagsnamn">
        <input type="text" wire:model="image_url" placeholder="Bild-URL">
        <input type="text" wire:model="city" placeholder="Ort">
        <input type="text" wire:model="contact_name" placeholder="Kontaktperson">
        <input type="url" wire:model="website_url" placeholder="Webbsida">
        
        <button wire:click="previousStep">Tillbaka</button>
        <button wire:click="nextStep">Nästa</button>
    @endif

    @if($step == 3 && $role == 'company')
        <h2>Steg 3: Vilken roll söker ni?</h2>
        <label><input type="checkbox" wire:model="class" value="Webbutvecklare"> Webbutvecklare</label>
        <label><input type="checkbox" wire:model="class" value="Digital Designer"> Digital Designer</label>

        <h3>Vilka kompetenser söker ni?</h3>
        <label><input type="checkbox" wire:model="competences" value="Backend"> Backend</label>
        <label><input type="checkbox" wire:model="competences" value="Frontend"> Frontend</label>

        <textarea wire:model="description" placeholder="Berätta mer om företaget..."></textarea>

        <button wire:click="previousStep">Tillbaka</button>
        <button wire:click="nextStep">Nästa</button>
    @endif

    @if($step == 4)
        <h2>Steg 4: Granskning</h2>
        <p><strong>Namn:</strong> {{ $name }}</p>
        <p><strong>E-post:</strong> {{ $email }}</p>
        @if($role == 'company')
            <p><strong>Företagsnamn:</strong> {{ $company_name }}</p>
            <p><strong>Ort:</strong> {{ $city }}</p>
            <p><strong>Kontaktperson:</strong> {{ $contact_name }}</p>
            <p><strong>Kompetenser:</strong> {{ implode(', ', $competences) }}</p>
        @endif

        <button wire:click="previousStep">Tillbaka</button>
        <button wire:click="submit">Bekräfta</button>
    @endif

    @if($step == 5)
        <h2>✅ Registreringen lyckades!</h2>
        <p>Tack för att du registrerade dig!</p>
        <a href="{{ route('dashboard') }}">Gå till dashboard</a>
    @endif
</div>
