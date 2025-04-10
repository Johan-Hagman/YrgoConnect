<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="px-4 py-6 flex flex-col items-center gap-6">
        @csrf

        {{-- Step 1: User --}}
        @if($step === 1)
            <div class="w-full max-w-[384px] p-6 bg-blue rounded-2xl flex flex-col items-center gap-10">

                <div class="flex flex-col items-start gap-6 text-center">
                    <h1 class="text-white text-3xl font-normal font-sans leading-9">
                        Ta chansen att hitta <br/>din perfekta LIA-matchning!
                    </h1>
                    <p class="text-white text-xl font-normal font-sans leading-7">
                        Registrera din profil för att se vem som kommer på eventet den 23 april.
                    </p>
                </div>


                <img src="{{ asset('icons/Bar-Step-1-mobile.png') }}" alt="Progress bar showing step 1 out of 4" class="w-80">

                <div class="w-full flex flex-col gap-6">
                    <!-- Role selection -->
                    <div class="flex flex-col gap-2">
                        <div class="inline-flex items-center gap-2">
                            <label class="text-white text-base font-extrabold font-sans">Jag är:</label>
                            <span class="text-rose-600 text-base font-extrabold">*</span>
                        </div>

                        <div class="inline-flex justify-center items-center gap-8">
                            <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" wire:model="role" name="role" value="company" class="form-radio text-rose-600 border-white">
                                <span class="text-white text-base font-medium">Företag</span>
                            </label>
                        
                            <label class="px-4 py-2 rounded-[30px] outline outline-1 outline-white inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" wire:model="role" name="role" value="student" class="form-radio text-rose-600 border-white">
                                <span class="text-white text-base font-medium">Student</span>
                            </label>
                        </div>
                        
                        @error('role') <span class="text-sm text-red">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email input -->
                    <div class="flex flex-col gap-2">
                        <div class="inline-flex items-center gap-2">
                            <label class="text-white text-base font-extrabold font-sans">E-postadress</label>
                            <span class="text-rose-600 text-base font-extrabold">*</span>
                        </div>
                        <input type="email" wire:model.lazy="email" placeholder="exempel@mail.com" required
                               class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium">
                        @error('email') <span class="text-sm text-red">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password input -->
                    <div class="flex flex-col gap-2">
                        <div class="inline-flex items-center gap-2">
                            <label class="text-white text-base font-extrabold font-sans">Lösenord</label>
                            <span class="text-rose-600 text-base font-extrabold">*</span>
                        </div>
                        <input type="password" wire:model.lazy="password" placeholder="********" required
                               class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium">
                        @error('password') <span class="text-sm text-red">{{ $message }}</span> @enderror
                    </div>

                    <!-- Confirm Password input -->
                    <div class="flex flex-col gap-2">
                        <label class="text-white text-base font-extrabold font-sans">Bekräfta lösenord</label>
                        <input type="password" wire:model.lazy="password_confirmation" placeholder="********"
                               class="w-full h-11 p-4 bg-white rounded-lg text-zinc-600 text-base font-medium">
                    </div>

                    <!-- Next button -->
                    <button type="button" wire:click="registerUser" class="px-4 py-2 rounded-[40px] outline outline-1 outline-white inline-flex items-center gap-2">
                        <span class="text-white text-base font-medium">Nästa</span>
                    </button>
                    

                     

        @endif

        {{-- Step 2: Company // Student --}}
        @if($step === 2 && $role === 'company')
            <h1>Ta chansen att träffa branschens nyaste stjärnor!</h1>

            <img src="{{asset('icons/Bar-Step-2.png')}}" alt="Progress bar showing step 2 out of 4">

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

            <label>Länk till företagets hemsida</label>
            <input type="url" wire:model="website_url" placeholder="https://www.yrgo.se/">
            @error('website_url') <span>{{ $message }}</span> @enderror

            <button type="button" wire:click="nextStep">Nästa</button>
        @endif

        @if($step === 2 && $role === 'student')
        <h1>Ta chansen att hitta din framtida LIA-plats!</h1>
        <img src="{{asset('icons/Bar-Step-2.png')}}" alt="Progress bar showing step 2 out of 4">

        <label class="required">För- och efternamn</label>
        <input type="text" wire:model="name" required>

        <label class="required">Utbildning</label>
        <label>Webbutvecklare <input type="radio" wire:model="class" value="Webbutvecklare"></label>
        <label>Digital Designer <input type="radio" wire:model="class" value="Digital Designer"></label>
        @error('class') <span class="text-red-500">{{ $message }}</span> @enderror

        <label>Bild på dig</label>
        <input type="file" wire:model="image" accept="image/*">
        <div wire:loading wire:target="image">Laddar upp...</div>
        @error('image') <span>{{ $message }}</span> @enderror

        <label class="required">Länk till portfolio eller github</label>
        <input type="url" wire:model="website_url" required>
        @error('website_url') <span class="text-red-500">{{ $message }}</span> @enderror
    
        <button type="button" wire:click="nextStep">Nästa</button>
        @endif

        {{-- Step 3: Company // Student --}}
        @if($step === 3 && $role === 'company')
        <h1>Ta chansen att träffa branschens nyaste stjärnor!</h1>

        <img src="{{asset('icons/Bar-Step-3.png')}}"" alt="Progress bar showing step 3 out of 4">

            <label class="required">Vilken roll söker ni?</label>
            <label><input type="checkbox" wire:model="class" value="Webbutvecklare"> Webbutvecklare</label>
            <label><input type="checkbox" wire:model="class" value="Digital Designer"> Digital Designer</label>
            @error('class') <span>{{ $message }}</span> @enderror

            <label>Vilka kompetenser söker ni?</label>
            <span>Välj så många alternativ du vill.</span>
            @foreach(['Backend', 'Frontend', 'Fullstack', 'Motion Design', 'UX/UI', '3D', 'Webflow/Framer', 'Branding', 'Content Creation'] as $competence)
                <label><input type="checkbox" wire:model="competences" value="{{ $competence }}"> {{ $competence }}</label>
            @endforeach

            <label>Är det något mer du vill berätta om ert företag?</label>
            <textarea wire:model="description" maxlength="240" placeholder="Här kan du skriva en hisspitch eller berätta om era förmåner, sammanhållning etc."></textarea>
            <span>0/240 tecken</span>
            @error('description') <span>{{ $message }}</span> @enderror

            <label>
                <input type="checkbox" wire:model="event_attendance"> Jag vill anmäla mig till eventet
            </label>

            <label class="required">
                <input type="checkbox" wire:model="accept_terms" required> Jag accepterar YRGOs användarvillkor
            </label>
            @error('accept_terms') <span>{{ $message }}</span> @enderror

            <button type="button" wire:click="previousStep">Tillbaka</button>
            <button type="button" wire:click="nextStep">Nästa</button>
        @endif

        @if($step === 3 && $role === 'student')
        <h1>Ta chansen att hitta din framtida LIA-plats!</h1>
        <img src="{{asset('icons/Bar-Step-3.png')}}" alt="Progress bar showing step 3 out of 4">
        
        <label class="required">Jag är intresserad av LIA inom</label>
        <span>Välj så många alternativ du vill</span>
        @foreach($availableCompetences as $competence)
            <label>
                <input type="checkbox" wire:model="competences" value="{{ $competence }}">
                {{ $competence }}
            </label>
        @endforeach

        <label>Här kan du skriva en hisspitch om dig själv:</label>
        <textarea wire:model="description" maxlength="240" placeholder="Här kan du skriva en hisspitch och berätta lite mer om dig själv."></textarea>
        <span>0/240 tecken</span>
        @error('description') <span>{{ $message }}</span> @enderror

        <label>Länk till LinkedIn-profil</label>
        <input type="url" wire:model="linkedin_url">
        @error('linkedin_url') <span>{{ $message }}</span> @enderror

        <label class="required">Ladda upp CV</label>
        <input type="file" wire:model="cv" accept="application/pdf">
        <div wire:loading wire:target="cv">Laddar upp...</div>
        @error('cv') <span>{{ $message }}</span> @enderror

        <label class="required">
            <input type="checkbox" wire:model="accept_terms" required> Jag accepterar YRGOs användarvillkor
        </label>
        @error('accept_terms') <span>{{ $message }}</span> @enderror

        <button type="button" wire:click="previousStep">Tillbaka</button>
        <button type="button" wire:click="nextStep">Nästa</button>
        @endif

        {{-- Step 4: Review --}}
        @if($step === 4)
            <h1>Nästan klar! Ser allt bra ut?</h1>
            <img src="{{asset('icons/Bar-Step-4.png')}}" alt="Progress bar showing step 4 out of 4">

            @if($role === 'company')
                
                @if($image && method_exists($image, 'temporaryUrl'))
                <div>
                    <p>Preview:</p>
                    <img src="{{ $image->temporaryUrl() }}" alt="Logo preview" class="max-h-48">
                </div>
                @endif  

                <p>Är det något mer du vill berätta om ert företag?</p>
                <p>{{ $description }}</p>

                <p>Jag är:</p>
                @if($role === 'company')
                <p>Företag</p>
                @else
                <p>Student</p>
                @endif

                <p>E-postadress:</p>
                <p>{{ $email }}</p>

                <p>Företagsnamn:</p>
                <p>{{ $company_name }}</p>

                <p>Kontaktperson:</p>
                <p>{{ $contact_name }}</p>

                <p>Länk till företagets hemsida:</p>
                <a href="{{ $website_url }}" target="_blank">{{ $website_url }}</a>

                <p>Ort:</p>
                <p>{{ $city }}</p>

                <p>Vilken roll söker ni?</p>
                <p>{{ implode(', ', $class) }}</p>


                <p>Vilka kompetenser söker ni?</p>
                <p>{{ implode(', ', $competences) }}</p>

            @endif

            @if($role === 'student')

                @if($image && method_exists($image, 'temporaryUrl'))
                <div>
                    <p>Preview:</p>
                    <img src="{{ $image->temporaryUrl() }}" alt="Profile preview" class="max-h-48">
                </div>
                @endif  

                <p>Här kan du skriva en hisspitch om dig själv:</p>
                <p>{{ $description }}</p>

                <p>Jag är:</p>
                <p>{{ $role }}</p> 

                <p>Jag studerar till:</p>
                <p>{{ $class }}</p>

                <p>Jag söker LIA inom:</p>
                <p>{{ implode(', ', $competences ?? []) }}</p>

                <p>E-postadress:</p>
                <p>{{ $email }}</p>

                <p>För- och efternamn:</p>
                <p>{{ $name }}</p>

                <p>Länk till portfoliio eller github:</p>
                <a href="{{ $website_url }}" target="_blank">{{ $website_url }}</a>

                <p>Länk till din LinkedIn-profil:</p>
                <a href="{{ $linkedin_url }}" target="_blank">{{ $linkedin_url }}</a>

                @if ($cv)
                    <p>Ditt CV:</p>
                    <p>{{ $cv->getClientOriginalName() }}</p>
                @endif

            @endif

            <button type="button" wire:click="previousStep">Tillbaka</button>
            <button type="button" wire:click="submit">Registrera</button>
        @endif

        {{-- Step 5: Confirmation! --}}
        @if($step === 5)
            <img src="{{ asset('icons/registration_gif.gif') }}" alt="">
            <h1>Registreringen lyckades!</h1>
            <p>Stort lycka till med att hitta dina nya kollegor.</p>
            <a href="{{ route('dashboard') }}">Se alla studenter</a>
        @endif
    </form>
</div>
